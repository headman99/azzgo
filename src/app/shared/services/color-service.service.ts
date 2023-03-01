import { Injectable } from '@angular/core';
import { AddPreferencesCommand } from 'src/app/model/command/addPreferences';
import { AuthService } from '../rest/api/auth.service';
import { environment } from 'src/environments/environment';
import { UserData } from '../provider/user-data';
@Injectable({
  providedIn: 'root'
})
export class ColorServiceService {

  selectedTheme: string = "vuoto";
  selectedImageUrl: string = '';
  endpointPath = environment.endpoint + environment.storage;

  constructor(
    private authService: AuthService,
    private userData:UserData,
  ) { }


async readTheme():Promise<any> {
  console.log('leggo il tema')
    this.authService.getPreferences().subscribe((preference) => {
      if(!preference){
        return null
      }

      
      if (preference.preference.isImage) {
        this.selectedImageUrl = this.endpointPath + preference.preference.value;
      } else {
        this.selectedTheme = preference.preference.value;
      }

      this.userData.themeChanged(preference.preference.value);
      return preference.preference.value;
    })
    
  }

  saveTheme(preference: AddPreferencesCommand) {
    this.selectedImageUrl='';
    this.selectedTheme = preference.value;
    this.authService.setPreferences(preference).subscribe((result) => {
      console.log("settate preferenze");
      this.userData.themeChanged(preference.value);
      return result
    })
  }

  savePhotoTheme(preference: FormData) {
    this.authService.setPhotoTheme(preference).subscribe((result) => {
      if (result.photo) {
        this.selectedImageUrl = this.endpointPath + result.photo.path;
        this.selectedTheme='';
        this.userData.themeChanged(this.endpointPath + result.photo.path);
        return result;
      }
    })
  }

  logout(){
    this.selectedImageUrl='';
    this.selectedTheme='vuoto';
  }

  deletePreferences(){
    const risultato = this.authService.deletePreferences().subscribe(result =>{
      console.log('cancellazione prefereces effettuata')
    });
    if(risultato){
      this.userData.removePreferences();
    }
  }

}
