import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PulisherResultPage } from './pulisher-result.page';

const routes: Routes = [
  {
    path: '',
    component: PulisherResultPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class PulisherResultPageRoutingModule {}
