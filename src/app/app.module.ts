import { HttpClientModule } from '@angular/common/http';
import { LOCALE_ID, NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { SplashScreen } from '@ionic-native/splash-screen/ngx';
import { StatusBar } from '@ionic-native/status-bar/ngx';
import { IonicModule } from '@ionic/angular';
import { IonicStorageModule } from '@ionic/storage';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormsModule } from '@angular/forms';
import { ErrorInterceptorProvider, LoaderInterceptorProvider } from './shared/interceptor';
import { Camera } from '@ionic-native/camera/ngx';
import { Network } from '@ionic-native/network/ngx';
import { WebView } from '@ionic-native/ionic-webview/ngx';
import { File } from '@ionic-native/file/ngx';
import { LoggedGuard, RoleGuard,RedirectGuard,dataloadGuard, EmailVerifyGuardGuard } from './shared/guards';

import { Geolocation } from '@ionic-native/geolocation/ngx';
import { NgCalendarModule  } from 'ionic2-calendar';
 
import { registerLocaleData } from '@angular/common';
import localeIT from '@angular/common/locales/it';
import { LaunchNavigator } from '@ionic-native/launch-navigator/ngx';
import { CallNumber } from '@ionic-native/call-number/ngx';
import {ColorServiceService} from 'src/app/shared/services/color-service.service'

registerLocaleData(localeIT);

@NgModule({
	imports: [BrowserModule, AppRoutingModule, HttpClientModule, FormsModule, IonicModule.forRoot(), IonicStorageModule.forRoot(), NgCalendarModule,],
	declarations: [AppComponent],
	providers: [LoaderInterceptorProvider, { provide: LOCALE_ID, useValue: 'it-IT' }, ErrorInterceptorProvider, WebView, File, SplashScreen, StatusBar, Camera, Network, LoggedGuard, RoleGuard, RedirectGuard,EmailVerifyGuardGuard,dataloadGuard,Geolocation, LaunchNavigator,CallNumber,ColorServiceService],
	bootstrap: [AppComponent],
})
export class AppModule { }

