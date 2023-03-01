import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SignupAgencyPageRoutingModule } from './signup-agency-routing.module';

import { SignupAgencyPage } from './signup-agency.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    SignupAgencyPageRoutingModule
  ],
  declarations: [SignupAgencyPage]
})
export class SignupAgencyPageModule {}
