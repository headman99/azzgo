import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoggedGuard, RoleGuard,dataloadGuard,EmailVerifyGuardGuard } from './shared/guards';



const routes: Routes = [
	{
		path: '',
		redirectTo: '/app2/tabs/search',
		pathMatch: 'full',
	},
	{
		path: 'account',
		loadChildren: () => import('./private/account/account.module').then((m) => m.AccountModule),
        canActivate:[LoggedGuard,EmailVerifyGuardGuard,dataloadGuard]
	},
	{
		path: 'login',
		loadChildren: () => import('./public/login/login.module').then((m) => m.LoginModule),
	},
	{
		path: 'signup',
		loadChildren: () => import('./public/signup/signup.module').then((m) => m.SignUpModule),
	},
	{
		path: 'app2',
		loadChildren: () => import('./private/tabs/tabs-page/tabs-page.module').then((m) => m.TabsModule),
		data:{
			notExpectedRole:'Publisher'
		},
		canActivate:[RoleGuard]
	},

	{
		path: 'notification',
		loadChildren: () => import('./private/notification/notification.module').then((m) => m.NotificationPageModule),
		canActivate:[EmailVerifyGuardGuard,dataloadGuard]
	},
	{
		path: 'favourites',
		loadChildren: () => import('./private/tabs/favourites/favourites.module').then((m) => m.FavouritesPageModule),
		canActivate:[EmailVerifyGuardGuard,dataloadGuard]
	},
	{
		path: 'search',
		loadChildren: () => import('./private/tabs/search/search.module').then((m) => m.SearchPageModule),
		canActivate:[dataloadGuard]
	},
	{
		path: 'messages',
		loadChildren: () => import('./private/tabs/messages/messages.module').then((m) => m.MessagesPageModule),
	},
	{
		path: 'chat-view',
		loadChildren: () => import('./private/chat-view/chat-view.module').then((m) => m.ChatViewPageModule),
	},
  {
    path: 'signup-agency',
    loadChildren: () => import('./public/signup-agency/signup-agency.module').then( m => m.SignupAgencyPageModule)
  },
  {
    path: 'agency-profile/:id',
    loadChildren: () => import('./private/agency-profile/agency-profile.module').then( m => m.AgencyProfilePageModule),
	canActivate:[EmailVerifyGuardGuard,dataloadGuard]
},
  {
    path: 'publisher-profile/:id',
    loadChildren: () => import('./private/agency-profile/agency-profile.module').then( m => m.AgencyProfilePageModule),
    data:{
        expectedRole:'Customer'
    },
	canActivate:[LoggedGuard,EmailVerifyGuardGuard,dataloadGuard],
	
  },
  {
    path: 'publisher-dashboard',
    loadChildren: () => import('./private/publisher/dashboard.module').then( m => m.DashboardPageModule),
    canActivate:[RoleGuard,dataloadGuard],
    data:{
        expectedRole:'Publisher'
    }
  },
 
  {
    path: 'admin-dashboard',
    loadChildren: () => import('./private/admin/admindashboard.module').then( m => m.AdmindashboardPageModule),
    canActivate:[RoleGuard,dataloadGuard],
    data:{
        expectedRole:'Admin'
    }
  },
  {
    path: 'advanced-search',
    loadChildren: () => import('./private/advanced-search/advanced-search.module').then( m => m.AdvancedSearchPageModule),
	canActivate:[EmailVerifyGuardGuard,dataloadGuard]
  },
  {
    path: 'customize',
    loadChildren: () => import('./private/customize/customize.module').then( m => m.CustomizePageModule),
	canActivate:[EmailVerifyGuardGuard,dataloadGuard],
  },
 
 

 
 



];

@NgModule({
	imports: [RouterModule.forRoot(routes)],
	exports: [RouterModule],
})
export class AppRoutingModule {}
