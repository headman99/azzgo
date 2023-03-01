import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ThunderdealsPage } from './thunderdeals.page';

const routes: Routes = [
  {
    path: '',
    component: ThunderdealsPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ThunderdealsPageRoutingModule {}
