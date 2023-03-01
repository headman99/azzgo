import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ManagePublisherPageRoutingModule } from './manage-publisher-routing.module';

import { ManagePublisherPage } from './manage-publisher.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    ManagePublisherPageRoutingModule
  ],
  declarations: [ManagePublisherPage]
})
export class ManagePublisherPageModule {}
