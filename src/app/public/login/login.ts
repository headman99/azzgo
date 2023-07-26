import { Component, OnDestroy } from '@angular/core';
import { NgForm } from '@angular/forms';
import { Router } from '@angular/router';
import { Alert } from 'src/app/shared/provider/alert';



import { UserOptions } from '../../interfaces/user-options';
import { MenuController } from '@ionic/angular';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { AuthService } from 'src/app/shared/rest/api/auth.service';
import { UserData } from 'src/app/shared/provider/user-data';
import { ColorServiceService } from 'src/app/shared/services/color-service.service'


const httpOptions = {
	headers: new HttpHeaders({
		'Content-type': 'application/json',
		Accept: 'application/json',
	}),
};

@Component({
	selector: 'page-login',
	templateUrl: 'login.html',
	styleUrls: ['./login.scss'],
})
export class LoginPage implements OnDestroy {
	login: UserOptions = { username: '', password: '' };
	submitted = false;
	passwordType: 'password' | 'text' = 'password';

	constructor(
		public userData: UserData,
		public router: Router,
		public menuCtrl: MenuController,
		private authSrv: AuthService,
		private httpClient: HttpClient,
		private colorService: ColorServiceService,
		private alert: Alert
	) { }
	ionViewWillEnter() {
		this.menuCtrl.enable(false);
	}
	onLogin(form: NgForm) {
		this.submitted = true;
		this.authSrv.checkEmailVerified({ email: this.login.username, password : this.login.password}).subscribe((resp) => {
			if (resp) {
				console.log("login")
				this.authSrv.login({ email: this.login.username, password: this.login.password }).subscribe((resp) => {
					this.userData.login(resp).then(() => {
						console.log('login effettuato');
					})

					let rotta = '/app2/tabs/search';
					if (resp.user.roles.indexOf('Admin') > -1) {
						rotta = 'admin-dashboard'
					} else if (resp.user.roles.indexOf('Publisher') > -1) {
						rotta = 'publisher-dashboard'
					}

					this.router.navigateByUrl(rotta);
				})
				
			} else {
				this.alert.showalert('Attenzione', 'Per procedere è necessario verificare la propria mail', [
					{
						text: 'Chiudi',
						handler: () => {

						}
					}, {
						text: 'Manda',
						handler: () => {
							this.authSrv.sendVerificationMail({ email: this.login.username, password:this.login.password }).subscribe(result => {
								if (result.result == 1) {
									this.alert.show(result.message)
								} else {
									this.alert.show('Si è verificato un errore');
								}
							})
						}
					}
				])
			}
		})

		/*this.authSrv.login({ email: this.login.username, password: this.login.password }).subscribe((resp) => {
			this.userData.login(resp).then(() => {
				//console.log('login effettuato');
			})

			let rotta = '/app2/tabs/search';
			if (resp.user.roles.indexOf('Admin') > -1) {
				rotta = 'admin-dashboard'
			} else if (resp.user.roles.indexOf('Publisher') > -1) {
				rotta = 'publisher-dashboard'
			}
			//update onesignal id
			console.log("emailverified:", resp.user.email_verified_at)
			if (resp.user.email_verified_at || resp.user.roles.indexOf('Admin') > -1) {
				this.router.navigateByUrl(rotta);
			} else {
				this.alert.showalert('Attenzione', 'Per procedere è necessario verificare la propria mail', [
					{
						text: 'Chiudi',
						handler: (args) => {

						}
					}, {
						text: 'Manda',
						handler: () => {
							this.authSrv.sendVerificationMail().subscribe(result => {
								if (result.result == 1) {
									this.alert.show(result.message)
								} else {
									this.alert.show('Si è verificato un errore');
								}
							})
						}
					}
				])
			}

		});*/
	}

	onSignup() {
		this.router.navigateByUrl('/signup');
	}
	onSignupAgency() {
		this.router.navigateByUrl('/signup-agency');
	}
	ngOnDestroy() {
		//this.menuCtrl.enable(true)
	}

	changeType() {
		this.passwordType = this.passwordType == "password" ? "text" : "password";
	}
}
