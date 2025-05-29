<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->group(
    '',
    [
        'namespace' =>  'App\Controllers'
    ],
    static function ($routes) {
        $routes->get('/auth', 'AuthController::index', ['filter' => 'noauth']);
        $routes->post('auth', 'Auth\SignInController::studentauthenticate', ['filter' => 'noauth'], ['as' => 'auth']);

        $routes->get('/signup', 'Auth\SignUpController::index', ['filter' => 'noauth'], ['as' => 'student/sign-up']);
        $routes->post('studio-registration', 'Auth\SignUpController::RegisterStudents', ['filter' => 'noauth'], ['as' => 'student-registeration']);
        $routes->get('activate-account/(:any)', 'Auth\SignUpController::activateAccount/$1');

        $routes->get('reset-password-request', 'Auth\SignInController::forgotPassword', ['as' => 'reset-password-request']);
        $routes->post('reset-password-email', 'Auth\SignInController::sendResetLink', ['as' => 'reset-password-email']);

        $routes->get('reset-password', 'Auth\SignInController::AddNewPassword', ['as' => 'reset-password']);
        $routes->post('update-password', 'Auth\SignInController::updatePassword', ['as' => 'update-password']);

        $routes->get('privacy-policy', 'Home::privacy', ['as' => 'privacy-policy']);
        $routes->get('two-factor-authentication', 'Auth\SignInController::TwofcAuth', ['as' => 'two-factor-authentication']);
        $routes->get('logout', 'Auth\SignInController::logout', ['as' => 'logout']);
    }
);


$routes->get('/', 'Home::index');
$routes->get('/how-it-works', 'Home::HowItWorks');
$routes->get('/about-us', 'AboutController::index');
$routes->get('/auth', 'AuthController::index');
$routes->get('/reach-us', 'ContactController::index');
$routes->get('/studio-libraries', 'StudiosController::index');
$routes->get('/studio-details', 'StudiosController::StudioDetails');


$routes->group('', ['namespace' =>  'App\Controllers', 'filter' => 'role:Artist,webauthfilter'], static function ($routes) {
$routes->get('/dashboard', 'Users\DashboardController::index');
});

