import { Observable ,  Subscriber } from 'rxjs';
import { Injectable, NgZone } from '@angular/core';
import { DomSanitizer, SafeUrl } from '@angular/platform-browser';

@Injectable({
  providedIn: 'root'
})

export class ImageCompressorService {

// globals
private _currentFile : File ;
private _currentImage : ICompressedImage = {} ;
    canvasContext: any;

// Constructor
constructor( private sanitizer : DomSanitizer , private _zone : NgZone) {

}

// FileReader Onload callback
readerOnload(observer : Subscriber<ICompressedImage>)  {
 return (progressEvent : ProgressEvent) => {
  const img = new Image();
  img.src = (progressEvent.target as any).result;
  img.onload = this.imageOnload(img , observer);
}
}

// Image Onload callback
 imageOnload(image : HTMLImageElement , observer : Subscriber<ICompressedImage>) {
  return () => {
  const canvas = document.createElement('canvas');
  canvas.width = 100;
  canvas.height = 100;
 // const context = <CanvasRenderingContext2D>canvas.getContext('2d');
 // context.drawImage(image , 0 , 0 , 100 , 100);
  this.resizeCanvasImage(image,canvas,600,600)
  this.toICompressedImage(this.canvasContext , observer);
}}

// Emit CompressedImage
toICompressedImage(context : CanvasRenderingContext2D , observer : Subscriber<ICompressedImage> ) {
  context.canvas.toBlob(
    (blob) => {
      this._currentImage.blob = blob ;
      this._currentImage.image = new File([blob] , this._currentFile.name , {type : 'image/jpeg', lastModified : Date.now()} );
      this._currentImage.imgUrl = this.sanitizer.bypassSecurityTrustUrl(URL.createObjectURL(blob));
      this._currentImage.name = this._currentFile.name ;
      this._zone.run(() => {
        observer.next(this._currentImage);
        observer.complete();
      })

    } ,
    'image/jpeg' ,
    1
  );
}


 resizeCanvasImage(img, canvas, maxWidth, maxHeight) {
    var imgWidth = img.width,
        imgHeight = img.height;

    var ratio = 1, ratio1 = 1, ratio2 = 1;
    ratio1 = maxWidth / imgWidth;
    ratio2 = maxHeight / imgHeight;

    // Use the smallest ratio that the image best fit into the maxWidth x maxHeight box.
    if (ratio1 < ratio2) {
        ratio = ratio1;
    }
    else {
        ratio = ratio2;
    }

    this.canvasContext = canvas.getContext("2d");
    var canvasCopy = document.createElement("canvas");
    var copyContext = canvasCopy.getContext("2d");
    var canvasCopy2 = document.createElement("canvas");
    var copyContext2 = canvasCopy2.getContext("2d");
    canvasCopy.width = imgWidth;
    canvasCopy.height = imgHeight;
    copyContext.drawImage(img, 0, 0);

    // init
    canvasCopy2.width = imgWidth;
    canvasCopy2.height = imgHeight;
    copyContext2.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvasCopy2.width, canvasCopy2.height);


    var rounds = 2;
    var roundRatio = ratio * rounds;
    for (var i = 1; i <= rounds; i++) {
        console.log("Step: "+i);

        // tmp
        canvasCopy.width = imgWidth * roundRatio / i;
        canvasCopy.height = imgHeight * roundRatio / i;

        copyContext.drawImage(canvasCopy2, 0, 0, canvasCopy2.width, canvasCopy2.height, 0, 0, canvasCopy.width, canvasCopy.height);

        // copy back
        canvasCopy2.width = imgWidth * roundRatio / i;
        canvasCopy2.height = imgHeight * roundRatio / i;
        copyContext2.drawImage(canvasCopy, 0, 0, canvasCopy.width, canvasCopy.height, 0, 0, canvasCopy2.width, canvasCopy2.height);

    } // end for


    // copy back to canvas
    canvas.width = imgWidth * roundRatio / rounds;
    canvas.height = imgHeight * roundRatio / rounds;
    this.canvasContext.drawImage(canvasCopy2, 0, 0, canvasCopy2.width, canvasCopy2.height, 0, 0, canvas.width, canvas.height);



}

//  Compress function
 compress(file : File) : Observable<ICompressedImage> {
   this._currentFile = file ;
   return new Observable<ICompressedImage>(
     observer => {
       this._zone.runOutsideAngular(() => {
        const currentFile = file;

        const reader = new FileReader();
        reader.readAsDataURL(currentFile);
        reader.onload = this.readerOnload(observer);
       })

     }
   );
 }
}

// Image Data Interface
export interface ICompressedImage {
  name? : string;
  image? : File ;
  blob? : Blob ;
  imgUrl? : SafeUrl ;
}
