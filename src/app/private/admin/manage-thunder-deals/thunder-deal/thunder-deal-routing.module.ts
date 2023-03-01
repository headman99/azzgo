import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ThunderDealPage } from './thunder-deal.page';

const routes: Routes = [
  {
    path: '',
    component: ThunderDealPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ThunderDealPageRoutingModule {}
