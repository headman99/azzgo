<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/*** PUBLIC ****/
Route::group(['middleware' => 'guest'], function () {
    Route::post('/registerCustomer', 'AuthController@registerCustomer');
    Route::post('/registerPublisher', 'AuthController@registerPublisher');
    Route::post('/registerAdmin', 'AuthController@registerAdmin');
    Route::post('/login', 'AuthController@login');
    Route::post('/sendVerificationMail', 'AuthController@sendVerificationMail');
    Route::post("/checkEmailVerified","AuthController@checkEmailVerified");
    Route::get('/getprivacyandterms/{type}', 'TermConditionController@getPrivacyAndTerms');
    Route::get('/storecategories', 'LookupController@getStoreCategories');
    Route::post('/searchproducts', 'PublicController@searchProducts');
    Route::post('/searchpublisherbycategoryid', 'PublicController@searchPublisherByCategoryId');
    Route::get('/notificationtest', 'PublicController@sendNotification');
});

/*** ADMIN ****/
Route::group(['middleware' => ['auth:api', 'role:Admin']], function () {
    Route::get('/admin/getpublisher/{id}', 'AdminController@getPublisher');
    Route::get('/admin/getinactivationpublishers', 'AdminController@getInActivationPublishers');
    Route::get('/admin/getinvalidationpublishers', 'AdminController@getInValidationPublishers');
    Route::get('/admin/getpublisherbyname/{businessname?}/{active?}', 'AdminController@getPublisherByName');
    Route::get('/admin/deleteregistration/{id}', 'AdminController@deleteRegistration');
    Route::post('/admin/activatePublisher', 'AdminController@activatePublisher');
    Route::post('/admin/activateFullPublisher', 'AdminController@activateFullPublisher');
    Route::post('/admin/validatePublisher', 'AdminController@validatePublisher');
    Route::get('/admin/getActivePublishers', 'AdminController@getActivePublishers');
    Route::get('/admin/getMarks', 'AdminController@getMarks');
    Route::get('/admin/getMarkDetail/{marked}', 'AdminController@getMarkDetail');
    Route::post('/admin/manageUserBan', 'AdminController@manageUserBan');
    Route::post('/admin/saveThunderdeal', 'AdminController@saveThunderdeal');
    Route::post('/admin/deactivateThunderdeal', 'AdminController@deactivateThunderdeal');
    Route::post('/admin/editThunderdeal', 'AdminController@editThunderdeal');
    Route::get('/admin/getThunderdealsList', 'AdminController@getThunderdealsList');
    Route::get('/admin/getThunderDetail/{thunderid}', 'AdminController@getThunderDetail');
    Route::get('/admin/getNotificationList', 'AdminController@getNotificationList');
    Route::post('/admin/markAsRead', 'AdminController@markAsRead');
    Route::post('/admin/markAllAsRead', 'AdminController@markAllAsRead');
});

