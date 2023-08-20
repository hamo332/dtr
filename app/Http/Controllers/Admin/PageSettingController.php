<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use App\Models\Page;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Responses\Common\CreateResponse;
use App\Http\Controllers\Responses\Common\StoreResponse;
use App\Http\Controllers\Responses\Common\ShowResponse;
use Illuminate\Support\Facades\DB;
use App\Lib\Filter;

class PageSettingController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('id', 'DESC')->paginate(10);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.appearance_settings'), 'link' => 'design'],
            ['name' => __('admin.ps_title')]
        ];
        
        return view('admin.pages.index', compact('breadcrumbs', 'pages'));
    }

    public function create(Request $request)
    {
        $lang = $request->lang ?? App::getLocale();
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'],
            ['name' => __('admin.appearance_settings'), 'link' => 'design'],
            ['name' => __('admin.pc_title')]
        ];

        $view = view('admin.pages.content.create', compact('breadcrumbs', 'lang'))->render();
        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function editPage(Request $request)
    {
        $lang = $request->lang ?? App::getLocale();

        $page = Page::findOrFail($request->page);
        $breadcrumbs = [
            ['name' => __('admin.home'), 'link' => '/'], 
            ['name' => __('admin.appearance_settings'), 'link' => 'design'],
            ['name' => __('admin.pc_title')]
        ];

        $view = view('admin.pages.content.edit', compact('breadcrumbs', 'lang', 'page'))->render();

        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalMultiLangBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function addPage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_img' => 'required|numeric',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);
        
        $name = [];
        $title = [];
        $content = [];
        foreach (languageList() as $key => $value) {

            $title[$key] = '';
            $name[$key] = '';
            $content[$key] = '';

            if($request->locale == $key)
            {
                $name[$key] = $request->name;
                $title[$key] = $request->title;
                $content[$key] = $request->content;
            }
        }

        $page = new Page;
        $page->name = json_encode($name, JSON_UNESCAPED_UNICODE);
        $page->title = json_encode($title, JSON_UNESCAPED_UNICODE);
        $page->slug = $request->slug;
        $page->content = json_encode($content, JSON_UNESCAPED_UNICODE);
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_image = $request->meta_img;
        $page->save();

        Cache::flush();
        
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'modal' => '#commonModal',
            'status' => 'success', 
            'action' => 'replace',
            'message' => __('notifications.page_added'),
        ];

        return new StoreResponse($payload);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
            'meta_img' => 'required|numeric',
            'locale' => ['required',Rule::in(['ar', 'en','fr'])]
        ]);
        
        DB::table('pages')
        ->where('id', $request->page)
        ->update([
            'name->'.$request->locale => $request->name,
            'title->'.$request->locale => $request->title,
            'content->'.$request->locale => $request->content,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_image' => $request->meta_img
        ]);
        

        Cache::flush();
        
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'status' => 'success', 
            'action' => 'replace',
            'message' => __('notifications.page_updated'),
        ];

        return new StoreResponse($payload);
    }

    public function indexWithFilters(Request $request)
    {
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'action' => 'replace',
        ];

        return new ShowResponse($payload);
    }

    public function delete(Page $page, Request $request)
    {
        $page->delete();
        
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'action' => 'replace',
            'status' => 'success', 
            'message' => __('notifications.page_deleted'),
        ];

        return new ShowResponse($payload);
    }

    public function renderPage($type)
    {
        $filters = new Filter(Request(), new Page());
        $pages = $filters->toResponse();
        
        if($type == 'replace')
        {
            return view('admin.pages.content.table-wrapper', compact('pages'))->render();
        }
        else if($type == 'append')
        {
            return view('admin.pages.content.show', compact('pages'))->render();
        }
        
    }
}
