import { Component, OnInit, Input, Injectable } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { QuestionBase } from '../modalform';
import { ModalController } from '@ionic/angular';

@Component({
	selector: 'app-modalbase',
	templateUrl: './modalbase.component.html',
	styleUrls: ['./modalbase.component.scss'],
})
export class ModalbaseComponent implements OnInit {
	@Input() questions: QuestionBase<string>[] = [];
	form: FormGroup;
	payLoad = '';
	title = '';
	constructor(private qcs: QuestionControlService, private modalController: ModalController) {}

	ngOnInit() {
		this.form = this.qcs.toFormGroup(this.questions);
	}

	onSubmit() {
		this.payLoad = this.form.getRawValue();
		this.dismiss(this.payLoad);
	}

	dismiss(_data) {
		this.modalController.dismiss(_data);
	}
}

import { FormControl, Validators, FormBuilder } from '@angular/forms';

@Injectable({ providedIn: 'root' })
export class QuestionControlService {
	constructor() {}

	toFormGroup(questions: QuestionBase<string>[]) {
		let group: any = {};

		questions.forEach((question) => {
			group[question.key] = question.required ? new FormControl(question.value || '', Validators.required) : new FormControl(question.value || '');
		});
		return new FormGroup(group);
	}
}
