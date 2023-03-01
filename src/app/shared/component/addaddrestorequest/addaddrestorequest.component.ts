import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { CustomerService } from '../../rest/api/customer.service';

@Component({
  selector: 'app-addaddrestorequest',
  templateUrl: './addaddrestorequest.component.html',
  styleUrls: ['./addaddrestorequest.component.scss'],
})
export class AddaddrestorequestComponent implements OnInit {

  constructor(private customerSrv:CustomerService,private modalCtrl:ModalController,) { }

  @Input() data=null;
  text:string;
  @Input() title='';
  ngOnInit() {}

  sendAddress(){
    
    this.customerSrv.addShippingAddressToRequest(this.data.groupcode,this.text).subscribe(resp=>{
      this.modalCtrl.dismiss(resp);
    });
  }

  retry(){
    this.modalCtrl.dismiss();
  }
}
