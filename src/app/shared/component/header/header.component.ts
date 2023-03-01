import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import {Location} from '@angular/common';
import { environment } from 'src/environments/environment';
import { Router } from '@angular/router';
import { UserData } from '../../provider/user-data';

@Component({
  selector: 'cfe-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})

export class HeaderComponent implements OnInit {

  constructor(private location:Location, private router:Router, private userData:UserData){}
  ngOnInit() {}

  @Input() title:string ='';
  @Input() defaultHref:string ='';
  @Input() totalCart:number=0
  @Input() showBackBtn:boolean= true;
  @Input() showCloseBtn:boolean= false;
  @Input() showMenuBtn:boolean = true;
  @Input() showCart:boolean=false;
  @Input() hidenotification:boolean = false;

  @Output() onCloseClick :EventEmitter<any> = new EventEmitter<any>();
  @Output() cartIconClick:EventEmitter<any> = new EventEmitter<any>();

  goBack(){
    this.location.back();
  }

  goHome(){
    this.router.navigateByUrl('/')
  }

  goToCart(){
    this.cartIconClick.emit();
  }

  close(){
    this.onCloseClick.emit();
  }

  goToNotification(){
    const currentUser = this.userData ? this.userData.user : null;
    if (currentUser.user.roles[0] == 'Publisher') {
      this.router.navigate(['/publisher-dashboard/notification']);
    }else{
      this.router.navigate(['/app2/tabs/notification']);
    }
  }
}
