import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MenuController } from '@ionic/angular';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';
@Component({
  selector: 'app-admindashboard',
  templateUrl: './admindashboard.page.html',
  styleUrls: ['./admindashboard.page.scss'],
})
export class AdmindashboardPage implements OnInit {

  constructor(private router:Router, 
    private menuController:MenuController,
    public colorService:ColorServiceService
    ) { }

  ngOnInit() {
    this.menuController.enable(true);
  }

  goto(){
      this.router.navigate(['manage-publisher'])
  }

}
