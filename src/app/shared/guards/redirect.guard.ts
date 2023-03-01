import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { UserData } from '../provider/user-data';


@Injectable()
export class RedirectGuard implements CanActivate {


	constructor(private router: Router, private userData: UserData, private route: Router, private menuCtrl:MenuController) { }

	canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
		let currentUser = null
		return this.userData.getData().then((user) => {
			if(user){
				currentUser = user.user;
				this.menuCtrl.enable(true)
			}

			if (!currentUser) {    
				console.log('utente non loggato')
				this.router.navigate(['/login'])
			}
			return !!currentUser;
		  });
		
	}
}
