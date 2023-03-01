import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { searchProductCommand } from 'src/app/model/command/searchProducts';
import { HttpService } from '../http.service';
import { ROUTES } from './route';

@Injectable({
	providedIn: 'root',
})
export class PublicService {
	constructor(private http: HttpService) {}

	searchPublisherByCategoryID(_code:string,_page?): Observable<any> {
        let data = {categorycode :_code};
		let page = _page ? '?page='+_page:''
		return this.http.post(ROUTES.PUBLIC.SEARCHPUBLISHERBYCATEGORYID + page, data);
	}

	storecategories(): Observable<any> {
		return this.http.get(ROUTES.PUBLIC.STORECATEGORIES);
	}
	searchProducts(data?:searchProductCommand,_page?): Observable<any> {
        let page = _page ? '?page='+_page:''
		console.log(page)
		return this.http.post(ROUTES.PUBLIC.SEARCHPRODUCTS + page, data);
	}
}
