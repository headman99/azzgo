import { Injectable, EventEmitter } from '@angular/core';
import { UserLogged } from 'src/app/model/domain/user';


@Injectable({
  providedIn: 'root'
})
export class MsgbusService {

  constructor() { }
  cartUpdated: EventEmitter<any> = new EventEmitter<any>();
  onLogin: EventEmitter<UserLogged> = new EventEmitter<UserLogged>();
  onChangeNotification:  EventEmitter<any> = new EventEmitter<any>();
}
