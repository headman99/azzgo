import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ManageAdsPage } from './manage-ads.page';

const routes: Routes = [
  {
    path: '',
    component: ManageAdsPage
  },
  {
    path: 'ads',
    loadChildren: () => import('./ads/ads.module').then( m => m.AdsPageModule)
  },
  {
    path: 'editads/:id',
    loadChildren: () => import('./ads/ads.module').then( m => m.AdsPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ManageAdsPageRoutingModule {}
