<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Upload;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Responses\Common\CreateResponse;
use App\Http\Controllers\Responses\Common\ShowResponse;
use App\Lib\Filter;

class AwdUploadController extends Controller
{
    public function index(Request $request){

        $breadcrumbs = [['name' => 'home', 'link' => '/'], ['name' => 'file manager', 'link' => '']];

        $all_uploads = (auth()->user()->role_name != 'admin') ? Upload::where('user_id',auth()->user()->id) : Upload::query();
        $search = null;
        $sort_by = null;

        if ($request->search != null) {
            $search = $request->search;
            $all_uploads->where('file_original_name', 'like', '%'.$request->search.'%');
        }

        $sort_by = $request->sort;
        switch ($request->sort) {
            case 'newest':
                $all_uploads->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $all_uploads->orderBy('created_at', 'asc');
                break;
            case 'smallest':
                $all_uploads->orderBy('file_size', 'asc');
                break;
            case 'largest':
                $all_uploads->orderBy('file_size', 'desc');
                break;
            default:
                $all_uploads->orderBy('created_at', 'desc');
                break;
        }

        $all_uploads = $all_uploads->paginate(60)->appends(request()->query());


        return (auth()->user()->role_name != 'admin')
            ? view('frontend.user.seller.uploads.index', compact('all_uploads', 'search', 'sort_by'))
            : view('admin.file_manager.index', compact('all_uploads', 'search', 'sort_by', 'breadcrumbs'));
    }

    public function create(){ 
        $breadcrumbs = [
            ['name' => 'home', 'link' => '/'], 
            ['name' => 'file manager', 'link' => 'file_manager'],
            ['name' => 'create']
        ];
        
        $view = (auth()->user()->role_name != 'admin')
                ? view('frontend.user.seller.uploads.create')
                : view('admin.file_manager.content.create',compact('breadcrumbs'))->render();
        //reponse payload
        $payload = [
            'view' => $view,
            'selector' => '#commonModalBody',
        ];

        //show the form
        return new CreateResponse($payload);
    }

    public function indexWithFilters(Request $request)
    {
        //reponse payload
        $payload = [
            'view' => $this->renderPage('replace'),
            'selector' => '#card-content',
            'postRunFunction' => 'closeModals',
            'action' => 'replace',
        ];

        return new ShowResponse($payload);
    }

    public function renderPage($type)
    {
        $filters = new Filter(Request(), new Upload());
        $all_uploads = $filters->toResponse();
        
        if($type == 'replace')
        {
            return view('admin.file_manager.content.content-wrapper', compact('all_uploads'))->render();
        }
        else if($type == 'append')
        {
            return view('admin.file_manager.content.show', compact('all_uploads'))->render();
        }
        
    }
    
    public function showUploader(Request $request){
        return view('uploader.awd-uploader');
    }

