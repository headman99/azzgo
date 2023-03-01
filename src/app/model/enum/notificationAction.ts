export enum NotificationActionEnum {
    REQUEST_ACCEPTED= "REQUEST_ACCEPTED",// title 'E' stata accettata la tua richiesta', descrizione: 'Vai alle tue richieste' --- evento
    REQUEST_ARRIVED="REQUEST_ARRIVED", /// title:'E' arrivata una nuova richiesta',descrizione:'Vai alle tue richeiste'
    REQUEST_DENIED="REQUEST_DENIED", ///  title:'E' stat negata una richiesta di acquisto, descrizione: 'Vai alle tue richieste'
  
    FAVOURITE_PRODUCT="FAVOURITE_PRODUCT",// title: 'Quacuno ha messo nei preferiti un tuo annuncio', descrizione: 'Vai ai tuoi annunci'

   
  
    NEW_REQUEST_SIGNUP="NEW_REQUEST_SIGNUP",// title:' 'Un azienda ha richiesto di iscriversi ad AzzGo', descrizione: 'Vai alle richieste di registrazione' 
    

    NEW_PRODUCT_FOLLOW="NEW_PRODUCT_FOLLOW",// title: 'Un azienda che segui ha minserito un nuovo annuncio',descrizione: 'Vai alla ricerca dei prodotti' 
  
    NEW_OFFER_FOLLOW = 'NEW_OFFER_FOLLOW' // un azienda che segue ha inserito una nuova offerta

}