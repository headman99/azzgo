import { Injectable } from '@angular/core';
import { Observable, of } from 'rxjs';
import { HttpService } from '../http.service';
import { ROUTES } from './route';

@Injectable({
    providedIn: 'root'
})
export class AdminService {


    _CONTROLLER = 'admin/'
    constructor(private http: HttpService) { }
    getPublisher(): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETPUBLISHER);
    }
    getPublisherByName(_name: string, _isActive?): Observable<any> {
        let active = _isActive ? 1 : 0;
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETPUBLISHERBYNAME + '/' + _name + '/' + active);
    }
    activatePublisher(_idPublisher) {
        return this.http.post(this._CONTROLLER + ROUTES.ADMIN.ACTIVATEPUBLISHER, { id: _idPublisher });
    }
    getInactivePublishers(_page?): Observable<any> {
        let page = _page ? '?page=' + _page : ''
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETINACTIVEPUBLISHER + page);
    }

    getactivePublishers(_page?): Observable<any> {
        let page = _page ? '?page=' + _page : ''
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETACTIVEPUBLISHER + page);
    }

    getPublisherDetails(_idPublisher): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETPUBLISHER + '/' + _idPublisher);
    }

    deleteregistrationrequest(_idPublisher) {
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.DELETEREQUEST + '/' + _idPublisher);
    }

    getMarks(_page): Observable<any> {
        //IMPLEMENT
        let p = _page ? '?page=' + _page : '';
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETMARKS + '/' + _page);
    }
    banUser(_id): Observable<any> {
        //IMPLEMENT
        let param = { userid: _id }
        return this.http.post(this._CONTROLLER + ROUTES.ADMIN.BANUSER, param);
    }

    //thunder-api
    getThunderList(_page?): Observable<any> {
        let p = _page ? '?page=' + _page : '';
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETTHUNDERLIST + p);
    }
    saveThunder(thunder): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.ADMIN.SAVETHUNDERDEAL, thunder);
    }

    editThunder(thunder): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.ADMIN.EDITTHUNDERDEAL, thunder);
    }

    deactivateThunderdeal(thunderID): Observable<any> {
        return this.http.post(this._CONTROLLER + ROUTES.ADMIN.DEACTIVATETHUNDERDEAL, thunderID);
    }
    
    getThunderDetail(thunderId: any): Observable<any> {
        return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETTHUNDERBYID+'/'+thunderId);
    }


    getNotificationList(_page?): Observable<any> {
		let p = _page ? '?page=' + _page : '';
		return this.http.get(this._CONTROLLER + ROUTES.ADMIN.GETNOTIFICATIONLIST + p);
	}
    
     
    markAsRead(_param): Observable<any> {   
        let markread = {notificationid:_param}
		return this.http.post(this._CONTROLLER + ROUTES.ADMIN.MARKASREAD,markread);
	}

    markAll(): Observable<any> {
		return this.http.post(this._CONTROLLER + ROUTES.ADMIN.MARKSALLREAD,{});
	}

}
