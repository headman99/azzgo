import { Component, OnDestroy, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { Constant } from 'src/app/constant/constant';
import { RegisterCommand } from 'src/app/model/command/auth';
import { DialogOption } from 'src/app/shared/component/smart-modal/dialog';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { UserData } from 'src/app/shared/provider/user-data';
import { AuthService } from 'src/app/shared/rest/api/auth.service';
import { TermsService } from 'src/app/shared/rest/api/terms.service';


const REQUIREMENT_TEXT = Constant.PASSWORD_REQUIREMENTS
@Component({
	selector: 'page-signup',
	templateUrl: 'signup.html',
	styleUrls: ['./signup.scss'],
})
export class SignupPage implements OnDestroy {
	signup: RegisterCommand = new RegisterCommand();
	submitted = false;
	terms = false
	passwordType:'password'| 'text' = 'password';
	constructor(
		private authService: AuthService,
		private router: Router,
		private menuCtrl: MenuController,
		private userData: UserData,
		private smartModalCtrl: SmartmodalService,
		private termsSrv: TermsService,
		private alert:Alert
	) {}
	ngOnInit() {}
	ionViewWillEnter() {
		this.menuCtrl.enable(false);
	}

	register(form) {
		let dataForm = form.value;

		this.signup.name = dataForm.name;
		this.signup.email = dataForm.email;
		this.signup.password = dataForm.password;
		this.signup.password_confirmation = dataForm.confirm;
		this.signup.phone = dataForm.phone;

		
			this.signup.consent1 = this.terms;
			this.signup.consent2 = this.terms;
			this.signup.consent3 = this.terms;
			this.signup.consent4 = this.terms;
		

		this.authService.register(this.signup).subscribe((res) => {
			//this.userData.login(res);
			let buttons = [
				{
					text: 'Login',
					role: 'cancel',
					cssClass: 'secondary',
					handler: () => {
						this.router.navigateByUrl('/login')
					},
				}
				
			];
			this.alert.showalert('Congratulazioni!','Registrazione avvenuta con successo! Vai alla login!',buttons)
		
		});
	}

	registerPublisher() {
		this.router.navigateByUrl('/signup-agency');
	}

	onclickterms() {
		this.termsSrv.getPrivacyAndTermsCustomer().subscribe((privacy) => {
			if (privacy) {
				this.showDialog(privacy);
			}
		});
	}

	showDialog(_privacy) {
		let option: DialogOption = {
			title: _privacy.title,
			content: _privacy.text,
			buttons: [
				{
					text: 'ANNULLA',
					class: 'light',
					action: () => {
						this.terms = false;
					},
				},
				{
					text: 'ACCETTO',
					class: 'primary',
					action: () => {
						this.terms = true;
					},
				},
			],
		};
		this.smartModalCtrl.showModalComponent(option);
	}

    onClickPasswordReq(){

        let option: DialogOption = {
			title: 'Requisiti password',
			content: REQUIREMENT_TEXT,
			buttons: [
				{
					text: 'OK',
					class: 'primary',
					action: () => {
						this.terms = true;
					},
				},
			],
		};
		this.smartModalCtrl.showModalComponent(option);
    }

	ngOnDestroy(){
		//this.menuCtrl.enable(true)
	}

	changeType(){
		this.passwordType = this.passwordType == "password" ? "text" : "password";
	}

}
