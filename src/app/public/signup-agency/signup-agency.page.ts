import { Component, OnDestroy, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { Constant } from 'src/app/constant/constant';
import { PublisherRegisterCommand } from 'src/app/model/command/auth';
import { Category } from 'src/app/model/enum/category';
import { DialogOption } from 'src/app/shared/component/smart-modal/dialog';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { Alert } from 'src/app/shared/provider/alert';
import { AuthService } from 'src/app/shared/rest/api/auth.service';
import { TermsService } from 'src/app/shared/rest/api/terms.service';

const categoryEnum = Category;
const REQUIREMENT_TEXT = Constant.PASSWORD_REQUIREMENTS

@Component({
	selector: 'app-signup-agency',
	templateUrl: './signup-agency.page.html',
	styleUrls: ['./signup-agency.page.scss'],
})
export class SignupAgencyPage implements OnInit , OnDestroy{
	geo: any;
	terms: boolean;
	passwordType:'password'| 'text' = 'password';
	constructor(
		private authService: AuthService,
		private menuCtrl: MenuController,
		private alert: Alert,
		private router: Router,
		private smartModalCtrl: SmartmodalService,
		private termsSrv: TermsService
	) {}
	signup: PublisherRegisterCommand = new PublisherRegisterCommand();
	ngOnInit() {
	}
	ionViewWillEnter() {
		this.menuCtrl.enable(false);
	}

	register(form) {
		let dataForm = form.value;

		this.signup.name = dataForm.name;
		this.signup.email = dataForm.email;
		this.signup.password = dataForm.password;
		this.signup.password_confirmation = dataForm.confirm;
		this.signup.businessname = dataForm.businessname;
		this.signup.address = this.geo ? this.geo.formatted_address :null;
		this.signup.category = dataForm.category;
		this.signup.phone = dataForm.phone;
		this.signup.vatnumber = dataForm.vatnumber;
		this.signup.latitude = this.geo ? this.geo.geometry.location.lat() :null;
		this.signup.longitude = this.geo ? this.geo.geometry.location.lng() :null ;
	
		this.signup.consent1 = this.terms;
		this.signup.consent2 = this.terms;
		this.signup.consent3 = this.terms;
		this.signup.consent4 = this.terms;

		this.authService.registerPublisher(this.signup).subscribe((res) => {
			// this.router.navigateByUrl('app2/tabs/search');
			console.log(res);
			this.alert.alertConfirm(
				'Complimenti!',
				'Hai inviato la richiesta di registrazione, riceverai una notifica quando la tua utenza sarà attiva',
				() => {
					this.router.navigateByUrl('login');
				}
			);
		});
	}

	getAddress(ev, form) {
		console.log(ev);
		this.geo = ev;
		form.latitude = this.geo.geometry.location.lat();
		form.longitude = this.geo.geometry.location.lng();
	}

	onclickterms() {
		this.termsSrv.getPrivacyAndTermsPublisher().subscribe((privacy) => {
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
