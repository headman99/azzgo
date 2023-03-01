import { Component, OnDestroy, OnInit } from '@angular/core';
import { Platform } from '@ionic/angular';
import { Subscription } from 'rxjs';
import { UserData } from 'src/app/shared/provider/user-data';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { MsgbusService } from 'src/app/shared/services/msgbus.service';
import { environment } from 'src/environments/environment';

@Component({
	templateUrl: 'tabs-page.html',
})
export class TabsPage implements OnDestroy, OnInit {
	tabsPlacement: string;
	tabsLayout: string;

	tabs = [
		{
			tab: 'favourites',
			ico: 'heart-outline',
			text: 'Preferiti',
			notification:false
		},
		{
			tab: 'search',
			ico: 'search-outline',
			text: 'Cerca',
			notification:false
		},
        {
			tab: 'user',
			ico: 'person-outline',
			text: 'Profilo',
			notification:false
		},
		{
			tab: 'request',
			ico: 'documents-outline',
			text: 'Richieste',
			notification:true
		},
	];
    mobile: boolean = environment.MOBILE;
	notifications ={
		request : 0
	}
	notificaionSub: Subscription;

	constructor(public platform: Platform, private msgBusService:MsgbusService,private userData:UserData,private customerService:CustomerService) {
        this.mobile = true;//environment.MOBILE;
        console.log(this.mobile);
	
		this.notificaionSub = this.msgBusService.onChangeNotification.subscribe(resp=>{
			this.getNotificationRequest();
		})


	}

	ngOnInit(){
		this.userData.getData().then((user) => {
			if(user){
				let currentUser = user.user;
				//this.menuCtrl.enable(true)
				if(currentUser){
					this.getNotificationRequest();
				}
			}})
		
	}

	getNotificationRequest(){
		this.customerService.getRequestCountPending().subscribe(resp=>{
			this.notifications.request=resp.countreqs
		});
	}


	 ngOnDestroy(){
		this.notificaionSub.unsubscribe();
	 }
}
