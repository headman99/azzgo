import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-manage-thunder-deals',
  templateUrl: './manage-thunder-deals.page.html',
  styleUrls: ['./manage-thunder-deals.page.scss'],
})
export class ManageThunderDealsPage implements OnInit {

  nextPage: any;
  nextNumber: number;
  thunderDealsList=[];
  constructor(private adminSrv: AdminService, private router: Router,public colorService:ColorServiceService) { }

  ngOnInit() {
  }

  ionViewDidEnter() {
    this.adminSrv.getThunderList().subscribe(thunder => {
      if (thunder) {
        this.thunderDealsList = thunder.deals.thunderdeals;
        if (thunder.next) {
          this.nextNumber = thunder.deals.total - this.thunderDealsList.length;
          this.nextPage = thunder.deals.next;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }

      } else {
        this.thunderDealsList = [];
      }
    })
  }

 

  moreItem($event) {
    this.adminSrv.getInactivePublishers(this.nextPage).subscribe((resp) => {
      this.thunderDealsList = this.thunderDealsList.concat(resp.deals.thunderdeals);
      if (resp.next) {
        this.nextNumber = resp.deals.total - this.thunderDealsList.length;
        this.nextPage = resp.deals.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
      $event.complete();
    });
  }

}
