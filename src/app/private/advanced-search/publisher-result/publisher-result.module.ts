import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { PublisherResultPageRoutingModule } from './publisher-result-routing.module';

import { PublisherResultPage } from './publisher-result.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    PublisherResultPageRoutingModule
  ],
  declarations: [PublisherResultPage]
})
export class PublisherResultPageModule {}
