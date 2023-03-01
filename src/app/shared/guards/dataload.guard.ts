import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, CanLoad, Router, RouterStateSnapshot } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { UserData } from '../provider/user-data';
import { ColorServiceService } from '../services/color-service.service';

@Injectable()
export class dataloadGuard implements CanActivate {

	//in questo caso vierne usato per caricare il tema di sfondo ma può essere utilizzato per recuperare qualunque tipo di dato tramite API.
	constructor(private router: Router, private userData: UserData, private route: Router, private menuCtrl: MenuController, private colorService: ColorServiceService) { }

	canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
		if (!this.colorService.selectedImageUrl && this.colorService.selectedTheme=='vuoto') {
			console.log('entro')
			if (this.userData.getData().then(rslt => {
				if(!rslt?.user?.iduser || !rslt?.user?.email_verified_at){
					return false;
				}
					this.colorService.readTheme().then((result) => {
						if(result){
							console.log('tema caricato con successo');
						}else{
							this.colorService.selectedTheme='default';
						}
					})
				
			}))
			return true;
		}
		return true;
	}
}