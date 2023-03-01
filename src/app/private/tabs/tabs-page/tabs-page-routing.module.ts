import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoggedGuard, RoleGuard,RedirectGuard,dataloadGuard,EmailVerifyGuardGuard } from 'src/app/shared/guards';
import { TabsPage } from './tabs-page';


const routes: Routes = [
	{
		path: 'tabs',
		component: TabsPage,
		children: [
			{
				path: 'request',
				children: [
					{
						path: '',
						loadChildren: () => import('../request/request.module').then((m) => m.RequestPageModule),
					},
				],
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},

			{
				path: 'search',
				children: [
					{
						path: '',
						loadChildren: () => import('../search/search.module').then((m) => m.SearchPageModule),
						canActivate:[dataloadGuard]
					},
				],
			},
			{
				path: 'favourites',
				children: [
					{
						path: '',
						loadChildren: () => import('../favourites/favourites.module').then((m) => m.FavouritesPageModule),
					},
				],
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},
			{
				path: 'notification',
				children: [
					{
						path: '',
						loadChildren: () => import('../../notification/notification.module').then((m) => m.NotificationPageModule),
						data: {
							expectedRole: 'Customer'
						}
					},
				],
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},
			{
				path: 'messagges',
				children: [
					{
						path: '',
						loadChildren: () => import('../tab1/tab1.module').then((m) => m.Tab1PageModule),
						data: { hideHeader: true }
					}
				],
				canActivate: [LoggedGuard]
			},
			{
				path: 'user',
				children: [
					{
						path: '',
						loadChildren: () => import('../../account/account.module').then((m) => m.AccountModule),
					},
				],
				canActivate:[RedirectGuard,EmailVerifyGuardGuard,dataloadGuard]
			},
			{
				path: 'product',
				children: [
					{
						path: ':id',
						loadChildren: () => import('../../product/product.module').then(m => m.ProductPageModule)
					},
				],
				data: {
					expectedRole: 'Customer'
				},
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},

			{
				path: 'publisher-profile/:id',
				loadChildren: () => import('../../agency-profile/agency-profile.module').then(m => m.AgencyProfilePageModule),
				data: {
					expectedRole: 'Customer'
				},
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},

			{
				path: 'thunderdeals/:id',
				loadChildren: () => import('../thunderdeals/thunderdeals.module').then(m => m.ThunderdealsPageModule),
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},
			{
				path: 'search-publisher',
				loadChildren: () => import('../../search-publisher/search-publisher.module').then(m => m.SearchPublisherPageModule),
				canActivate: [LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
			},
			{
				path: '',
				redirectTo: '/app2/tabs/search',
				pathMatch: 'full',
			},
		],
	},
];

@NgModule({
	imports: [RouterModule.forChild(routes)],
	exports: [RouterModule],
})
export class TabsPageRoutingModule { }
