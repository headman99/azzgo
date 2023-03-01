import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { environment } from 'src/environments/environment';


@Component({
  selector: 'post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.scss'],
})
export class PostComponent implements OnInit {

  constructor() { }
  enviromentPathimage = environment.endpoint + environment.storage;
  @Input() itemPost:any;
  @Output() onAddItemTolist: EventEmitter<any> = new EventEmitter<any>();
  @Output() onChattaClick :  EventEmitter<any> = new EventEmitter<any>();
  @Output() goToProductDetails :  EventEmitter<any> = new EventEmitter<any>();
  @Output() goToProfilePub :  EventEmitter<any> = new EventEmitter<any>();
  @Output() favouriteClick : EventEmitter<boolean> = new EventEmitter<boolean>();
  @Output() onWhastappClick : EventEmitter<any> = new EventEmitter<any>();
  
  


  


  get indirizzo():string{
    let ret = null;
    for (let index = 0; index < this.itemPost.publisher.contacts.length; index++) {
      const element =  this.itemPost.publisher.contacts[index];
      if (element.typecode === 'ADR') {
        ret = element;
      }
    }

    return ret.value;
  }

  get PublisherProfilePic(){
    let ret=''
    if(this.itemPost.publisher.mainphoto.length>0){
      ret = this.enviromentPathimage + this.itemPost.publisher.mainphoto[0].path
    }
    return ret
  }

  get NumberPhone(){
    let  number=''
    if(this.itemPost.publisher.contacts.length>0){
      let index = this.itemPost.publisher.contacts.map(c => c.typecode).indexOf('PNE')
      if(index > -1){
       number = this.itemPost.publisher.contacts[index].value;
      }
    }

    return number
  }

  get mainItemPic(){
    let ret=''
    if(this.itemPost.mainphoto.length>0){
      ret = this.enviromentPathimage + this.itemPost.mainphoto[0].path
    }
    return ret
  }

  ngOnInit() {}

  addItemTolist(product){
    this.onAddItemTolist.emit(product)
  }

  chatta(){
    this.onChattaClick.emit();
  }


  productClick(){
    this.goToProductDetails.emit();
  }
  publisherClick(){
    this.goToProfilePub.emit();
  }
  

  markFavourite(){
    this.favouriteClick.emit(true)
  }

  markUnfavourite(){
    this.favouriteClick.emit(false)
  }

  whastappClick(){

    this.onWhastappClick.emit({number:this.NumberPhone, text :''})
  }
}
