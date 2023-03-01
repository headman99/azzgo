import { Injectable } from '@angular/core';
import { ROUTES } from './route';
import { Observable } from 'rxjs';
import { HttpService } from '../http.service';
import { InsertAdsCommand } from 'src/app/model/command/ads';
import { EditContact } from 'src/app/model/command/editContact';
import { ChangeRequestStatus } from 'src/app/model/command/changeRequestStatus';
import { InsertNotification } from 'src/app/model/command/insertNotification';


@Injectable({
  providedIn: 'root'
})
export class PublisherService {
 
    _CONTROLLER= 'publisher/'

    constructor(private http: HttpService) {}
    uploadPhoto(data:FormData): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.UPLOADPHOTO, data,true);
	}

    deletePhoto(_idPhoto){
         return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.DELETEPHOTO, {id:_idPhoto});
    }

    getAdsByID(_id): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETADSBYID+'/'+_id);
	}

    getFeedback(): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETFEEDBACK);
	}

    getProfile(): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPROFILE);
	}
    getAdsPublisher(_page?): Observable<any> {
        let p = _page ? '?page='+_page : '';

        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETADSBYPUBLISHERID + p);
	}

    editAds(ad): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.EDITADS,ad);
	}
    inserAds(ad:InsertAdsCommand): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.INSERTADS,ad);
	}
    deleteAds(_id): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.DELETEADSBYID+'/'+_id);
	}
    changeRequestStatus(param:ChangeRequestStatus): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.CHANGEREQUESTSTATUS,param);
	}
    getRequests(_stato, _page?): Observable<any> {
        let p = _page ? '?page='+_page : '';
		return this.http.get(this._CONTROLLER +ROUTES.PUBLISHER.GETREQUESTS + '/' + _stato + p);
	}
    getRequestDetail(_requestID,_status): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETREQUESTDETAIL + '/' + _requestID +'/'+_status);
	}
    getProducts(): Observable<any> {
		return this.http.get(this._CONTROLLER +ROUTES.PUBLISHER.GETPRODUCTS);
	}
    editContact(_param:EditContact): Observable<any> {
		return this.http.post(this._CONTROLLER +ROUTES.PUBLISHER.EDITCONTACT,_param);
	}
    getRequestsHistory(_page?): Observable<any> {
        let p = _page ? '?page='+_page : '';
		return this.http.get(this._CONTROLLER +ROUTES.PUBLISHER.GETREQUESTHISTORY+p);
	}
    getRequestDetailHistory(_userID,_groupCode): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETREQUESTDETAILSHISTORY + '/' + _userID +'/'+_groupCode);
	}

    getAppointments(){
        return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETAPPOINTMENTS);
  
    }
     
    getPublisherFeedback(): Observable<any> {
		
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPUBLISHERFEEDBACK );
	}

	getPublisherFeedbackList(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPUBLISHERFEEDBACKLIST + p);
	}

    getCountFollow(): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPUBLISHERCOUNTFOLLOW );
	}

    getactivethunderdealslist(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETACTIVETHUNDER + p);
	}
    

    getthunderdealbyid(_thunderID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETTHUNDERBYID + '/' + _thunderID);
	}

    getThunderDealProductsList(_thunderID,_page?): Observable<any> {
        //TOIMPLEMENT
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETTHUNDERDEALPRODUCTSLIST + '/' + _thunderID+ p);
	}

    insertThunderDealOfferOnProduct(_param): Observable<any> {
        //TOIMPLEMENT
		return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.INSERTTHUNDERDEALPRODUCTOFFER,_param);
	}
    
    editThunderDealOfferOnProduct(_param): Observable<any> {
        //TOIMPLEMENT
		return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.EDITTHUNDERDEALPRODUCTOFFER,_param);
	}
    

    getNotificationList(_page?): Observable<any> {
        //TOIMPLEMENT
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETNOTIFICATIONLIST + p);
	}
    
     
    markAsRead(_param): Observable<any> {
        //TOIMPLEMENT
        let markread = {notificationid:_param}
		return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.MARKASREAD,markread);
	}
    markAll(): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.MARKSALLREAD,{});
	}


    insertNotification(_param:InsertNotification): Observable<any> {
        //TOIMPLEMENT
		return this.http.post(this._CONTROLLER + ROUTES.PUBLISHER.INSERTNOTIFICATION,_param);
	}
    getProductDetails(_productID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPRODUCTDETAILS + '/' + _productID);
	}

    getProductFeedbackList(_productID, _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPRODUCTFEEDBACKLIST + '/' + _productID + p);
	}

    getProductFeedback(_productID): Observable<any> {	
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETPRODUCTFEEDBACK + '/' + _productID);
	}

    getInfoBox(_groupcode: any): Observable<any> {	
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETINFOBOX + '/' + _groupcode);
	}

 
    

}

