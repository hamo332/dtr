<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Responses\Common\CreateResponse;
use App\Http\Controllers\Responses\Common\ShowResponse;
use App\Http\Controllers\Responses\Common\CommonResponse;
use App\Lib\Filter;

class LogController extends Controller
{
    public function index()
    {
        $logs = Activity::orderBy('id', 'DESC')->paginate(50);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => 'admin.home'],
            ['name' => __('logs.title')],
        ];
        return view('admin.logs.index',compact('breadcrumbs', 'logs'));
    }

    public function renderPage()
    {
        $logs = Activity::orderBy('id', 'DESC')->paginate(12);
        $view = view('admin.logs.content.show', compact('logs'))->render();
        //reponse payload
        $payload = [
            'view' => $view,
            'action' => 'replace',
            'postRunFunction' => '',
            'selector' => '#kt_activities_body',
        ];

        //show the form
        return new ShowResponse($payload);
    }
}
