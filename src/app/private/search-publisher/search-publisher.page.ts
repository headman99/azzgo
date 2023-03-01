import { Component, OnInit } from '@angular/core';
import { PublicService } from 'src/app/shared/rest/api/public.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-search-publisher',
  templateUrl: './search-publisher.page.html',
  styleUrls: ['./search-publisher.page.scss'],
})
export class SearchPublisherPage implements OnInit {
  categories: any[];

  publisherList:any[] =[];

  constructor(private publicSrv: PublicService,public colorService:ColorServiceService) { }

  ngOnInit() {


  }

  ionViewDidEnter() {
    this.categories = [];
    this.publicSrv.storecategories().subscribe(resp => {
      if (resp && resp.storecategories) {
        this.categories = resp.storecategories;
      }
    })
  }



}
