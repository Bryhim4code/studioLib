<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    public $viewBag;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
function _get_new_uuid($lenght = 40)
        {
            // uniqid gives 13 chars, but you could adjust it to your needs.
            if (function_exists("random_bytes")) {
                $bytes = random_bytes(ceil($lenght / 2));
            } elseif (function_exists("openssl_random_pseudo_bytes")) {
                $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
                // } else {
                //     throw new Exception("no cryptographically secure random function available");
            }
            return substr(
                bin2hex($bytes),
                0,
                $lenght
            );
        }

        // Preload any models, libraries, etc, here.
        function generateRandomString($length = 22)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return trim($randomString);
        }
        function usernameAttach($length = 7)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return trim($randomString);
        }

        function generate_emr_id()
        {
            // Generate current year and month in YY-MM format
            $currentYearMonth = date('y-m');
            // Generate a random alphanumeric string
            $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
            // Construct the ID
            return "EMR-$currentYearMonth-$randomString";
        }
        function generate_tck_id()
        {
            // Generate current year and month in YY-MM format
            $currentYearMonth = date('y-m');
            // Generate a random alphanumeric string
            $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
            // Construct the ID
            return "TKT-$currentYearMonth-$randomString";
        }
        function generate_student_id()
        {
            // Generate current year and month in YY-MM format
            $currentYearMonth = date('y-m');
            // Generate a random alphanumeric string
            $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
            // Construct the ID
            return "STU-$currentYearMonth-$randomString";
        }
        // E.g.: $this->session = service('session');
    }
}
