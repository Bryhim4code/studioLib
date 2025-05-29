<?php

namespace App\Filters;

use App\Models\Role;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    protected $permissions;
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get user role from session
        $role = session()->get('role');

        if (!$role || empty($arguments)) {
            return redirect()->back()->with('warning', 'You are not authorized to access this resource.');
        }

        // Check if the role is in the allowed roles
        if (!in_array($role, $arguments)) {
            return redirect()->back()->with('warning', 'You are not authorized to access this resource.');
        }
    }
    // public function before(RequestInterface $request, $arguments = null)
    // {
    //     $this->permissions = $arguments ?? [];

    //     // Get user role from session
    //     $roleName = session()->get('role');
    //     $roleModel = new Role();

    //     if (!$roleName || empty($this->permissions)) {
    //         return redirect()->back()->with('warning', 'You are not authorized to access this resource');
    //     }

    //     // Find role by name instead of ID
    //     $roleObject = $roleModel->findByName($roleName);
    //     if (!$roleObject || !is_object($roleObject)) {
    //         return redirect()->back()->with('warning', 'You are not authorized to access this resource. Cant find Role');
    //     }

    //     $userPermissions = $roleObject->getPermissions();
    //     if (!is_array($userPermissions)) {
    //         return redirect()->back()->with('warning', 'You are not authorized to access this resource. no permission');
    //     }

    //     // $hasPermission = array_intersect($userPermissions, $this->permissions);

    //     // if (empty($hasPermission)) {
    //     //     return redirect()->back()->with('warning', 'You are not authorized to access this resource. you dont have permission');
    //     // }
    // }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
