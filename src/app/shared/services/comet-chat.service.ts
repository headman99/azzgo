import { Injectable } from '@angular/core';
import { CometChat } from "@cometchat-pro/cordova-ionic-chat"
import { UserLogged } from 'src/app/model/domain/user';
import { environment } from 'src/environments/environment';



const AUTHKEY =  environment.COMETCHATAPIKEY;

@Injectable({
  providedIn: 'root'
})
export class CometChatService {

  constructor() {


  }


  intiCometChat(_user: UserLogged) {
    /*
    var appID = environment.COMETCHATAPP_ID;
    var region = "EU";
    var appSetting = new CometChat.AppSettingsBuilder().subscribePresenceForAllUsers().setRegion(region).build();
    CometChat.init(appID, appSetting).then(
      () => {

        this.login(_user);
        console.log("Initialization completed successfully");

        // You can now call login function.
      },
      error => {
        console.log("Initialization failed with error:", error);
        // Check the reason for error and take appropriate action.
      }
    );
    */

  }

  login(_user: UserLogged) {
/*
    var authKey = AUTHKEY;
    let idUserComet = null

    if(_user.user.store){
      idUserComet = _user.user.store.id;
    }else{
      idUserComet = _user.user.iduser;
    }
    
    CometChat.login(idUserComet, authKey).then(
      user => {
        console.log("Login Successful:", { user });
      },
      error => {
        this.registerCometUser(_user)
        console.log("Login failed with exception:", { error });
      }
    )



  }


  sendMessage(_receiverID, _messageText) {

    var receiverType = CometChat.RECEIVER_TYPE.USER;

    var textMessage = new CometChat.TextMessage(_receiverID, _messageText, receiverType);

    CometChat.sendMessage(textMessage).then(
      message => {
        console.log("Message sent successfully:", message);
        // Do something with message
      },
      error => {
        console.log("Message sending failed with error:", error);
        // Handle any error
      }
    );
    */
  }

  addListener(_listenerID) {
    // var listenerID = "UNIQUE_LISTENER_ID";
/*
    CometChat.addMessageListener(
      _listenerID,
      new CometChat.MessageListener({
        onTextMessageReceived: message => {
          console.log("Message received successfully:", message);
          // Handle text message
        }
      })
    );
    */
  }

  deleteMessage(_messageID) {
    CometChat.deleteMessage(_messageID).then(
      message => {
        console.log("Message deleted", message);
      },
      error => {
        console.log("Message delete failed with error:", error);
      }
    );
  }

  getChat(_userID): Promise<any> {
    return CometChat.getConversation(_userID, CometChat.RECEIVER_TYPE.USER)
  }

  markAsRead(_messageId, _receiverId, _receivertype) {
    CometChat.markAsRead(_messageId, _receiverId, _receivertype)
  }

  registerCometUser(_user: UserLogged) {
    /*
    let authKey = AUTHKEY;

    let idUserComet = null;
    let nameComet = null

    var name =null;

    if(_user.user.store){
      idUserComet = _user.user.store.id;
      nameComet = _user.user.store.businessname;
    }else{
      idUserComet = _user.user.iduser.toString();
      nameComet = _user.user.name;
    }

    var user = new CometChat.User(idUserComet);

    user.setName(nameComet);

    CometChat.createUser(user, authKey).then(
      user => {
        console.log("user created", user);
      }, error => {
        console.log("error", error);
      }
    )
    */
  }

  getMessageS(_ID) {
    var UID = "UID";
    var limit = 50;

    var messagesRequest = new CometChat.MessagesRequestBuilder()
      .setLimit(limit)
      .setUID(_ID)
      .build();

   return messagesRequest.fetchPrevious()
  }


  getUser(_id){
    return CometChat.getUser(_id);
  }

  logOut(){
    return CometChat.logout();
  }

}

