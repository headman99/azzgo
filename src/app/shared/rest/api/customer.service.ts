import { Injectable } from '@angular/core';

import { Observable } from 'rxjs';
import { AddItem } from 'src/app/model/command/addItem';
import { DeleteItem } from 'src/app/model/command/deleteItem';
import { InsertNotification } from 'src/app/model/command/insertNotification';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { SendRequest } from 'src/app/model/command/sendRequest';
import { HttpService } from '../http.service';
import { ROUTES } from './route';

@Injectable({
	providedIn: 'root',
})
export class CustomerService {


	_CONTROLLER = 'customer/'
	constructor(private http: HttpService) { }
	getProfile(): Observable<any> {
		//TODO
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPROFILE);
	}

	addItemToRequest(_productID: AddItem): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.ADDITEMTOREQUEST, _productID);
	}
	deleteItemFromRequest(_param: DeleteItem): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.DELETEITEMFROMREQUEST, _param);
	}
	getRequests(_stato, _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTS + '/' + _stato + p);
	}
	getRequestDetail(_requestID, _status): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTDETAIL + '/' + _requestID + '/' + _status);
	}

	getPublisherProfile(_id): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPUBLISHERPROFILE + '/' + _id);
	}

	getProducts(_idPublisher, _page?) {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPRODUCTBYPUBLISHER + '/' + _idPublisher + p);

	}
	editContact(_param): Observable<any> {
		
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.EDITCONTACT, _param);
	}
	getRequestsPending(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';//TODO
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTSENTPENDING + p);
	}
	sendRequest(_param: SendRequest): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.SENDREQUEST, _param);
	}
	getRequestsSent(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTSENT + p);
	}

	getRequestsHistory(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTHISTORY + p);
	}
	getRequestDetailHistory(_groupCode): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTDETAILSHISTORY + '/' + _groupCode);
	}

	saveFeedback(_productID, _value): Observable<any> {
		let param = { productcode: _productID, value: _value }
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.SAVEPRODUCTFEEDBACK, param);
	}
	proposeAppointment(_param: ProposeAppointment): Observable<any> {

		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.PROPOSEAPPOINTMENT, _param);
	}
	markPublisher(): Observable<any> {
		//IMPLEMENT
		let param = { publisherid: 1, comment: '' }
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.MARKPUBLISHER, param);
	}
	editAppointment(): Observable<any> {
		//IMPLEMENT
		let param = { requestcode: '', appointmentime: '', appointmentdate: '' }
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.EDITAPPONTMENT, param);
	}
	getProductFeedback(_productID): Observable<any> {	
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPRODUCTFEEDBACK + '/' + _productID);
	}
	getProductDetails(_productID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPRODUCTDETAILS + '/' + _productID);
	}
	canPropose(_publisherId): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.CANPROPOSE, { publisherid: _publisherId });
	}

	savePublisherFeedback(_publisherId, _valueid): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.SAVEPUBLISHERFEEDBACK, { storeid: _publisherId, value: _valueid });
	}
	getPublisherFeedback(_publisherID): Observable<any> {

		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPUBLISHERFEEDBACK + '/' + _publisherID);
	}

	getPublisherFeedbackList(_publisherID, _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPUBLISHERFEEDBACKLIST + '/' + _publisherID + p);
	}

	getDiscountedProducts(_publisherID, _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETDISCOUNTPRODUCTS + '/' + _publisherID + p);
	}

	hasVoted(_publisherID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.HASVOTED + '/' + _publisherID);
	}

	getProductFeedbackList(_productID, _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETPRODUCTFEEDBACKLIST + '/' + _productID + p);
	}

	followPublisher(_publisherId): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.FOLLOWPUBLISHER, { storeid: _publisherId });
	}
	unFollowPublisher(_publisherId): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.UNFOLLOWPUBISHER, { publisherid: _publisherId });
	}
	favouriteProduct(_productid): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.FAVORUTITEPRODUCT, { productid: _productid });
	}
	unFavouriteProduct(_productid): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.UNFAVOURITEPRODUCT, { productid: _productid });
	}

	getCountFollowForPublisher(_publisherID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETCOUNTFOLLOWERPUBLISHER + '/' + _publisherID);
	}

	getHasFollow(_publisherID): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETHASFOLLOW + '/' + _publisherID);
	}
	getListOfFavouriteProducts( _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETLISTFAVOURITEPRODUCT + p);
	}
	getFavouriteProduct(_productid): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETFAVOURITEPRODUCT + '/' + _productid);
	}

	getactivethunderdealslist(_page?): Observable<any> {
        //TOIMPLEMENT
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETACTIVETHUNDER + p);
	}
	
	getThunderDealProductsList(_thunderID,_page?): Observable<any> {
        //TOIMPLEMENT
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.PUBLISHER.GETTHUNDERDEALPRODUCTSLIST + '/' + _thunderID+ p);
	}

	getNotificationList(_page?): Observable<any> {
   
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETNOTIFICATIONLIST + p);
	}
    
     
    markAsRead(_param): Observable<any> {      
        let markread = {notificationid:_param}
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.MARKASREAD,markread);
	}

	markAll(): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.MARKSALLREAD,{});
	}

    insertNotification(_param:InsertNotification): Observable<any> {
        //TOIMPLEMENT
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.INSERTNOTIFICATION,_param);
	}

	getFollowed( _page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETFOLLOWED  + p);
	}

	getpublisherbyname(idCategoria,businessName?): Observable<any> {
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.SEARCHPUBLISHER+'/'+idCategoria +'/'+ businessName);
	}

	addShippingAddressToRequest(_groupCode,_shippingAddress): Observable<any> {      
        let param = {groupcode:_groupCode,shippingaddress:_shippingAddress}
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.ADDSHIPPINGADDRESTOREQ,param);
	}


	getRequestCountPending(){
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GETREQUESTCOUNTPENDING);
	}

	addContact(_param): Observable<any> {
		
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.ADDCONTACT, _param);
	}
	getPublisherProductSearch(_storeid, text,_page?){
		let param = {storeid:_storeid,testo:text}
		let p = _page ? '?page=' + _page : '';
		return this.http.post(this._CONTROLLER + ROUTES.CUSTOMER.GETPUBLISHERPRODUCTSEARCH+p, param);
	}

	getPublishers(){
		return this.http.get(this._CONTROLLER + ROUTES.CUSTOMER.GET_PUBLISHERS)
	}
	
	
}


