import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, NavigationExtras, Router } from '@angular/router';
import { map } from 'rxjs/operators';
import { AddItem } from 'src/app/model/command/addItem';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { ProductType } from 'src/app/model/enum/productType';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { Toast } from 'src/app/shared/provider/toast';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
import { CometChatService } from 'src/app/shared/services/comet-chat.service';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';

@Component({
  selector: 'app-thunderdeals',
  templateUrl: './thunderdeals.page.html',
  styleUrls: ['./thunderdeals.page.scss'],
})
export class ThunderdealsPage implements OnInit {

 
  products: any = [];
  nextNumber: number;
  nextPage: any;
  userData: any;
  thunderID: any;
  thunderDeals: any;

  constructor(public colorService:ColorServiceService,private customerSrv: CustomerService, private toast: Toast, private alert: Alert, private smartModal: SmartmodalService, private route: Router, private cometChatSrv: CometChatService, private activeRoute:ActivatedRoute, private msgBusService:MsgbusService) { 

    
  }


  ngOnInit() {
  }
  ionViewDidEnter() {

    this.thunderID = Number(this.activeRoute.snapshot.params.id);
    this.search();
  }

  search(_page?) {
    this.customerSrv.getactivethunderdealslist().subscribe(resp=>{
      console.log(resp);
      if(resp){
        let index =  resp.deals.thunderdeals.map(deal=>deal.id).indexOf(this.thunderID);
        if(index > -1)
        this.thunderDeals = resp.deals.thunderdeals[index];
      }
    })
    this.customerSrv.getThunderDealProductsList(this.thunderID).subscribe((resp) => {
      this.products = resp ? resp.stores : [];
      if (resp && resp.next) {
        this.nextNumber = resp.total - this.products.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
    });
  }


  moreItem($event) {
    this.customerSrv.getThunderDealProductsList(this.thunderID,this.nextPage).subscribe((resp) => {
      this.products = this.products.concat(resp.store);
      if (resp.next) {
        this.nextNumber = resp.total - this.products.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
      $event.complete();
    });
  }

  addItem(_product) {
    let param: AddItem = new AddItem();
    param.productid = _product.id;
    if (_product.type == ProductType.SERVICE) {

      this.customerSrv.canPropose(_product.publisher.id).subscribe(resp => {
        if (resp.check) {
          this.openModalAppointment(_product)
        } else {
          this.alert.alertError('Attenzione', 'Hai già una richiesta di appuntamento in corso, controlla le tue richieste')
        }
      })


    } else {

      this.customerSrv.addItemToRequest(param).subscribe(resp => {
        this.msgBusService.onChangeNotification.emit(true);
        this.toast.showAndClose('Prodotto aggiunto alle richieste di acquisto');
      })
    }

  }

  openModalAppointment(_product) {

    let data = { product: _product }

    this.smartModal.showAppointment(data, (resp) => {
      let param: ProposeAppointment = new ProposeAppointment();
      param.productcode = _product.id;
      param.publisherid = _product.publisher.id;
      param.appointmentdate = resp.data.data;
      param.appointmentime = resp.data.ora;
      this.customerSrv.proposeAppointment(param).subscribe(resp => {
        this.toast.showAndClose('Appuntamento aggiunto alle richieste di acquisto');
      })
    });
  }


  goTochat(_id) {

    this.cometChatSrv.getUser(_id).then(_user => {

      this.gotoChatPage(_user)
    }, error => {
      this.alert.alertError('Attenzione', 'Per il momento questo utente non ha attivo il servizio chat')
    });

    //console.log(user);

  }

  gotoChatPage(user) {
    console.log('here tappedOnItems ' + user);
    // tslint:disable-next-line:no-shadowed-variable

    this.userData = user;
    console.log('{{user.name}}');
    const navigationExtras: NavigationExtras = {
      state: {
        user: this.userData
      }
    };
    this.route.navigate(['chat-view'], navigationExtras);
  }

  goToProductPage(productID) {
    console.log(productID)
    this.route.navigate(['app2/tabs/product', productID]);
  }


  goToPub(pubID) {
    this.route.navigate(['app2/tabs/publisher-profile', pubID]);
  }

  favouriteClicked(favourite, _product){
		if(favourite){
			this.customerSrv.favouriteProduct(_product.id).subscribe(resp=>{
				_product.isfavourite = true;
				this.toast.showAndClose('Prodotto aggiunto ai preferiti');
			})
		}else{
			this.customerSrv.unFavouriteProduct(_product.id).subscribe(resp=>{
				_product.isfavourite = false;
				this.toast.showAndClose('Prodotto rimosso dai preferiti');
			})
		}
	}

}