import { Component, OnInit } from '@angular/core';
import { NavigationExtras, Router } from '@angular/router';
import { DeleteItem } from 'src/app/model/command/deleteItem';
import { SendRequest } from 'src/app/model/command/sendRequest';
import { RequestStatus } from 'src/app/model/enum/requestStatus';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { Toast } from 'src/app/shared/provider/toast';

import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { CometChatService } from 'src/app/shared/services/comet-chat.service';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';
import { WhastappService } from 'src/app/shared/services/whastapp.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-request',
  templateUrl: './request.page.html',
  styleUrls: ['./request.page.scss'],
})
export class RequestPage implements OnInit {

  requests: any[] = [];
  requestsHistory: any[] = [];
  tabActive: 'pending' | 'history' | 'inviate' = 'pending';
  requestsSent: any[] = [];
  
  ///pagination pending
  nextPendingNumber: number;
  nextPendingPage: number;
  // pagination sent
  nextSentNumber: number;
  nextSentPage: number;
  // pagination history
  nextHistoryNumber: number;
  nextHistoryPage: number;

  constructor(public colorService:ColorServiceService ,private customerService: CustomerService, private toast: Toast, private cometChatSrv:CometChatService, private alert:Alert, private route:Router, private smartModal:SmartmodalService, private whastappService:WhastappService, private msgBusServices:MsgbusService) { }

  ngOnInit() {
  }

  ionViewDidEnter() {
    this.customerService.getRequests(RequestStatus.PENDING).subscribe(resp => {
      this.requests = resp.publishers;
      if (resp.next) {
        this.nextPendingNumber = resp.total - this.requests.length;
        this.nextPendingPage = resp.next;
      } else {
        this.nextPendingNumber = null;
        this.nextPendingPage = null;
      }
    })

    this.customerService.getRequests(RequestStatus.SENT).subscribe(resp => {
      this.requestsSent = resp.publishers;
      if (resp.next) {
        this.nextSentNumber = resp.total - this.requestsSent.length;
        this.nextSentPage = resp.next;
      } else {
        this.nextSentNumber = null;
        this.nextSentPage = null;
      }
    })

    this.customerService.getRequestsHistory().subscribe(resp => {
      this.requestsHistory = resp.publishers;
      if (resp.next) {
        this.nextHistoryNumber = resp.total - this.requestsHistory.length;
        this.nextHistoryPage = resp.next;
      } else {
        this.nextHistoryNumber = null;
        this.nextHistoryPage = null;
      }
    })

  }

  getDetailsRequest(_data) {
    this.customerService.getRequestDetail(_data.publisher.id, RequestStatus.PENDING).subscribe(resp => {
      _data.productcount = resp.requests.count;
      _data.details = resp.requests
      if(!resp.requests.count){
       let index=  this.requests.map(pub=>pub.publisher.id).indexOf(_data.publisher.id);
       this.requests.splice(index,1)
      }
    });

  }

  getDetailsRequestSent(_data) {
    this.customerService.getRequestDetail(_data.publisher.id, RequestStatus.SENT).subscribe(resp => {
      _data.productcount = resp.requests.count;
      _data.details = resp.requests
      if(!resp.requests.count){
        let index=  this.requestsSent.map(pub=>pub.publisher.id).indexOf(_data.publisher.id);
        this.requestsSent.splice(index,1)
      }
    });

  }
  getDetailsHistoryRequest(_data) {
    this.customerService.getRequestDetailHistory(_data.groupcode).subscribe(resp => {
      _data.details = resp.requests;
    });

  }

  deleteItem(_param, _status) {
    let p: DeleteItem = new DeleteItem();
    p.productid = _param.product.id;
    p.requestcode = _param.product.requestcode;
    this.customerService.deleteItemFromRequest(p).subscribe(resp => {
      if (_status == RequestStatus.PENDING) {
        this.msgBusServices.onChangeNotification.emit(true);
        this.getDetailsRequest(_param.data);
      } else {
        this.getDetailsRequestSent(_param.data);
      }
    })
  }

  sendclick(_data) {
    let p: SendRequest = new SendRequest();
    p.publisherid = _data.publisher.id;
    console.log(_data);
    if(_data.details.products.map(p=>p.type).indexOf('PRD') < -1){
      this.customerService.sendRequest(p).subscribe(resp => {
        if (resp) {
          this.msgBusServices.onChangeNotification.emit(true);
          this.toast.showAndClose('Richiesta inviata');
          this.ionViewDidEnter();
        }
      });
    }else{
        this.smartModal.addAddressToReq(_data,(_respAddress)=>{
          if(_respAddress){
          this.customerService.sendRequest(p).subscribe(resp => {
            if (resp) {
              this.msgBusServices.onChangeNotification.emit(true);
              this.toast.showAndClose('Richiesta inviata');
              this.ionViewDidEnter();
            }
          });
        }
        })
    }
  }
  segmentChanged(value) {
    this.tabActive = value;
  }

  //moreitem pending
  moreItem($event) {
    this.customerService.getRequests(RequestStatus.PENDING, this.nextPendingPage).subscribe((resp) => {
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

  // more item sent
  moreItemSent($event) {
    this.customerService.getRequests(RequestStatus.SENT, this.nextSentPage).subscribe((resp) => {
      this.requestsSent = this.requestsSent.concat(resp.publishers);
      if (resp.next) {
        this.nextSentNumber = resp.total - this.requestsSent.length;
        this.nextSentPage = resp.next;
      } else {
        this.nextSentNumber = null;
        this.nextSentPage = null;
      }
      $event.complete();
    });
  }

  // more item history
  moreItemHistory($event) {
    this.customerService.getRequestsHistory(this.nextHistoryPage).subscribe((resp) => {
      this.requestsHistory = this.requestsHistory.concat(resp.publishers);
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


  //chat
    //chat
    goTochat(_id) {

      this.cometChatSrv.getUser(_id).then(_user => {
  
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
        this.whastappService.goToWhastapp(ev.number,'Ciao, ti contatto per avere informazioni in merito al tuo annuncio su Azzgo.')
      }else{
        this.alert.show('Lo store non ha inserito ancora un numero di whastapp corretto');
      }
  
    }

}
