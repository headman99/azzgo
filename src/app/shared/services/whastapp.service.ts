import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})
export class WhastappService {

   

  constructor() { }
    exampleString='https://wa.me/';
  goToWhastapp(number, text){
    
    var string= '';
        if(text){
            string =  this.exampleString+ '+39'+number+'?text='+ text;
          
        }else{
          string= this.exampleString +'+39'+number
        }

        var createA = document.createElement('a');
      
        createA.setAttribute('href', string);
        createA.click();
       
  
    
  }
}