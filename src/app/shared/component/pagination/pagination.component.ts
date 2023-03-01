import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';


@Component({
  selector: 'cfe-pagination',
  templateUrl: './pagination.component.html',
  styleUrls: ['./pagination.component.scss'],
})
export class PaginationComponent implements OnInit {

  @Output() onNext: EventEmitter<boolean>= new EventEmitter<boolean>();
  @Input() numberNextItem:number=0;
  @Input() label:string = 'Caricando altri risultati... ';
  constructor() { }

  ngOnInit() {}

  next(){
    this.onNext.emit(true);
  }

  loadData(event) {
    setTimeout(() => {
      console.log('Done');
     

      // App logic to determine if all data is loaded
      // and disable the infinite scroll
      this.onNext.emit(event.target);
      /*if (data.length == 1000) {
        event.target.disabled = true;
      }*/
    }, 500);
  }

}
