import { Injectable } from '@angular/core';

import { CallNumber } from '@ionic-native/call-number/ngx';


@Injectable({
    providedIn: 'root'
})
export class CallNumberSrv {
    constructor(private callNumber: CallNumber) { }


    call(telefono) {
        this.callNumber.callNumber(telefono, true)
            .then(res => console.log('Launched dialer!', res))
            .catch(err => console.log('Error launching dialer', err));
    }


}