import { Injectable } from '@angular/core';
import { Storage } from '@ionic/storage';
import { UserLogged } from '../../model/domain/user';
import { CometChatService } from '../services/comet-chat.service';
import { MsgbusService } from '../services/msgbus.service';


const AZZ_GO_STORAGE_KEY= 'azzgo_key';
const AZZ_GO_STORAGE_FIlter = 'azzgo_filter';

@Injectable({
  providedIn: 'root'
})
export class UserData {
  favorites: string[] = [];
  HAS_LOGGED_IN = 'hasLoggedIn';
  HAS_SEEN_TUTORIAL = 'hasSeenTutorial';
  user:UserLogged;


  constructor(
    public storage: Storage,
    public msgBusEventSrv:MsgbusService,
    public cometChatSrv:CometChatService
  ) { }

  public accesToken='';

  hasFavorite(sessionName: string): boolean {
    return (this.favorites.indexOf(sessionName) > -1);
  }

  addFavorite(sessionName: string): void {
    this.favorites.push(sessionName);
  }

  removeFavorite(sessionName: string): void {
    const index = this.favorites.indexOf(sessionName);
    if (index > -1) {
      this.favorites.splice(index, 1);
    }
  }

  login(_data: UserLogged): Promise<any> {
    return this.storage.set(this.HAS_LOGGED_IN, true).then(() => {
      this.setData(_data);
      this.msgBusEventSrv.onLogin.emit(_data);
     // return window.dispatchEvent(new CustomEvent('user:login'));
    });
  }

  signup(_data: UserLogged): Promise<any> {
    return this.storage.set(this.HAS_LOGGED_IN, true).then(() => {
      this.setData(_data);
      return window.dispatchEvent(new CustomEvent('user:signup'));
    });
  }

  logout(): Promise<any> {
    return this.storage.remove(this.HAS_LOGGED_IN).then(() => {
      return this.storage.remove(AZZ_GO_STORAGE_KEY);
    }).then(() => {
      this.user = null;;
      this.msgBusEventSrv.onLogin.emit(null);
    });
  }

  setData(user: UserLogged): Promise<any> {
    this.accesToken = user ? user.access_token : null;
    this.user = user ? user:null;
    if(this.user){
      this.cometChatSrv.login(this.user);
    }
    return this.storage.set(AZZ_GO_STORAGE_KEY, user);
  }

   getData(): Promise<UserLogged> {
    return this.storage.get(AZZ_GO_STORAGE_KEY).then((value) => {
     this.accesToken =value ? value.access_token :null;
      return value;
    });
  }

  isLoggedIn(): Promise<boolean> {
    return this.storage.get(this.HAS_LOGGED_IN).then((value) => {
      return value === true;
    });
  }

  checkHasSeenTutorial(): Promise<string> {
    return this.storage.get(this.HAS_SEEN_TUTORIAL).then((value) => {

      return value;
    });
  }

  accountPhotoChanged(photo){
      return this.getData().then((userData)=>{
        userData.user.mainphoto = [];
        userData.user.mainphoto.push(photo);
        this.storage.set(AZZ_GO_STORAGE_KEY, userData);
      })
  }

  //puo essere sia una stringa indicante il tema, sia l'url della foto scelat come sfondo
  themeChanged(preference:string){
    this.getData().then((userData)=>{
      userData.user.theme = preference;
      this.storage.set(AZZ_GO_STORAGE_KEY,userData)
    })
  }

  removePreferences(){
    this.getData().then(userData=>{
      userData.user.theme='';
      this.storage.set(AZZ_GO_STORAGE_KEY,userData);
    })
  }


  setFilterSearch(_data){
    return this.storage.set(AZZ_GO_STORAGE_FIlter, _data);
  }

  getFilterSearch(): Promise<any>{
    return this.storage.get(AZZ_GO_STORAGE_FIlter).then((value) => {
      return value;
    });

   
  }
  removeFilterSearch(){
    this.storage.remove(AZZ_GO_STORAGE_FIlter).then(value=>{
      console.log(value);
    })
  }

}
