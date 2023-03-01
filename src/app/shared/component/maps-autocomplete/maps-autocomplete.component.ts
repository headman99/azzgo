import { Component, EventEmitter, Input, OnInit, Output, ViewChild } from '@angular/core';
import { environment } from 'src/environments/environment';


const MAPKEY= environment.GOOGLEMAPSKEY;
@Component({
  selector: 'maps-autocomplete',
  templateUrl: './maps-autocomplete.component.html',
  styleUrls: ['./maps-autocomplete.component.scss'],
})
export class MapsAutocompleteComponent implements OnInit {

    @Input() adressType: string;
    @Output() setAddress: EventEmitter<any> = new EventEmitter();
    @Output() onGetPlace : EventEmitter<any> = new EventEmitter();
    @ViewChild('addresstext') addresstext: any;
    @Input() text:string;
    autocompleteInput: string;
    queryWait: boolean;
    map:any;

    constructor() {
    }

    ngOnInit() {
      if(this.text){
        this.autocompleteInput =this.text;
      }
    }

    async ngAfterViewInit() {
        getGoogleMaps(MAPKEY).then((map)=>{

          this.map = map;
          this.getPlaceAutocomplete();
        });
       
    }

    private getPlaceAutocomplete() {
        const autocomplete = new this.map.places.Autocomplete(this.addresstext.nativeElement,
            {
                componentRestrictions: { country: 'IT' },
                types: []  // 'establishment' / 'address' / 'geocode'
            });
        this.map.event.addListener(autocomplete, 'place_changed', () => {
            const place = autocomplete.getPlace();
            const normalizePlace = {address:place.formatted_address, longitude:place.geometry.location.lng(), latitude:place.geometry.location.lat()}
            this.invokeEvent(place);
            this.normalizePlace(normalizePlace)
        });
    }

    invokeEvent(place: Object) {
        this.setAddress.emit(place);
    }

    normalizePlace(normalizePlace){
      console.log(normalizePlace);
      this.onGetPlace.emit(normalizePlace)  
    }

}

function getGoogleMaps(apiKey: string): Promise<any> {
    const win = window as any;
    const googleModule = win.google;
    if (googleModule && googleModule.maps && googleModule.maps.places) {
      return Promise.resolve(googleModule.maps);
    }

    return new Promise((resolve, reject) => {
      const script = document.createElement('script');
      script.id = "places"
      script.src = `https://maps.googleapis.com/maps/api/js?libraries=places&key=${apiKey}&v=3.31`;
      script.async = true;
      script.defer = true;
      document.body.appendChild(script);
      script.onload = () => {
        const googleModule3 = win.google;
        if (googleModule3 && googleModule3.maps) {
          resolve(googleModule3.maps);
        } else {
          reject('google maps not available');
        }
      };
    });
  }
