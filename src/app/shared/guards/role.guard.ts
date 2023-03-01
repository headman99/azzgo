import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, Router, RouterStateSnapshot } from '@angular/router';
import { UserData } from '../provider/user-data';

@Injectable()
export class RoleGuard implements CanActivate {
	public alive = true;

	constructor(private router: Router, private userData: UserData) {}

	canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
	 return	this.userData.getData().then(_data=>{

            const notExpectedRole = route.data.notExpectedRole;
            const currentUser = this.userData ? this.userData.user : null;
            let result = true;
            if (!currentUser && !notExpectedRole) {
                this.router.navigateByUrl('/login');
            } else if(currentUser) {
                const expectedRole = route.data.expectedRole;
                let index = currentUser.user.roles.indexOf(expectedRole);
                let indexNot = currentUser.user.roles.indexOf(notExpectedRole);
                result = index > -1 || indexNot == -1;
                if (!result) {
                    if (currentUser.user.roles[0] == 'Publisher') {
                        this.router.navigate(['publisher-dashboard']);
                    } else if (currentUser.user.roles[0] == 'Admin') {
                        this.router.navigate(['admin-dashboard']);
                    }
                }
            }
            return result;


        })


	}
}
