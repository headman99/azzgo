import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ThunderPageRoutingModule } from './thunder-routing.module';

import { ThunderPage } from './thunder.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ThunderPageRoutingModule,
    SharedModule
  ],
  declarations: [ThunderPage]
})
export class ThunderPageModule {}
