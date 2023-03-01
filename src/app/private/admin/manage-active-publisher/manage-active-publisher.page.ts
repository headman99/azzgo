import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Alert } from 'src/app/shared/provider/alert';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
@Component({
  selector: 'app-manage-active-publisher',
  templateUrl: './manage-active-publisher.page.html',
  styleUrls: ['./manage-active-publisher.page.scss'],
})
export class ManageActivePublisherPage implements OnInit {


  nextPage: any;
  nextNumber: number;

  constructor(private adminSrv: AdminService, private router: Router, private alert: Alert,public colorService:ColorServiceService) { }
  publisherList: any[] = [];;

  ngOnInit() {

  }

  ionViewDidEnter() {
    this.adminSrv.getactivePublishers().subscribe(_publishers => {
      if (_publishers) {
        this.publisherList = _publishers.stores;
        if (_publishers.next) {
          this.nextNumber = _publishers.total - this.publisherList.length;
          this.nextPage = _publishers.next;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }

      } else {
        this.publisherList = [];
      }
    })
  }

  showDetail(_id) {
    this.router.navigate(['publisher', _id])
  }

  moreItem($event) {
    this.adminSrv.getactivePublishers(this.nextPage).subscribe((resp) => {
      this.publisherList = this.publisherList.concat(resp.stores);
      if (resp.next) {
        this.nextNumber = resp.total - this.publisherList.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
      $event.complete()
    });
  }

  searchPublisherByName(ev) {
    let name = ev.target.value;
    if (name) {
      this.adminSrv.getPublisherByName(name, true).subscribe(resp => {
        if (resp && resp.publisher && resp.publisher) {
          this.publisherList = resp.publisher;
          this.nextPage = null;
          this.nextNumber = null;
        } else {
          this.alert.alertError('Attenzione', 'La ricerca non ha prodotto risultati');
        }
      })
    }
    console.log(ev)
  }

}