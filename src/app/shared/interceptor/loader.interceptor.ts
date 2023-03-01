import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor, HttpResponse, HTTP_INTERCEPTORS, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { tap } from 'rxjs/operators';
import { Loader } from '../provider/loader';



@Injectable()
export class LoaderInterceptor implements HttpInterceptor {
    private currentRequests: number;
    noSpinner = false;
    constructor(
        private _loaderService: Loader) {
        this.currentRequests = 0;
    }
    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        this.noSpinner = request.headers.has('notSpinner')
        if (!this._loaderService.isPresent && request.url!="assets/data/data.json" && request.url.indexOf('page=') ==-1) { //chi ha il parametro page non parte lo spinner
            this.incrementRequestCount();
        }
        return next.handle(request)
            .pipe(
                tap((event: HttpEvent<any>) => {
                    if (event instanceof HttpResponse) {
                        if (this._loaderService.isPresent) {
                            this.decrementRequestCount();
                        }
                    }
                }, (err: any) => {
                    if (this._loaderService.isPresent) {
                        this.currentRequests = 0;
                        this.hideLoader();
                    }
                })
            );
    }
    private decrementRequestCount() {
        if (--this.currentRequests === 0) {
            this.hideLoader();;
        }
    }

    incrementRequestCount() {
        if (this.currentRequests++ === 0) {
            if (this.noSpinner) {
                 this.hideLoader();

            } else {
                this.showLoader();
            }
        }
    }

    async hideLoader() {
        await this._loaderService.hide();
    }

    async showLoader() {
        await this._loaderService.show('');
    }

}



export const LoaderInterceptorProvider = {
    provide: HTTP_INTERCEPTORS,
    useClass: LoaderInterceptor,
    multi: true
};
