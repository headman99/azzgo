import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ManageActivePublisherPageRoutingModule } from './manage-active-publisher-routing.module';

import { ManageActivePublisherPage } from './manage-active-publisher.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    ManageActivePublisherPageRoutingModule
  ],
  declarations: [ManageActivePublisherPage]
})
export class ManageActivePublisherPageModule {}
