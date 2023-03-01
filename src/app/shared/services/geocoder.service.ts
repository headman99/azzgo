import { Injectable, NgZone } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from 'src/environments/environment';
const MAPKEY= environment.GOOGLEMAPSKEY;

@Injectable({
  providedIn: 'root'
})
export class GeocoderService {
  map:any;
  geocoder: any;


  constructor(private ngZone: NgZone) { }

  geocode(
    request
 ): Observable<any> {
    return new Observable<any>((observer) => {
      if (!this.geocoder) {
        this.geocoder = new this.map.Geocoder();
      }
      this.geocoder.geocode(request, (results, status) => {
        // need to manually trigger ngZone because "geocode" callback is not picked up properly by Angular
        this.ngZone.run(() => {
          if (status === this.map.GeocoderStatus.OK) {
            let index = results.map(x=>x.types).map(x=>x[0]).indexOf("administrative_area_level_3");
           let indexx  = results[index].address_components.map(x=>x.types).map(x=>x[0]).indexOf("administrative_area_level_3")
            observer.next(results[index].address_components[indexx].short_name);
            observer.complete();
          } else {
            observer.error(status);
          }
        });
      });
    });
  }

  loadGoogleMaps(url: string, id: string, callback): void {
     this.map =  getGoogleMaps(MAPKEY).then((e)=>{
      this.map = e;
      callback(null, e);
     });
  }
}

function getGoogleMaps(apiKey: string): Promise<any> {
  const win = window as any;
  const googleModule = win.google;
  if (googleModule && googleModule.maps) {
    return Promise.resolve(googleModule.maps);
  }

  return new Promise((resolve, reject) => {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?libraries=places&key=${apiKey}&v=3.31`;
    script.async = true;
    script.defer = true;
    document.body.appendChild(script);
    script.onload = () => {
      const googleModule2 = win.google;
      if (googleModule2 && googleModule2.maps) {
        resolve(googleModule2.maps);
      } else {
        reject('google maps not available');
      }
    };
  });
}

