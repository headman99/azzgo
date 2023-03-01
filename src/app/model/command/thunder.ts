export class InsertThunderCommand {
    title:string;
    isactive:number;
    startdate:string;
	enddate: string;
    constructor(){
        this.title='';
        this.startdate='';
        this.enddate=''
        this.isactive=0;

    }
}

export class EditThunderCommand extends InsertThunderCommand {
    id:number;
	enddate: string;
    constructor(){
        super();
        this.id=null;
    }

}