import { Injectable } from '@angular/core';
import { LoadingController } from '@ionic/angular';
import { IonNetwork } from './network-connection';

/*
  Generated class for the Loader provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable({
  providedIn: 'root'
})
export class Loader {

  loader: any;
  public isPresent:boolean=false;
  constructor(private loading: LoadingController, private network:IonNetwork) {
    console.log('Hello Loader Provider');
  }



   hide() {
     
    setTimeout(() => {
      try {
        this.isPresent=false;
         this.loader.dismiss();
        }catch(x){
          console.log('DISMISSSS')
          setTimeout(() => {
            this.isPresent=false;
             this.loader.dismiss();
         }, 100);
        }
     }, 100);
   

  }

  dismiss(){

    this.loading.dismiss();
  }

  async show(_message) {
    this.isPresent=true;
    this.loader =  await this.loading.create({ message: _message })

    await this.loader.present();
    this.isPresent=true;
  }

}
