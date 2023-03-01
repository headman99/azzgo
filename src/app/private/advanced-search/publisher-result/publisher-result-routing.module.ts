import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PublisherResultPage } from './publisher-result.page';

const routes: Routes = [
  {
    path: '',
    component: PublisherResultPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class PublisherResultPageRoutingModule {}
