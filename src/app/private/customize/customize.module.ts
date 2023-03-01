import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { SharedModule } from 'src/app/shared/shared.module';
import { IonicModule } from '@ionic/angular';
import { CustomizePageRoutingModule } from './customize-routing.module';
import { ApplycolorComponent } from 'src/app/shared/component/applycolor/applycolor.component';
import { CustomizePage } from './customize.page';



@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    SharedModule,
    CustomizePageRoutingModule,
  ],
  declarations: [CustomizePage,ApplycolorComponent]
})
export class CustomizePageModule {}
