import { Injectable } from '@angular/core';
import { Network } from '@ionic-native/network/ngx';
import { Subscription } from 'rxjs';
import { Toast } from './toast';

@Injectable({
	providedIn: 'root',
})
export class IonNetwork {
	disconnectSubscription: Subscription;
	connectSubscription: Subscription;
    connection:boolean=true;
	constructor(private network: Network,private toast:Toast) {

        this.watchDisconnection();
	}

	watchDisconnection() {
		this.disconnectSubscription = this.network.onDisconnect().subscribe(() => {
            this.toast.show('Non sei connesso ad internet');
            this.connection=false;
            this.watchConnection();
		});
	}

	watchConnection() {
		this.connectSubscription = this.network.onConnect().subscribe(() => {
            this.toast.hide();
            this.toast.show('Connessione ripristinata');
            this.connection=true;

			setTimeout(() => {
                this.toast.hide();
				if (this.network.type === 'wifi') {
					console.log('we got a wifi connection, woohoo!');
				}
			}, 3000);
		});
	}

	unSubscriberConnection() {
		this.connectSubscription.unsubscribe();
	}

	unSubscriberDisconnection() {
		this.disconnectSubscription.unsubscribe();
	}
}
