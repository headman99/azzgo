import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ActionSheetController } from '@ionic/angular';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Toast } from 'src/app/shared/provider/toast';
import { Observable, of } from 'rxjs';
import { map, switchMap } from 'rxjs/operators';
import { AddItem } from 'src/app/model/command/addItem';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { ProductType } from 'src/app/model/enum/productType';
import { Alert } from 'src/app/shared/provider/alert';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';
import { LaunchNavigatorSrv } from 'src/app/shared/provider/launch-navigator';
import { WhastappService } from 'src/app/shared/services/whastapp.service';
import { CallNumberSrv } from 'src/app/shared/provider/call-number';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';


@Component({
	selector: 'app-agency-profile',
	templateUrl: './agency-profile.page.html',
	styleUrls: ['./agency-profile.page.scss'],
})
export class AgencyProfilePage implements OnInit {
	products: any[] = [];
	publisherID: any;
	publisher: any;
	adress: any;
	address: any;
	enviromentPathimage = environment.endpoint + environment.storage;
	enableEditContact: boolean = false;
	current_role: any;
	nextNumber: number;
	nextPage: any;

	nextNumberFeedback: number;
	nextPageFeedback: any;
	enableSendItem: boolean;
	feedbacks: any = [];
	avgFeedback: number = null; voted: any;


	countFollower = 0;
	followed: boolean;
	textSearched: any;
	numberPhone: any;

	ngOnInit() {
		this.publisherID = this.route.snapshot.params.id;
		this.current_role = this.route.snapshot.data.expectedRole;
		this.getData();
		this.textSearched =null;
	}

	tabActive: string = 'product';
	speaker: any;

	constructor(
		private route: ActivatedRoute,
		public actionSheetCtrl: ActionSheetController,
		private publisherSrv: PublisherService,
		private customerSrv: CustomerService,
		private smartModalController: SmartmodalService,
		private toast: Toast,
		private alert: Alert,
		private router:Router,
		private msgBusService:MsgbusService,
		private launchNavigatorSrv:LaunchNavigatorSrv,
		private whastappService:WhastappService,
		private callNumberSrv:CallNumberSrv,
		public colorService:ColorServiceService
	) { }

	ionViewWillEnter() {
	

	}

	getCustomerPublisherFeedBackAVG() {
		this.customerSrv.getPublisherFeedback(this.publisherID).subscribe(resp => {
			if (resp) {
				this.avgFeedback = resp.media;
			}
		})
	}


	getPublisherFeedBackAVG() {
		this.publisherSrv.getPublisherFeedback().subscribe(resp => {
			if (resp) {
				this.avgFeedback = resp.media;
			}
		})
	}



