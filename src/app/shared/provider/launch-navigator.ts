import { Injectable } from '@angular/core';
import { LaunchNavigator, LaunchNavigatorOptions } from '@ionic-native/launch-navigator/ngx';
import { environment } from 'src/environments/environment.web';


@Injectable({
    providedIn: 'root'
})
export class LaunchNavigatorSrv {
    constructor(private launchNavigator: LaunchNavigator) { }

    openNavigatorByGeo(lat, long) {


        this.launchNavigator.navigate([lat, long])
            .then(
                success => console.log('Launched navigator'),
                error => console.log('Error launching navigator', error)
            );

    }

    OpenNavigatorByAddress(address) {

        if(environment.MOBILE){
        this.launchNavigator.navigate(address)
            .then(
                success => console.log('Launched navigator'),
                error => console.log('Error launching navigator', error)
            );
        }else{
           this.goToLink(address);
        }

    }


    goToLink(address){
        var createA = document.createElement('a');

        var link =  'https://www.google.com/maps/dir/?api=1&destination='+address;
        var link2  = link.replace(/%20/g, "+");
        var link3  = link.replace(/%2C/g, " ");
        createA.setAttribute('href', link3);
        createA.click();
    }

}