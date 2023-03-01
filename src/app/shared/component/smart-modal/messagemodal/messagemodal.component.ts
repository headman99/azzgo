import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { DialogButton } from '../dialog';

@Component({
  selector: 'app-messagemodal',
  templateUrl: './messagemodal.component.html',
  styleUrls: ['./messagemodal.component.scss'],
})
export class MessagemodalComponent implements OnInit {

  constructor(private modalController:ModalController) { }

  @Input() title:string;
  @Input() content:string;
  @Input() buttons:DialogButton[] = [];

  ngOnInit() {}

  close(_data) {
    this.modalController.dismiss(
     _data,
     'choosed'
    );
  }

}
