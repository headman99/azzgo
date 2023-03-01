import { DatePipe, Location } from '@angular/common';
import { Component, ElementRef, Input, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Observable, of } from 'rxjs';
import { concatMap } from 'rxjs/operators';
import { EditAdsCommand, InsertAdsCommand } from 'src/app/model/command/ads';
import { Alert } from 'src/app/shared/provider/alert';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';
import { DomSanitizer, SafeUrl } from '@angular/platform-browser';
import { WebView } from '@ionic-native/ionic-webview/ngx';
import { PhotoType } from 'src/app/model/enum/phototype';
import { trasformDate } from 'src/app/constant/functionUtil';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';



@Component({
	selector: 'app-ads',
	templateUrl: './ads.page.html',
	styleUrls: ['./ads.page.scss'],
	providers:[DatePipe]
})
export class AdsPage implements OnInit {
	adID: any;
	ad: any;
	editMode: boolean = false;
	labelconfirmbutton: string;
	@ViewChild('f') form: NgForm;
    base64:string;
    imagePath: any;
    imgURL: string | ArrayBuffer | SafeUrl;
    hidden=false;
    counter: number =0;
	counterTitle:number =0;
    cameramode = environment.MOBILE ? 'mobile': 'web';
	minDate: any;
	constructor(
		private publisherSrv: PublisherService,
		private route: ActivatedRoute,
		private alert: Alert,
		private location: Location,
        private sanitizer:DomSanitizer,
        private webview: WebView,
		private datePipe:DatePipe,
		public colorService:ColorServiceService

	) {}

	ngOnInit() {

    }
	ionViewDidEnter() {
		this.minDate = new Date().getFullYear();
        this.counter = 0;
		this.editMode = !!this.route.snapshot.params.id;
		if (this.editMode) {
			this.labelconfirmbutton = 'Modifica';
			this.adID = this.route.snapshot.params.id;
			this.publisherSrv.getAdsByID(this.adID).subscribe((_detail) => {
				this.ad = _detail.ad;
				this.form.controls['title'].setValue(this.ad.title);
				this.form.controls['description'].setValue(this.ad.description);
                this.counter = this.ad.description.length;
				this.counterTitle = this.ad.title.length;
				this.form.controls['isvetrina'].setValue(this.ad.isvetrina);
				this.form.controls['price'].setValue(this.ad.price);
				if (this.ad.offer) {
					this.form.controls['isoffer'].setValue(this.ad.offer.isactive);
					this.form.controls['saleprice'].setValue(this.ad.offer.price);
					this.form.controls['percent'].setValue(this.ad.offer.percent);
					this.form.controls['startdate'].setValue(trasformDate(this.ad.offer.startdate));
					this.form.controls['enddate'].setValue(trasformDate(this.ad.offer.endate));
				}
                if(this.ad.mainphoto.length>0){
                    this.imgURL = environment.endpoint + environment.storage +  this.ad.mainphoto[0].path

                }
			});
		} else {
			this.labelconfirmbutton = 'Inserisci';
		}
		this.form.controls['isoffer'].setValue(false);
	}

	createAd(form: NgForm) {
		let f = form.value;

		if (this.editMode) {
			let ad: EditAdsCommand = new EditAdsCommand();
			ad.title = f.title;
			ad.description = f.description;
			ad.price = f.price;
			ad.id = this.adID;
			ad.isvetrina =f.isvetrina;

			if (f.isoffer) {
				ad.isoffer = f.isoffer;
				ad.saleprice = f.saleprice;
				ad.percent = f.percent;
				ad.startdate = this.datePipe.transform(f.startdate,'dd/MM/yyyy');// '10/03/2021';
				ad.enddate = this.datePipe.transform(f.enddate,'dd/MM/yyyy');// f.enddate;//'10/08/2022';
			}

			this.publisherSrv
				.editAds(ad)
				.pipe(
					concatMap((respEdit) => {
                        this.adID = respEdit.ad.id;
                        if(this.filedata){
					    	return this.upload(respEdit.ad.id);
                        }else{
                            return of(true);
                        }
					})
				)
				.subscribe((resp) => {
					if (resp) {
						this.onSuccess();
						form.resetForm();
					}
				});
		} else {
			let ad: InsertAdsCommand = new InsertAdsCommand();
			ad.title = f.title;
			ad.description = f.description;
			ad.price = f.price;
			ad.isvetrina= f.isvetrina;

			if (f.isoffer) {
				ad.isoffer = f.isoffer;
				ad.saleprice = f.saleprice;
				ad.percent = f.percent;
				ad.startdate = this.datePipe.transform(f.startdate,'dd/MM/yyyy');// '10/03/2021';
				ad.enddate = this.datePipe.transform(f.enddate,'dd/MM/yyyy');// f.enddate;//'10/08/2022';
			}

			this.publisherSrv
				.inserAds(ad)
				.pipe(
					concatMap((respInsert) => {
                        this.adID = respInsert.id;
                        if(this.filedata){
					    	return this.upload(respInsert.id);
                        }else{
                            return of(true);
                        }
					})
				)
				.subscribe((resp) => {
					if (resp) {
						this.onSuccess();
						form.resetForm();
                        this.filedata = null;
					}
				});
		}
	}

	onSuccess() {
		let title = this.editMode ? 'Modifica annuncio' : 'Inserimento annuncio';
		let description = this.editMode ? 'Modifica eseguita correttamente' : 'Hai inserito un nuovo annuncio';
		//  this.alert.alertConfirm(title,description, );
		let buttons = [
			{
				text: 'I miei annunci',
				role: 'cancel',
				cssClass: 'secondary',
				handler: (blah) => {
					this.goBack();
				},
			},
			{
				text: 'Nuovo annuncio',
				handler: (args) => {this.imgURL=null;this.filedata=null},
			},
		];

		this.alert.showalert(title, description, buttons);
	}

	goBack() {
		this.location.back();
	}

	upload(id): Observable<any> {
		let uploadData: FormData = new FormData();
		uploadData.set('file', this.filedata, this.filedata.name);
		uploadData.set('extid', id);
		uploadData.set('extidtype', PhotoType.PRODUCT);
		uploadData.set('ismain', '1');
		return this.publisherSrv.uploadPhoto(uploadData);
	}




	calculateDiscount(total, percentage) {
		var discountValue = (total / 100) * percentage;
		var finalPrice = total - discountValue;

		return finalPrice.toFixed(2);
	}

	calc() {
		let t = this.form.controls['price'].value;
		let s = this.form.controls['percent'].value;
		this.form.controls['saleprice'].setValue(this.calculateDiscount(t, s));
	}

	filedata: any;
	/* File onchange event */


    PhotoCaptured(storedPhoto){
        if(this.cameramode == 'mobile'){
            const resolvedImg = this.webview.convertFileSrc(storedPhoto.uri);
            const safeImg = this.sanitizer.bypassSecurityTrustUrl(resolvedImg);
            this.imgURL = safeImg;
        }else{
            this.imgURL = storedPhoto.uri;
        }
        this.filedata = storedPhoto.file;
    }



    onChange(value){
        console.log(value);
    }




}