    public function upload(Request $request){
        $type = array(
            "jpg"=>"image",
            "jpeg"=>"image",
            "png"=>"image",
            "svg"=>"image",
            "webp"=>"image",
            "gif"=>"image",
            "mp4"=>"video",
            "mpg"=>"video",
            "mpeg"=>"video",
            "webm"=>"video",
            "ogg"=>"video",
            "avi"=>"video",
            "mov"=>"video",
            "flv"=>"video",
            "swf"=>"video",
            "mkv"=>"video",
            "wmv"=>"video",
            "wma"=>"audio",
            "aac"=>"audio",
            "wav"=>"audio",
            "mp3"=>"audio",
            "zip"=>"archive",
            "rar"=>"archive",
            "7z"=>"archive",
            "doc"=>"document",
            "txt"=>"document",
            "docx"=>"document",
            "pdf"=>"document",
            "csv"=>"document",
            "xml"=>"document",
            "ods"=>"document",
            "xlr"=>"document",
            "xls"=>"document",
            "xlsx"=>"document"
        );

        if($request->hasFile('awd_file')){
            $upload = new Upload;
            $extension = strtolower($request->file('awd_file')->getClientOriginalExtension());

            if(isset($type[$extension])){
                $upload->file_original_name = null;
                $arr = explode('.', $request->file('awd_file')->getClientOriginalName());
                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }

                $path = $request->file('awd_file')->store('uploads/all');
                $size = $request->file('awd_file')->getSize();

                // Return MIME type ala mimetype extension
                $finfo = finfo_open(FILEINFO_MIME_TYPE); 

                // Get the MIME type of the file
                $file_mime = finfo_file($finfo, $path);
                if($type[$extension] == 'image' && get_setting('disable_image_optimization') != 1){
                    try {
                        $img = $this->processImage($request->file('awd_file')->getRealPath());
                        $img->save($path);
                        clearstatcache();
                        $size = $img->filesize();

                    } catch (\Exception $e) {
                        dd($e);
                    }
                }
                
                if (env('FILESYSTEM_DRIVER') == 's3') {
                    Storage::disk('s3')->put(
                        $path,
                        file_get_contents(base_path('public/').$path),
                        [
                            'visibility' => 'public',
                            'ContentType' =>  $extension == 'svg' ? 'image/svg+xml' : $file_mime
                        ]
                    );
                    if($arr[0] != 'updates') {
                        unlink(base_path('public/').$path);
                    }
                }

                $upload->extension = $extension;
                $upload->file_name = $path;
                $upload->user_id = Auth::user()->id;
                $upload->type = $type[$upload->extension];
                $upload->file_size = $size;
                $upload->save();
            }
            return '{}';
        }
    }

    public function getUploadedFiles(Request $request)
    {
        $uploads = Upload::where('user_id', Auth::user()->id);
        if ($request->search != null) {
            $uploads->where('file_original_name', 'like', '%'.$request->search.'%');
        }
        if ($request->sort != null) {
            switch ($request->sort) {
                case 'newest':
                    $uploads->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $uploads->orderBy('created_at', 'asc');
                    break;
                case 'smallest':
                    $uploads->orderBy('file_size', 'asc');
                    break;
                case 'largest':
                    $uploads->orderBy('file_size', 'desc');
                    break;
                default:
                    $uploads->orderBy('created_at', 'desc');
                    break;
            }
        }
        return $uploads->paginate(60)->appends(request()->query());
    }

    public function destroy(Request $request,$id)
    {
        $upload = Upload::findOrFail($id);
        
        if(auth()->user()->role_name != 'admin' && $upload->user_id != auth()->user()->id){
            return back()->withErrors([
                'error' => __('admin.fm_no_permission'),
            ]);
        }
        try{
            if(env('FILESYSTEM_DRIVER') == 's3'){
                Storage::disk('s3')->delete($upload->file_name);
                if (file_exists(public_path().'/'.$upload->file_name)) {
                    unlink(public_path().'/'.$upload->file_name);
                }
            }
            else{
                unlink(public_path().'/'.$upload->file_name);
            }
            $upload->delete();
            $request->session()->flash('success', __('admin.fm_file_deleted'));
        }
        catch(\Exception $e){
            $upload->delete();
            $request->session()->flash('success', __('admin.fm_file_deleted'));
        }
        return back();
    }

    public function getPreviewFiles(Request $request){
        $ids = explode(',', $request->ids);
        $files = Upload::whereIn('id', $ids)->get();
        return $files;
    }

    //Download project attachment
    public function attachmentDownload($id)
    {
        $project_attachment = Upload::find($id);
        try{
           $file_path = public_path($project_attachment->file_name);
            return Response::download($file_path);
        }catch(\Exception $e){
            session()->flash('success', __('admin.fm_file_not_exists'));
            return back();
        }

    }
    
    //Download project attachment
    public function fileInfo(Request $request)
    {
        $file = Upload::findOrFail($request['id']);

        return (auth()->user()->role_name != 'admin')
            ? view('frontend.user.seller.uploads.info',compact('file'))
            : view('admin.file_manager.content.info',compact('file'));
    }

    public function processImage($imgFile)
    {
        $img = Image::make($imgFile)->encode();
        $height = $img->height();
        $width = $img->width();

        if($width > $height && $width > 500)
        {
            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        elseif($height > $width && $height > 500)
        {
            $img->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        
        return $img;
    }
}
