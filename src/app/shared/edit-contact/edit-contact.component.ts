import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { EditContact } from 'src/app/model/command/editContact';
import { CustomerService } from '../rest/api/customer.service';
import { PublisherService } from '../rest/api/publisher.service';

@Component({
  selector: 'modal-edit-contact',
  templateUrl: './edit-contact.component.html',
  styleUrls: ['./edit-contact.component.scss'],
})
export class EditContactComponent implements OnInit {

  @Input() contact:any;
  @Input() profile = 'publisher';
  @Input() mode : 'add' | 'edit';
  geo: any= null;
  title:string;
  number:string='';
  labelButton='Modifica';
  constructor(private modalCtrl:ModalController, private publisherService:PublisherService, private customerService:CustomerService) { }

  ngOnInit() {

    this.labelButton= this.mode =='edit' ? 'Modifica':'Aggiungi';

    if(this.contact.typecode==='PNE'){
      if(this.mode=='edit'){
        this.title = 'Modifica il contatto telefonico'
      }else{
        this.title = 'Aggiungi il contatto telefonico'
      }
    }else{
      this.title= 'Modifica l\'indirizzo'
    }
  }

  getAddress(ev) {
		console.log(ev);
		this.geo = ev;
    let desc= this.geo.formatted_address
		let latitude = this.geo.geometry.location.lat();
		let longitude = this.geo.geometry.location.lng();
	}

  editContact(){
    let param:EditContact = new EditContact();
    param.id= this.contact.id;
    if(this.geo){
      param.value = this.geo.formatted_address;
      param.latitude= this.geo.geometry.location.lat();
      param.longitude = this.geo.geometry.location.lng();
    }else{
      param.value = this.number;
    }
    if(this.profile=='customer'){
      this.customerService.editContact(param).subscribe(resp=>{
        this.modalCtrl.dismiss(resp.message);
      });
     }else{
      this.publisherService.editContact(param).subscribe(resp=>{
        this.modalCtrl.dismiss(resp.message);
      });
     }

  }
  retry(){
    this.modalCtrl.dismiss();
  }

  addContact(){
    let param = {value:'',typecode:''};
    param.value = this.number
    param.typecode = this.contact.typecode;
    this.customerService.addContact(param).subscribe(resp=>{
      this.modalCtrl.dismiss(resp.message);
    })
  }
  done(){
    if(this.mode =='edit'){
      this.editContact()
    }else{
      this.addContact();
    }

  }

}
