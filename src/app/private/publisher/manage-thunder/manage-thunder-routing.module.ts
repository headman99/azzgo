import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ManageThunderPage } from './manage-thunder.page';

const routes: Routes = [
  {
    path: '',
    component: ManageThunderPage
  },
  {
    path: 'thunder/:id',
    loadChildren: () => import('./thunder/thunder.module').then( m => m.ThunderPageModule)
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ManageThunderPageRoutingModule {}
