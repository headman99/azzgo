import { NotificationActionEnum } from "../enum/notificationAction";
import { NotificationTypeEnum } from "../enum/notificationType";

export class InsertNotification {
    type:NotificationTypeEnum;
    action:NotificationActionEnum;
    title:string;
    description:string;
    userid:number;
}