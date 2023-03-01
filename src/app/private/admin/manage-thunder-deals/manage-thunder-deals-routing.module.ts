import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ManageThunderDealsPage } from './manage-thunder-deals.page';

const routes: Routes = [
  {
    path: '',
    component: ManageThunderDealsPage
  },
  {
    path: 'thunder-deal/:id',
    loadChildren: () => import('./thunder-deal/thunder-deal.module').then( m => m.ThunderDealPageModule)
  },
  {
    path: 'create-thunder-deal',
    loadChildren: () => import('./thunder-deal/thunder-deal.module').then( m => m.ThunderDealPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ManageThunderDealsPageRoutingModule {}
