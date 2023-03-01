import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
import { UserData } from '../provider/user-data';

const httpOptions = {
	headers: new HttpHeaders({
		'Content-type': 'application/json',
		Accept: 'application/json',
		'Cache-Control':  'no-cache, no-store, must-revalidate, post- check=0, pre-check=0',
        'Pragma': 'no-cache',
        'Expires': '0'
	}),
};

@Injectable({
	providedIn: 'root',
})
export class HttpService {
	baseUrl: any;
	constructor(private http: HttpClient, private userData: UserData) {
		this.baseUrl = environment.endpoint + environment.api
	}

	private getHeaders() {
		let httpOption = {};
		let headers: HttpHeaders;

		if (this.userData.user && this.userData.user.access_token) {
			httpOption = {
				headers: new HttpHeaders({
					'Content-type': 'application/json',
					Accept: 'application/json',
					'Cache-Control':  'no-cache, no-store, must-revalidate, post- check=0, pre-check=0',
					'Pragma': 'no-cache',
					'Expires': '0',
					Authorization: `Bearer ${this.userData.user.access_token}`,
				}),
			};
		} else {
			httpOption = {
				headers: new HttpHeaders({
					'Content-type': 'application/json',
					Accept: 'application/json',
					'Cache-Control': 'no-cache',
				}),
			};
		}

		return httpOption;
	}



    private getheadersmultipart(){
        let httpOption = {};
		let headers: HttpHeaders;
      return  httpOption = {
            headers: new HttpHeaders({
                'Cache-Control': 'no-cache',
                Authorization: `Bearer ${this.userData.user.access_token}`,
            }),
        };

    }

	get(_api):Observable<any> {
		return this.http.get(this.baseUrl + _api, this.getHeaders());
	}

	post(_api, _body, multipart?): Observable<any> {
		return this.http.post(this.baseUrl + _api, _body, multipart? this.getheadersmultipart() : this.getHeaders());
	}

	put(_api, _body): Observable<any> | void {
		return this.http.put(this.baseUrl + _api, _body, this.getHeaders());
	}

	delete(_api) {
		return this.http.delete(this.baseUrl + _api, this.getHeaders());
	}
}
