import { formatDate } from '@angular/common';
import {  Component, Inject, LOCALE_ID, OnInit, ViewChild } from '@angular/core';
import { AlertController, ModalController } from '@ionic/angular';
import { CalendarComponent } from 'ionic2-calendar';
import { PublisherService } from 'src/app/shared/rest/api/publisher.service';

@Component({
  selector: 'app-calendar',
  templateUrl: './calendar.page.html',
  styleUrls: ['./calendar.page.scss'],
})
export class CalendarPage implements OnInit {

  eventSource = [];
  viewTitle: string;
 
  calendar = {
    mode: 'month',
    currentDate: new Date(),
  };
 
  selectedDate: Date;
 
  @ViewChild(CalendarComponent) myCal: CalendarComponent;
 
  constructor(
    private alertCtrl: AlertController,
    @Inject(LOCALE_ID) private locale: string,
    private modalCtrl: ModalController,
    private publisherSrv:PublisherService
  ) {}
 
  ngOnInit() {
    
  }

  ionViewWillEnter() {
    this.publisherSrv.getAppointments().subscribe(resp=>{
      if(resp && resp.appointments){
        this.costruisciCalendario(resp.appointments);
      }
    })
  }
  costruisciCalendario(_appointments) {
    let events =[]
   for (let index = 0; index < _appointments.length; index++) {
     const element = _appointments[index];


     events.push({
      title:  element.user,
      startTime: this.trasformDate(element.appointmentdate,element.appointmentime),
      endTime: this.trasformDate(element.appointmentenddate,element.appointmentendtime),
      allDay: false,
    });
    this.eventSource = events;
   }
  }

 
  // Change current month/week/day
  next() {
    this.myCal.slideNext();
  }
 
  back() {
    this.myCal.slidePrev();
  }
 
  // Selected date reange and hence title changed
  onViewTitleChanged(title) {
    this.viewTitle = title;
  }
 
  // Calendar event was clicked
  async onEventSelected(event) {
    // Use Angular date pipe for conversion
    let start = formatDate(event.startTime, 'medium', this.locale);
    let end = formatDate(event.endTime, 'medium', this.locale);
 
    const alert = await this.alertCtrl.create({
      header: event.title,
      subHeader: event.desc,
      message: 'Inizio: ' + start + '<br><br>Fine: ' + end,
      buttons: ['OK'],
    });
    alert.present();
  }
 
  createRandomEvents() {
    var events = [];
    for (var i = 0; i < 50; i += 1) {
      var date = new Date();
      var eventType = Math.floor(Math.random() * 2);
      var startDay = Math.floor(Math.random() * 90) - 45;
      var endDay = Math.floor(Math.random() * 2) + startDay;
      var startTime;
      var endTime;
      if (eventType === 0) {
        startTime = new Date(
          Date.UTC(
            date.getUTCFullYear(),
            date.getUTCMonth(),
            date.getUTCDate() + startDay
          )
        );
        if (endDay === startDay) {
          endDay += 1;
        }
        endTime = new Date(
          Date.UTC(
            date.getUTCFullYear(),
            date.getUTCMonth(),
            date.getUTCDate() + endDay
          )
        );
        events.push({
          title: 'Tutto il giorno - ' + i,
          startTime: startTime,
          endTime: endTime,
          allDay: true,
        });
      } else {
        var startMinute = Math.floor(Math.random() * 24 * 60);
        var endMinute = Math.floor(Math.random() * 180) + startMinute;
        startTime = new Date(
          date.getFullYear(),
          date.getMonth(),
          date.getDate() + startDay,
          0,
          date.getMinutes() + startMinute
        );
        endTime = new Date(
          date.getFullYear(),
          date.getMonth(),
          date.getDate() + endDay,
          0,
          date.getMinutes() + endMinute
        );
        events.push({
          title: 'Evento - ' + i,
          startTime: startTime,
          endTime: endTime,
          allDay: false,
        });

        console.log(events);
      }
    }
    this.eventSource = events;
  }
 
  removeEvents() {
    this.eventSource = [];
  }

  trasformDate(dateString, timeString){
     

    var dateParts = dateString.split("/");
    var timeParts= timeString.split(":")
  
    // month is 0-based, that's why we need dataParts[1] - 1
    var dateObject = new Date(dateParts[2], dateParts[1] - 1, dateParts[0],timeParts[0],timeParts[1]); 
      return dateObject
    }
   
}
