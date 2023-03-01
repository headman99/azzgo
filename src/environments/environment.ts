// The file contents for the current environment will overwrite these during build.
// The build system defaults to the dev environment which uses `environment.ts`, but if you do
// `ng build --env=prod` then `environment.prod.ts` will be used instead.
// The list of which env maps to which file can be found in `.angular-cli.json`.
export const environment = {
	production: false,
	//endpoint: 'http://localhost/AzzGo-BE/',
	//endpoint: 'http://192.168.178.105/AzzGo-BE/',
	endpoint: 'http://be.azzgo.it/',
	//endpoint:"http://127.0.0.1:8000/",
	//endpoint: 'http://localhost/Azzgo/',
	//endpoint: 'http://192.168.1.8/Azzgo/',
	api: 'public/api/',
	//api:"api/",
	storage: 'storage/',
	// endpoint: 'http://10.0.2.2/AzzGo-BE/public/api/',
	GOOGLEMAPSKEY: 'AIzaSyAt5V1ZKQ_eOt9wJ19N_twSWTsJbzb6ZAA', 
	MOBILE: true,
	COMETCHATAPIKEY:'11a56ac2bccecdaa2d757c3231933d776316123d',
	COMETCHATAPP_ID:'34493f46b8e6b2c',
	ONE_SIGNAL_APPID:'376a0c12-e06e-4414-b310-52baad8c0eb8'
};

/*
 * In development mode, to ignore zone related error stack frames such as
 * `zone.run`, `zoneDelegate.invokeTask` for easier debugging, you can
 * import the following file, but please comment it out in production mode
 * because it will have performance impact when throw error
 */
import 'zone.js/dist/zone-error';  // Included with Angular CLI.
