import { Component, OnInit } from '@angular/core';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
@Component({
  selector: 'app-manage-thunder',
  templateUrl: './manage-thunder.page.html',
  styleUrls: ['./manage-thunder.page.scss'],
})
export class ManageThunderPage implements OnInit {
  thunderlist: any = [];
  nextNumber: number = null;
  nextPage: any = null;

  constructor(public colorService:ColorServiceService,private publisherSrv: PublisherService) { }

  ngOnInit() {
  }

  ionViewWillEnter() {
    this.publisherSrv.getactivethunderdealslist().subscribe((resp) => {
      if (resp && resp.deals) {
        this.thunderlist = resp.deals.thunderdeals;
        if (resp.next) {
          this.nextNumber = resp.total - this.thunderlist.length;
          this.nextPage = resp.next;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }
      }
    });

  }

  moreItem($event) {
		this.publisherSrv.getactivethunderdealslist(this.nextPage).subscribe((resp) => {
      if (resp && resp.deals) {
        this.thunderlist = this.thunderlist.concat(resp.deals.thunderdeals);
        if (resp.next) {
          this.nextNumber = resp.total - this.thunderlist.length;
          this.nextPage = resp.next;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }
      }
      $event.complete();
		});
	}
}
