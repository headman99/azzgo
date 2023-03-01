import { Injectable } from '@angular/core';
import { HttpService } from '../http.service';
import { ROUTES } from './route';


@Injectable({
	providedIn: 'root',
})
export class TermsService {
	constructor(private http: HttpService) {}

	getPrivacyAndTermsCustomer() {
        return this.http.get(ROUTES.TERMS+'/CUSTOMER');
    }

	getPrivacyAndTermsPublisher() {
        return this.http.get(ROUTES.TERMS+'/PUBLISHER');
    }
}
