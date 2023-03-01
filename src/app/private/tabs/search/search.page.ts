import { Component, OnInit } from '@angular/core';
import { MenuController } from '@ionic/angular';
import { PublicService } from 'src/app/shared/rest/api/public.service';
import { searchProductCommand } from 'src/app/model/command/searchProducts';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { Toast } from 'src/app/shared/provider/toast';
import { AddItem } from 'src/app/model/command/addItem';
import { Alert } from 'src/app/shared/provider/alert';
import { Geolocation } from '@ionic-native/geolocation/ngx';
import { GeocoderService } from 'src/app/shared/services/geocoder.service';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { UserData } from 'src/app/shared/provider/user-data';
import { NavigationExtras, Router } from '@angular/router';
import { ProductType } from 'src/app/model/enum/productType';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { CometChatService } from 'src/app/shared/services/comet-chat.service';
import { WhastappService } from 'src/app/shared/services/whastapp.service';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
import { AuthService } from 'src/app/shared/rest/api/auth.service';


@Component({
	selector: 'app-search',
	templateUrl: './search.page.html',
	styleUrls: ['./search.page.scss'],
})
export class SearchPage implements OnInit {
	speakers: any[];
	base64: string;
	ios: boolean;
	showSearchbar: boolean;
	queryText: string;

	products: any[] = [];
	nextNumber: number;
	nextPage: any;

	filterSearch: searchProductCommand = new searchProductCommand();
	geoCoder: any;
	logged: boolean;
	thunderDeals: any = null;
	theme: string = '';
	imgUrl: any = '';
	constructor(
		private publicSrv: PublicService,
		private menu: MenuController,
		private smartModal: SmartmodalService,
		private customerSrv: CustomerService,
		private toast: Toast,
		private alert: Alert,
		private geolocation: Geolocation,
		private geocoder: GeocoderService,
		private userData: UserData,
		private route: Router,
		private cometChatSrv: CometChatService,
		private whastappService: WhastappService,
		private msgBusService: MsgbusService,
		public colorService: ColorServiceService,
		private authSrvc: AuthService

	) { }


	ngOnInit() {
		this.menu.enable(true);
		this.geolocation.getCurrentPosition().then((res) => {
			this.getData();
		}).catch(error => {
			console.log('Error getting location', error);
			this.alert.show("Attiva la geolocalizzazione per vedere gli annunci vicino a te")
		})
	}

	getData() {
		this.userData.isLoggedIn().then(resp => {
			this.logged = resp;
			this.userData.getFilterSearch().then(resp => {
				if (resp && resp?.latitude) {
					this.filterSearch = resp;
					this.search();
				} else {
					this.getGeo();
				}

			})

		})

		this.ios = false;// this.config.get('mode') === `ios`;

	}


	getGeo() {
		this.geolocation.getCurrentPosition().then((resp) => {
			// resp.coords.latitude
			// resp.coords.longitude
			this.geocoder.loadGoogleMaps(`https://maps.googleapis.com/maps/api/js?key=${environment.GOOGLEMAPSKEY}&v=3.31`, 'google-map', () => {
				const latlng = {
					lat: resp.coords.latitude,
					lng: resp.coords.longitude
				};

				//console.log(latlng)
				this.initGeoCoder(latlng);
			});
			//this.geocoder.codeLatLng(resp.coords.latitude,resp.coords.longitude)
		}).catch((error) => {
			console.log('Error getting location', error);
		});


	}


