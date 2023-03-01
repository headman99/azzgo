import { Component, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { EditThunderCommand, InsertThunderCommand } from 'src/app/model/command/thunder';
import { Alert } from 'src/app/shared/provider/alert';
import { AdminService } from 'src/app/shared/rest/api/admin.service';
import { DatePipe, Location } from '@angular/common';
import { trasformDate } from 'src/app/constant/functionUtil';
import { ColorServiceService } from 'src/app/shared/services/color-service.service';

@Component({
  selector: 'app-thunder-deal',
  templateUrl: './thunder-deal.page.html',
  styleUrls: ['./thunder-deal.page.scss'],
  providers:[DatePipe]
})
export class ThunderDealPage implements OnInit {
  editMode: boolean =false;
  minDate: number;
  thunderId: any;
  thunderdeal: any;
  @ViewChild('f') form: NgForm;

  constructor(private route:ActivatedRoute,private adminSrv:AdminService,private alert: Alert,
	private location: Location,
	private datePipe:DatePipe,
	public colorService:ColorServiceService
	) { }
  title='';
  labelconfirmbutton='';
  counterTitle=0;
  ngOnInit() {
  }
  ionViewDidEnter() {
		this.minDate = new Date().getFullYear();
		this.editMode = !!this.route.snapshot.params.id;
		if (this.editMode) {
			this.title = 'Modifica ThunderDeal'
			this.labelconfirmbutton = 'Modifica';
			this.thunderId = this.route.snapshot.params.id;
			this.adminSrv.getThunderDetail(this.thunderId).subscribe((_detail) => {
				this.thunderdeal = _detail.deal;
				this.form.controls['title'].setValue(this.thunderdeal.title);
				this.form.controls['startdate'].setValue(trasformDate(this.thunderdeal.startdate));
				this.form.controls['enddate'].setValue(trasformDate(this.thunderdeal.enddate));  
				this.form.controls['isactive'].setValue(this.thunderdeal.isactive == 0 ? false :true);          
			});
		} else {
			this.title = 'Crea ThunderDeal'
			this.labelconfirmbutton = 'Inserisci';
		}
	}


	createAd(form: NgForm) {
		let f = form.value;

		if (this.editMode) {
			let thunder: EditThunderCommand = new EditThunderCommand();
			thunder.title = f.title;
			thunder.startdate = this.datePipe.transform(f.startdate,'dd/MM/yyyy');// '10/03/2021';
			thunder.enddate = this.datePipe.transform(f.enddate,'dd/MM/yyyy');// f.enddate;//'10/08/2022';
			thunder.isactive = f.isactive ? 1 : 0 ;
			thunder.id = this.thunderId;
			this.adminSrv
				.editThunder(thunder).subscribe((resp) => {
					if (resp) {
						this.onSuccess();
						form.resetForm();
					}
				});
		} else {
			let thunder: InsertThunderCommand = new InsertThunderCommand();
			thunder.title = f.title;
			thunder.startdate = this.datePipe.transform(f.startdate,'dd/MM/yyyy');// '10/03/2021';
			thunder.enddate = this.datePipe.transform(f.enddate,'dd/MM/yyyy');// f.enddate;//'10/08/2022';
			thunder.isactive = f.isactive ? 1 : 0 ;

			this.adminSrv
				.saveThunder(thunder)
				.subscribe((resp) => {
					if (resp) {
						this.thunderId = resp.id;
						this.onSuccess();
						form.resetForm();
					}
				});
		}
	}

	onSuccess() {
		let title = this.editMode ? 'Modifica annuncio' : 'Inserimento annuncio';
		let description = this.editMode ? 'Modifica eseguita correttamente' : 'Hai inserito un nuovo annuncio';
		//  this.alert.alertConfirm(title,description, );
		let buttons = [
			{
				text: 'Gestione Thunder Deal',
				role: 'cancel',
				cssClass: 'secondary',
				handler: (blah) => {
					this.goBack();
				},
			},
			{
				text: 'Nuovo Thunder Deal',
				handler: (args) => {},
			},
		];

		this.alert.showalert(title, description, buttons);
	}

	goBack() {
		this.location.back();
	}
}
