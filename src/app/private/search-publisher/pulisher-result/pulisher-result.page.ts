import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Alert } from 'src/app/shared/provider/alert';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { PublicService } from 'src/app/shared/rest/api/public.service';

@Component({
  selector: 'app-pulisher-result',
  templateUrl: './pulisher-result.page.html',
  styleUrls: ['./pulisher-result.page.scss'],
})
export class PulisherResultPage implements OnInit {
  catID: any;
  publisherList: any[]=[];
  nextNumber: number;
  nextPage: any;

  constructor(private route:ActivatedRoute, private publicSrv:PublicService, private customer:CustomerService, private alert:Alert, private router:Router) { }

  ngOnInit() {
    this.catID = this.route.snapshot.params.cat;
    this.getStoreByCategories(this.catID);
  }

  getStoreByCategories(_cat){
    this.publicSrv.searchPublisherByCategoryID(_cat).subscribe(resp=>{
      if(resp){
        this.publisherList = resp.stores;
        if (resp.next) {
          this.nextNumber = resp.total - this.publisherList.length;
          this.nextPage = resp.next;
        } else {
          this.nextNumber = null;
          this.nextPage = null;
        }
      
      }
    })

    
}

moreItem($event) {
  this.publicSrv.searchPublisherByCategoryID(this.catID,this.nextPage).subscribe((resp) => {
    this.publisherList = this.publisherList.concat(resp.stores);
    if (resp.next) {
      this.nextNumber = resp.total - this.publisherList.length;
      this.nextPage = resp.next;
    } else {
      this.nextNumber = null;
      this.nextPage = null;
    }
    $event.complete();
  });
}

searchPublisherByName(ev) {
  let name = ev.target.value;
  if (name) {
    this.customer.getpublisherbyname(this.catID, name).subscribe(resp => {
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

  goToPub(pubID){
    this.router.navigate(['app2/tabs/publisher-profile', pubID]);
  }

}
