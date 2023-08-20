<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Responses\Common\CreateResponse;
use App\Http\Controllers\Responses\Common\StoreResponse;
use App\Http\Controllers\Responses\Common\ShowResponse;
use App\Lib\Filter;

class UserRoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(10);

        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.roles')]
        ];
        return view('admin.roles.index',compact('breadcrumbs', 'roles'));
    }

    public function create()
    {
        $lang = $request->lang ?? App::getLocale();
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.roles'), 'link' => 'roles'],
            ['name' => __('admin.roles_create')]
        ];
        
        $view = view('admin.roles.content.create', compact('breadcrumbs', 'lang'))->render();
        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'permissions' => 'required|array',
        ]);
        
        $role = Role::updateOrCreate(
            ['name' => $request->name],
            ['description' => $request->description]
        ); 

        foreach ($request->permissions as $key => $value) {
            if($value !== null && !empty($value))
            {
                $permission = Permission::updateOrCreate([
                    'name' => $value,
                ]);

                $role->attachPermission($permission);
            }
        }

        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'modal' => '#commonModal',
            'status' => 'success', 
            'action' => 'replace',
            'message' => __('notifications.role_added'),
        ];

        return new StoreResponse($payload);
    }

    public function editRole($role)
    {
        $role = Role::findOrFail($role);
        dd($role);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.roles'), 'link' => 'roles'],
            ['name' => __('admin.rs_edit_title')]
        ];

        $view = view('admin.roles.content.edit', compact('breadcrumbs', 'role'))->render();

        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function delete(Role $role, Request $request)
    {
        $role->delete();
        
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'action' => 'replace',
            'status' => 'success', 
            'message' => __('notifications.delete_successfully'),
        ];

        return new ShowResponse($payload);
    }

    public function renderPage($type)
    {
        $filters = new Filter(Request(), new Role());
        $roles = $filters->toResponse();
        
        if($type == 'replace')
        {
            return view('admin.roles.content.table-wrapper', compact('roles'))->render();
        }
        else if($type == 'append')
        {
            return view('admin.roles.content.show', compact('roles'))->render();
        }
        
    }
}
