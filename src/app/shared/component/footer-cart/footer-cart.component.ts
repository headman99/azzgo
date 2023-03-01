import { Component, OnInit, OnDestroy, Input, Output, EventEmitter } from '@angular/core';
import { MsgbusService } from '../../services/msgbus.service';
import { Subscription } from 'rxjs';


@Component({
  selector: 'stl-footer-cart',
  templateUrl: './footer-cart.component.html',
  styleUrls: ['./footer-cart.component.scss'],
})
export class FooterCartComponent implements OnInit {
 
  updatedCartSub:Subscription = new Subscription();

  @Input() totalamount:any;
  @Output() ftclick:EventEmitter<any> = new EventEmitter<any>();

  constructor( private msgBus:MsgbusService) { }

  ngOnInit() {


   
  }

  
 clickTofooter(){
    this.ftclick.emit();
 }

}
