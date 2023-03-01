import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { SignupAgencyPage } from './signup-agency.page';

const routes: Routes = [
  {
    path: '',
    component: SignupAgencyPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class SignupAgencyPageRoutingModule {}
