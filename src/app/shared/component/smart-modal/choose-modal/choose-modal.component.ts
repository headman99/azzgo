import { Component, OnInit, Input } from '@angular/core';
import { ModalController } from '@ionic/angular';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-choose-modal',
  templateUrl: './choose-modal.component.html',
  styleUrls: ['./choose-modal.component.scss'],
})
export class ChooseModalComponent implements OnInit {
  ads: any;
  nextPage: any;
  nextNumber: number;

  constructor(private modalController: ModalController, private publisherSrv: PublisherService) { }

  @Input() title: string;
  // @Input() options:any[];
  @Input() key: string;
  enviromentPath = environment.endpoint + environment.storage;


  ngOnInit() { }


  close(_data?) {
    if(_data){
      this.modalController.dismiss(
        _data,
        'choosed'
      );
    }else{
      this.modalController.dismiss();
    }
  }

  moreItem() {
    this.publisherSrv.getAdsPublisher(this.nextPage).subscribe((resp) => {
      this.ads = this.ads.concat(resp.stores);
      if (resp.next) {
        this.nextNumber = resp.total - this.ads.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
    });
  }

  ionViewWillEnter() {
    this.publisherSrv.getAdsPublisher().subscribe((resp) => {
      this.ads = resp.stores;
      if (resp.next) {
        this.nextNumber = resp.total - this.ads.length;
        this.nextPage = resp.next;
      } else {
        this.nextNumber = null;
        this.nextPage = null;
      }
    });
  }


 

}
