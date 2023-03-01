import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { PublisherPageRoutingModule } from './publisher-routing.module';

import { PublisherPage } from './publisher.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    PublisherPageRoutingModule
  ],
  declarations: [PublisherPage]
})
export class PublisherPageModule {}
