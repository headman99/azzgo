import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { Alert } from '../provider/alert';
import { UserData } from '../provider/user-data';
import { AuthService } from '../rest/api/auth.service';

@Injectable({
  providedIn: 'root'
})
export class EmailVerifyGuardGuard implements CanActivate {

  constructor(private authSrvc: AuthService, private userData: UserData, private alert: Alert, private router: Router) { }

  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot,
  ) {
    return this.userData.getData().then((user) => {
     if(!user){
      return false;
     }

      if (!user?.user?.email_verified_at) {
        this.authSrvc.getUserInfo().subscribe(userInfo => {
          if (!userInfo?.email_verified_at) {
            console.log('Utente non verificato')
            this.router.navigate(['/login']);
            return false;
          }else{
            user.user.email_verified_at = userInfo.email_verified_at;
            this.userData.setData(user);
          }
          
        })
      }
      
      return true;
    });
  }
}

