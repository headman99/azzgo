import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ManageThunderDealsPageRoutingModule } from './manage-thunder-deals-routing.module';

import { ManageThunderDealsPage } from './manage-thunder-deals.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule, 
    ManageThunderDealsPageRoutingModule
  ],
  declarations: [ManageThunderDealsPage]
})
export class ManageThunderDealsPageModule {}
