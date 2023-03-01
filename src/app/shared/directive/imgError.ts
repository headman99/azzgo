import {Directive, Input, HostBinding} from '@angular/core'
@Directive({
    selector: 'img',
    host: {
      '(error)':'updateUrl()',
      '(load)': 'load()',
      '[src]':'src'
     }
  })

 export class ImagePreloadDirective {
    @Input() src:string;
    @Input() default:string;
    @HostBinding('class') className

    updateUrl() {
      this.src = 'assets/img/appicon.png';
    }
    load(){
      this.className = 'image-loaded';
    }
  }