/*** STORE ****/
Route::group(['middleware' => ['auth:api', 'role:Publisher', 'is_verify_email']], function () {
    Route::get('/publisher/getAdsByPublisherId', 'PublisherController@getAdsByPublisherId');
    Route::get('/publisher/getProfile', 'PublisherController@getProfile');
    Route::get('/publisher/getContactTypes', 'PublisherController@getContactTypes');
    Route::get('/publisher/getAdById/{id}', 'PublisherController@getAdById');
    Route::post('/publisher/insertads', 'PublisherController@insertAds');
    Route::post('/publisher/editAds', 'PublisherController@editAds');
    Route::get('/publisher/deleteadbyid/{id}', 'PublisherController@deleteadbyid');
    Route::post('/publisher/uploadPhoto', 'PublisherController@uploadPhoto');
    Route::post('/publisher/deletePhoto', 'PublisherController@deletePhoto');
    Route::post('/publisher/addContact', 'PublisherController@addContact');
    Route::post('/publisher/editContact', 'PublisherController@editContact');
    Route::get('/publisher/getRequests/{status}', 'PublisherController@getRequests');
    Route::get('/publisher/getRequestDetail/{userid}/{status}', 'PublisherController@getRequestDetails');
    Route::get('/publisher/getRequestsHistory', 'PublisherController@getRequestsHistory');
    Route::get('/publisher/getRequestDetailsHistory/{userid}/{groupcode}', 'PublisherController@getRequestDetailsHistory');
    Route::post('/publisher/changeRequestStatus', 'PublisherController@changeRequestStatus');
    Route::post('/publisher/markCustomer', 'PublisherController@markCustomer');
    Route::get('/publisher/getPublisherFeedback', 'PublisherController@getPublisherFeedback');
    Route::get('/publisher/getPublisherFeedbackList', 'PublisherController@getPublisherFeedbackList');
    Route::get('/publisher/getProductFeedback/{productid}', 'PublisherController@getProductFeedback');
    Route::get('/publisher/getProductFeedbackList/{productid}', 'PublisherController@getProductFeedbackList');
    Route::get('/publisher/getDiscountedProducts', 'PublisherController@getDiscountedProducts');
    Route::get('/publisher/getAppointments', 'PublisherController@getAppointments');

    Route::get('/publisher/getCountFollow', 'PublisherController@getCountFollow');

    Route::get('/publisher/getInfoBox/{groupcode}', 'PublisherController@getInfoBox');

    /*thunderdeal*/
    Route::get('/publisher/getActiveThunderDealsList', 'PublisherController@getActiveThunderDealsList');
    Route::get('/publisher/getThunderDealById/{thunderid}', 'PublisherController@getThunderDealById');
    Route::get('/publisher/getThunderDealProductsList/{thunderid}', 'PublisherController@getThunderDealProductsList');
    Route::post('/publisher/insertThunderDealOfferOnProduct', 'PublisherController@insertThunderDealOfferOnProduct');
    Route::post('/publisher/editThunderDealOfferOnProduct', 'PublisherController@editThunderDealOfferOnProduct');

    Route::get('/publisher/getNotificationList', 'PublisherController@getNotificationList');
    Route::post('/publisher/markAsRead', 'PublisherController@markAsRead');
    Route::post('/publisher/markAllAsRead', 'PublisherController@markAllAsRead');
    Route::post('/publisher/insertNotification', 'PublisherController@insertNotification');

    Route::get('/publisher/getProductDetails/{productid}', 'PublisherController@getProductDetails');
});

