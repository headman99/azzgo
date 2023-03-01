import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SearchPublisherPage } from './search-publisher.page';

const routes: Routes = [
  {
    path: '',
    component: SearchPublisherPage
  },
  {
    path: 'pulisher-result/:cat',
    loadChildren: () => import('./pulisher-result/pulisher-result.module').then( m => m.PulisherResultPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SearchPublisherPageRoutingModule {}
