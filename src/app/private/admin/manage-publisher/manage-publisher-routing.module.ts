import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ManagePublisherPage } from './manage-publisher.page';

const routes: Routes = [
  {
    path: '',
    component: ManagePublisherPage
  },
  {
    path: 'publisher/:id',
    loadChildren: () => import('../publisher/publisher.module').then( m => m.PublisherPageModule)
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ManagePublisherPageRoutingModule {}
