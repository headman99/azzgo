import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { DashboardPage } from './dashboard.page';

const routes: Routes = [
  {
    path: '',
    component: DashboardPage
  },
  {
    path: 'manage-ads',
    loadChildren: () => import('./manage-ads/manage-ads.module').then(m => m.ManageAdsPageModule)
  },
  {
    path: 'myfeedback',
    loadChildren: () => import('./myfeedback/myfeedback.module').then(m => m.MyfeedbackPageModule)
  },
  {
    path: 'richieste',
    loadChildren: () => import('./request/request.module').then(m => m.RequestPageModule)
  },
  {
    path: 'profile',
    loadChildren: () => import('../agency-profile/agency-profile.module').then(m => m.AgencyProfilePageModule)
  },
  {
    path: 'messages',
    loadChildren: () => import('../../private/tabs/tab1/tab1.module').then(m => m.Tab1PageModule)

  },
  {
    path: 'calendar',
    loadChildren: () => import('../calendar/calendar.module').then(m => m.CalendarPageModule)

  },
  {
    path: 'manage-thunder',
    loadChildren: () => import('./manage-thunder/manage-thunder.module').then(m => m.ManageThunderPageModule)
  },
  {
    path: 'notification',
    loadChildren: () => import('../notification/notification.module').then(m => m.NotificationPageModule)
  },
  {
    path: 'product',
    children: [
      {
        path: ':id',
        loadChildren: () => import('../product/product.module').then(m => m.ProductPageModule)
      },
    ],
  },



];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class DashboardPageRoutingModule { }
