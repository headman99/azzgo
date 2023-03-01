import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-myfeedback',
  templateUrl: './myfeedback.page.html',
  styleUrls: ['./myfeedback.page.scss'],
})
export class MyfeedbackPage implements OnInit {
  publisherID: any;
  feedbacks: any=[];
  nextNumberFeedback: number=null;
  nextPageFeedback: any=null;

  constructor( public colorService:ColorServiceService ,private publisherSrv: PublisherService) { }

  ngOnInit() {

  }

  ionViewWillEnter(){
    this.getFeedbacks().subscribe(resp => {
      if (resp) {
        this.feedbacks = resp.feedbacks;
        if (resp.nextPage) {
          this.nextNumberFeedback = resp.total - this.feedbacks.length;
          this.nextPageFeedback = resp.nextPage;
        } else {
          this.nextNumberFeedback = null;
          this.nextPageFeedback = null;
        }
      }
    });
  }

  getFeedbacks(nextPage?): Observable<any> {

    return this.publisherSrv.getPublisherFeedbackList(nextPage).pipe(
      map(resp => {
        if (resp) {
          return {
            feedbacks: resp.feedbacks,
            total: resp.total,
            nextPage: resp.next
          }
        }
      }));
  }

  moreItemFeedback($event) {
    this.getFeedbacks(this.nextPageFeedback).subscribe((resp) => {
      this.feedbacks = this.feedbacks.concat(resp.feedbacks);
      if (resp.nextPage) {
        this.nextPageFeedback = resp.total - this.feedbacks.length;
        this.nextPageFeedback = resp.nextPage;
      } else {
        this.nextPageFeedback = null;
        this.nextPageFeedback = null;
      }
      $event.complete();
    });
  }


}



