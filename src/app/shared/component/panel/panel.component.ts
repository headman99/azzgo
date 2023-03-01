import { DatePipe } from '@angular/common';
import { ThrowStmt } from '@angular/compiler';
import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { ProposeAppointment } from 'src/app/model/command/proposeAppointment';
import { ProductType } from 'src/app/model/enum/productType';
import { RequestStatus } from 'src/app/model/enum/requestStatus';
import { Alert } from '../../provider/alert';
import { SmartmodalService } from '../smart-modal/smartmodal.controller';

@Component({
  selector: 'panel',
  templateUrl: './panel.component.html',
  styleUrls: ['./panel.component.scss'],
  providers:[DatePipe]
})
export class PanelComponent implements OnInit {

  @Input() data:any;
  @Input() type:'pub'| 'cust';
  @Input() itemData:any[]=[];
  @Input() buttonSend:boolean=true;
  @Input() itemEdit:boolean= true;
  @Input() buttonDenied:boolean = true;
  @Output() onOpen:EventEmitter<any> = new EventEmitter<any>();
  @Output() onDeleteItem:EventEmitter<any>= new EventEmitter<any>();
  @Output() onSendClick:EventEmitter<any> = new EventEmitter<any>();
  @Output() onChangeStatus:EventEmitter<any> = new EventEmitter<any>();
  @Output() onChattaClick :  EventEmitter<any> = new EventEmitter<any>();
  @Output() onWhastappClick : EventEmitter<any> = new EventEmitter<any>();
  title: any;
  isService: boolean;
  

  constructor(private alert:Alert, private smartModal:SmartmodalService, private datePipe:DatePipe) { }
 showContent=false;
  ngOnInit() {
    if(this.type=='cust'){
      this.title = this.data.customer.name;
    }else{
      this.title = this.data.publisher.businessname;
    }

 
  }

  show(){
    
    if(!this.data.details || this.data.details.length==0){
      this.onOpen.emit(this.data);
    }
    this.showContent = !this.showContent;
  }

  deleteItem(_p){
    let param= {
      data:this.data,
      product:_p
    }
    this.onDeleteItem.emit(param);
  }

  sendClick(){
    this.onSendClick.emit(this.data);
  }

  denyClick(){
    this.onChangeStatus.emit({status:RequestStatus.DENIED, requestcode:this.data.details.products.map(p=>p.requestcode)});
  }

  acceptClick(){
    if(!this.data.isService){
      this.onChangeStatus.emit({status:RequestStatus.ACCEPTED, requestcode:this.data.details.products.map(p=>p.requestcode)});
    }else{
      this.openModalAppointment(this.data.details.products[0])
    }
  }

  openModalAppointment(_product) {
    let data = {product:_product, showEnd:true}
		this.smartModal.showAppointment(data, (resp) => {
      let productCodeArray = []
      productCodeArray.push(_product.requestcode)
			let param = {
        endate : resp.data.dataFine,
        endtime : resp.data.oraFine,
        requestcode : productCodeArray,
        status : RequestStatus.ACCEPTED
      }
      this.onChangeStatus.emit(param);
		});
	}

  
  inarrivo(){
    this.alert.show('Funzionalità in arrivo!');
  }

  chatta(){
    this.onChattaClick.emit();
  }

  showInfoDetail(){
    this.smartModal.openInfoBox(this.data)
  }

  getNumberPhone(){
    
    let  number=''
    if(this.data.publisher.contacts.length>0){
      let index = this.data.publisher.contacts.map(c => c.typecode).indexOf('PNE')
      if(index > -1){
       number = this.data.publisher.contacts[index].value;
      }
    }

    return number
  }

  getNumberPhoneCustomer(){
    
    let  number=''
    if(this.data.customer.contacts.length>0){
      let index = this.data.customer.contacts.map(c => c.typecode).indexOf('PNE')
      if(index > -1){
       number = this.data.customer.contacts[index].value;
      }
    }

    return number
  }


  whastappClick(){
    if(this.type =='cust'){
      this.onWhastappClick.emit({number:this.getNumberPhoneCustomer(), text :''})
    }else{
      this.onWhastappClick.emit({number:this.getNumberPhone(), text :''})
    }
  }
}
