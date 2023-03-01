import { Component, OnInit } from '@angular/core';
import { CometChatService } from 'src/app/shared/services/comet-chat.service';

@Component({
  selector: 'app-messages',
  templateUrl: './messages.page.html',
  styleUrls: ['./messages.page.scss'],
})
export class MessagesPage implements OnInit {

    userList: any[];

  constructor( private cometChat:CometChatService) { }

  ngOnInit() {
    
  }

}
