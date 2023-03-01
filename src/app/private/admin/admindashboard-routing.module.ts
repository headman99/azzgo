import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AdmindashboardPage } from './admindashboard.page';

const routes: Routes = [
  {
    path: '',
    component: AdmindashboardPage
  },
  {
    path: 'manage-publishers',
    loadChildren: () => import('./manage-publisher/manage-publisher.module').then( m => m.ManagePublisherPageModule)
  },
  {
    path: 'manage-active-publisher',
    loadChildren: () => import('./manage-active-publisher/manage-active-publisher.module').then( m => m.ManageActivePublisherPageModule)
  },
  {
    path: 'manage-thunder-deals',
    loadChildren: () => import('./manage-thunder-deals/manage-thunder-deals.module').then( m => m.ManageThunderDealsPageModule)
  },
  {
    path: 'notification',
    loadChildren: () => import('../notification/notification.module').then((m) => m.NotificationPageModule),
    data: {
      expectedRole: 'Admin'
    }
  }

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AdmindashboardPageRoutingModule {}
