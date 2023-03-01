import { Injectable } from '@angular/core';
import { AlertController } from '@ionic/angular';

/*
  Generated class for the Loader provider.

  See https://angular.io/docs/ts/latest/guide/dependency-injection.html
  for more info on providers and Angular 2 DI.
*/
@Injectable({
  providedIn: 'root'
})
export class Alert {

  loader: any;
  public isPresent:boolean=false;
  constructor(private alertCtrl: AlertController) {

  }

  show(message) {
    this.alertCtrl.create({ message: message }).then(alert => {alert.present();});
  }

  hide() {
    this.alertCtrl.dismiss();
  }


  async alertConfirm(_title:string,_message:string,_doneAction:Function, parent?) {
    const alert = await this.alertCtrl.create({
      cssClass: 'my-custom-class',
      header: _title,
      message: _message,
      buttons: [
        {
          text: 'Annulla',
          role: 'cancel',
          cssClass: 'secondary',
          handler: (blah) => {
            console.log('Confirm Cancel: blah');
          }
        }, {
          text: 'Conferma',
          handler: (args) => {
            _doneAction(args);
          }
        }
      ]
    });

    await alert.present();
  }

  async showalert(_title:string,_message:string,_buttons) {
    const alert = await this.alertCtrl.create({
      cssClass: 'my-custom-class',
      header: _title,
      message: _message,
      buttons: _buttons
    });

    await alert.present();
  }


  async alertError(_title:string,_message:string,_doneAction?:Function) {
    const alert = await this.alertCtrl.create({
      cssClass: 'my-custom-class',
      header: _title,
      message: _message,
      buttons: [
      {
          text: 'Chiudi',
          handler: (args) => {
            _doneAction ? _doneAction(args) : null;
          }
        }
      ]
    });

    await alert.present();
  }


}
