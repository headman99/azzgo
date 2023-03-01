import { Component, Input, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ModalController } from '@ionic/angular';
import { searchProductCommand } from 'src/app/model/command/searchProducts';
import { PublicService } from '../../rest/api/public.service';

@Component({
  selector: 'app-search-input',
  templateUrl: './search-input.component.html',
  styleUrls: ['./search-input.component.scss'],
})
export class SearchInputComponent implements OnInit {
  categories: any[];

  @Input() filterSearch:searchProductCommand;

  constructor(private publicSrv:PublicService, private modalService: ModalController) { }
  type:'search'| 'categorysearch' = 'search';
  searchModel:searchProductCommand = new searchProductCommand();
  geo:any=null;
  address='';

  @ViewChild('f') form: NgForm

  coordinates=null;

  ngOnInit() {


      this.categories = [];
      this.publicSrv.storecategories().subscribe(resp=>{
          if(resp && resp.storecategories){
            this.categories = resp.storecategories;
            if(this.filterSearch){
              this.coordinates = {lat:this.filterSearch.latitude,long:this.filterSearch.longitude}
              this.form.controls['testo'].setValue(this.filterSearch.testo);
              this.form.controls['categoryid'].setValue(this.filterSearch.categoryid);
              this.address = this.filterSearch.address;
            }
          }
      })
  }

  getAddress(ev, form) {
		console.log(ev);
		this.geo = ev;
		form.latitude = this.geo.geometry.location.lat();
		form.longitude = this.geo.geometry.location.lng();
	}
  getPlace(ev, form:NgForm){
    this.address = ev.address;
    this.coordinates = {lat:ev.latitude,long:ev.longitude}
   /* form.latitude = ev.latitude;
    form.longitude = ev.longitude;*/

  }

  segmentChanged($event){
      this.type=$event.target.value
  }

  getStoreByCategories(_cat){
      this.publicSrv.searchPublisherByCategoryID(_cat).subscribe(resp=>{
        console.log(resp);
      })
  }

  close(){
    this.modalService.dismiss();
  }
  applicaFiltri(form){
    let formInput = form.value;
    formInput.latitude = this.coordinates ?  this.coordinates.lat : '';
    formInput.longitude = this.coordinates ?  this.coordinates.long : '';
    formInput.address= this.address;
    this.modalService.dismiss(formInput);
  }


  deleteFilter(){
    this.form.controls['testo'].reset();
    this.form.controls['categoryid'].reset();

  }
}
