import { Component, OnInit } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { ActivatedRoute } from '@angular/router';
import { WebView } from '@ionic-native/ionic-webview/ngx';
import { Observable } from 'rxjs';
import { PhotoType } from 'src/app/model/enum/phototype';
import { Alert } from 'src/app/shared/provider/alert';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';

@Component({
	selector: 'app-photos',
	templateUrl: './photos.page.html',
	styleUrls: ['./photos.page.scss'],
})
export class PhotosPage implements OnInit {
	adID: string;
    filedata: any;
    imgURL: any;
    cameramode = environment.MOBILE ? 'mobile': 'web';

	constructor(private route: ActivatedRoute, private publisherSrv: PublisherService,
        private sanitizer:DomSanitizer,
        private webview: WebView,
        private alert:Alert) {}

	ad: any;
    enviromentPath = environment.endpoint +environment.storage;

	ngOnInit() {}

	ionViewDidEnter() {
		this.adID = this.route.snapshot.params.id;
		this.getData();
	}

    getData(){
        this.publisherSrv.getAdsByID(this.adID).subscribe((_detail) => {
			this.ad = _detail.ad;
		});
    }
    delete(_idPhoto){
        this.publisherSrv.deletePhoto(_idPhoto).subscribe(resp=>{
            console.log(resp);
            if(resp){
                this.alert.show('ELiminazione avvenuta correttamente!')
                 this.getData();
            }
        });
    }

    upload(id): Observable<any> {
		let uploadData: FormData = new FormData();
		uploadData.set('file', this.filedata, this.filedata.name);
		uploadData.set('extid', id);
		uploadData.set('extidtype',  PhotoType.PRODUCT);
		uploadData.set('ismain', '0');
		return this.publisherSrv.uploadPhoto(uploadData);
	}

    PhotoCaptured(storedPhoto){
        if(this.cameramode == 'mobile'){
            const resolvedImg = this.webview.convertFileSrc(storedPhoto.uri);
            const safeImg = this.sanitizer.bypassSecurityTrustUrl(resolvedImg);
            this.imgURL = safeImg;
        }else{
            this.imgURL = storedPhoto.uri;
        }
        this.filedata = storedPhoto.file;
        this.upload(this.adID).subscribe(resp=>{
            if(resp){
                this.getData();
            }
        })
    }
}
