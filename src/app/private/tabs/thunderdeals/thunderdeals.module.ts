import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ThunderdealsPageRoutingModule } from './thunderdeals-routing.module';

import { ThunderdealsPage } from './thunderdeals.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ThunderdealsPageRoutingModule,
    SharedModule
  ],
  declarations: [ThunderdealsPage]
})
export class ThunderdealsPageModule {}
