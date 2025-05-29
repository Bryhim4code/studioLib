<?php
// $routes->setDefaultNamespace('Modules\Ticketing\Controllers');

$routes->group('admin', [
    'namespace' => '\Modules\Administration\Controllers',
    'filter' => 'webauthfilter'
    // 'filter' => 'role:STAFF,ADMIN,webauthfilter'
], static function ($routes) {    //Ticketing 
    $routes->get('profile/', 'AdminProfileController::index');
    $routes->get('profile/setting', 'AdminProfileController::ProfileSettings');
    $routes->post('profile/details/update/(:any)', 'AdminProfileController::DetailsUpdate/$1');
    $routes->post('password/change/(:any)', 'AdminProfileController::passwordUpdate/$1');

    // ======================= daashboard 
    $routes->get('dashboard', 'AdminDashboardController::index');

    // ======================= daashboard 
    $routes->get('bookings', 'BookingDashboardController::index');
    $routes->get('all-booking-sessions', 'BookingDashboardController::AllSessionsBookings');

    // ======================= daashboard 
    $routes->get('bookings/payment/summary/(:num)', 'BookingDashboardController::paymentSummary/$1');
    $routes->get('bookings/payment/summary/checkin/(:num)', 'BookingDashboardController::Studentcheckin/$1');
    $routes->get('bookings/payment/verification/(:num)', 'BookingDashboardController::PaymentVerify/$1');
    $routes->get('bookings/backend-payment/(:num)', 'BookingDashboardController::BackendPayments/$1');

    // ======================= daashboard 
    $routes->get('room/master', 'RoomDashboardController::index');
    $routes->get('maintanance/details', 'MaintananceDashboardController::index');

    $routes->get('create-users', 'CreateUsersController::index', ['filter' => 'role:ADMIN,']);
    $routes->get('user-list', 'CreateUsersController::userlist');
    $routes->post('create-users', 'CreateUsersController::Register', ['filter' => 'role:ADMIN,']);
    $routes->get('user/activation/(:num)', 'CreateUsersController::ActivateUser/$1', ['filter' => 'role:ADMIN,']);
    $routes->get('user/deactivation/(:num)', 'CreateUsersController::DeactivateUser/$1', ['filter' => 'role:ADMIN,']);
    $routes->get('user/details/(:num)', 'CreateUsersController::userDetails/$1', ['filter' => 'role:ADMIN,']);
    $routes->post('user/update-admin-details/(:num)', 'CreateUsersController::passwordnewUpdate/$1', ['filter' => 'role:ADMIN,']);

    $routes->get('all-sessions', 'AdminDashboardController::listSession');
    $routes->get('session/create', 'AdminDashboardController::createSession',['filter' => 'role:ADMIN,']);
    $routes->post('session/create', 'AdminDashboardController::createSession',['filter' => 'role:ADMIN,']);
    $routes->get('session/edit/(:num)', 'AdminDashboardController::editSession/$1',['filter' => 'role:ADMIN,']);
    $routes->post('session/edit/(:num)', 'AdminDashboardController::editSession/$1',['filter' => 'role:ADMIN,']);
    $routes->get('session/delete/(:num)', 'AdminDashboardController::deleteSession/$1',['filter' => 'role:ADMIN,']);
    $routes->get('session/allow-payment/(:num)', 'AdminDashboardController::allowPayments/$1',['filter' => 'role:ADMIN,']);
    $routes->get('session/status/(:num)', 'AdminDashboardController::sessionStatus/$1',['filter' => 'role:ADMIN,']);



    $routes->get('announcements', 'AdminDashboardController::listAnnouncements');
    $routes->get('announcements/create', 'AdminDashboardController::createAnnouncement',['filter' => 'role:ADMIN,']);
    $routes->post('announcements/create', 'AdminDashboardController::createAnnouncement',['filter' => 'role:ADMIN,']);
    $routes->get('announcements/edit/(:num)', 'AdminDashboardController::editAnnouncement/$1',['filter' => 'role:ADMIN,']);
    $routes->post('announcements/edit/(:num)', 'AdminDashboardController::editAnnouncement/$1',['filter' => 'role:ADMIN,']);
    $routes->get('announcements/delete/(:num)', 'AdminDashboardController::deleteAnnouncement/$1',['filter' => 'role:ADMIN,']);



    $routes->get('residents/list', 'ResidentProfileController::index');
    $routes->get('residents/details/view/(:num)', 'ResidentProfileController::Profiledetails/$1');

    $routes->get('residents/kyc-status/(:num)', 'ResidentProfileController::AproveKYC/$1',['filter' => 'role:ADMIN,']);
    $routes->get('payment/status/(:num)', 'BookingDashboardController::Codepayment/$1',['filter' => 'role:ADMIN,']);

    $routes->post('bookings/reset-paid-status', 'BookingDashboardController::resetPaidStatus');
    $routes->get('payments-codes', 'BookingDashboardController::Code');
});
