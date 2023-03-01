import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Observable, of } from 'rxjs';
import { map, switchMap } from 'rxjs/operators';
import { InsertNotification } from 'src/app/model/command/insertNotification';
import { UserLogged } from 'src/app/model/domain/user';
import { NotificationActionEnum } from 'src/app/model/enum/notificationAction';
import { NotificationTypeEnum } from 'src/app/model/enum/notificationType';
import { UserData } from 'src/app/shared/provider/user-data';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { CustomerService } from 'src/app/shared/rest/api/customer.service';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
	selector: 'app-notification',
	templateUrl: './notification.page.html',
	styleUrls: ['./notification.page.scss'],
})
export class NotificationPage implements OnInit {
	userList: any[];
	current_role: any;
	nextPage: any;
	nextNumber: number;
	notifications: any = [];
	user:UserLogged;

	actionTypeEnum = NotificationActionEnum;

	constructor(private route:ActivatedRoute, 
		private customerSrv: CustomerService,
		 private publisherSrv: PublisherService, 
		private adminSrv:AdminService,
		private userData:UserData, 
		private router:Router,
		public colorService:ColorServiceService
		) {}

	ngOnInit() {
		this.userData.getData().then(_data=>{
			this.user = this.userData ? this.userData.user : null;
			//console.log(currentUser.user.store.categorycode)
		})
	}

	ionViewWillEnter() {
		//this.publisherID = this.route.snapshot.params.id;
		this.current_role = this.route.snapshot.data.expectedRole;
	
		this.getData();
	}


	getData(){

		this.getNotification().subscribe(resp=>{
			if(resp.notification && resp.notification.notification){
				this.notifications = resp.notification.notification
				if (resp.nextPage) {
					this.nextNumber = resp.total - this.notifications.length;
					this.nextPage = resp.nextPage;
				} else {
					this.nextNumber = null;
					this.nextPage = null;
				}
				
				
			}
		}
	);

	}

	getNotification(nextPage?): Observable<any> {
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.getNotificationList(nextPage)
				}else if (tipo == 'Admin') {
					return this.adminSrv.getNotificationList(nextPage)
				} else {
					return this.publisherSrv.getNotificationList(nextPage)
				}
			}));
	}

	markAll(){
		this.markAllRead().subscribe(resp=>{
			this.getData();
		})
	}


	markAllRead(): Observable<any> {
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.markAll();
				}else if (tipo == 'Admin') {
					return this.adminSrv.markAll();
				} else {
					return this.publisherSrv.markAll();
				}
			}));
	}


	moreItem($event) {
		this.getNotification(this.nextPage).subscribe((resp) => {
			this.notifications = this.notifications.concat(resp.notification.notification);
			if (resp.nextPage) {
				this.nextNumber = resp.total - this.notifications.length;
				this.nextPage = resp.nextPage;
			} else {
				this.nextNumber = null;
				this.nextPage = null;
			}
			$event.complete();
		});
	}


	insertNotification(){

		let p:InsertNotification = new InsertNotification();
		p.title = 'Notifica potente',
		p.description = 'descrizione notifica potente'
		p.userid = this.user.user.iduser
		p.type = NotificationTypeEnum.GOTO_REQUEST
		p.action = NotificationActionEnum.REQUEST_ACCEPTED;

		this.customerSrv.insertNotification(p).subscribe(resp=>console.log(resp));


	}


	markAsRead(notification){
		this.mark(notification).subscribe(resp=>{
			notification.isread = 1;
		})
	}

	mark(notification){
		return of(this.current_role).pipe(
			switchMap((tipo) => {
				if (tipo == 'Customer') {
					return this.customerSrv.markAsRead(notification.id);
				}else if (tipo == 'Admin') {
					return this.adminSrv.markAsRead(notification.id);
				} else {
					return this.publisherSrv.markAsRead(notification.id);
				}
			}));
	}



	goToAction(notification){
		if(this.current_role == 'Customer'){
			this.actionCustomer(notification);

		}else if(this.current_role == 'Admin'){
			this.actionAdmin(notification);

		}else{
			this.actionPublisher(notification);
		}


	}

	actionCustomer(notification){
		if(notification.type == this.actionTypeEnum.REQUEST_ACCEPTED || notification.type == this.actionTypeEnum.REQUEST_DENIED){
			this.router.navigate(['app2/tabs/request']);
		}else if(notification.type == this.actionTypeEnum.NEW_PRODUCT_FOLLOW){
			if(notification.extrafield)
			this.router.navigate(['/app2/tabs/publisher-profile',notification.extrafield]);
		}else if (notification.type == this.actionTypeEnum.NEW_OFFER_FOLLOW){
			if(notification.extrafield){
				this.router.navigate(['app2/tabs/product', notification.extrafield]);
			}
		}
	}

	actionAdmin(notification){
		if(notification.type == this.actionTypeEnum.NEW_REQUEST_SIGNUP){
			this.router.navigate(['admin-dashboard/manage-publishers'])
		}
	}
	actionPublisher(notification){
		if(notification.type == this.actionTypeEnum.REQUEST_ARRIVED){
			this.router.navigate(['publisher-dashboard/richieste'])
		}else if(notification.type == this.actionTypeEnum.FAVOURITE_PRODUCT){
			this.router.navigate(['publisher-dashboard/manage-ads'])
		}
	
	}

}
