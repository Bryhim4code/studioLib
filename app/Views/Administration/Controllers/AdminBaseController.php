<?php

namespace Modules\Administration\Controllers;

use \CodeIgniter\Controller;
use \CodeIgniter\HTTP\CLIRequest;
use \CodeIgniter\HTTP\IncomingRequest;
use \CodeIgniter\HTTP\RequestInterface;
use \CodeIgniter\HTTP\ResponseInterface;
use Modules\Administration\Models\ModuleLinksModel;
use \Psr\Log\LoggerInterface;
use App\Libraries\Util;
use App\Libraries\FetchUtil;


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
abstract class AdminBaseController extends \CodeIgniter\Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    public $util;
    public $session;
    public $viewBag;
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // $this->util =  new Util();
        $this->session = \Config\Services::session();
        $this->session->start();

        $router = service('router');
        $controller  = $router->controllerName();
        $method = $router->methodName();
        $cArray = explode('\\', $controller);
        $controller = $cArray[(count($cArray) - 1)];

        switch ($controller) {
            case 'AdminCustomerController':
            case 'AdminPaymentHistoryController':
                $this->viewBag['activeMenu'] = 'customers';
                break;
            case 'AdminManageGroups':
            case 'AdminManageProfiles':
            case 'AdminManageLimitations':
            case 'AdminSetupController':
            case 'AdminManageProfileLimitations':
                $this->viewBag['activeMenu'] = 'profiles';
                break;
            case 'AdminManageUsers':
                $this->viewBag['activeMenu'] = 'settings';
                break;
            default:
                $this->viewBag['activeMenu'] = 'customers';
                break;
        }


        $userRole = session()->roleid;

        switch ($controller) {
            case 'AdminManageGroups':
            case 'AdminManageProfiles':
            case 'AdminManageLimitations':
            case 'AdminSetupController':
            case 'AdminManageProfileLimitations':

                if ($userRole  != 'SUPER_ADMIN') {
                    $this->util->toast(ERROR, ' Permission denied');
                    return redirect()->back();
                }
                break;
            case 'AdminManageUsers':
                if (
                    $userRole  != 'SUPER_ADMIN'
                    && ($method == 'index'
                        || $method == 'updateuser'
                        || $method == 'createuser'
                        || $method == 'createuseraction')
                ) {
                    $this->util->toast(ERROR, ' Permission denied');
                    return redirect()->back();
                }
                break;

            default:
                $this->viewBag['activeMenu'] = 'customers';
                break;
        }

        function usernameAttach($length = 12)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return trim($randomString);
        } {
            // Generate current year and month in YY-MM format
            $currentYearMonth = date('y-m');
            // Generate a random alphanumeric string
            $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
            // Construct the ID
            return "STU-$currentYearMonth-$randomString";
        }

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
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }



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
            return substr(bin2hex($bytes), 0, $lenght);
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
        function generate_bks_id()
        {
            // Generate current year and month in YY-MM format
            $currentYearMonth = date('y-m');
            // Generate a random alphanumeric string
            $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
            // Construct the ID
            return "BKS-$currentYearMonth-$randomString";
        }


}
