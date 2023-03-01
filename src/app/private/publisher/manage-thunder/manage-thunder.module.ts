import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ManageThunderPageRoutingModule } from './manage-thunder-routing.module';

import { ManageThunderPage } from './manage-thunder.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ManageThunderPageRoutingModule,
    SharedModule
  ],
  declarations: [ManageThunderPage]
})
export class ManageThunderPageModule {}
