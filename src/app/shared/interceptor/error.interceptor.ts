import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor, HTTP_INTERCEPTORS } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';
import { Router } from '@angular/router';
import { Alert } from '../provider/alert';
import { Loader } from '../provider/loader';
import { UserData } from '../provider/user-data';



@Injectable()
export class ErrorInterceptor implements HttpInterceptor {
    constructor(private router: Router, private alert: Alert, private loader: Loader, private userData:UserData) { }

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        return next.handle(request).pipe(catchError(err => {

            if (err.status == 401  && this.constrolRequest(request.url)) {
                this.userData.logout().then(() => {});
                this.showAlertLogin();
            } else if (err && err.error.errors) {
                this.alert.alertError('Attenzione!', this.createDataforAlert(err.error.errors), () => { })
            } else if (err && err.error.message) {
                this.alert.alertError('Attenzione!', err.error.message, () => { });
            } else if (err.statusText == "Unknown Error") {
                this.alert.alertError('Attenzione!', 'I servizi non rispondono, riprova più tardi', () => { });
            } else {
                this.alert.alertError('Attenzione!', err.message, () => { });
            }
            this.loader.hide();
            return throwError(err);
        }))
    }

    constrolRequest(_url) {
        let ret = false;
        let cc = _url.indexOf('/customer/') > -1;
        let pp = _url.indexOf('/publisher/') > -1;
        let aa = _url.indexOf('/admin/') > -1;

        ret = cc || pp || aa;

        return ret;
    }

    showAlertLogin() {
        this.alert.showalert('Attenzione', 'Per accedere a questa funzione devi eseguire l\'accesso', [
            {
                text: 'Chiudi',
                handler: (args) => {

                }
            }, {
                text: 'Login',
                handler: () => {
                    this.router.navigate(['login']);
                }
            }
        ])
    }


    createDataforAlert(errors) {
        let htmlText = '';

        for (let prop in errors) {

            htmlText = htmlText + '<p>' + errors[prop].join('<br>') + '</p>'
        }


        return htmlText
    }
}


export const ErrorInterceptorProvider = {
    provide: HTTP_INTERCEPTORS,
    useClass: ErrorInterceptor,
    multi: true
};
