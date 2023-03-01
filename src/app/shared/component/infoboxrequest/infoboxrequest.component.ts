import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { PublisherService } from '../../rest/api/publisher.service';

@Component({
  selector: 'app-infoboxrequest',
  templateUrl: './infoboxrequest.component.html',
  styleUrls: ['./infoboxrequest.component.scss'],
})
export class InfoboxrequestComponent implements OnInit {

  constructor(private publisherSrv:PublisherService,private modalCtrl:ModalController,) { }

  @Input() data=null;
  ngOnInit() {
    this.getInfo();
  }
  info:any;

  close(){
    this.modalCtrl.dismiss();
  }

  getInfo(){
    this.publisherSrv.getInfoBox(this.data.groupcode).subscribe(resp=>{
     console.log(resp);
     this.info=resp;
    });
  }
}
