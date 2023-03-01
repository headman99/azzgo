import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable, of } from 'rxjs';
import { switchMap } from 'rxjs/operators';
import { AddItem } from 'src/app/model/command/addItem';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { ProductType } from 'src/app/model/enum/productType';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { Toast } from 'src/app/shared/provider/toast';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';
import { WhastappService } from 'src/app/shared/services/whastapp.service';
import { environment } from 'src/environments/environment';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
@Component({
  selector: 'app-product',
  templateUrl: './product.page.html',
  styleUrls: ['./product.page.scss'],
})
export class ProductPage implements OnInit {
  tabActive: any = 'product';
  productsOffer: any = [];
  feedbacks = [];
  avgFeedback: any = null;
  nextNumberFeedback: number = null;
  nextPageFeedback: any = null;
  publisherID: any;
  nextNumber: number;
  nextPage: any;
  voted: any;
  current_role: any;
  
  constructor(public colorService:ColorServiceService ,private customerSrv: CustomerService, private route: ActivatedRoute, private smartModalController: SmartmodalService, private alert: Alert, private toast: Toast, private publisherSrv: PublisherService,
    private msgBusService: MsgbusService, private whastappService : WhastappService, private router:Router) { }

  product: any;
  productID: any;
  enviromentPathimage = environment.endpoint + environment.storage;
  ngOnInit() {
    this.intiSearch();
  }

  intiSearch() {
    this.productID = this.route.snapshot.params.id;
    this.current_role = this.route.snapshot.data.expectedRole;
    this.getProductDetails();

  }

  getProductDetails() {
    if (this.current_role == 'Customer') {
      this.tabActive = 'product';
      this.customerSrv.getProductDetails(this.productID).subscribe(resp => {
        console.log(resp);
        if(resp){
          this.product = resp;
          this.publisherID = resp.publisher.id;
          this.getDiscountProduct(resp.publisher.id);
          this.getData();
        }else{

          let buttons = [
            {
              text: 'home',
              role: 'cancel',
              cssClass: 'secondary',
              handler: () => {
                this.router.navigate(['app2/tabs/search']);
              },
            }
            
          ];
          this.alert.showalert('Attenzione','Risorsa non più disponibile. Torna all\'homepeage',buttons)
          
        }

      });

    } else {
      this.tabActive = 'feedback';
      this.publisherSrv.getProductDetails(this.productID).subscribe(resp => {
        console.log(resp);
        this.product = resp;
        this.publisherID = resp.publisher.id;
        //this.getDiscountProduct(resp.publisher.id);
        this.getData();

      });


    }

  }

  hasFavourite() {
    if (this.current_role == 'Customer') {
      this.customerSrv.getFavouriteProduct(this.productID).subscribe(favourite => {
        this.product.hasFavourite = favourite.hasfavourite;
      })
    }
  }

  getDiscountProduct(publisherID) {
    this.customerSrv.getDiscountedProducts(publisherID).subscribe(resp => {
      console.log(resp);
      this.productsOffer = resp.stores;
      if (resp.nextPage) {
        this.nextNumber = resp.total - this.productsOffer.length;
        this.nextPage = resp.nextPage;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }

    });
  }

  moreItem($event) {
    this.customerSrv.getDiscountedProducts(this.publisherID, this.nextPage).subscribe((resp) => {
      if (resp) {
        this.productsOffer = resp.stores
        if (resp.nextPage) {
          this.nextNumber = resp.total - this.productsOffer.length;
          this.nextPage = resp.nextPage;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }
      }
      $event.complete();
    });
  }


get numberPhone(): string {
  let ret = null;
  if (this.product) {
    for (let index = 0; index < this.product.publisher.contacts.length; index++) {
      const element = this.product.publisher.contacts[index];
      if (element.typecode === 'PNE') {
        ret = element;
      }
    }
  }

  return ret ? ret.value : '';
}

