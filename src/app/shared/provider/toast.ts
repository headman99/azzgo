import { Injectable } from '@angular/core';
import { AlertController, ToastController } from '@ionic/angular';

/*
  Generated class for the Loader provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable({
  providedIn: 'root'
})
export class Toast {

  loader: any;
  public isPresent:boolean=false;
  constructor(private toast: ToastController) {

  }

  show(message) {
    this.toast.create({ message: message }).then(alert => {alert.present();});
  }

  hide() {
    this.toast.dismiss();
  }


  async showAndClose(message, header?, position?) {
    const toast = await this.toast.create({
      header: '',
      message: message,
      duration: 2000,
      position: position || 'bottom',
      buttons: [
        {
          side: 'end',
          icon: 'close-outline',
          text: 'Chiudi',
          handler: () => {
            console.log('Favorite clicked');
          }
        }
      ]
    });
    toast.present();
  }



}
