import { Component, OnInit } from '@angular/core';
import { PublicService } from 'src/app/shared/rest/api/public.service';

@Component({
  selector: 'app-advanced-search',
  templateUrl: './advanced-search.page.html',
  styleUrls: ['./advanced-search.page.scss'],
})
export class AdvancedSearchPage implements OnInit {

    categories: any[];

  constructor(private publicSrv:PublicService) { }
  type:'search'| 'categorysearch' = 'search';

  ngOnInit() {
      this.categories = [];
      this.publicSrv.storecategories().subscribe(resp=>{
          if(resp && resp.storecategories){
            this.categories = resp.storecategories;
          }
      })
  }

  segmentChanged($event){
      this.type=$event.target.value
  }

  getStoreByCategories(_cat){
      this.publicSrv.searchPublisherByCategoryID(_cat).subscribe(resp=>{
        console.log(resp);
      })
  }

}