  get indirizzo(): string {
    let ret = null;
    if (this.product) {
      for (let index = 0; index < this.product.publisher.contacts.length; index++) {
        const element = this.product.publisher.contacts[index];
        if (element.typecode === 'ADR') {
          ret = element;
        }
      }
    }

    return ret ? ret.value : '';
  }

  get PublisherProfilePic() {
    let ret = ''
    if (this.product && this.product.publisher.mainphoto.length > 0) {
      ret = this.enviromentPathimage + this.product.publisher.mainphoto[0].path
    }
    return ret
  }


  segmentChanged(value) {
    this.tabActive = value;

  }


  getCustomerPublisherFeedBackAVG() {
    if (this.current_role == 'Customer') {
      this.customerSrv.getProductFeedback(this.productID).subscribe(resp => {
        if (resp) {
          this.avgFeedback = resp.media;
        }
      })
    } else {
      this.publisherSrv.getProductFeedback(this.productID).subscribe(resp => {
        if (resp) {
          this.avgFeedback = resp.media;
        }
      })

    }
  }

  submitFeedBack() {
    this.smartModalController.showFeedback(1, (resp) => {
      if (resp.data) {
        this.customerSrv.saveFeedback(this.productID, resp.data).subscribe(resp => {
          this.getData();
        })
      }
    });
  }

  getData() {
    this.getCustomerPublisherFeedBackAVG();
    this.getFeedbacks();
    this.hasVoted();
    this.hasFavourite();
  }

  getFeedbacks() {
    this.getFeedBackList().subscribe(resp => {
      if (resp) {
        this.feedbacks = resp.feedbacks;
        if (resp.nextPage) {
          this.nextNumberFeedback = resp.total - this.feedbacks.length;
          this.nextPageFeedback = resp.nextPage;
        } else {
          this.nextNumberFeedback = null;
          this.nextPageFeedback = null;
        }
      }
    });
  }

  getFeedBackList(next?): Observable<any> {
    return of(this.current_role).pipe(
      switchMap((tipo) => {
        if (tipo == 'Customer') {
          return this.customerSrv.getProductFeedbackList(this.productID, next)
        } else {
          return this.publisherSrv.getProductFeedbackList(this.productID, next)
        }

      }))

  }


  moreItemFeedback($event) {
    this.getFeedBackList(this.nextPageFeedback).subscribe((resp) => {
      this.feedbacks = this.feedbacks.concat(resp.feedbacks);
      if (resp.nextPage) {
        this.nextPageFeedback = resp.total - this.feedbacks.length;
        this.nextPageFeedback = resp.nextPage;
      } else {
        this.nextPageFeedback = null;
        this.nextPageFeedback = null;
      }
      $event.complete();
    });
  }

  hasVoted() {
    if (this.current_role == 'Customer') {
      this.customerSrv.hasVoted(this.productID).subscribe(resp => {
        if (resp) {
          this.voted = resp.check;
        }
        console.log(resp);
      })
    } else {
      this.voted = false;
    }
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

    this.smartModalController.showAppointment(data, (resp) => {
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

  favouriteClicked(favourite) {
    if (!favourite) {
      this.customerSrv.favouriteProduct(this.product.id).subscribe(resp => {
        this.product.hasFavourite = true;
        this.toast.showAndClose('Prodotto aggiunto ai preferiti');
      })
    } else {
      this.customerSrv.unFavouriteProduct(this.product.id).subscribe(resp => {
        this.product.hasFavourite = false;
        this.toast.showAndClose('Prodotto rimosso dai preferiti');
      })
    }
  }

  whastapp(){
		if(this.numberPhone){
			this.whastappService.goToWhastapp(this.numberPhone,'Ciao, ti contatto per avere informazioni in merito al tuo annuncio su Azzgo.')
		}else{
			this.alert.show('Lo store non ha inserito ancora un numero di whastapp corretto');
		}

	}

}
