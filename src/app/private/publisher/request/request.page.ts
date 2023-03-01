import { Component, OnInit } from '@angular/core';
import { NavigationExtras, Router } from '@angular/router';
import { ChangeRequestStatus } from 'src/app/model/command/changeRequestStatus';
import { DeleteItem } from 'src/app/model/command/deleteItem';
import { ProductType } from 'src/app/model/enum/productType';
import { RequestStatus } from 'src/app/model/enum/requestStatus';
import { Alert } from 'src/app/shared/provider/alert';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { CometChatService } from 'src/app/shared/services/comet-chat.service';
import { WhastappService } from 'src/app/shared/services/whastapp.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-request',
  templateUrl: './request.page.html',
  styleUrls: ['./request.page.scss'],
})
export class RequestPage implements OnInit {
  requests: any[]=[];
  requestsHistory:any[]=[];
  tabActive: 'pending' | 'history' =  'pending';
  nextHistoryPage: number;
  nextHistoryNumber: number;
  nextPendingNumber: number;
  nextPendingPage: number;

  constructor(
    public colorService:ColorServiceService,
    private publisherService:PublisherService, 
    private cometChatSrv:CometChatService,private alert:Alert , 
    private route :Router, 
    private whastappService:WhastappService) { }

  ngOnInit() {
  }

  ionViewDidEnter() {
    this.publisherService.getRequests(RequestStatus.SENT).subscribe(resp=>{
      this.requests= resp.customers;
      if (resp.next) {
        this.nextPendingNumber = resp.total - this.requests.length;
        this.nextPendingPage = resp.next;
      } else {
        this.nextPendingNumber = null;
        this.nextPendingPage = null;
      }
    })

    this.publisherService.getRequestsHistory().subscribe(resp=>{
      this.requestsHistory = resp.customers;
      if (resp.next) {
        this.nextHistoryNumber = resp.total - this.requestsHistory.length;
        this.nextHistoryPage = resp.next;
      } else {
        this.nextHistoryNumber = null;
        this.nextHistoryPage = null;
      }
    })
  }


  getDetailsRequest(_data){
    this.publisherService.getRequestDetail(_data.customer.id, RequestStatus.SENT).subscribe(resp=>{
      let isService = false;
      for (let index = 0; index <  resp.requests.products.length; index++) {
        const element =  resp.requests.products[index];
        if(element.type == ProductType.SERVICE){
          isService =  true;
          break
        }else{
          isService = false;
          break
        }
      }
      _data.isService = isService;
      _data.details= resp.requests     



    });

  }
  getDetailsHistoryRequest(_data){
    this.publisherService.getRequestDetailHistory(_data.customer.id, _data.groupcode).subscribe(resp=>{
      _data.details= resp.requests
    });

  }

  deleteItem(_param){
    let p:DeleteItem= new DeleteItem();
    p.productid=_param.product.id;
    p.requestcode = _param.product.requestcode;
   /* this.publisherService.deleteItemFromRequest(p).subscribe(resp=>{
      this.getDetailsRequest(_param.data);
    })*/
  }

  changestatus(event){
    let param:ChangeRequestStatus= new ChangeRequestStatus;
    param = event;
    this.publisherService.changeRequestStatus(param).subscribe(resp=>{

      this.ionViewDidEnter();

    });

  }

  segmentChanged(value){
    this.tabActive = value;
  }

    // more item history
    moreItemHistory($event) {
      this.publisherService.getRequestsHistory(this.nextHistoryPage).subscribe((resp) => {
        this.requestsHistory = this.requestsHistory.concat(resp.customers);
        if (resp.next) {
          this.nextHistoryNumber = resp.total - this.requestsHistory.length;
          this.nextHistoryPage = resp.next;
        } else {
          this.nextHistoryNumber = null;
          this.nextHistoryPage = null;
        }
        $event.complete();
      });
    }
//moreitem pernding
    moreItem($event) {
      this.publisherService.getRequests(RequestStatus.SENT, this.nextPendingPage).subscribe((resp) => {
        this.requests = this.requests.concat(resp.publishers);
        if (resp.next) {
          this.nextPendingNumber = resp.total - this.requests.length;
          this.nextPendingPage = resp.next;
        } else {
          this.nextPendingNumber = null;
          this.nextPendingPage = null;
        }
        $event.complete();
      });
    }


    //chat
    goTochat(_id) {

      this.cometChatSrv.getUser(_id.toString()).then(_user => {
  
        this.gotoChatPage(_user)
      },error=>{
        this.alert.alertError('Attenzione','Per il momento questo utente non ha attivo il servizio chat')
      });
  
      //console.log(user);
  
    }
  
    gotoChatPage(user) {
      console.log('here tappedOnItems ' + user);
      // tslint:disable-next-line:no-shadowed-variable
  
      let userData = user;
      console.log('{{user.name}}');
      const navigationExtras: NavigationExtras = {
        state: {
          user: userData
        }
      };
      this.route.navigate(['chat-view'], navigationExtras);
    }
  

    whastapp(ev){
      if(ev.number){
        this.whastappService.goToWhastapp(ev.number,'Gentile Cliente, ti contatto in merito alla tua richiesta su AzzGo:')
      }else{
        this.alert.show('Lo store non ha inserito ancora un numero di whastapp corretto');
      }
  
    }


}
