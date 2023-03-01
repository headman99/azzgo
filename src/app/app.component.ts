import { Component, OnDestroy, OnInit, ViewEncapsulation,ViewChild, NgZone } from '@angular/core';
import { Router } from '@angular/router';

import { MenuController, Platform, ToastController,NavController } from '@ionic/angular';

import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';

import { Storage } from '@ionic/storage';

//import { UserData } from './providers/user-data';
import { UserLogged } from './model/domain/user';
import { AuthService } from './shared/rest/api/auth.service';
import { UserData } from './shared/provider/user-data';
import { IonNetwork } from './shared/provider/network-connection';
import { MsgbusService } from './shared/services/msgbus.service';
import { Subscription } from 'rxjs';
import { CometChatService } from './shared/services/comet-chat.service';
import { Toast } from './shared/provider/toast';
import { environment } from 'src/environments/environment';
import { NotificationActionEnum } from './model/enum/notificationAction';
import {ColorServiceService} from 'src/app/shared/services/color-service.service'
declare var window: any;



@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
  encapsulation: ViewEncapsulation.None
})
export class AppComponent implements OnInit, OnDestroy {
  actionTypeEnum = NotificationActionEnum;
  appPagesPublisher = [
    {
      title: 'Gestione Annunci',
      url: '/publisher-dashboard/manage-ads',
      icon: 'list'
    },
    {
      title: 'Richieste',
      url: '/publisher-dashboard/richieste',
      icon: 'reader'
    },
    {
      title: 'I miei feedback',
      url: '/publisher-dashboard/myfeedback',
      icon: 'star'
    },
    {
      title: 'Profilo',
      url: '/publisher-dashboard/profile',
      icon: 'person'
    },
    {
      title: 'Appuntamenti',
      url: '/publisher-dashboard/calendar',
      icon: 'calendar'
    },
    {
      title: 'Notifiche',
      url: '/publisher-dashboard/notification',
      icon: 'notifications'
    }
  ];


  appPagesAdmin = [
    {
      title: 'Richieste registrazioni',
      url: 'admin-dashboard/manage-publishers',
      icon: 'receipt'
    },
    {
      title: 'Gestione utenti',
      url: 'admin-dashboard/manage-active-publisher',
      icon: 'people'
    },
    {
      title: 'Gestione Thunder Deals',
      url: 'admin-dashboard/manage-thunder-deals',
      icon: 'flash'
    },
    {
      title: 'Notifiche',
      url: 'admin-dashboard/notification',
      icon: 'notifications'
    }

  ];




  loggedIn = false;
  dark = false;
  user: UserLogged;
  onloginsub: Subscription;

  notificationready = false;
  current_role: string;



  constructor(
    private menu: MenuController,
    private platform: Platform,
    private router: Router,
    private splashScreen: SplashScreen,
    private statusBar: StatusBar,
    private storage: Storage,
    private userData: UserData,
    private toast: Toast,
    private authSrv: AuthService,
    private network: IonNetwork,
    private msgBusEventSrv: MsgbusService,
    private comet: CometChatService,
    private navController: NavController,
    private zone: NgZone,
    private colorService:ColorServiceService
  ) {
    this.initializeApp();
  }

  async ngOnInit() {
    this.checkLoginStatus();
    this.listenForLoginEvents();
    this.onloginsub = this.msgBusEventSrv.onLogin.subscribe(resp => {
      this.user = resp;
      this.loggedIn = !!resp;
      if (window.userOneSignal && this.loggedIn) {
        this.authSrv.onesignalUpdatePlayerId(window.userOneSignal).subscribe(resp => {
          console.log('OneSignalPlayerid:' + resp.message)
        });
      }

    });


  }

  initializeApp() {
    this.platform.ready().then(() => {
      this.statusBar.styleDefault();
      this.splashScreen.hide();
      this.startOneSignal();
      this.platform.pause.subscribe(e => {
        this.userData.removeFilterSearch();
      });
    });
  }

  checkLoginStatus() {
    return this.userData.getData().then(user => {
      let logged = !!user;
      this.user = user;
      if (logged) {
        this.comet.intiCometChat(user)
        this.userData.setData(user);
        if (window.userOneSignal && logged) {
          this.authSrv.onesignalUpdatePlayerId(window.userOneSignal).subscribe(resp => {
            console.log('OneSignalPlayerid:' + resp.message)
          });
        }


        //aggiorna onesignal id to BE
        console.log(window.userOneSignal);

      }
      return this.updateLoggedInStatus(logged);
    });
  }

  updateLoggedInStatus(loggedIn: boolean) {
    setTimeout(() => {
      this.loggedIn = loggedIn;

    }, 300);
  }

  listenForLoginEvents() {
    window.addEventListener('user:login', () => {
      this.updateLoggedInStatus(true);
    });

    window.addEventListener('user:signup', () => {
      this.updateLoggedInStatus(true);
    });

    window.addEventListener('user:logout', () => {
      this.updateLoggedInStatus(false);
    });
  }

  logout() {

    this.authSrv.logout().subscribe(resp => {
      this.userData.logout().then(() => {
        this.colorService.logout();
        return this.router.navigateByUrl('/app2/tabs/search');
      });
    });
  }

  openTutorial() {
    this.menu.enable(false);
    this.storage.set('ion_did_tutorial', false);
    this.router.navigateByUrl('/tutorial');
  }

  ngOnDestroy() {
    this.onloginsub.unsubscribe();

  }

  startOneSignal() {

    if (this.platform.is('cordova') || this.platform.is('ios')) {
      window.plugins.OneSignal.setAppId(environment.ONE_SIGNAL_APPID);
      this.notificationready = true;


      window.plugins.OneSignal.requiresUserPrivacyConsent(function (require) {
        console.log('require' + require)
      });
      window.plugins.OneSignal.getDeviceState(function (status) {
        window.userOneSignal = status.userId;

      });

      var self = this;

      window.plugins.OneSignal.setNotificationOpenedHandler(function (jsonData) {
        console.log('notificationOpenedCallback: ' + JSON.stringify(jsonData));
        if (jsonData.notification.additionalData) {

          setTimeout(function () {
            self.goToAction(jsonData.notification.additionalData);
          }, 500);


        }
      });

      window.plugins.OneSignal.promptForPushNotificationsWithUserResponse(function (accepted) {
        console.log("User accepted notifications: " + accepted);
      });

    }
  }


  goToAction(notification) {
    this.actionCustomer(notification);
  }

  actionCustomer(notification) {
    if (notification.action == this.actionTypeEnum.REQUEST_ACCEPTED || notification.action == this.actionTypeEnum.REQUEST_DENIED) {
      this.router.navigate(['app2/tabs/request']);
    } else if (notification.action == this.actionTypeEnum.NEW_PRODUCT_FOLLOW) {
      if (notification.extrafield)
        this.router.navigate(['/app2/tabs/publisher-profile', notification.extrafield]);
    } else if (notification.action == this.actionTypeEnum.NEW_REQUEST_SIGNUP) {
      this.router.navigate(['admin-dashboard/manage-publishers'])
    } else if (notification.action == this.actionTypeEnum.REQUEST_ARRIVED) {
      this.router.navigate(['publisher-dashboard/richieste'])
    } else if (notification.action == this.actionTypeEnum.FAVOURITE_PRODUCT) {
      this.router.navigate(['publisher-dashboard/manage-ads'])
    } else if (notification.action == this.actionTypeEnum.NEW_OFFER_FOLLOW) {
      if (notification.productid) {
        this.router.navigate(['app2/tabs/product', notification.productid]);
      }
    }
  }
}
