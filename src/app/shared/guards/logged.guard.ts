import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { Alert } from '../provider/alert';
import { UserData } from '../provider/user-data';


@Injectable()
export class LoggedGuard implements CanActivate {


	constructor(private router: Router, private userData: UserData, private alert: Alert, private route: Router, private menuCtrl:MenuController) { }

	canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
		//this.alert.show(route.toString())
		let currentUser = null
		return this.userData.getData().then((user) => {
			if(user){
				currentUser = user.user;
				this.menuCtrl.enable(true)
			}

			if (!currentUser) {
				this.alert.showalert('Attenzione', 'Per accedere a questa funzione devi eseguire l\'accesso', [
					{
						text: 'Chiudi',
						handler: (args) => {
	
						}
					}, {
						text: 'Login',
						handler: () => {
							this.route.navigate(['login']);
						}
					}
	
	
	
				])
			}

			return !!currentUser;
		  });
		
	}
}
