import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'stl-categoryselector',
  templateUrl: './categoryselector.component.html',
  styleUrls: ['./categoryselector.component.scss'],
})
export class CategoryselectorComponent implements OnInit {
  currentCategoria: number;

  constructor() { }

  @Output() categoriaClicked =new EventEmitter();;

  categorie:CategoriaProdotto[]= [];


  ngOnInit() {

    this.currentCategoria = 0;
    this.categorie= this.getCategorie();
  }
  getCategorie() {
    let pathImg= 'assets/category/';

    let list=[];

    
    let item = new CategoriaProdotto();
  

    item.id= 0;
    item.description = 'casa'
    item.img = pathImg +  'casa.svg'
    
    list.push(item);
    item = new CategoriaProdotto();
    item.id= 1;
    item.description = 'accessori'
    item.img = pathImg +   'accessori.svg'

    list.push(item);

    item = new CategoriaProdotto();

    item.id= 3;
    item.description = 'corredo'
    item.img = pathImg +  'corredo.svg'
    
    list.push(item);
    item = new CategoriaProdotto();

    item.id= 4;
    item.description = 'donna'
    item.img = pathImg +  'donna.svg'

    
    list.push(item);
    item = new CategoriaProdotto();

    item.id= 5;
    item.description = 'formale'
    item.img = pathImg +  'formale.svg'

    
    list.push(item);
    item = new CategoriaProdotto();

    item.id= 6;
    item.description = 'piumoni'
    item.img = pathImg +  'piumoni.svg'

    
    list.push(item);

    item = new CategoriaProdotto();
    item.id= 7;
    item.description = 'scarpe'
    item.img = pathImg +  'scarpe.svg'

    
    list.push(item);
    item = new CategoriaProdotto();

    item.id= 2;
    item.description = 'biancheria'
    item.img = pathImg +  'biancheria.svg'

    list.push(item);
    item = new CategoriaProdotto();
    item.id= 2;
    item.description = 'biancheria'
    item.img = pathImg +  'biancheria.svg'

    
    list.push(item);
    item = new CategoriaProdotto();

    item.id= 2;
    item.description = 'biancheria'
    item.img = pathImg +  'biancheria.svg'
    
    list.push(item);
    
    return list;
  }



  itemClicked(item){
    this.currentCategoria= item.id;
      this.categoriaClicked.emit(item);

  }
  


}


export class CategoriaProdotto{

    id:number;
    description:string;
    img:string;

}