import { DatePipe } from '@angular/common';
import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';

@Component({
  selector: 'app-appointment',
  templateUrl: './appointment.component.html',
  styleUrls: ['./appointment.component.scss'],
  providers:[DatePipe]
})
export class AppointmentComponent implements OnInit {
  @Input() product: any;
  @Input() showEnd: any;
  dataEnd: string;
  hhmmEnd: string;
  @Input() title;

  constructor(private modalCtrl:ModalController, private datePipe:DatePipe) { }
 
  data:string = new Date().toISOString() // this.datePipe.transform(new Date(),'DD/MM/YYYY');
  hhmm:string = this.datePipe.transform(new Date(),'HH:mm');
  
  ngOnInit() {
    
    if(this.showEnd){
      console.log(this.product)
      this.data = this.trasformDate(this.product.appointmentdate)
      this.hhmm = this.product.appointmenttime
      this.dataEnd=  this.trasformDate(this.product.appointmentdate); //new Date().toISOString();
      this.hhmmEnd = this.product.appointmenttime;
    }
  }
  


  retry(){
    this.modalCtrl.dismiss();
  }

  prenota(){
    let param = {
      data: this.datePipe.transform(this.data,'dd/MM/yyyy'),
      ora: this.hhmm
    }
    console.log(param)
    this.modalCtrl.dismiss(param);
  }

  accettaPrenotazione(){
    let param = {
      dataFine: this.datePipe.transform(this.dataEnd,'dd/MM/yyyy'),
      oraFine: this.hhmmEnd
    }
    this.modalCtrl.dismiss(param);
  }


  trasformDate(dateString){
     

    var dateParts = dateString.split("/");
  
    // month is 0-based, that's why we need dataParts[1] - 1
    var dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0]).toISOString(); 
  
      return dateObject
    }

    close(){
      this.modalCtrl.dismiss();
    }

}