	search(_page?) {
		if (this.logged) {
			this.customerSrv.getactivethunderdealslist().subscribe(resp => {
				//console.log(resp);
				if (resp) {
					this.thunderDeals = resp.deals.thunderdeals[0];
				}
			})
		}

		this.publicSrv.searchProducts(this.filterSearch).subscribe((resp) => {
			this.products = resp ? resp.products : [];
			if (resp && resp.next) {
				this.nextNumber = resp.total - this.products.length;
				this.nextPage = resp.next;
			} else {
				//Non ci sono prodotti disponibili per questo indirizzo
				this.nextNumber = null;
				this.nextPage = null;
			}

			if (this.products.length == 0 && !this.thunderDeals ) {

				this.geolocation.getCurrentPosition().then((res) => {
					this.alert.showalert("Nessun annuncio nella tua zona", "Selezionare il paese più vicino?", [
						{
							text: 'No',
							handler: () => {}
						},
						{
							text: 'Si',
							handler: () => {
								this.closestStorePosition();
							}
						}
					])
				}).catch(error => {
					console.log('Error getting location', error);
				})
			}
		});
	}

	
	harvesine(pointA, pointB) {
		const R = 6372.795477598; // raggio terrestre in km
		const conv = Math.PI / 180
		const senLatA = Math.sin(pointA.lat * conv);
		const senLatB = Math.sin(pointB.lat * conv);
		const cosLatA = Math.cos(pointA.lat * conv);
		const cosLatB = Math.cos(pointB.lat * conv);
		const cosDiffLongAB = Math.cos((pointA.lng - pointB.lng) * conv);
		return R * Math.acos(senLatA * senLatB + cosLatA * cosLatB * cosDiffLongAB)
	}

	closestStorePosition() {
		this.customerSrv.getPublishers().subscribe(res => {
			const currentPosition = {
				lat: this.filterSearch.latitude,
				lng: this.filterSearch.longitude
			}
			let latlong = null;
			let minDistance = 99999;
			res.publishers.forEach(publ => {
				const pointB = {
					lat: parseFloat(publ.latitude),
					lng: parseFloat(publ.longitude)
				}
				const distance = this.harvesine(currentPosition, pointB);
				if (distance <= minDistance) {
					minDistance = distance;
					latlong = pointB
				}
			});

			if (latlong) {
				this.geocoder.loadGoogleMaps(`https://maps.googleapis.com/maps/api/js?key=${environment.GOOGLEMAPSKEY}&v=3.31`, 'google-map', () => {
					this.initGeoCoder(latlong);
				});
			}


		})



	}

	moreItem($event) {
		this.publicSrv.searchProducts(this.filterSearch, this.nextPage).subscribe((resp) => {
			this.products = this.products.concat(resp.products);
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

	openSearchSetting() {
		this.smartModal.showModalSearch(this.filterSearch, (_data) => {
			if (_data.data) {
				this.filterSearch = _data.data
				this.nextNumber = null;
				this.nextPage = null;
				this.userData.setFilterSearch(this.filterSearch);
				this.search();
			}
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


	inarrivo() {
		this.alert.show('Funzionalità in arrivo!');
	}

	initGeoCoder(latlng) {
		//  this.geoCoder = new google.maps.Geocoder()
		this.geoDataFromAddress(latlng).subscribe(resp => {
			this.filterSearch.address = resp;
			this.filterSearch.latitude = latlng.lat;
			this.filterSearch.longitude = latlng.lng;
			this.userData.setFilterSearch(this.filterSearch);
			this.search();
		})
	}

	geoDataFromAddress(
		latlong: any
	): Observable<any> {
		return this.geocoder
			.geocode({ location: latlong })
			.pipe(map((results) => results));
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

		let u = user;
		console.log('{{user.name}}');
		const navigationExtras: NavigationExtras = {
			state: {
				user: u
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

	goToThunderPage(thunder) {
		this.route.navigate(['app2/tabs/thunderdeals', thunder.id]);
	}

	favouriteClicked(favourite, _product) {
		if (favourite) {
			this.customerSrv.favouriteProduct(_product.id).subscribe(resp => {
				_product.isfavourite = true;
				this.toast.showAndClose('Prodotto aggiunto ai preferiti');
			})
		} else {
			this.customerSrv.unFavouriteProduct(_product.id).subscribe(resp => {
				_product.isfavourite = false;
				this.toast.showAndClose('Prodotto rimosso dai preferiti');
			})
		}
	}

	whastapp(ev) {
		if (ev.number) {
			this.whastappService.goToWhastapp(ev.number, 'Ciao, ti contatto per avere informazioni in merito al tuo annuncio su Azzgo.')
		} else {
			this.alert.show('Lo store non ha inserito ancora un numero di whastapp corretto');
		}

	}

	goToNotification() {
		this.route.navigate(['/app2/tabs/notification']);
	}

	goSearchPublisher() {
		this.route.navigate(['/app2/tabs/search-publisher']);
	}
}
