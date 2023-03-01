export class LoginCommand {
	email: string;
	password: string;
}

export class LogoutCommand {
	email: string;
	password: string;
}

export class RegisterCommand {
	email: string;
	password: string;
	name: string;
	password_confirmation: string;
    consent1: boolean;
    consent2: boolean;
    consent3: boolean;
    consent4: boolean;
	phone: string;
	constructor() {
		this.email = null;
		this.password = null;
		this.name = null;
		this.password_confirmation = null;
        this.consent1 = false;
        this.consent2=false;
        this.consent3=false;
        this.consent4=false;
        this.phone = null;
	}
}

export class PublisherRegisterCommand {
	//   /AzzGo-BE/public/api/registerPublisher
	name: string;
	businessname: string;
	vatnumber: string;
	email: string;
	password: string;
	password_confirmation: string;
	phone: string;
	category: string;
	address: string;
	latitude: string;
	longitude: string;
    consent1: boolean;
    consent2: boolean;
    consent3: boolean;
    consent4: boolean;
    constructor(){
        this.name=null;
        this.businessname=null;
        this.vatnumber=null;
        this.email=null;
        this.password=null;
        this.password_confirmation=null;
        this.phone=null;
        this.category=null;
        this.address=null;
        this.latitude=null;
        this.longitude=null;
        this.consent1 = false;
        this.consent2=false;
        this.consent3=false;
        this.consent4=false;
    }
}
