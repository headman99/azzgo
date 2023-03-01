import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { SearchPublisherPageRoutingModule } from './search-publisher-routing.module';

import { SearchPublisherPage } from './search-publisher.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    SearchPublisherPageRoutingModule
  ],
  declarations: [SearchPublisherPage]
})
export class SearchPublisherPageModule {}
