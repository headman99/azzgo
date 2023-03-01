export class InsertAdsCommand {
    title:string;
    description:string;
    price:string;
    isoffer:boolean
    saleprice:string;
    percent :string;
    startdate:string;
	enddate: string;
    isvetrina: any;
    constructor(){
        this.title='';
        this.description='';
        this.price=''
        this.isoffer=false;

    }
}

export class EditAdsCommand extends InsertAdsCommand {
    id:number;
	enddate: string;

    constructor(){
        super();
        this.id=null;
    }

}

