import { Component, ElementRef, EventEmitter, Input, OnInit, Output, ViewChild } from '@angular/core';
import { Platform } from '@ionic/angular';
import { Camera, CameraOptions } from '@ionic-native/camera/ngx';
import { File } from '@ionic-native/file/ngx';
import { WebView } from '@ionic-native/ionic-webview/ngx';
import { Alert } from '../../provider/alert';
import { ImageCompressorService } from './compressor.service';

@Component({
	selector: 'cfe-camera',
	templateUrl: './camera.component.html',
	styleUrls: ['./camera.component.scss'],
})
export class CameraComponent implements OnInit {
	constructor(private camera: Camera, private platform: Platform, private file: File, private webview: WebView, private alert: Alert, private comporessor:ImageCompressorService) {}
	@Output() onTakePhoto: EventEmitter<any> = new EventEmitter<any>();
	@Input() label: string = 'Aggiungi Foto';
	@Input() mode: 'mobile' | 'web' = 'mobile';
	@ViewChild('fileInput') fileInput: ElementRef;
	ngOnInit() {}

	async choosePhoto() {
		const options: CameraOptions = {
			quality: 50,
			destinationType: this.camera.DestinationType.DATA_URL,
			encodingType: this.camera.EncodingType.JPEG,
			sourceType: this.camera.PictureSourceType.SAVEDPHOTOALBUM,
		};

		await this.getPictureBase64(options);
	}
	async takePhoto() {
		const options: CameraOptions = {
			quality: 50,
			destinationType: this.camera.DestinationType.DATA_URL,
			encodingType: this.camera.EncodingType.JPEG,
		};

		await this.getPictureBase64(options);
	}

	async getPicture(options) {
		const tempImage = await this.camera.getPicture(options);

		try {
			const tempFilename = tempImage.substr(tempImage.lastIndexOf('/') + 1);
			const tempBaseFilesystemPath = tempImage.substr(0, tempImage.lastIndexOf('/') + 1);

			const newBaseFilesystemPath = this.file.dataDirectory;

			const _fileEntry = await this.file.copyFile(tempBaseFilesystemPath, tempFilename, newBaseFilesystemPath, tempFilename);

			const _file = await this.getFile(_fileEntry);
			const blobFile = await this.makeFileIntoBlob(_file);

			const storedPhoto = newBaseFilesystemPath + tempFilename;
			const displayImage = this.webview.convertFileSrc(storedPhoto);

			this.onTakePhoto.emit({ uri: displayImage, file: blobFile });
			//this.loader.dismiss();
		} catch (e) {
			//	this.loader.dismiss();
			this.alert.alertError('Attenzione', "Si è verificato un errore con l'inserimento dell'immagine");
			return new Error('Si è verificato un errore');
		}
	}

	async getPictureBase64(options) {
		const imageData = await this.camera.getPicture(options);

		try {
			const base64Image = 'data:image/jpeg;base64,' + imageData;
			const base64Response = await fetch(base64Image);
			const blobFile = await base64Response.blob();
			this.onTakePhoto.emit({ uri: base64Image, file: blobFile });
		} catch (e) {
			this.alert.alertError('Attenzione', "Si è verificato un errore con l'inserimento dell'immagine");
			return new Error('Si è verificato un errore');
		}
	}

	async makeFileIntoBlob(_fileEntry) {
		return new Promise((resolve, reject) => {
			var reader = new FileReader();
			reader.onloadend = (evt: any) => {
				var imgBlob: any = new Blob([evt.target.result], { type: 'application/image' });
				imgBlob.name = _fileEntry.name;
				resolve(imgBlob);
			};

			reader.onerror = (e) => {
				console.log('Failed file read: ' + e.toString());
				reject(e);
			};

			reader.readAsArrayBuffer(_fileEntry);
		});
	}

	async getFile(fileEntry) {
		try {
			return await new Promise((resolve, reject) => fileEntry.file(resolve, reject));
		} catch (err) {
			console.log(err);
		}
	}

	//mode web
	fileEvent(e) {
		this.preview(e.target.files);
	}

	preview(files) {
		if (files.length === 0) return;

		var mimeType = files[0].type;
		if (mimeType.match(/image\/*/) == null) {
			this.alert.show('Solo le immagini sono supportate!');
			return;
		}
		//this.filedata = files[0];
	/*	var reader = new FileReader();
		//this.imagePath = files;
		reader.readAsDataURL(files[0]);
		reader.onload = (_event) => {
			this.onTakePhoto.emit({ uri: reader.result, file: files[0] });
			this.fileInput.nativeElement.value = '';
		};*/
        this.comporessor.compress(files[0]).subscribe(resp=>{
            this.onTakePhoto.emit({ uri: resp.imgUrl, file: resp.blob });
			this.fileInput.nativeElement.value = '';
        })


	}

}
