import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Toast } from 'src/app/shared/provider/toast';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';
import {SocialSharing} from '@awesome-cordova-plugins/social-sharing/ngx';
import { Alert } from 'src/app/shared/provider/alert';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';


@Component({
	selector: 'app-manage-ads',
	templateUrl: './manage-ads.page.html',
	styleUrls: ['./manage-ads.page.scss'],
})
export class ManageAdsPage implements OnInit {
	enviromentPath = environment.endpoint + environment.storage;
	nextNumber = null;
	nextPage = null;
	constructor(public colorService:ColorServiceService,private alert:Alert,private socialSharing: SocialSharing, private publisherSrv: PublisherService, private router: Router, private toast: Toast) { }
	ads: any[] = [];
	ngOnInit() { }

	ionViewWillEnter() {
		this.publisherSrv.getAdsPublisher().subscribe((resp) => {
			this.ads = resp.stores;
			if (resp.next) {
				this.nextNumber = resp.total - this.ads.length;
				this.nextPage = resp.next;
			} else {
				this.nextNumber = null;
				this.nextPage = null;
			}
		});
	}

	delete(_id, index) {
		this.publisherSrv.deleteAds(_id).subscribe((resp) => {
			if (resp) {
				this.ads.splice(index, 1);
				this.toast.showAndClose("Hai eliminato l'annuncio");
			}
		});
	}

	moreItem($event) {
		this.publisherSrv.getAdsPublisher(this.nextPage).subscribe((resp) => {
			this.ads = this.ads.concat(resp.stores);
			if (resp.next) {
				this.nextNumber = resp.total - this.ads.length;
				this.nextPage = resp.next;
			} else {
				this.nextNumber = null;
				this.nextPage = null;
			}
			$event.complete();
		});
	}

	share(_id,_title) {
		//per verificare se alcune app sono abilitate alla condivisione.
		//this.socialSharing.canShareVia('whatsapp')
		const url = `https://app.azzgo.it/app2/tabs/product/${_id}`
		this.socialSharing.share('Dai occhiata a questo annuncio\n*'+_title +'*\n\n','Dai occhiata a questo annuncio',null,url).then(()=>{
			console.log('successful sharing');
		}).catch(()=>{
			console.log("errore");
			this.alert.show("Si è verificato un errore");
		});
	}

	soonAvailable(){
		this.alert.show("Disponibile a breve");
	}
}
