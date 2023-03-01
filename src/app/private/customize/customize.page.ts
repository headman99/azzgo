import { Component, OnInit, ViewChild } from '@angular/core';
import { themes } from 'src/app/constant/palette';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
import { environment } from 'src/environments/environment';
import { DomSanitizer } from '@angular/platform-browser';
import { WebView } from '@ionic-native/ionic-webview/ngx';
import { PhotoType } from 'src/app/model/enum/phototype';
import { User } from 'src/app/model/domain/user';
import { AddPreferencesCommand } from 'src/app/model/command/addPreferences'
import { Router } from '@angular/router';


@Component({
  selector: 'app-customize',
  templateUrl: './customize.page.html',
  styleUrls: ['./customize.page.scss'],
})
export class CustomizePage implements OnInit {
  colors:any =  themes;
  imgURL: any;
  cameramode = environment.MOBILE ? 'mobile' : 'web';
  filedata: any;
  user: User;

  constructor(
    public colorService: ColorServiceService,
    private sanitizer: DomSanitizer,
    private webview: WebView,
    private router:Router
  ) { }

  ngOnInit() {
  }

  changeTheme(theme: string) {
    const preference = new AddPreferencesCommand();
    preference.value = theme;
    preference.type = 'theme';
    this.colorService.saveTheme(preference);

  }


  changePhotoTheme(storedPhoto) {
    if (this.cameramode == 'mobile') {
      const resolvedImg = this.webview.convertFileSrc(storedPhoto.uri);
      const safeImg = this.sanitizer.bypassSecurityTrustUrl(resolvedImg);
      this.imgURL = safeImg;
    } else {
      this.imgURL = storedPhoto.uri;
    }

    this.filedata = storedPhoto.file;

    let uploadData: FormData = new FormData();
    uploadData.set('file', this.filedata, this.filedata.name);
    //uploadData.set('extid', this.user.iduser.toString());
    uploadData.set('extidtype', PhotoType.THEME);
    uploadData.set('ismain', '1');
    this.colorService.savePhotoTheme(uploadData);

  }

  KeyArrayOfColors(){
   return Object.keys(this.colors);
  }

  resetPreferences(){
    this.colorService.selectedImageUrl='';
    this.colorService.selectedTheme='default';
    const pref = this.colorService.deletePreferences();

  }

  goHome(){
    this.router.navigateByUrl('/app2/tabs/search')
  }


}
