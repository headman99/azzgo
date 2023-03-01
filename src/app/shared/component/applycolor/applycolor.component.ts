import { Component, EventEmitter, Input, OnInit,Output } from '@angular/core';
@Component({
  selector: 'app-applycolor',
  templateUrl: './applycolor.component.html',
  styleUrls: ['./applycolor.component.scss'],
})
export class ApplycolorComponent implements OnInit {

  constructor(
   
  ) { }

  ngOnInit() {}

  @Input() color:string='';
  @Output() newColorEvent = new EventEmitter<string>();
  
  applyTheme(){
    this.newColorEvent.emit(this.color);
  }
}