	getData() {
		if (this.current_role == 'Customer') {
			this.enableEditContact = false;
			this.enableSendItem = true;
			this.getCustomerPublisherFeedBackAVG();
			this.hasVoted();
			this.hasFollow();
			this.customerSrv.getPublisherProfile(this.publisherID).subscribe((resp) => {
				this.publisher = resp.store;
				for (let index = 0; index < this.publisher.contacts.length; index++) {
					const element = this.publisher.contacts[index];
					if (element.typecode === 'ADR') {
						this.address = element;
					}

					if(element.typecode==='PNE'){
						this.numberPhone =  element.value;
					}
				}
			});
		} else {
			this.enableEditContact = true;
			this.enableSendItem = false;
			this.getPublisherFeedBackAVG();
			this.publisherSrv.getProfile().subscribe((resp) => {
				this.publisher = resp.store;
				for (let index = 0; index < this.publisher.contacts.length; index++) {
					const element = this.publisher.contacts[index];
					if (element.typecode === 'ADR') {
						this.address = element;
					}
				}
			});
		}

		this.getFollowerCount().subscribe(resp=>{
			this.countFollower = resp.count;
		})

		this.getFeedbacks().subscribe(resp => {
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

		this.getProducts().subscribe(resp => {
			this.textSearched =null;
			if (resp) {
				this.products = resp.products;
				if (resp.nextPage) {
					this.nextNumber = resp.total - this.products.length;
					this.nextPage = resp.nextPage;
				} else {
					this.nextNumber = null;
					this.nextPage = null;
				}
			}
		});


	
	}

	openExternalUrl(url: string) {
		/*  this.inAppBrowser.create(
	  url,
	  '_blank'
	);
	*/
	}
	segmentChanged(value) {
		this.tabActive = value;
	}

	async openSpeakerShare(speaker: any) {
		const actionSheet = await this.actionSheetCtrl.create({
			header: 'Share ' + speaker.name,
			buttons: [
				{
					text: 'Copy Link',
					handler: () => {
						console.log('Copy link clicked on https://twitter.com/' + speaker.twitter);
						if ((window as any).cordova && (window as any).cordova.plugins.clipboard) {
							(window as any).cordova.plugins.clipboard.copy('https://twitter.com/' + speaker.twitter);
						}
					},
				},
				{
					text: 'Share via ...',
				},
				{
					text: 'Cancel',
					role: 'cancel',
				},
			],
		});

		await actionSheet.present();
	}

	async openContact(speaker: any) {
		const mode = 'ios'; // this.config.get('mode');

		const actionSheet = await this.actionSheetCtrl.create({
			header: 'Contact ' + speaker.name,
			buttons: [
				{
					text: `Email ( ${speaker.email} )`,
					icon: mode !== 'ios' ? 'mail' : null,
					handler: () => {
						window.open('mailto:' + speaker.email);
					},
				},
				{
					text: `Call ( ${speaker.phone} )`,
					icon: mode !== 'ios' ? 'call' : null,
					handler: () => {
						window.open('tel:' + speaker.phone);
					},
				},
				{
					text: 'Cancel',
					role: 'cancel',
				},
			],
		});

		await actionSheet.present();
	}


	editContact(_contact) {
		this.smartModalController.editContact(_contact, (message) => {
			if (message && message.data) {
				this.toast.showAndClose(message.data);
				this.getData();
			}
		});
	}

	getProducts(nextPage?): Observable<any> {
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.getProducts(this.publisherID, nextPage).pipe(
						map(resp => {
							if (resp && resp.products && resp.products.stores) {
								return {
									products: resp.products.stores,
									total: resp.products.total,
									nextPage: resp.products.next
								}
							}
						}));
				} else {
					return this.publisherSrv.getAdsPublisher(nextPage).pipe(
						map(resp => {
							if (resp) {
								return {
									products: resp.stores,
									total: resp.total,
									nextPage: resp.next
								}
							}
						}));
				}
			}));
	}

	moreItemProduct($event) {
		this.getProducts(this.nextPage).subscribe((resp) => {
			this.products = this.products.concat(resp.products);
			if (resp.nextPage) {
				this.nextNumber = resp.total - this.products.length;
				this.nextPage = resp.nextPage;
			} else {
				this.nextNumber = null;
				this.nextPage = null;
			}
			$event.complete();
		});
	}

	moreItemSearched($event){
		this.customerSrv.getPublisherProductSearch(this.publisherID,this.textSearched, this.nextPage).subscribe(resp=>{
			if (resp && resp.products) {

				this.products = this.products.concat(resp.products);
				if (resp.next) {
					this.nextNumber = resp.total - this.products.length;
					this.nextPage = resp.next;
				} else {
					this.nextNumber = null;
					this.nextPage = null;
				}
			}

			$event.complete();


		})

	}

	moreItem($event){

		if(this.textSearched){
			this.moreItemSearched($event);
		}else{
			this.moreItemProduct($event)
		}

	}


	moreItemFeedback($event) {
		this.getFeedbacks(this.nextPageFeedback).subscribe((resp) => {
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


	/*addItem(_product) {
		let param: AddItem = new AddItem();
		param.productid = _product.id;
		this.customerSrv.addItemToRequest(param).subscribe(resp => {
			this.toast.showAndClose('Prodotto aggiunto alle richieste di acquisto');
		})

	}
	*/

	submitFeedBack() {
		this.smartModalController.showFeedback(1, (resp) => {
			if (resp.data) {
				this.customerSrv.savePublisherFeedback(this.publisherID, resp.data).subscribe(resp => {
					this.getData();
				})
			}
		});
	}

	getFeedbacks(nextPage?): Observable<any> {
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.getPublisherFeedbackList(this.publisherID, nextPage).pipe(
						map(resp => {
							if (resp && resp.feedbacks) {
								return {
									feedbacks: resp.feedbacks,
									total: resp.total,
									nextPage: resp.next
								}
							}
						}));
				} else {
					return this.publisherSrv.getPublisherFeedbackList(nextPage).pipe(
						map(resp => {
							if (resp) {
								return {
									feedbacks: resp.feedbacks,
									total: resp.total,
									nextPage: resp.next
								}
							}
						}));
				}
			}));
	}


	hasVoted() {
		this.customerSrv.hasVoted(this.publisherID).subscribe(resp => {
			if (resp) {
				this.voted = resp.check;
			}
			console.log(resp);
		})
	}


	///aggiunta prodotto 

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


	hasFollow(){
		this.customerSrv.getHasFollow(this.publisherID).subscribe(resp=>{
			this.followed = resp.hasfollow;
		})	
	}
	getFollowerCount() {
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.getCountFollowForPublisher(this.publisherID).pipe(
						map(resp => {
							if (resp) {
								return {
									count: resp.followercount
								}
							}
						}));
				} else {
					return this.publisherSrv.getCountFollow().pipe(
						map(resp => {
							if (resp) {
								return {
									count: resp.followercount
								}
							}
						}));
				}
			}));
	}


	follow(){
		this.customerSrv.followPublisher(this.publisherID).subscribe(resp=>{
			if(resp){
			this.followed= true;
			this.getFollowerCount().subscribe(resp=>{
				this.countFollower = resp.count;
			});
			}
		})
	}

	unFollow(){
		this.customerSrv.unFollowPublisher(this.publisherID).subscribe(resp=>{
			if(resp){
				this.followed= false;
				this.getFollowerCount().subscribe(resp=>{
					this.countFollower = resp.count;
				})
			}
		})
	}

	goToProductPage(productID){
		if(this.current_role=='Customer'){
			this.router.navigate(['app2/tabs/product', productID]);	
		}else{
			this.router.navigate(['publisher-dashboard/product',productID])
		}
	}


	call(phone){
		this.callNumberSrv.call(phone);
	}

	openMaps(address){
		this.launchNavigatorSrv.OpenNavigatorByAddress(address)
	}

	actionContact(contact){
		if(contact.typecode == 'PNE'){
			this.call(contact.value);
		}

		if(contact.typecode == 'ADR'){
			this.openMaps(contact.value);
		}
	}

	searchProductByStore(ev, page?){
		this.textSearched=ev.target.value;
		this.customerSrv.getPublisherProductSearch(this.publisherID,this.textSearched).subscribe(resp=>{
			if (resp && resp.products) {

				this.products = resp.products;
				if (resp.next) {
					this.nextNumber = resp.total - this.products.length;
					this.nextPage = resp.next;
				} else {
					this.nextNumber = null;
					this.nextPage = null;
				}
			}


		})
	}


	whastapp(){
		if(this.numberPhone){
			this.whastappService.goToWhastapp(this.numberPhone,'Ciao, ti contatto per avere informazioni in merito al tuo annuncio su Azzgo.')
		}else{
			this.alert.show('Lo store non ha inserito ancora un numero di whastapp corretto');
		}

	}
}
