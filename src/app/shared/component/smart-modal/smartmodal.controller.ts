import { Injectable } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { ChooseModalComponent } from './choose-modal/choose-modal.component';
import { DialogOption } from './dialog';
import { MessagemodalComponent } from './messagemodal/messagemodal.component';
import { SearchInputComponent } from '../search-input/search-input.component';
import { EditContactComponent } from '../../edit-contact/edit-contact.component';
import { AppointmentComponent } from './appointment/appointment.component';
import { SubmitFeedbackComponent } from './submit-feedback/submit-feedback.component';
import { AddaddrestorequestComponent } from '../addaddrestorequest/addaddrestorequest.component';
import { InfoboxrequestComponent } from '../infoboxrequest/infoboxrequest.component';

export {ModalbaseComponent} from './modalbase/modalbase.component';

@Injectable({
  providedIn: 'root'
})
export class SmartmodalService {

  constructor(public modalController: ModalController) {

  }




  async showModalChoose(callBack){
    const modal = await this.modalController.create({
      component: ChooseModalComponent,
 

    });

    modal.onDidDismiss().then((_data)=>callBack(_data))
    return await modal.present();

  }

  async showdialog(options,callBack){
    const modal = await this.modalController.create({
      component: ChooseModalComponent,
      componentProps: {
        'title': options.title,
        'key':options.key,
        'options':options.list
      }

    });

    modal.onDidDismiss().then((_data)=>callBack(_data))
    return await modal.present();

  }

  async showModalComponent(options:DialogOption,callBack?){
    const modal = await this.modalController.create({
        component: MessagemodalComponent,
        componentProps: {
          'title': options.title,
          'content': options.content,
          'buttons':options.buttons
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data):null);
      return await modal.present();


  }

  async showModalSearch(filterSearch,callBack?){
    const modal = await this.modalController.create({
        component: SearchInputComponent,
        componentProps:{
        'filterSearch':filterSearch
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data):null);
      return await modal.present();


  }

  async editContact(_contact,callBack?,_profile?,_mode?){
    if(!_mode){
      _mode = 'edit'
    }

    if(!_profile){
      _profile = 'publisher'
    }
    const modal = await this.modalController.create({
        component: EditContactComponent,
        componentProps:{
          'contact':_contact,
          'profile':_profile,
          'mode':_mode
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data):null);
      return await modal.present();


  }

  async showAppointment(_data,callBack?){
    const modal = await this.modalController.create({
        component: AppointmentComponent,
        componentProps:{
          'product':_data.product,
          'showEnd': _data.showEnd 
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data):null);
      return await modal.present();
  }

  async showFeedback(_value,callBack?){
    const modal = await this.modalController.create({
        component: SubmitFeedbackComponent,
        componentProps:{
          'value':_value
        },
        cssClass:'cfe-modal-class'
      });

      modal.onDidDismiss().then((_data)=>callBack && _data ? callBack(_data):null);
      return await modal.present();
  }


  async addAddressToReq(data,callBack?){
    const modal = await this.modalController.create({
        component: AddaddrestorequestComponent,  
        componentProps:{
          'data':data
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data.data):null);
      return await modal.present();


  }

  async openInfoBox(data,callBack?){
    const modal = await this.modalController.create({
        component: InfoboxrequestComponent,  
        componentProps:{
          'data':data
        }
      });

      modal.onDidDismiss().then((_data)=>callBack? callBack(_data):null);
      return await modal.present();

  }









}


