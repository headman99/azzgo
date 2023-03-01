import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AdmindashboardPageRoutingModule } from './admindashboard-routing.module';

import { AdmindashboardPage } from './admindashboard.page';
import { SharedModule } from 'src/app/shared/shared.module';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    AdmindashboardPageRoutingModule
  ],
  declarations: [AdmindashboardPage]
})
export class AdmindashboardPageModule {}
