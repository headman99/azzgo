import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AdvancedSearchPage } from './advanced-search.page';

const routes: Routes = [
  {
    path: '',
    component: AdvancedSearchPage
  },
 /* {
    path: 'publisher-result',
    loadChildren: () => import('./advancedSearch/publisher-result/publisher-result.module').then( m => m.PublisherResultPageModule)
  },*/
  {
    path: 'publisher-result',
    loadChildren: () => import('./publisher-result/publisher-result.module').then( m => m.PublisherResultPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AdvancedSearchPageRoutingModule {}