/*** CUSTOMER ****/
Route::group(['middleware' => ['auth:api', 'role:Customer', 'is_verify_email']], function () {
    Route::get('/customer/getProfile', 'CustomerController@getProfile');
    Route::get('/customer/getContactTypes', 'CustomerController@getContactTypes');
    Route::get('/customer/getpublisherbyname/{categorycode}/{businessname?}', 'CustomerController@getPublisherByName');
    Route::get('/customer/getPublisherProfile/{id}', 'CustomerController@getPublisherProfile');
    Route::post('/customer/addItemToRequest', 'CustomerController@addItemToRequest');
    Route::post('/customer/deleteItemFromRequest', 'CustomerController@deleteItemFromRequest');
    Route::get('/customer/getRequests/{status}', 'CustomerController@getRequest');
    Route::get('/customer/getRequestDetail/{publisherid}/{status}', 'CustomerController@getRequestDetail');
    Route::get('/customer/getProductsByPublisher/{publisherid}', 'CustomerController@getProductsByPublisher');
    Route::post('/customer/addContact', 'CustomerController@addContact');
    Route::post('/customer/editContact', 'CustomerController@editContact');
    Route::post('/customer/sendRequestToPublisher', 'CustomerController@sendRequestToPublisher');
    Route::get('/customer/getRequestsHistory', 'CustomerController@getRequestsHistory');
    Route::get('/customer/getRequestDetailsHistory/{groupcode}', 'CustomerController@getRequestDetailsHistory');
    /**to be defined**/
    Route::get('/customer/getRequestSent', 'CustomerController@getRequestSent');
    Route::get('/customer/getRequestPending', 'CustomerController@getRequestPending');
    Route::get('/customer/getRequestCountPending', 'CustomerController@getRequestCountPending');
    Route::get('/customer/getPublisherFeedback/{storeid}', 'CustomerController@getPublisherFeedback');
    Route::get('/customer/getPublisherFeedbackList/{storeid}', 'CustomerController@getPublisherFeedbackList');
    Route::post('/customer/savePublisherFeedback', 'CustomerController@savePublisherFeedback');
    Route::get('/customer/getProductFeedback/{productid}', 'CustomerController@getProductFeedback');
    Route::get('/customer/getProductFeedbackList/{productid}', 'CustomerController@getProductFeedbackList');
    Route::get('/customer/getProductDetails/{productid}', 'CustomerController@getProductDetails');
    Route::get('/customer/getAllDiscountedProducts', 'CustomerController@getAllDiscountedProducts');
    Route::get('/customer/getDiscountedProducts/{publisherid}', 'CustomerController@getDiscountedProducts');
    Route::post('/customer/saveProductFeedback', 'CustomerController@saveProductFeedback');
    Route::post('/customer/proposeAppointment', 'CustomerController@proposeAppointment');
    Route::post('/customer/markPublisher', 'CustomerController@markPublisher');
    Route::post('/customer/editAppointment', 'CustomerController@editAppointment');
    Route::post('/customer/canPropose', 'CustomerController@canPropose');
    Route::get('/customer/hasVoted/{id}', 'CustomerController@hasVoted');

    Route::post('/customer/followPublisher', 'CustomerController@followPublisher');
    Route::post('/customer/unFollowPublisher', 'CustomerController@unFollowPublisher');
    Route::get('/customer/getFollowed', 'CustomerController@getFollowed');
    Route::post('/customer/favouriteProduct', 'CustomerController@favouriteProduct');
    Route::post('/customer/unFavouriteProduct', 'CustomerController@unFavouriteProduct');
    Route::get('/customer/getCountFollowForPublisher/{publisherid}', 'CustomerController@getCountFollowForPublisher');
    Route::get('/customer/getHasFollow/{publisherid}', 'CustomerController@getHasFollow');
    Route::get('/customer/getListOfFavouriteProducts', 'CustomerController@getListOfFavouriteProducts');

    Route::get('/customer/getFavouriteProduct/{productid}', 'CustomerController@getFavouriteProduct');

    Route::post('/customer/addShippingAddressToRequest', 'CustomerController@addShippingAddressToRequest');

    /*thunderdeal*/
    Route::get('/customer/getActiveThunderDealsList', 'CustomerController@getActiveThunderDealsList');
    Route::get('/customer/getThunderDealProductsList/{thunderid}', 'CustomerController@getThunderDealProductsList');

    Route::get('/customer/getNotificationList', 'CustomerController@getNotificationList');
    Route::post('/customer/markAsRead', 'CustomerController@markAsRead');
    Route::post('/customer/markAllAsRead', 'CustomerController@markAllAsRead');
    Route::post('/customer/insertNotification', 'CustomerController@insertNotification');

    Route::post('/customer/getPublisherProductSearch', 'CustomerController@getPublisherProductSearch');
    Route::get('customer/getPublishers','CustomerController@getPublishers');
});

Route::group(['middleware' => ['auth:api', 'is_verify_email']], function () {
    Route::post('/profilePhoto', 'AuthController@profilePhoto');
    Route::get('/onesignalUpdatePlayerId/{playerid}', 'AuthController@onesignalUpdatePlayerId');
    Route::get('/getPreferences', 'AuthController@getPreferences');
    Route::post('/setPreferences', 'AuthController@setPreferences');
    Route::post('/setPhotoTheme', 'AuthController@themePhoto');
    Route::get('/deletePreferences', 'AuthController@deletePreferences');
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/logout', 'AuthController@logout');
    Route::get('/getUserInfo','AuthController@getUserInfo');
});

Route::get('/verify', 'AuthController@verifyAccount')->name('user.verify');
