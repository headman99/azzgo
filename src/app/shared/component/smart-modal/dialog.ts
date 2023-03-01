export class DialogOption{
    icon?:string;
    title:string;
    message?:string;
    type?:'info' | 'danger' |'success'
    buttons:DialogButton[];
    content: any;
}

export class DialogButton{
    text:string;
    class:string;
    action:Function
}
