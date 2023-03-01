import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ProductPageRoutingModule } from './product-routing.module';

import { ProductPage } from './product.page';
import { SharedModule } from 'src/app/shared/shared.module';
import { NgxIonicImageViewerModule } from 'ngx-ionic-image-viewer';
//import { StarRatingModule } from 'ionic5-star-rating';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ProductPageRoutingModule,
    SharedModule,
    //StarRatingModule,
    NgxIonicImageViewerModule
  ],
  declarations: [ProductPage]
})
export class ProductPageModule {}
