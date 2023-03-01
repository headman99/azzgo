import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { PulisherResultPageRoutingModule } from './pulisher-result-routing.module';

import { PulisherResultPage } from './pulisher-result.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    PulisherResultPageRoutingModule
  ],
  declarations: [PulisherResultPage]
})
export class PulisherResultPageModule {}
