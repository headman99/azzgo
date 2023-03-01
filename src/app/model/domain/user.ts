export class UserLogged {
	access_token: string;
    user: User;
    constructor(_tkn,username,email){
        this.access_token = _tkn;
        this.user = new User(username,email)
    }
}

export class User {
	email: string;
	iduser: number;
	name: string;
	created_at: Date;
    updated_at: Date;
    mainphoto: any;
    roles: any;
    email_verified_at:any;
    store?: any;
    theme?:string;
    constructor(username,email){
        this.name = username,
        this.email = email;
    }
}
