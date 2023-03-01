import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import {  Router } from '@angular/router';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'azz-product-item',
  templateUrl: './product-item.component.html',
  styleUrls: ['./product-item.component.scss'],
})
export class ProductItemComponent implements OnInit {

  enviromentPathimage = environment.endpoint + environment.storage;7
  image='';
  @Input() product:any=null;
  @Input() addTocart:any=false;
  @Input() edit:boolean= false;
  @Output() onDelete: EventEmitter<any>= new EventEmitter<any>();
  @Output() onSendItem: EventEmitter<any>= new EventEmitter<any>();
  @Output() onGoTOProductPage: EventEmitter<any>= new EventEmitter<any>();
  constructor(private route:Router) { }

  ngOnInit() {
    if(this.product.mainphoto && this.product.mainphoto.length>0){
      this.image =  this.enviromentPathimage + this.product.mainphoto[0]?.path
    }
  }

  delete(_product){
    this.onDelete.emit(_product);
  }

  addItem(_product){
    this.onSendItem.emit(_product);
  }

  
	goToProductPage(productID){
		console.log(productID)
    this.onGoTOProductPage.emit(productID)
		//this.route.navigate(['app2/tabs/product', productID]);	
	}
}
