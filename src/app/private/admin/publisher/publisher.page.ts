import { Location } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Alert } from 'src/app/shared/provider/alert';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-publisher',
  templateUrl: './publisher.page.html',
  styleUrls: ['./publisher.page.scss'],
})
export class PublisherPage implements OnInit {
  publisherID: any;
    publisher: any;

  constructor(private adminSrv:AdminService, private route:ActivatedRoute, private alert:Alert, private location:Location, public colorService:ColorServiceService) { }

  ngOnInit() {



  }

  ionViewWillEnter(){
    this.publisherID = this.route.snapshot.params.id;
    this.adminSrv.getPublisherDetails(this.publisherID).subscribe(_detail=>{
       this.publisher = _detail.publisher;
     })

  }

  activate(){
    this.adminSrv.activatePublisher(this.publisherID).subscribe(_detail=>{
        this.alert.alertConfirm('Attivazione','Attivazione eseguita con successo',()=>{
            this.location.back()
        });
     })
  }

  disactive(){
    this.adminSrv.activatePublisher(this.publisherID).subscribe(_detail=>{
      this.alert.alertConfirm('Disattivazione','Disattivazione eseguita con successo',()=>{
          this.location.back()
      });
   })

  }


  delete(){
    this.adminSrv.deleteregistrationrequest(this.publisherID).subscribe(resp=>{
        this.alert.alertConfirm('Elimina','Eliminazione eseguita con successo',()=>{
            this.location.back()
        });
     })
  }
}
