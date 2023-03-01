import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ThunderDealPageRoutingModule } from './thunder-deal-routing.module';

import { ThunderDealPage } from './thunder-deal.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ThunderDealPageRoutingModule,
    SharedModule
  ],
  declarations: [ThunderDealPage]
})
export class ThunderDealPageModule {}
