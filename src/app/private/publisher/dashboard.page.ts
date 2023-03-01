import { Component, OnInit } from '@angular/core';
import { MenuController } from '@ionic/angular';
import { Category } from 'src/app/model/enum/category';
import { Alert } from 'src/app/shared/provider/alert';
import { User } from 'src/app/shared/provider/user';
import { UserData } from 'src/app/shared/provider/user-data';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import {ColorServiceService} from 'src/app/shared/services/color-service.service'

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.page.html',
  styleUrls: ['./dashboard.page.scss'],
})
export class DashboardPage implements OnInit {
  showCalendar: boolean;
  isThunderActive: boolean = false;;

  constructor(private menu:MenuController, private alert: Alert, private userData:UserData, private publisherSrv:PublisherService,public colorService:ColorServiceService) { }

  ngOnInit() {
      this.menu.enable(true);
      this.userData.getData().then(_data=>{
        const currentUser = this.userData ? this.userData.user : null;
        console.log(currentUser.user.store.categorycode)
        this.showCalendar = currentUser.user.store.categorycode == Category.SERVIZI;
    });
  }

  ionViewDidEnter(){
    this.publisherSrv.getactivethunderdealslist().subscribe(resp=>{
      if(resp && resp.deals && resp.deals.count  ){
        this.isThunderActive = resp.deals.count > 0
      }else{
        this.isThunderActive = false;
      }
    })
  }


  inarrivo(){
      this.alert.show('Funzionalità in arrivo!');
  }

  goToSpedizioni(){
   
    var createA = document.createElement('a');
    createA.setAttribute('href', ' https://goldpost.spedisci.online/login');
    createA.click();
  }

}
