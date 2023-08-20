<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Lib\Filter;
use App\Models\Log;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Exports\UserLogsExport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Responses\Common\ShowResponse;
use App\Http\Controllers\Responses\Common\StoreResponse;
use App\Http\Controllers\Responses\Common\CommonResponse;
use App\Http\Controllers\Responses\Common\CreateResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_name','<>','admin')->orderBy('id', 'DESC')->paginate(25);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.users')],
        ];
        return view('admin.users.index',compact('breadcrumbs', 'users'));
    }

    public function userByRank($rank)
    {
        $users = User::where('role_name','<>','admin')
            ->where('role_name',$rank)
            ->orderBy('id', 'DESC')->paginate(25);

        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.users'), 'link' => route('admin.users')],
            ['name' => __('admin.sh_'.$rank.'_title')]
        ];
        return view('admin.users.index',compact('breadcrumbs', 'rank', 'users'));
    }
    
    public function editUser(User $user)
    {
        $roles = Role::all();
        $activities = Activity::where('causer_id',$user->id)->get();

        $userLogs = Log::where('user_id', $user->id)->get();

        $working_hours = $user->working_hours;        
        $normal_hour_price = $user->normal_hour_price;        
        $extra_hour_price = $user->extra_hour_price;

        $rating = 0;
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'], 
            ['name' => __('admin.users'), 'link' => 'users'],
            ['name' => __('admin.users_edit')]
        ];
        return view('admin.users.content.edit',compact('working_hours' ,'normal_hour_price' ,'extra_hour_price', 'breadcrumbs', 'user', 'roles', 'rating', 'activities', 'userLogs'));
    }
    public function userStatement(User $user)
    {
        $roles = Role::all();
        $activities = Activity::where('causer_id',$user->id)->get();

        $userLogs = Log::where('user_id', $user->id)->get();

        $working_hours = $user->working_hours;        
        $normal_hour_price = $user->normal_hour_price;        
        $extra_hour_price = $user->extra_hour_price;

        $rating = 0;
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'], 
            ['name' => __('admin.users'), 'link' => 'users'],
            ['name' => __('admin.users_edit')]
        ];
        return view('admin.users.content.statement',compact('working_hours' ,'normal_hour_price' ,'extra_hour_price', 'breadcrumbs', 'user', 'roles', 'rating', 'activities', 'userLogs'));
    }

    public function getReport(User $user, Request $request)
    {
        $activities = Activity::where('causer_id',$user->id)->get();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $userLogs = Log::whereBetween('time_in', [$startDate, $endDate])
        ->where('user_id', $user->id)
        ->get();
        
        
        $working_hours = $user->working_hours;        
        $normal_hour_price = $user->normal_hour_price;        
        $extra_hour_price = $user->extra_hour_price;

        $rating = 0;
        return view('admin.users.content.statement',compact('working_hours' ,'normal_hour_price' ,'extra_hour_price', 'user', 'rating', 'activities', 'userLogs'));
    }
    
    public function exportUserLogsToExcel(User $user, Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        $userLogs = Log::whereBetween('time_in', [$startDate, $endDate])
            ->where('user_id', $user->id)
            ->get();
    
            $working_hours = $user->working_hours;        
            $normal_hour_price = $user->normal_hour_price;        
            $extra_hour_price = $user->extra_hour_price;

            

            $data = [];
            foreach ($userLogs as $index => $log) {
                $start_time = strtotime($log->time_in);
                $end_time = strtotime($log->time_out);
            
                $total_hours = (strtotime($log->time_out) - strtotime($log->time_in)) / 3600;
                $working_hours = $user->working_hours;
            
                if ($total_hours > $working_hours) {
                    $extra_hours = $total_hours - $working_hours;
                } else {
                    $extra_hours = 0;
                }
            
                $data[] = [
                    $index + 1,
                    $startDate,
                    $endDate,
                    $user->name,
                    $log->time_in,
                    $log->time_out,
                    $total_hours,
                    $working_hours,
                    $total_hours - $extra_hours,
                    $extra_hours,
                    $normal_hour_price * ($total_hours - $extra_hours),
                    $extra_hour_price * $extra_hours,
                ];
            }
        return Excel::download(new UserLogsExport($data), 'user_logs.xlsx');
    }


    public function exportUserLogsToPdf(User $user, Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $userLogs = Log::whereBetween('time_in', [$startDate, $endDate])
            ->where('user_id', $user->id)
            ->get();

        $data = [
            'user' => $user,
            'userLogs' => $userLogs,
        ];
    }





    public function failedLogins()
    {
        $activities = Activity::where('description','logs.login_failed')
                ->orderBy('created_at','desc')
                ->paginate(20);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'], 
            ['name' => __('admin.users'), 'link' => 'users'],
            ['name' => __('admin.failed_logins')]
        ];
        return view('admin.users.content.failed_logins',compact('breadcrumbs', 'activities'));
    }

    public function update(Request $request,$user)
    {
        $user = User::findOrFail($user);
        $request->validate([
            'name' => 'required|string:6',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'user_img' => 'required|numeric',
            'role' => Rule::requiredIf($user->role_name === null),
            'status' => ['required',Rule::in(['active', 'pending','inactive'])]
        ]);
        
        if($user->role_name === null)
        {
            // remove previous roles 
            foreach($user->roles as $role)
            {
                $user->detachRole($role->name);
            }

            // attach role to this user
            $user->attachRole($request->role);
        }

        // add to activities table
        activityLogger('logs.updated_user', ['user' => $user]);

        // update user data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->phone = $request->phone;
        $user->user_img = $request->user_img;
        $user->status = $request->status;
        $user->save();

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.user_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);

    }

    public function securityUpdate(Request $request,$user)
    {
        $user = User::findOrFail($user);
        $request->validate([
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        // add to activities table
        activityLogger('logs.updated_user_password', ['user' => $user]);

        // update user data
        $user->password = bcrypt($request->password);
        $user->save();

        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('notifications.user_updated'),
        ];

        //generate a response
        return new CommonResponse($payload);
    }

    public function createUser()
    {
        $roles = Role::all();
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.users'), 'link' => 'users'],
            ['name' => __('admin.users_create')]
        ];

        $view = view('admin.users.content.create', compact('breadcrumbs', 'roles'))->render();
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
            'name' => 'required|string:6',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'role' => 'required|numeric',
            'qrcode' => 'required|string',
            'section' => 'required|string',
            'working_hours' => 'required|string|min:1',
            'normal_hour_price' => 'required|string|min:1',
            'extra_hour_price' => 'required|string|min:1',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'status' => ['required',Rule::in(['active', 'pending','inactive'])]
        ]);
        

        // update user data
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->working_hours = $request->working_hours;
        $user->normal_hour_price = $request->normal_hour_price;
        $user->extra_hour_price = $request->extra_hour_price;
        $user->qrcode = $request->qrcode;
        $user->section = $request->section;
        $user->user_img = $request->user_img;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role_name = 'user';
        $user->role_id = 2;
        $user->save();

        // remove previous roles 
        foreach($user->roles as $role)
        {
            $user->detachRole($role->name);
        }

        // attach role to this user
        $user->attachRole($request->role);

        // add to activities table
        activityLogger('logs.added_user', ['user' => $user]);

        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'modal' => '#commonModal',
            'status' => 'success', 
            'action' => 'replace',
            'message' => __('notifications.user_added'),
        ];

        return new StoreResponse($payload);
    }

    public function createUserByRank($rank)
    {
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.users'), 'link' => 'users'],
            ['name' => __('admin.users_create')]
        ];

        $countries = getCountries();
        
        $view = view('admin.users.content.create_by_rank', compact('breadcrumbs', 'rank', 'countries'))->render();
        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function storeByRank(Request $request, $rank)
    {
        $request->validate([
            'name' => 'required|string:6',
            'age' => 'required|date',
            'country' => 'required|string:2',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'user_img' => 'required|numeric',
            'identity_img' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'status' => ['required',Rule::in(['active', 'pending','inactive'])]
        ]);
        

        // add user data
        $user = new User;
        $user->name = $request->name;
        $user->age = $request->age;
        $user->nationality = $request->country;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->phone = $request->phone;
        $user->user_img = $request->user_img;
        $user->national_id = $request->identity_img;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->role_name = $rank;
        if($rank != 'pilgrim')
        {
            $authorization = array('number' => $request->auth_number, 'img' => $request->auth_img);
            $authorization = json_encode($authorization);
            $user->authorization = $authorization;
        }
        $user->save();

        // add to activities table
        activityLogger('logs.added_user', ['user' => $user]);

        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'modal' => '#commonModal',
            'status' => 'success', 
            'action' => 'replace',
            'message' => __('notifications.user_added'),
        ];

        return new StoreResponse($payload);
    }

    public function pendingUsers()
    {
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.pending_users')],
        ];
        return view('admin.users.pending',['breadcrumbs' => $breadcrumbs]);
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();
        
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
        $filters = new Filter(Request(), new User());
        $users = $filters->toResponse();
        
        if($type == 'replace')
        {
            return view('admin.users.content.table-wrapper', compact('users'))->render();
        }
        else if($type == 'append')
        {
            return view('admin.users.content.show', compact('users'))->render();
        }
        
    }
}
