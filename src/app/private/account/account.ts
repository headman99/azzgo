import { AfterViewInit, Component } from '@angular/core';
import { DomSanitizer } from '@angular/platform-browser';
import { Router } from '@angular/router';
import { WebView } from '@ionic-native/ionic-webview/ngx';

import { AlertController } from '@ionic/angular';
import { Observable } from 'rxjs';
import { User } from 'src/app/model/domain/user';
import { PhotoType } from 'src/app/model/enum/phototype';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { Toast } from 'src/app/shared/provider/toast';
import { UserData } from 'src/app/shared/provider/user-data';
import { AuthService } from 'src/app/shared/rest/api/auth.service';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
//import { UserData } from '../../providers/user-data';


@Component({
  selector: 'page-account',
  templateUrl: 'account.html',
  styleUrls: ['./account.scss'],
})
export class AccountPage implements AfterViewInit {
  username: string;
    filedata: any;
    imgURL: any;
    user: User;
    endpointPath= environment.endpoint +environment.storage;
    cameramode = environment.MOBILE ? 'mobile': 'web';
  

    contacts =[];
    isPublisher  = false;
  

  constructor(
    public alertCtrl: AlertController,
    public router: Router,
    public userData: UserData,
    private authSrv:AuthService,
    private sanitizer:DomSanitizer,
    private webview: WebView,
    private alert:Alert,
    private customerSrv:CustomerService,
    private smartModalController:SmartmodalService,
    private toast:Toast, 
    public colorService:ColorServiceService,
    private publisherSrv: PublisherService) {}


  ngAfterViewInit() {
    this.isPublisher = false;
    this.getUsername();
    this.userData.getData().then(resp=>{
      if(resp.user.roles[0] == 'Publisher'){
        this.isPublisher = true;
      }

        this.getContact();
      
      
    })
    
  }

  get showAddPhone(){

    let ret = null ;
    if (this.contacts && this.contacts.length == 0 ) {
      for (let index = 0; index < this.contacts.length; index++) {
        const element = this.contacts[index];
        if (element.typecode === 'PNE') {
          ret = !element;
        }
      }
    } 

    return ret;
  }
  updatePicture() {
    console.log('Clicked to update picture');
  }

  // Present an alert with the current username populated
  // clicking OK will update the username and display it
  // clicking Cancel will close the alert and do nothing
  async changeUsername() {
    const alert = await this.alertCtrl.create({
      header: 'Change Username',
      buttons: [
        'Cancel',
        {
          text: 'Ok',
          handler: (data: any) => {
            this.userData.getData();
            this.getUsername();
          }
        }
      ],
      inputs: [
        {
          type: 'text',
          name: 'username',
          value: this.username,
          placeholder: 'username'
        }
      ]
    });
    await alert.present();
  }

  getUsername() {
    this.userData.getData().then((user) => {
      this.username = user.user.name;
      this.user = user.user;
      this.imgURL = this.user.mainphoto.length> 0 ?  this.endpointPath + this.user.mainphoto[0].path : 'https://www.gravatar.com/avatar?d=mm&s=140'
    });
  }

  changePassword() {
    console.log('Clicked to change password');
  }

  logout() {
    this.authSrv.logout().subscribe(resp=>{
        this.userData.logout().then(() => {
          this.colorService.logout();
        return this.router.navigateByUrl('/app2/tabs/search');
        });
    });

  }

  support() {
    this.router.navigateByUrl('/support');
  }


  upload(): Observable<any> {
    let uploadData: FormData = new FormData();
    uploadData.set('file', this.filedata, this.filedata.name);
    uploadData.set('extid', this.user.iduser.toString());
    uploadData.set('extidtype',  PhotoType.USER);
    uploadData.set('ismain', '1');
    return this.authSrv.profilePhoto(uploadData);
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
    this.upload().subscribe(resp=>{
        if(resp){
          this.userData.accountPhotoChanged(resp);
          this.alert.show('Hai cambiato l\'immagine del profilo');
        }
    })
}

  addContact(){
   let _contact = {typecode:'PNE',value:''}
    this.smartModalController.editContact(_contact, (message) => {
			if (message && message.data) {
				this.toast.showAndClose(message.data);
				this.getContact();
			}
		},'customer','add');
    
  }
  getContact(){
    if(this.isPublisher){
      this.publisherSrv.getProfile().subscribe(resp=>{
        this.contacts = resp.store.contacts
  
        })
    }else{
    this.customerSrv.getProfile().subscribe(resp=>{
      this.contacts = resp.user.contacts

      })
    }
  }

  editContact(_contact) {
		this.smartModalController.editContact(_contact, (message) => {
			if (message && message.data) {
				this.toast.showAndClose(message.data);
				this.getContact();
			}
		},'customer');
	}
}
