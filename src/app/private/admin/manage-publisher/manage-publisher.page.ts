import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
@Component({
  selector: 'app-manage-publisher',
  templateUrl: './manage-publisher.page.html',
  styleUrls: ['./manage-publisher.page.scss'],
})
export class ManagePublisherPage implements OnInit {
  nextPage: any;
  nextNumber: number;

  constructor(private adminSrv: AdminService, private router: Router,public colorService:ColorServiceService) { }
  publisherList: any[] = [];;

  ngOnInit() {

  }

  ionViewDidEnter() {
    this.adminSrv.getInactivePublishers().subscribe(_publishers => {
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
    this.adminSrv.getInactivePublishers(this.nextPage).subscribe((resp) => {
      this.publisherList = this.publisherList.concat(resp.stores);
      if (resp.next) {
        this.nextNumber = resp.total - this.publisherList.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
    });
    $event.complete();
  }

}
