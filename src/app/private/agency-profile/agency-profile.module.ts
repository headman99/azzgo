import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AgencyProfilePageRoutingModule } from './agency-profile-routing.module';

import { AgencyProfilePage } from './agency-profile.page';
import { SharedModule } from 'src/app/shared/shared.module';
//import { StarRatingModule } from 'ionic5-star-rating';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    AgencyProfilePageRoutingModule,
    //StarRatingModule
  ],
  declarations: [AgencyProfilePage]
})
export class AgencyProfilePageModule {}
