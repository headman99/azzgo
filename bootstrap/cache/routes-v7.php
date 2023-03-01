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
            '_route' => 'generated::jHyeVLuIiAhSB5gE',
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
            '_route' => 'generated::IEkh74s32vQa2Q5X',
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
            '_route' => 'generated::i1mBva0SyvLxkRQT',
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
            '_route' => 'generated::26j62EL7Lvqmdmwy',
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
            '_route' => 'generated::W7yhthYnIzlAF68m',
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
            '_route' => 'generated::SBrcoYG80tcdv0Mi',
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
            '_route' => 'generated::Pkr3PAv2r2PFpRp9',
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
            '_route' => 'generated::3yvjirBP5ejwv5GN',
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
            '_route' => 'generated::zDYCcYIS4xx9oafx',
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
            '_route' => 'generated::AusAeupZvgAYwCzU',
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
            '_route' => 'generated::do4yATwViw2MUfAW',
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
            '_route' => 'generated::EAulsbduBrAPrtcF',
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
            '_route' => 'generated::l6sm8d5dJ2lR8Bob',
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
            '_route' => 'generated::Qawn1SroW8oewY4K',
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
            '_route' => 'generated::RjSlkC3hwG0A4V0D',
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
            '_route' => 'generated::r2QlVhu13ZV0suYp',
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
            '_route' => 'generated::eFJsrDAirLNAGbxk',
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
            '_route' => 'generated::fzKNmMggGCEzyKH9',
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
            '_route' => 'generated::TitYpg1mnr9tTHhE',
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
            '_route' => 'generated::NBYa6kQ7b34xjiR5',
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
            '_route' => 'generated::KqqryI5FWEFsldJB',
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
            '_route' => 'generated::O9GlmY7UmeBIaxzn',
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
            '_route' => 'generated::bq3T9PiA4lgPLBU9',
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
            '_route' => 'generated::WbdgWeTlBDkP6xsW',
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
            '_route' => 'generated::s3jScsTluZBDar57',
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
            '_route' => 'generated::FLl6MMxazEZuWVI7',
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
            '_route' => 'generated::YpFufwlK51R3DK41',
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
            '_route' => 'generated::eLuiY78CrwPZODap',
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
            '_route' => 'generated::HwgNwEawd5NT1Xxj',
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
            '_route' => 'generated::zjb8Ey5Aii2koA4e',
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
            '_route' => 'generated::PgjBSD4tJs4xygc0',
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
            '_route' => 'generated::m0ji2VuaAmRwCseo',
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
            '_route' => 'generated::2m4HzO6E8gHYGHgo',
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
            '_route' => 'generated::1Rcq1sJrOjmt15f3',
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
            '_route' => 'generated::hY55KQwBYakbsWNC',
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
            '_route' => 'generated::0Imy1DaTPxHeMyXt',
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
            '_route' => 'generated::Xe43VB22qOjFXkMq',
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
            '_route' => 'generated::0c4NXhb3QT1S3r9P',
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
            '_route' => 'generated::acMGdayvcpY6rwTf',
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
            '_route' => 'generated::WaNxbrnK4ajMmtBI',
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
            '_route' => 'generated::Go5tC6vQaWqLAOqw',
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
            '_route' => 'generated::ZfHCecGxQeqZ1fSl',
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
            '_route' => 'generated::JuQ59axkZN23fat2',
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
            '_route' => 'generated::PmWoVVm1Vko9IyoK',
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
            '_route' => 'generated::Lhy7lAaU18EGk5W8',
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
            '_route' => 'generated::dHFsjkHVEml1mBTB',
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
            '_route' => 'generated::uZ1phUNnvJFKtLME',
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
            '_route' => 'generated::2K5JyhkDJqWLNdnZ',
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
            '_route' => 'generated::N48J3RCJzYkSGpPj',
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
            '_route' => 'generated::LamgtCRiy23lYT9w',
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
            '_route' => 'generated::IXD03RJ9m9IIuMsV',
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
            '_route' => 'generated::vOKs286cfQLYXvHz',
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
            '_route' => 'generated::0pJXBatffp2vg03Z',
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
            '_route' => 'generated::N2lBo41ajCFgmbKg',
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
            '_route' => 'generated::hVxgIgrVDyu5u9Y9',
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
            '_route' => 'generated::1tAS9nryzubpcLFU',
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
            '_route' => 'generated::OO5WAmS40LOW5kYf',
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
            '_route' => 'generated::K1wyeaYP8zcOiBZ0',
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
            '_route' => 'generated::abUDZWweBz2v4bwY',
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
            '_route' => 'generated::BPFuTcvBIgEWCqif',
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
            '_route' => 'generated::X7LsXxiKFS8V8VTr',
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
            '_route' => 'generated::KeAEE5QHOJNYQ6bB',
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
            '_route' => 'generated::8OpPIpjoANbFMbfp',
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
            '_route' => 'generated::jvrBXvj8yfDS0KJ0',
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
            '_route' => 'generated::FnQjFqyeOC7EQKVk',
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
            '_route' => 'generated::JeRRBsHjV0ufdVBI',
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
            '_route' => 'generated::kcY5CnDYMy4x8C27',
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
            '_route' => 'generated::2cK7ynfAao1U1Zyi',
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
            '_route' => 'generated::09xVyk0TnDX90sHd',
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
            '_route' => 'generated::2BsWys5zGFU2PoMm',
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
            '_route' => 'generated::bozIxQb8ij4JXg3X',
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
            '_route' => 'generated::NvU1TCzgTKsFidFg',
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
            '_route' => 'generated::4lSjdhdFReObnPOr',
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
            '_route' => 'generated::trIlxwXBrTsTcVK8',
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
            '_route' => 'generated::8cXc9rjh6Zqv7EB5',
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
            '_route' => 'generated::eyiD7sYTYuI8zdoj',
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
            '_route' => 'generated::mdmZqyPQNFKBWeGV',
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
            '_route' => 'generated::jRDkBNnhcRv6j1QT',
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
            '_route' => 'generated::rGRxhpPDCPkySpES',
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
            '_route' => 'generated::UhdQYpP7Q9PFPNqJ',
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
            '_route' => 'generated::s5CNDSc7YXDQxeVQ',
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
            '_route' => 'generated::BMKfvoJSWMrYvkzv',
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
            '_route' => 'generated::ZDGjOichxk67RKth',
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
            '_route' => 'generated::5YpVM5O40dedEx2W',
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
            '_route' => 'generated::A2Mt5Wxehl8uW4U3',
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
            '_route' => 'generated::zJRxl5OLQdvl6Krd',
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
            '_route' => 'generated::5M8E1wfT6bmgsz55',
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
            '_route' => 'generated::7gbBgSgZZSLzBfDq',
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
            '_route' => 'generated::Yu2dr7NCH52tELWI',
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
            '_route' => 'generated::7hkzyHGMzlEsvhEh',
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
            '_route' => 'generated::F8xEiAhe7kPonCCd',
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
            '_route' => 'generated::IdwyUBCQVR5aYsXV',
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
            '_route' => 'generated::8RzDAMeo9qXIMaaB',
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
            '_route' => 'generated::TseE2PIJw1S7HQNE',
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
            '_route' => 'generated::NkdlCuvpcWug2NWs',
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
            '_route' => 'generated::ziUZrRubGde6ANrI',
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
            '_route' => 'generated::jJ2AwLFZFML96qnV',
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
            '_route' => 'generated::RmbgNXdWLHq0W02T',
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
            '_route' => 'generated::CBuTAWrnaT9eq2kF',
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
            '_route' => 'generated::ia5ImwFr0trZmwcs',
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
            '_route' => 'generated::guFTAxs2XpehKQNT',
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
            '_route' => 'generated::HozSHWj4zUDI325p',
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
            '_route' => 'generated::3TndFHzM1uEn3Mgk',
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
            '_route' => 'generated::1wPIotciEb4aB17a',
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
            '_route' => 'generated::d1pHK6mzaO43fPsf',
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
            '_route' => 'generated::64dguGszwZbZ3dMS',
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
            '_route' => 'generated::CJwVBjjJ5HQMQQDi',
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
            '_route' => 'generated::n4OIVlvNfBNs9d4B',
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
            '_route' => 'generated::LaO1nhpU97ZU8pMK',
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
            '_route' => 'generated::XfyiRAxbH78dv3jT',
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
            '_route' => 'generated::8DlFwJK27pxQLkvz',
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
            '_route' => 'generated::2pyAceBLlwFxfjfD',
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
            '_route' => 'generated::w03gzFy7NygNQZEJ',
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
            '_route' => 'generated::9LXrEHBgULYSTbjl',
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
            '_route' => 'generated::zKvpuHLqM1lY48zw',
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
            '_route' => 'generated::0OllboDr0fweIORo',
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
            '_route' => 'generated::3feR0baihsiX5uHF',
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
            '_route' => 'generated::dEO1IfzD9yT8PtZH',
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
            '_route' => 'generated::JL7ymri1tHizUPHR',
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
            '_route' => 'generated::IDkB0wiB206TVlZu',
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
            '_route' => 'generated::aMs2g27j0dpcwLwH',
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
            '_route' => 'generated::G9Uv3U22wxCqXije',
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
            '_route' => 'generated::yN52BiCCGmDuPkor',
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
            '_route' => 'generated::9WtqfU9oxDdfaDNc',
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
            '_route' => 'generated::11rioxx8SEgdMO8C',
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
    'generated::jHyeVLuIiAhSB5gE' => 
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
        'uses' => 'C:32:"Opis\\Closure\\SerializableClosure":289:{@iREDYOji2l7uZe89vVS9NrpHKWmhld2A/TX5rSZfczs=.a:5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000028040ffa000000003745a2e4";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jHyeVLuIiAhSB5gE',
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
    'generated::IEkh74s32vQa2Q5X' => 
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
        'as' => 'generated::IEkh74s32vQa2Q5X',
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
    'generated::i1mBva0SyvLxkRQT' => 
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
        'as' => 'generated::i1mBva0SyvLxkRQT',
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
    'generated::26j62EL7Lvqmdmwy' => 
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
        'as' => 'generated::26j62EL7Lvqmdmwy',
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
    'generated::W7yhthYnIzlAF68m' => 
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
        'as' => 'generated::W7yhthYnIzlAF68m',
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
    'generated::SBrcoYG80tcdv0Mi' => 
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
        'as' => 'generated::SBrcoYG80tcdv0Mi',
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
    'generated::Pkr3PAv2r2PFpRp9' => 
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
        'as' => 'generated::Pkr3PAv2r2PFpRp9',
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
    'generated::F8xEiAhe7kPonCCd' => 
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
        'as' => 'generated::F8xEiAhe7kPonCCd',
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
    'generated::3yvjirBP5ejwv5GN' => 
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
        'as' => 'generated::3yvjirBP5ejwv5GN',
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
    'generated::zDYCcYIS4xx9oafx' => 
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
        'as' => 'generated::zDYCcYIS4xx9oafx',
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
    'generated::AusAeupZvgAYwCzU' => 
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
        'as' => 'generated::AusAeupZvgAYwCzU',
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
    'generated::do4yATwViw2MUfAW' => 
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
        'as' => 'generated::do4yATwViw2MUfAW',
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
    'generated::IdwyUBCQVR5aYsXV' => 
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
        'as' => 'generated::IdwyUBCQVR5aYsXV',
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
    'generated::EAulsbduBrAPrtcF' => 
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
        'as' => 'generated::EAulsbduBrAPrtcF',
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
    'generated::l6sm8d5dJ2lR8Bob' => 
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
        'as' => 'generated::l6sm8d5dJ2lR8Bob',
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
    'generated::8RzDAMeo9qXIMaaB' => 
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
        'as' => 'generated::8RzDAMeo9qXIMaaB',
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
    'generated::ziUZrRubGde6ANrI' => 
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
        'as' => 'generated::ziUZrRubGde6ANrI',
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
    'generated::Qawn1SroW8oewY4K' => 
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
        'as' => 'generated::Qawn1SroW8oewY4K',
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
    'generated::RjSlkC3hwG0A4V0D' => 
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
        'as' => 'generated::RjSlkC3hwG0A4V0D',
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
    'generated::r2QlVhu13ZV0suYp' => 
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
        'as' => 'generated::r2QlVhu13ZV0suYp',
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
    'generated::eFJsrDAirLNAGbxk' => 
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
        'as' => 'generated::eFJsrDAirLNAGbxk',
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
    'generated::fzKNmMggGCEzyKH9' => 
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
        'as' => 'generated::fzKNmMggGCEzyKH9',
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
    'generated::TseE2PIJw1S7HQNE' => 
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
        'as' => 'generated::TseE2PIJw1S7HQNE',
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
    'generated::TitYpg1mnr9tTHhE' => 
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
        'as' => 'generated::TitYpg1mnr9tTHhE',
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
    'generated::NBYa6kQ7b34xjiR5' => 
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
        'as' => 'generated::NBYa6kQ7b34xjiR5',
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
    'generated::KqqryI5FWEFsldJB' => 
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
        'as' => 'generated::KqqryI5FWEFsldJB',
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
    'generated::O9GlmY7UmeBIaxzn' => 
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
        'as' => 'generated::O9GlmY7UmeBIaxzn',
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
    'generated::bq3T9PiA4lgPLBU9' => 
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
        'as' => 'generated::bq3T9PiA4lgPLBU9',
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
    'generated::NkdlCuvpcWug2NWs' => 
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
        'as' => 'generated::NkdlCuvpcWug2NWs',
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
    'generated::WbdgWeTlBDkP6xsW' => 
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
        'as' => 'generated::WbdgWeTlBDkP6xsW',
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
    'generated::s3jScsTluZBDar57' => 
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
        'as' => 'generated::s3jScsTluZBDar57',
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
    'generated::FLl6MMxazEZuWVI7' => 
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
        'as' => 'generated::FLl6MMxazEZuWVI7',
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
    'generated::YpFufwlK51R3DK41' => 
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
        'as' => 'generated::YpFufwlK51R3DK41',
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
    'generated::eLuiY78CrwPZODap' => 
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
        'as' => 'generated::eLuiY78CrwPZODap',
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
    'generated::HwgNwEawd5NT1Xxj' => 
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
        'as' => 'generated::HwgNwEawd5NT1Xxj',
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
    'generated::jJ2AwLFZFML96qnV' => 
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
        'as' => 'generated::jJ2AwLFZFML96qnV',
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
    'generated::zjb8Ey5Aii2koA4e' => 
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
        'as' => 'generated::zjb8Ey5Aii2koA4e',
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
    'generated::PgjBSD4tJs4xygc0' => 
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
        'as' => 'generated::PgjBSD4tJs4xygc0',
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
    'generated::CJwVBjjJ5HQMQQDi' => 
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
        'as' => 'generated::CJwVBjjJ5HQMQQDi',
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
    'generated::m0ji2VuaAmRwCseo' => 
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
        'as' => 'generated::m0ji2VuaAmRwCseo',
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
    'generated::2m4HzO6E8gHYGHgo' => 
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
        'as' => 'generated::2m4HzO6E8gHYGHgo',
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
    'generated::1Rcq1sJrOjmt15f3' => 
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
        'as' => 'generated::1Rcq1sJrOjmt15f3',
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
    'generated::hY55KQwBYakbsWNC' => 
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
        'as' => 'generated::hY55KQwBYakbsWNC',
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
    'generated::RmbgNXdWLHq0W02T' => 
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
        'as' => 'generated::RmbgNXdWLHq0W02T',
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
    'generated::CBuTAWrnaT9eq2kF' => 
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
        'as' => 'generated::CBuTAWrnaT9eq2kF',
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
    'generated::0Imy1DaTPxHeMyXt' => 
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
        'as' => 'generated::0Imy1DaTPxHeMyXt',
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
    'generated::ia5ImwFr0trZmwcs' => 
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
        'as' => 'generated::ia5ImwFr0trZmwcs',
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
    'generated::Xe43VB22qOjFXkMq' => 
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
        'as' => 'generated::Xe43VB22qOjFXkMq',
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
    'generated::0c4NXhb3QT1S3r9P' => 
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
        'as' => 'generated::0c4NXhb3QT1S3r9P',
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
    'generated::acMGdayvcpY6rwTf' => 
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
        'as' => 'generated::acMGdayvcpY6rwTf',
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
    'generated::WaNxbrnK4ajMmtBI' => 
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
        'as' => 'generated::WaNxbrnK4ajMmtBI',
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
    'generated::guFTAxs2XpehKQNT' => 
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
        'as' => 'generated::guFTAxs2XpehKQNT',
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
    'generated::HozSHWj4zUDI325p' => 
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
        'as' => 'generated::HozSHWj4zUDI325p',
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
    'generated::Go5tC6vQaWqLAOqw' => 
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
        'as' => 'generated::Go5tC6vQaWqLAOqw',
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
    'generated::ZfHCecGxQeqZ1fSl' => 
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
        'as' => 'generated::ZfHCecGxQeqZ1fSl',
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
    'generated::JuQ59axkZN23fat2' => 
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
        'as' => 'generated::JuQ59axkZN23fat2',
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
    'generated::1wPIotciEb4aB17a' => 
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
        'as' => 'generated::1wPIotciEb4aB17a',
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
    'generated::PmWoVVm1Vko9IyoK' => 
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
        'as' => 'generated::PmWoVVm1Vko9IyoK',
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
    'generated::d1pHK6mzaO43fPsf' => 
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
        'as' => 'generated::d1pHK6mzaO43fPsf',
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
    'generated::64dguGszwZbZ3dMS' => 
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
        'as' => 'generated::64dguGszwZbZ3dMS',
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
    'generated::Lhy7lAaU18EGk5W8' => 
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
        'as' => 'generated::Lhy7lAaU18EGk5W8',
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
    'generated::dHFsjkHVEml1mBTB' => 
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
        'as' => 'generated::dHFsjkHVEml1mBTB',
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
    'generated::uZ1phUNnvJFKtLME' => 
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
        'as' => 'generated::uZ1phUNnvJFKtLME',
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
    'generated::2K5JyhkDJqWLNdnZ' => 
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
        'as' => 'generated::2K5JyhkDJqWLNdnZ',
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
    'generated::N48J3RCJzYkSGpPj' => 
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
        'as' => 'generated::N48J3RCJzYkSGpPj',
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
    'generated::LamgtCRiy23lYT9w' => 
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
        'as' => 'generated::LamgtCRiy23lYT9w',
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
    'generated::3TndFHzM1uEn3Mgk' => 
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
        'as' => 'generated::3TndFHzM1uEn3Mgk',
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
    'generated::IXD03RJ9m9IIuMsV' => 
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
        'as' => 'generated::IXD03RJ9m9IIuMsV',
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
    'generated::vOKs286cfQLYXvHz' => 
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
        'as' => 'generated::vOKs286cfQLYXvHz',
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
    'generated::n4OIVlvNfBNs9d4B' => 
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
        'as' => 'generated::n4OIVlvNfBNs9d4B',
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
    'generated::LaO1nhpU97ZU8pMK' => 
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
        'as' => 'generated::LaO1nhpU97ZU8pMK',
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
    'generated::0pJXBatffp2vg03Z' => 
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
        'as' => 'generated::0pJXBatffp2vg03Z',
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
    'generated::N2lBo41ajCFgmbKg' => 
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
        'as' => 'generated::N2lBo41ajCFgmbKg',
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
    'generated::0OllboDr0fweIORo' => 
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
        'as' => 'generated::0OllboDr0fweIORo',
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
    'generated::3feR0baihsiX5uHF' => 
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
        'as' => 'generated::3feR0baihsiX5uHF',
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
    'generated::2pyAceBLlwFxfjfD' => 
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
        'as' => 'generated::2pyAceBLlwFxfjfD',
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
    'generated::hVxgIgrVDyu5u9Y9' => 
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
        'as' => 'generated::hVxgIgrVDyu5u9Y9',
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
    'generated::1tAS9nryzubpcLFU' => 
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
        'as' => 'generated::1tAS9nryzubpcLFU',
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
    'generated::OO5WAmS40LOW5kYf' => 
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
        'as' => 'generated::OO5WAmS40LOW5kYf',
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
    'generated::K1wyeaYP8zcOiBZ0' => 
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
        'as' => 'generated::K1wyeaYP8zcOiBZ0',
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
    'generated::dEO1IfzD9yT8PtZH' => 
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
        'as' => 'generated::dEO1IfzD9yT8PtZH',
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
    'generated::abUDZWweBz2v4bwY' => 
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
        'as' => 'generated::abUDZWweBz2v4bwY',
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
    'generated::BPFuTcvBIgEWCqif' => 
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
        'as' => 'generated::BPFuTcvBIgEWCqif',
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
    'generated::X7LsXxiKFS8V8VTr' => 
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
        'as' => 'generated::X7LsXxiKFS8V8VTr',
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
    'generated::XfyiRAxbH78dv3jT' => 
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
        'as' => 'generated::XfyiRAxbH78dv3jT',
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
    'generated::8DlFwJK27pxQLkvz' => 
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
        'as' => 'generated::8DlFwJK27pxQLkvz',
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
    'generated::KeAEE5QHOJNYQ6bB' => 
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
        'as' => 'generated::KeAEE5QHOJNYQ6bB',
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
    'generated::w03gzFy7NygNQZEJ' => 
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
        'as' => 'generated::w03gzFy7NygNQZEJ',
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
    'generated::9LXrEHBgULYSTbjl' => 
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
        'as' => 'generated::9LXrEHBgULYSTbjl',
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
    'generated::zKvpuHLqM1lY48zw' => 
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
        'as' => 'generated::zKvpuHLqM1lY48zw',
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
    'generated::8OpPIpjoANbFMbfp' => 
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
        'as' => 'generated::8OpPIpjoANbFMbfp',
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
    'generated::JL7ymri1tHizUPHR' => 
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
        'as' => 'generated::JL7ymri1tHizUPHR',
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
    'generated::jvrBXvj8yfDS0KJ0' => 
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
        'as' => 'generated::jvrBXvj8yfDS0KJ0',
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
    'generated::FnQjFqyeOC7EQKVk' => 
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
        'as' => 'generated::FnQjFqyeOC7EQKVk',
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
    'generated::JeRRBsHjV0ufdVBI' => 
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
        'as' => 'generated::JeRRBsHjV0ufdVBI',
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
    'generated::kcY5CnDYMy4x8C27' => 
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
        'as' => 'generated::kcY5CnDYMy4x8C27',
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
    'generated::2cK7ynfAao1U1Zyi' => 
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
        'as' => 'generated::2cK7ynfAao1U1Zyi',
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
    'generated::9WtqfU9oxDdfaDNc' => 
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
        'as' => 'generated::9WtqfU9oxDdfaDNc',
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
    'generated::09xVyk0TnDX90sHd' => 
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
        'as' => 'generated::09xVyk0TnDX90sHd',
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
    'generated::2BsWys5zGFU2PoMm' => 
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
        'as' => 'generated::2BsWys5zGFU2PoMm',
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
    'generated::bozIxQb8ij4JXg3X' => 
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
        'as' => 'generated::bozIxQb8ij4JXg3X',
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
    'generated::NvU1TCzgTKsFidFg' => 
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
        'as' => 'generated::NvU1TCzgTKsFidFg',
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
    'generated::4lSjdhdFReObnPOr' => 
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
        'as' => 'generated::4lSjdhdFReObnPOr',
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
    'generated::IDkB0wiB206TVlZu' => 
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
        'as' => 'generated::IDkB0wiB206TVlZu',
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
    'generated::aMs2g27j0dpcwLwH' => 
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
        'as' => 'generated::aMs2g27j0dpcwLwH',
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
    'generated::trIlxwXBrTsTcVK8' => 
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
        'as' => 'generated::trIlxwXBrTsTcVK8',
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
    'generated::G9Uv3U22wxCqXije' => 
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
        'as' => 'generated::G9Uv3U22wxCqXije',
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
    'generated::8cXc9rjh6Zqv7EB5' => 
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
        'as' => 'generated::8cXc9rjh6Zqv7EB5',
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
    'generated::eyiD7sYTYuI8zdoj' => 
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
        'as' => 'generated::eyiD7sYTYuI8zdoj',
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
    'generated::yN52BiCCGmDuPkor' => 
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
        'as' => 'generated::yN52BiCCGmDuPkor',
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
    'generated::mdmZqyPQNFKBWeGV' => 
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
        'as' => 'generated::mdmZqyPQNFKBWeGV',
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
    'generated::jRDkBNnhcRv6j1QT' => 
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
        'as' => 'generated::jRDkBNnhcRv6j1QT',
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
    'generated::rGRxhpPDCPkySpES' => 
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
        'as' => 'generated::rGRxhpPDCPkySpES',
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
    'generated::UhdQYpP7Q9PFPNqJ' => 
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
        'as' => 'generated::UhdQYpP7Q9PFPNqJ',
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
    'generated::s5CNDSc7YXDQxeVQ' => 
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
        'as' => 'generated::s5CNDSc7YXDQxeVQ',
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
    'generated::BMKfvoJSWMrYvkzv' => 
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
        'as' => 'generated::BMKfvoJSWMrYvkzv',
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
    'generated::ZDGjOichxk67RKth' => 
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
        'as' => 'generated::ZDGjOichxk67RKth',
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
    'generated::11rioxx8SEgdMO8C' => 
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
        'as' => 'generated::11rioxx8SEgdMO8C',
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
    'generated::5YpVM5O40dedEx2W' => 
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
        'as' => 'generated::5YpVM5O40dedEx2W',
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
    'generated::A2Mt5Wxehl8uW4U3' => 
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
        'as' => 'generated::A2Mt5Wxehl8uW4U3',
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
    'generated::zJRxl5OLQdvl6Krd' => 
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
        'as' => 'generated::zJRxl5OLQdvl6Krd',
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
    'generated::5M8E1wfT6bmgsz55' => 
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
        'as' => 'generated::5M8E1wfT6bmgsz55',
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
    'generated::7gbBgSgZZSLzBfDq' => 
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
        'as' => 'generated::7gbBgSgZZSLzBfDq',
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
    'generated::Yu2dr7NCH52tELWI' => 
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
        'as' => 'generated::Yu2dr7NCH52tELWI',
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
    'generated::7hkzyHGMzlEsvhEh' => 
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
        'as' => 'generated::7hkzyHGMzlEsvhEh',
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
