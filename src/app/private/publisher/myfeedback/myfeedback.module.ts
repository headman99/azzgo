import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { MyfeedbackPageRoutingModule } from './myfeedback-routing.module';

import { MyfeedbackPage } from './myfeedback.page';
import { SharedModule } from 'src/app/shared/shared.module';
//import { StarRatingModule } from 'ionic5-star-rating';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    MyfeedbackPageRoutingModule,
    //StarRatingModule
  ],
  declarations: [MyfeedbackPage]
})
export class MyfeedbackPageModule {}
