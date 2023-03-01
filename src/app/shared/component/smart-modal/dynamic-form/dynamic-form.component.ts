import { Component, OnInit, Input, ChangeDetectorRef } from '@angular/core';
import { QuestionBase } from '../modalform';
import { FormGroup } from '@angular/forms';


@Component({
  selector: 'app-dynamic-form',
  templateUrl: './dynamic-form.component.html',
  styleUrls: ['./dynamic-form.component.scss'],
})
export class DynamicFormComponent  {


  @Input() question: QuestionBase<string>;
  @Input() form: FormGroup;
  imgURL: string | ArrayBuffer;
  fileChanged: boolean= false;
  get isValid() { return this.form.controls[this.question.key].valid; }


constructor( private cd: ChangeDetectorRef){}


  onFileChange(event,_field) {
    this.fileChanged = true;
    if(event.target.files && event.target.files.length) {
      const [file] = event.target.files;

     this.getImage(file);
        this.form.get(_field).patchValue(
          file
      );
       console.log(this.form)
        // need to run CD since file load runs outside of zone
        this.cd.markForCheck();
      };
    }

    isString(question){
     return typeof(question ==='string');
    }





    getImage(file){


      var reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload= (_event) => {
        this.imgURL = reader.result;


      }
    }


    }


