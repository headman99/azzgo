import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ManageAdsPageRoutingModule } from './manage-ads-routing.module';

import { ManageAdsPage } from './manage-ads.page';
import { SharedModule } from 'src/app/shared/shared.module';
import { SocialSharing } from '@awesome-cordova-plugins/social-sharing/ngx';
import {Alert} from '../../../shared/provider/alert'

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    ManageAdsPageRoutingModule,
  ],
  declarations: [ManageAdsPage],
  providers:[SocialSharing,Alert]
})
export class ManageAdsPageModule {}
