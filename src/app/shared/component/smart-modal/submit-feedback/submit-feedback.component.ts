import { Component, Input, OnInit } from '@angular/core';
import { ModalController } from '@ionic/angular';
//import * as ionic5 from 'ionic5-star-rating'

@Component({
  selector: 'app-submit-feedback',
  templateUrl: './submit-feedback.component.html',
  styleUrls: ['./submit-feedback.component.scss'],
})
export class SubmitFeedbackComponent implements OnInit {

  constructor(private modalCtrl:ModalController) { }
  @Input() value:any=0;
  ngOnInit() {}

  submitFeedBack(){
    console.log(this.value)
    this.modalCtrl.dismiss(this.value);
  }

  logRatingChange(ev){
    this.value = ev;
  }

  retry(){
    this.modalCtrl.dismiss();
  }
}
