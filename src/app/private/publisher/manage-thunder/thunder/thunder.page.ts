import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { SmartmodalService } from 'src/app/shared/component/smart-modal/smartmodal.controller';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-thunder',
  templateUrl: './thunder.page.html',
  styleUrls: ['./thunder.page.scss'],
})
export class ThunderPage implements OnInit {
  thunderID: any;
  products: any = [];
  nextNumber: number;
  nextPage: any;
  thunderDeals:any;

  constructor(public colorService:ColorServiceService ,private route:ActivatedRoute, private publisherSrv:PublisherService, private smartModalSrv:SmartmodalService) { 

  }

  ngOnInit() {	
  }

  ionViewDidEnter(){
    this.thunderID = this.route.snapshot.params.id;
    this.publisherSrv.getthunderdealbyid(this.thunderID).subscribe(resp=>{
      if(resp){
        this.thunderDeals= resp
      }
    });

    this.publisherSrv.getThunderDealProductsList(this.thunderID).subscribe(resp=>{
      if (resp) {
				this.products = resp.stores;
				if (resp.nextPage) {
					this.nextNumber = resp.total - this.products.length;
					this.nextPage = resp.nextPage;
				} else {
					this.nextNumber = null;
					this.nextPage = null;
				}
			}
    })

  }



  moreItem($event) {
		this.publisherSrv.getThunderDealProductsList(this.thunderID, this.nextPage).subscribe((resp) => {
			if(resp) this.products = this.products.concat(resp.store);
			if (resp.nextPage) {
				this.nextNumber = resp.total - this.products.length;
				this.nextPage = resp.nextPage;
			} else {
				this.nextNumber = null;
				this.nextPage = null;
			}
      $event.complete();
		});
	}

  
  openSelectAds(){
    this.smartModalSrv.showModalChoose((resp)=>{

    })
  }

  addItem(ev){

  }
}
