import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AgencyProfilePage } from './agency-profile.page';

const routes: Routes = [
  {
    path: '',
    component: AgencyProfilePage
  },
  {
    path: ':id',
    component: AgencyProfilePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AgencyProfilePageRoutingModule {}
