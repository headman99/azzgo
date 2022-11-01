<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4SNmvLTUOyXJ91Xq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/registerCustomer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::N0a7ao7tywfoT6SE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/registerPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6Tq3kOjloq7ABusI',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/registerAdmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UKdhkE5dHPGcKIEd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9PL3kIe3RVZdOVlN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/checkEmailVerified' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2ghuasG7Ald1bzCc',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/sendVerificationMail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rGTRiOxKAwqLbbst',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/storecategories' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TODLXuqA4fIFe7v8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/searchproducts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8DMI8lsPkXACyRsV',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/searchpublisherbycategoryid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7jDPgcOF6BItOc0K',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/notificationtest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rRKE8bPORDj7AQyb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getinactivationpublishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DjhD0tfSKfX6CCkT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getinvalidationpublishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::X7w6YKj2JToWDJ2A',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/activatePublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kTWJRa0ajZpnkG7U',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/activateFullPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jAHZgj7Y33PaVKTK',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/validatePublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LFG9nVnvKqt1abRd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getActivePublishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qjMCh9FJfAhfofUO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getMarks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::72xzxOeo6LORuFTt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/manageUserBan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wyA1TlQpINvPWM8H',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/saveThunderdeal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wIXarlEjAlxZtFIt',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/deactivateThunderdeal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::d8a8422btM50zhcN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/editThunderdeal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KPFpX7UxbBIY5C8K',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getThunderdealsList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Hw10MxcGESiqWznT',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/getNotificationList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G5O26n7VUjsjqqHU',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/markAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kV5UrVp59V5Jw95z',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/admin/markAllAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fKeUTLgFUjvtiBr8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getAdsByPublisherId' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HOyGN1QXdcBPPu9i',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getProfile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HuJDcFHD3Xrc1ntE',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getContactTypes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EhPZGfaZtbPl3i3n',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/insertads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1Nm3gdT47nmBJ5RS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/editAds' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CU52seK2yUNXUbVd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/uploadPhoto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zkSGnmM3Av8ONBv1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/deletePhoto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rFkQejZ9bjN9uMDv',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/addContact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3njPq7Yba72Pi1iR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/editContact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9SnEW2XoAqi2IEtN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getRequestsHistory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::lFMtNzvXwhfQTh7s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/changeRequestStatus' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fBQnPjcd1QbbzzlG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/markCustomer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zo3z2URJZYYSCGKO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getPublisherFeedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o29bwfDcJBlIrVh8',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getPublisherFeedbackList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::H4UMc10OKdRMUcim',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getDiscountedProducts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cP3qB4XIRLfcfrdZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getAppointments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AOYgLgBbbZtWS85e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getCountFollow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BGBnx6D4VErlYfUF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getActiveThunderDealsList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UaSGeA1NilslaMgn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/insertThunderDealOfferOnProduct' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0T2loPT0XYOUqkUN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/editThunderDealOfferOnProduct' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1yEfGliwY9x7Ts1A',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/getNotificationList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ACqMIz4EspPQlxPR',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/markAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1mS8DcK6YZT78dEO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/markAllAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VvF56zVN4f7dSUOn',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/publisher/insertNotification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aw1eQPejyNosfmBQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getProfile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mRB0hF3H1OFYkMLG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getContactTypes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YcL7gMJpbsqVACjO',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/addItemToRequest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zNB1xt0DKQXWMMCJ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/deleteItemFromRequest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wL8ZpAdAkCRKaeuD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/addContact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::iHPESVcMWVYSWsX4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/editContact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QhX8NURMsgIDKbL7',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/sendRequestToPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4lorBTH7Pmtyk5sD',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getRequestsHistory' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TrSaNEsrphmqjDHZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getRequestSent' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::INYz9NrJpAwvLUZS',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getRequestPending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qLI6yYwYhc33dNkz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getRequestCountPending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9o1JrZEDezFNXzgt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/savePublisherFeedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6TC3b6GI8ctG9HVy',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getAllDiscountedProducts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qHgHmUrKPNc1bZhq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/saveProductFeedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NhBhNFOBl3QjfxL8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/proposeAppointment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fjGH3M9VUbBjHpn2',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/markPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SDEKSaMvN0YlZFbq',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/editAppointment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::IhgNAKMUvybo9CL0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/canPropose' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eY64Qkf5AvsExO9r',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/followPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ig9qKtYQHuYcnlC4',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/unFollowPublisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6VFI3PknU5cw4Sao',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getFollowed' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4S6Y8crdE0EBXePa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/favouriteProduct' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::coKzgCHB9mmKScNx',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/unFavouriteProduct' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VweWchnbhlsgDTG8',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getListOfFavouriteProducts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2nimjxFP3UpKJ0MM',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/addShippingAddressToRequest' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4DVGCCBosaw1CtRF',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getActiveThunderDealsList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ekQhNQsfqKEF1YGe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getNotificationList' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kszq9Ugq4qGpRBQy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/markAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fRlXmPVAIddAPtPP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/markAllAsRead' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bApNx1mUMAA5tUU0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/insertNotification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Gti5OIP61o2XVQ3o',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getPublisherProductSearch' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5z4BP8FOEpjUBNjG',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/customer/getPublishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sQR2BVEoCUUrUB34',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/profilePhoto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ozD8F4HmnITL1N8F',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getPreferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::0NMptyYrMlNQP7Vz',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/setPreferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OQDPUOdkEXHPgNjZ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/setPhotoTheme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fzmZEES6apXAafJ1',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/deletePreferences' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GCZOXhgdEgMDfXx9',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::O2rit9dkbqjNlr38',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/getUserInfo' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MlIi5eiFT89V0WXf',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3EqIu5bzF0fYautG',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/oauth/(?|tokens/([^/]++)(*:32)|clients/([^/]++)(?|(*:58))|personal\\-access\\-tokens/([^/]++)(*:99))|/api/(?|getprivacyandterms/([^/]++)(*:142)|admin/(?|get(?|publisher(?|/([^/]++)(*:186)|byname(?:/([^/]++)(?:/([^/]++))?)?(*:228))|MarkDetail/([^/]++)(*:256)|ThunderDetail/([^/]++)(*:286))|deleteregistration/([^/]++)(*:322))|publisher/(?|get(?|AdById/([^/]++)(*:365)|Request(?|s/([^/]++)(*:393)|Detail(?|/([^/]++)/([^/]++)(*:428)|sHistory/([^/]++)/([^/]++)(*:462)))|Product(?|Feedback(?|/([^/]++)(*:502)|List/([^/]++)(*:523))|Details/([^/]++)(*:548))|InfoBox/([^/]++)(*:573)|ThunderDeal(?|ById/([^/]++)(*:608)|ProductsList/([^/]++)(*:637)))|deleteadbyid/([^/]++)(*:668))|customer/(?|get(?|publisherbyname/([^/]++)(?:/([^/]++))?(*:733)|P(?|ublisher(?|Profile/([^/]++)(*:772)|Feedback(?|/([^/]++)(*:800)|List/([^/]++)(*:821)))|roduct(?|sByPublisher/([^/]++)(*:861)|Feedback(?|/([^/]++)(*:889)|List/([^/]++)(*:910))|Details/([^/]++)(*:935)))|Request(?|s/([^/]++)(*:965)|Detail(?|/([^/]++)/([^/]++)(*:1000)|sHistory/([^/]++)(*:1026)))|DiscountedProducts/([^/]++)(*:1064)|CountFollowForPublisher/([^/]++)(*:1105)|HasFollow/([^/]++)(*:1132)|FavouriteProduct/([^/]++)(*:1166)|ThunderDealProductsList/([^/]++)(*:1207))|hasVoted/([^/]++)(*:1234))|onesignalUpdatePlayerId/([^/]++)(*:1276)|verify/([^/]++)(*:1300))|/reset\\-password/([^/]++)(*:1335))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      58 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wAk3UHcUCdGQ0flr',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      186 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zUlKRUzZZ3vQykzZ',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      228 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uaJbIQGoQtRHVm6q',
            'businessname' => NULL,
            'active' => NULL,
          ),
          1 => 
          array (
            0 => 'businessname',
            1 => 'active',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      256 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Iv2QfR8DSBwaOXvI',
          ),
          1 => 
          array (
            0 => 'marked',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      286 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KvH9hINGvimQ0aTe',
          ),
          1 => 
          array (
            0 => 'thunderid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uH7kPO6qvb4dGUYq',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      365 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::OFlUjPmCqUMv7Lo7',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::naCim5IHNLeC1UeS',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      428 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Y7jyxA09BlCST83j',
          ),
          1 => 
          array (
            0 => 'userid',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      462 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::98ai2KFVUUgWdLXr',
          ),
          1 => 
          array (
            0 => 'userid',
            1 => 'groupcode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Je3jCnrGodXbvJHC',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      523 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g8LYtjJhg3Kofdaw',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      548 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::g6SwqezwfGOR7coU',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      573 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sg70AH3WWqGWvnoX',
          ),
          1 => 
          array (
            0 => 'groupcode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BC2IYIHcxmZobOnw',
          ),
          1 => 
          array (
            0 => 'thunderid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      637 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::RJqEyxB5tc5n8y4F',
          ),
          1 => 
          array (
            0 => 'thunderid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MeKNcLfN5pxGOqEn',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      733 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gfDSASTmuwJJY8MJ',
            'businessname' => NULL,
          ),
          1 => 
          array (
            0 => 'categorycode',
            1 => 'businessname',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      772 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zlCf59cmzSyNEqik',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      800 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7ERyhaSBbJFQD66O',
          ),
          1 => 
          array (
            0 => 'storeid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      821 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3AeDd57QhZ4Ylm01',
          ),
          1 => 
          array (
            0 => 'storeid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      861 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TWPFyRmtv9hm3jkf',
          ),
          1 => 
          array (
            0 => 'publisherid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      889 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fU0iLoUKnSYVKcMA',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      910 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zgtHMC60fFPtTAbF',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FBzVmclyOLWt5oE2',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ppFuJCAtKjYxLP0e',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1000 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::oBpRRzvul6m8Hwgh',
          ),
          1 => 
          array (
            0 => 'publisherid',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::GulfWJ3IgoAabvJi',
          ),
          1 => 
          array (
            0 => 'groupcode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1064 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rIkot4Su8YYclATm',
          ),
          1 => 
          array (
            0 => 'publisherid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1105 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bfD8miWpqfdXUx1q',
          ),
          1 => 
          array (
            0 => 'publisherid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1132 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bkaalUShgcSd67jY',
          ),
          1 => 
          array (
            0 => 'publisherid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1166 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wcxfJ4Po0iGizOOz',
          ),
          1 => 
          array (
            0 => 'productid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KN2GIwfi6lqzqzSl',
          ),
          1 => 
          array (
            0 => 'thunderid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1234 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xU8zZyWiRyO9NEIe',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SskggfVJPpGduki8',
          ),
          1 => 
          array (
            0 => 'playerid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1300 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.verify',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4SNmvLTUOyXJ91Xq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":289:{@qEGiv6LpFJExYYYwdU9CBFya0qJ0Cfj6g1lklTeTZWo=.a:5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000002c9904a5000000005af83cbd";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4SNmvLTUOyXJ91Xq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::N0a7ao7tywfoT6SE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/registerCustomer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@registerCustomer',
        'controller' => 'App\\Http\\Controllers\\AuthController@registerCustomer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::N0a7ao7tywfoT6SE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6Tq3kOjloq7ABusI' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/registerPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@registerPublisher',
        'controller' => 'App\\Http\\Controllers\\AuthController@registerPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6Tq3kOjloq7ABusI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UKdhkE5dHPGcKIEd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/registerAdmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@registerAdmin',
        'controller' => 'App\\Http\\Controllers\\AuthController@registerAdmin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UKdhkE5dHPGcKIEd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9PL3kIe3RVZdOVlN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9PL3kIe3RVZdOVlN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2ghuasG7Ald1bzCc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/checkEmailVerified',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@checkEmailVerified',
        'controller' => 'App\\Http\\Controllers\\AuthController@checkEmailVerified',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2ghuasG7Ald1bzCc',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rGTRiOxKAwqLbbst' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sendVerificationMail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@sendVerificationMail',
        'controller' => 'App\\Http\\Controllers\\AuthController@sendVerificationMail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rGTRiOxKAwqLbbst',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wAk3UHcUCdGQ0flr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getprivacyandterms/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\TermConditionController@getPrivacyAndTerms',
        'controller' => 'App\\Http\\Controllers\\TermConditionController@getPrivacyAndTerms',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wAk3UHcUCdGQ0flr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TODLXuqA4fIFe7v8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/storecategories',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\LookupController@getStoreCategories',
        'controller' => 'App\\Http\\Controllers\\LookupController@getStoreCategories',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TODLXuqA4fIFe7v8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::8DMI8lsPkXACyRsV' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/searchproducts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\PublicController@searchProducts',
        'controller' => 'App\\Http\\Controllers\\PublicController@searchProducts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8DMI8lsPkXACyRsV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7jDPgcOF6BItOc0K' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/searchpublisherbycategoryid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\PublicController@searchPublisherByCategoryId',
        'controller' => 'App\\Http\\Controllers\\PublicController@searchPublisherByCategoryId',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7jDPgcOF6BItOc0K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rRKE8bPORDj7AQyb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/notificationtest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\PublicController@sendNotification',
        'controller' => 'App\\Http\\Controllers\\PublicController@sendNotification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rRKE8bPORDj7AQyb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zUlKRUzZZ3vQykzZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getpublisher/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getPublisher',
        'controller' => 'App\\Http\\Controllers\\AdminController@getPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zUlKRUzZZ3vQykzZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::DjhD0tfSKfX6CCkT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getinactivationpublishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getInActivationPublishers',
        'controller' => 'App\\Http\\Controllers\\AdminController@getInActivationPublishers',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DjhD0tfSKfX6CCkT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::X7w6YKj2JToWDJ2A' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getinvalidationpublishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getInValidationPublishers',
        'controller' => 'App\\Http\\Controllers\\AdminController@getInValidationPublishers',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::X7w6YKj2JToWDJ2A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uaJbIQGoQtRHVm6q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getpublisherbyname/{businessname?}/{active?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getPublisherByName',
        'controller' => 'App\\Http\\Controllers\\AdminController@getPublisherByName',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::uaJbIQGoQtRHVm6q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::uH7kPO6qvb4dGUYq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/deleteregistration/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@deleteRegistration',
        'controller' => 'App\\Http\\Controllers\\AdminController@deleteRegistration',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::uH7kPO6qvb4dGUYq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::kTWJRa0ajZpnkG7U' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/activatePublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@activatePublisher',
        'controller' => 'App\\Http\\Controllers\\AdminController@activatePublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kTWJRa0ajZpnkG7U',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::jAHZgj7Y33PaVKTK' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/activateFullPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@activateFullPublisher',
        'controller' => 'App\\Http\\Controllers\\AdminController@activateFullPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jAHZgj7Y33PaVKTK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::LFG9nVnvKqt1abRd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/validatePublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@validatePublisher',
        'controller' => 'App\\Http\\Controllers\\AdminController@validatePublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LFG9nVnvKqt1abRd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qjMCh9FJfAhfofUO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getActivePublishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getActivePublishers',
        'controller' => 'App\\Http\\Controllers\\AdminController@getActivePublishers',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qjMCh9FJfAhfofUO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::72xzxOeo6LORuFTt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getMarks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getMarks',
        'controller' => 'App\\Http\\Controllers\\AdminController@getMarks',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::72xzxOeo6LORuFTt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Iv2QfR8DSBwaOXvI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getMarkDetail/{marked}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getMarkDetail',
        'controller' => 'App\\Http\\Controllers\\AdminController@getMarkDetail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Iv2QfR8DSBwaOXvI',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wyA1TlQpINvPWM8H' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/manageUserBan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@manageUserBan',
        'controller' => 'App\\Http\\Controllers\\AdminController@manageUserBan',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wyA1TlQpINvPWM8H',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wIXarlEjAlxZtFIt' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/saveThunderdeal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@saveThunderdeal',
        'controller' => 'App\\Http\\Controllers\\AdminController@saveThunderdeal',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wIXarlEjAlxZtFIt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::d8a8422btM50zhcN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/deactivateThunderdeal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@deactivateThunderdeal',
        'controller' => 'App\\Http\\Controllers\\AdminController@deactivateThunderdeal',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::d8a8422btM50zhcN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KPFpX7UxbBIY5C8K' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/editThunderdeal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@editThunderdeal',
        'controller' => 'App\\Http\\Controllers\\AdminController@editThunderdeal',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KPFpX7UxbBIY5C8K',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Hw10MxcGESiqWznT' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getThunderdealsList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getThunderdealsList',
        'controller' => 'App\\Http\\Controllers\\AdminController@getThunderdealsList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Hw10MxcGESiqWznT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KvH9hINGvimQ0aTe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getThunderDetail/{thunderid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getThunderDetail',
        'controller' => 'App\\Http\\Controllers\\AdminController@getThunderDetail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KvH9hINGvimQ0aTe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::G5O26n7VUjsjqqHU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/admin/getNotificationList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@getNotificationList',
        'controller' => 'App\\Http\\Controllers\\AdminController@getNotificationList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::G5O26n7VUjsjqqHU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::kV5UrVp59V5Jw95z' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/markAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@markAsRead',
        'controller' => 'App\\Http\\Controllers\\AdminController@markAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kV5UrVp59V5Jw95z',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fKeUTLgFUjvtiBr8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/admin/markAllAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Admin',
        ),
        'uses' => 'App\\Http\\Controllers\\AdminController@markAllAsRead',
        'controller' => 'App\\Http\\Controllers\\AdminController@markAllAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fKeUTLgFUjvtiBr8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HOyGN1QXdcBPPu9i' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getAdsByPublisherId',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getAdsByPublisherId',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getAdsByPublisherId',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HOyGN1QXdcBPPu9i',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::HuJDcFHD3Xrc1ntE' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getProfile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getProfile',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getProfile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HuJDcFHD3Xrc1ntE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::EhPZGfaZtbPl3i3n' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getContactTypes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getContactTypes',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getContactTypes',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EhPZGfaZtbPl3i3n',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OFlUjPmCqUMv7Lo7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getAdById/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getAdById',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getAdById',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::OFlUjPmCqUMv7Lo7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1Nm3gdT47nmBJ5RS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/insertads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@insertAds',
        'controller' => 'App\\Http\\Controllers\\PublisherController@insertAds',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1Nm3gdT47nmBJ5RS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::CU52seK2yUNXUbVd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/editAds',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@editAds',
        'controller' => 'App\\Http\\Controllers\\PublisherController@editAds',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::CU52seK2yUNXUbVd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MeKNcLfN5pxGOqEn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/deleteadbyid/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@deleteadbyid',
        'controller' => 'App\\Http\\Controllers\\PublisherController@deleteadbyid',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MeKNcLfN5pxGOqEn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zkSGnmM3Av8ONBv1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/uploadPhoto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@uploadPhoto',
        'controller' => 'App\\Http\\Controllers\\PublisherController@uploadPhoto',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zkSGnmM3Av8ONBv1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rFkQejZ9bjN9uMDv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/deletePhoto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@deletePhoto',
        'controller' => 'App\\Http\\Controllers\\PublisherController@deletePhoto',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rFkQejZ9bjN9uMDv',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3njPq7Yba72Pi1iR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/addContact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@addContact',
        'controller' => 'App\\Http\\Controllers\\PublisherController@addContact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::3njPq7Yba72Pi1iR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9SnEW2XoAqi2IEtN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/editContact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@editContact',
        'controller' => 'App\\Http\\Controllers\\PublisherController@editContact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9SnEW2XoAqi2IEtN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::naCim5IHNLeC1UeS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getRequests/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getRequests',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getRequests',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::naCim5IHNLeC1UeS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Y7jyxA09BlCST83j' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getRequestDetail/{userid}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getRequestDetails',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getRequestDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Y7jyxA09BlCST83j',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::lFMtNzvXwhfQTh7s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getRequestsHistory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getRequestsHistory',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getRequestsHistory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::lFMtNzvXwhfQTh7s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::98ai2KFVUUgWdLXr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getRequestDetailsHistory/{userid}/{groupcode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getRequestDetailsHistory',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getRequestDetailsHistory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::98ai2KFVUUgWdLXr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fBQnPjcd1QbbzzlG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/changeRequestStatus',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@changeRequestStatus',
        'controller' => 'App\\Http\\Controllers\\PublisherController@changeRequestStatus',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fBQnPjcd1QbbzzlG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zo3z2URJZYYSCGKO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/markCustomer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@markCustomer',
        'controller' => 'App\\Http\\Controllers\\PublisherController@markCustomer',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zo3z2URJZYYSCGKO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::o29bwfDcJBlIrVh8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getPublisherFeedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getPublisherFeedback',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getPublisherFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::o29bwfDcJBlIrVh8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::H4UMc10OKdRMUcim' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getPublisherFeedbackList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getPublisherFeedbackList',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getPublisherFeedbackList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::H4UMc10OKdRMUcim',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Je3jCnrGodXbvJHC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getProductFeedback/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getProductFeedback',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getProductFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Je3jCnrGodXbvJHC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::g8LYtjJhg3Kofdaw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getProductFeedbackList/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getProductFeedbackList',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getProductFeedbackList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::g8LYtjJhg3Kofdaw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::cP3qB4XIRLfcfrdZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getDiscountedProducts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getDiscountedProducts',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getDiscountedProducts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::cP3qB4XIRLfcfrdZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::AOYgLgBbbZtWS85e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getAppointments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getAppointments',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getAppointments',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::AOYgLgBbbZtWS85e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BGBnx6D4VErlYfUF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getCountFollow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getCountFollow',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getCountFollow',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BGBnx6D4VErlYfUF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sg70AH3WWqGWvnoX' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getInfoBox/{groupcode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getInfoBox',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getInfoBox',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::sg70AH3WWqGWvnoX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::UaSGeA1NilslaMgn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getActiveThunderDealsList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getActiveThunderDealsList',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getActiveThunderDealsList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UaSGeA1NilslaMgn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::BC2IYIHcxmZobOnw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getThunderDealById/{thunderid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getThunderDealById',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getThunderDealById',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BC2IYIHcxmZobOnw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::RJqEyxB5tc5n8y4F' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getThunderDealProductsList/{thunderid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getThunderDealProductsList',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getThunderDealProductsList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::RJqEyxB5tc5n8y4F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0T2loPT0XYOUqkUN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/insertThunderDealOfferOnProduct',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@insertThunderDealOfferOnProduct',
        'controller' => 'App\\Http\\Controllers\\PublisherController@insertThunderDealOfferOnProduct',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0T2loPT0XYOUqkUN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1yEfGliwY9x7Ts1A' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/editThunderDealOfferOnProduct',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@editThunderDealOfferOnProduct',
        'controller' => 'App\\Http\\Controllers\\PublisherController@editThunderDealOfferOnProduct',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1yEfGliwY9x7Ts1A',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ACqMIz4EspPQlxPR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getNotificationList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getNotificationList',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getNotificationList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ACqMIz4EspPQlxPR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::1mS8DcK6YZT78dEO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/markAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@markAsRead',
        'controller' => 'App\\Http\\Controllers\\PublisherController@markAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1mS8DcK6YZT78dEO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VvF56zVN4f7dSUOn' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/markAllAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@markAllAsRead',
        'controller' => 'App\\Http\\Controllers\\PublisherController@markAllAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VvF56zVN4f7dSUOn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::aw1eQPejyNosfmBQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/publisher/insertNotification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@insertNotification',
        'controller' => 'App\\Http\\Controllers\\PublisherController@insertNotification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aw1eQPejyNosfmBQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::g6SwqezwfGOR7coU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/publisher/getProductDetails/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Publisher',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\PublisherController@getProductDetails',
        'controller' => 'App\\Http\\Controllers\\PublisherController@getProductDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::g6SwqezwfGOR7coU',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::mRB0hF3H1OFYkMLG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getProfile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getProfile',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getProfile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mRB0hF3H1OFYkMLG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::YcL7gMJpbsqVACjO' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getContactTypes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getContactTypes',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getContactTypes',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::YcL7gMJpbsqVACjO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::gfDSASTmuwJJY8MJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getpublisherbyname/{categorycode}/{businessname?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublisherByName',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublisherByName',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gfDSASTmuwJJY8MJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zlCf59cmzSyNEqik' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getPublisherProfile/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublisherProfile',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublisherProfile',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zlCf59cmzSyNEqik',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zNB1xt0DKQXWMMCJ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/addItemToRequest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@addItemToRequest',
        'controller' => 'App\\Http\\Controllers\\CustomerController@addItemToRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zNB1xt0DKQXWMMCJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wL8ZpAdAkCRKaeuD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/deleteItemFromRequest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@deleteItemFromRequest',
        'controller' => 'App\\Http\\Controllers\\CustomerController@deleteItemFromRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wL8ZpAdAkCRKaeuD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ppFuJCAtKjYxLP0e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequests/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequest',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ppFuJCAtKjYxLP0e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::oBpRRzvul6m8Hwgh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestDetail/{publisherid}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestDetail',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestDetail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::oBpRRzvul6m8Hwgh',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TWPFyRmtv9hm3jkf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getProductsByPublisher/{publisherid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getProductsByPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getProductsByPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TWPFyRmtv9hm3jkf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::iHPESVcMWVYSWsX4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/addContact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@addContact',
        'controller' => 'App\\Http\\Controllers\\CustomerController@addContact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::iHPESVcMWVYSWsX4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::QhX8NURMsgIDKbL7' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/editContact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@editContact',
        'controller' => 'App\\Http\\Controllers\\CustomerController@editContact',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QhX8NURMsgIDKbL7',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4lorBTH7Pmtyk5sD' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/sendRequestToPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@sendRequestToPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@sendRequestToPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4lorBTH7Pmtyk5sD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::TrSaNEsrphmqjDHZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestsHistory',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestsHistory',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestsHistory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TrSaNEsrphmqjDHZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GulfWJ3IgoAabvJi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestDetailsHistory/{groupcode}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestDetailsHistory',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestDetailsHistory',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GulfWJ3IgoAabvJi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::INYz9NrJpAwvLUZS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestSent',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestSent',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestSent',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::INYz9NrJpAwvLUZS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qLI6yYwYhc33dNkz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestPending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestPending',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestPending',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qLI6yYwYhc33dNkz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::9o1JrZEDezFNXzgt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getRequestCountPending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getRequestCountPending',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getRequestCountPending',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9o1JrZEDezFNXzgt',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7ERyhaSBbJFQD66O' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getPublisherFeedback/{storeid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublisherFeedback',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublisherFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7ERyhaSBbJFQD66O',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3AeDd57QhZ4Ylm01' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getPublisherFeedbackList/{storeid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublisherFeedbackList',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublisherFeedbackList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::3AeDd57QhZ4Ylm01',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6TC3b6GI8ctG9HVy' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/savePublisherFeedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@savePublisherFeedback',
        'controller' => 'App\\Http\\Controllers\\CustomerController@savePublisherFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6TC3b6GI8ctG9HVy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fU0iLoUKnSYVKcMA' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getProductFeedback/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getProductFeedback',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getProductFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fU0iLoUKnSYVKcMA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::zgtHMC60fFPtTAbF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getProductFeedbackList/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getProductFeedbackList',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getProductFeedbackList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zgtHMC60fFPtTAbF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::FBzVmclyOLWt5oE2' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getProductDetails/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getProductDetails',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getProductDetails',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::FBzVmclyOLWt5oE2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::qHgHmUrKPNc1bZhq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getAllDiscountedProducts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getAllDiscountedProducts',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getAllDiscountedProducts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qHgHmUrKPNc1bZhq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::rIkot4Su8YYclATm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getDiscountedProducts/{publisherid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getDiscountedProducts',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getDiscountedProducts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rIkot4Su8YYclATm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::NhBhNFOBl3QjfxL8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/saveProductFeedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@saveProductFeedback',
        'controller' => 'App\\Http\\Controllers\\CustomerController@saveProductFeedback',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::NhBhNFOBl3QjfxL8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fjGH3M9VUbBjHpn2' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/proposeAppointment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@proposeAppointment',
        'controller' => 'App\\Http\\Controllers\\CustomerController@proposeAppointment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fjGH3M9VUbBjHpn2',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::SDEKSaMvN0YlZFbq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/markPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@markPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@markPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SDEKSaMvN0YlZFbq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::IhgNAKMUvybo9CL0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/editAppointment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@editAppointment',
        'controller' => 'App\\Http\\Controllers\\CustomerController@editAppointment',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::IhgNAKMUvybo9CL0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::eY64Qkf5AvsExO9r' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/canPropose',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@canPropose',
        'controller' => 'App\\Http\\Controllers\\CustomerController@canPropose',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eY64Qkf5AvsExO9r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::xU8zZyWiRyO9NEIe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/hasVoted/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@hasVoted',
        'controller' => 'App\\Http\\Controllers\\CustomerController@hasVoted',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xU8zZyWiRyO9NEIe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Ig9qKtYQHuYcnlC4' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/followPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@followPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@followPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Ig9qKtYQHuYcnlC4',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::6VFI3PknU5cw4Sao' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/unFollowPublisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@unFollowPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@unFollowPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6VFI3PknU5cw4Sao',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4S6Y8crdE0EBXePa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getFollowed',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getFollowed',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getFollowed',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4S6Y8crdE0EBXePa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::coKzgCHB9mmKScNx' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/favouriteProduct',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@favouriteProduct',
        'controller' => 'App\\Http\\Controllers\\CustomerController@favouriteProduct',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::coKzgCHB9mmKScNx',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::VweWchnbhlsgDTG8' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/unFavouriteProduct',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@unFavouriteProduct',
        'controller' => 'App\\Http\\Controllers\\CustomerController@unFavouriteProduct',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VweWchnbhlsgDTG8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bfD8miWpqfdXUx1q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getCountFollowForPublisher/{publisherid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getCountFollowForPublisher',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getCountFollowForPublisher',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bfD8miWpqfdXUx1q',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bkaalUShgcSd67jY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getHasFollow/{publisherid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getHasFollow',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getHasFollow',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bkaalUShgcSd67jY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::2nimjxFP3UpKJ0MM' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getListOfFavouriteProducts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getListOfFavouriteProducts',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getListOfFavouriteProducts',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2nimjxFP3UpKJ0MM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::wcxfJ4Po0iGizOOz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getFavouriteProduct/{productid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getFavouriteProduct',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getFavouriteProduct',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wcxfJ4Po0iGizOOz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::4DVGCCBosaw1CtRF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/addShippingAddressToRequest',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@addShippingAddressToRequest',
        'controller' => 'App\\Http\\Controllers\\CustomerController@addShippingAddressToRequest',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4DVGCCBosaw1CtRF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ekQhNQsfqKEF1YGe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getActiveThunderDealsList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getActiveThunderDealsList',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getActiveThunderDealsList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ekQhNQsfqKEF1YGe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::KN2GIwfi6lqzqzSl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getThunderDealProductsList/{thunderid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getThunderDealProductsList',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getThunderDealProductsList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KN2GIwfi6lqzqzSl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::kszq9Ugq4qGpRBQy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getNotificationList',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getNotificationList',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getNotificationList',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kszq9Ugq4qGpRBQy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fRlXmPVAIddAPtPP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/markAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@markAsRead',
        'controller' => 'App\\Http\\Controllers\\CustomerController@markAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fRlXmPVAIddAPtPP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::bApNx1mUMAA5tUU0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/markAllAsRead',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@markAllAsRead',
        'controller' => 'App\\Http\\Controllers\\CustomerController@markAllAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bApNx1mUMAA5tUU0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::Gti5OIP61o2XVQ3o' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/insertNotification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@insertNotification',
        'controller' => 'App\\Http\\Controllers\\CustomerController@insertNotification',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Gti5OIP61o2XVQ3o',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::5z4BP8FOEpjUBNjG' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/customer/getPublisherProductSearch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublisherProductSearch',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublisherProductSearch',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5z4BP8FOEpjUBNjG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::sQR2BVEoCUUrUB34' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/customer/getPublishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'role:Customer',
          3 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\CustomerController@getPublishers',
        'controller' => 'App\\Http\\Controllers\\CustomerController@getPublishers',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::sQR2BVEoCUUrUB34',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::ozD8F4HmnITL1N8F' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/profilePhoto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@profilePhoto',
        'controller' => 'App\\Http\\Controllers\\AuthController@profilePhoto',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ozD8F4HmnITL1N8F',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::SskggfVJPpGduki8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/onesignalUpdatePlayerId/{playerid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@onesignalUpdatePlayerId',
        'controller' => 'App\\Http\\Controllers\\AuthController@onesignalUpdatePlayerId',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SskggfVJPpGduki8',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::0NMptyYrMlNQP7Vz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getPreferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@getPreferences',
        'controller' => 'App\\Http\\Controllers\\AuthController@getPreferences',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0NMptyYrMlNQP7Vz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::OQDPUOdkEXHPgNjZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/setPreferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@setPreferences',
        'controller' => 'App\\Http\\Controllers\\AuthController@setPreferences',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::OQDPUOdkEXHPgNjZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::fzmZEES6apXAafJ1' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/setPhotoTheme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@themePhoto',
        'controller' => 'App\\Http\\Controllers\\AuthController@themePhoto',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fzmZEES6apXAafJ1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::GCZOXhgdEgMDfXx9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/deletePreferences',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
          2 => 'is_verify_email',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@deletePreferences',
        'controller' => 'App\\Http\\Controllers\\AuthController@deletePreferences',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GCZOXhgdEgMDfXx9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::O2rit9dkbqjNlr38' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::O2rit9dkbqjNlr38',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::MlIi5eiFT89V0WXf' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/getUserInfo',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@getUserInfo',
        'controller' => 'App\\Http\\Controllers\\AuthController@getUserInfo',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MlIi5eiFT89V0WXf',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'user.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/verify/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@verifyAccount',
        'controller' => 'App\\Http\\Controllers\\AuthController@verifyAccount',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'user.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3EqIu5bzF0fYautG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::3EqIu5bzF0fYautG',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotController@forgotpassword',
        'controller' => 'App\\Http\\Controllers\\ForgotController@forgotpassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotController@forgotpasswordstore',
        'controller' => 'App\\Http\\Controllers\\ForgotController@forgotpasswordstore',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotController@resetpassword',
        'controller' => 'App\\Http\\Controllers\\ForgotController@resetpassword',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\ForgotController@resetpasswordstore',
        'controller' => 'App\\Http\\Controllers\\ForgotController@resetpasswordstore',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
