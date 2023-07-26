import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { AddPreferencesCommand } from 'src/app/model/command/addPreferences';
import { LoginCommand, PublisherRegisterCommand, RegisterCommand } from '../../../model/command/auth';
import { HttpService } from '../http.service';
import { ROUTES } from './route';


@Injectable({
	providedIn: 'root',
})
export class AuthService {
	constructor(private http: HttpService) { }

	login(_data: LoginCommand): Observable<any> {
		return this.http.post(ROUTES.AUTH.LOGIN, _data);
	}

	logout(): Observable<any> {
		//TODO
		return this.http.get(ROUTES.AUTH.LOGOUT);
	}
	register(_data: RegisterCommand): Observable<any> {
		return this.http.post(ROUTES.AUTH.REGISTER, _data);
	}

	registerPublisher(_data: PublisherRegisterCommand) {
		return this.http.post(ROUTES.AUTH.REGISTERREQUEST, _data);
	}

	registerAdmin(_data: RegisterCommand): Observable<any> {
		return this.http.post(ROUTES.AUTH.REGISTERADMIN, _data);
	}
	profilePhoto(_data: FormData) {
		return this.http.post(ROUTES.AUTH.UPDATEPROFILEPHOTO, _data, true);
	}

	onesignalUpdatePlayerId(playerID: any) {
		return this.http.get(ROUTES.AUTH.ONESIGNAL_UPDATE_PLAYERID + '/' + playerID);

	}

	getPreferences(): Observable<any> {
		return this.http.get(ROUTES.AUTH.GET_PREFERENCES)
	}

	setPreferences(_data: AddPreferencesCommand) {
		return this.http.post(ROUTES.AUTH.SET_PREFERENCES, _data);
	}

	setPhotoTheme(_data: FormData) {
		return this.http.post(ROUTES.AUTH.SET_PHOTO_THEME, _data,true)
	}

	deletePreferences(){
		return this.http.get(ROUTES.AUTH.DELETE_PREFERENCES);
	}

	sendVerificationMail(_data:any){
		return this.http.post(ROUTES.AUTH.SEND_VERIFICATION_MAIL,_data)
	}

	getUserInfo(){
		return this.http.get(ROUTES.AUTH.GET_USER_INFO)
	}

	checkEmailVerified(_data: any){
		return this.http.post(ROUTES.AUTH.CHECK_EMAIL_VERIFIED,_data)
	}

	
}
