<?php 


use Carbon\Carbon;
use App\Models\User;
use App\Models\Upload;
use App\Models\Gallery;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

// get the language flag coed 
function getLanguageFlag($locale)
{
	$flagCodes = array('ar' => 'egypt', 'en' => 'united-states', 'fr' => 'france');
	return $flagCodes[$locale];
}

function languageList($language = null)
{
    $langCodes = array('ar' => 'العربية', 'en' => 'English', 'fr' => 'French');

    if($language !== null)
    {
        return $langCodes[$language];
    }

    return $langCodes;
}
// get the language name 
function getLanguageName($locale)
{
	return languageList($locale);
}

function get_setting($key, $default = null, $locale = false)
{
	$locale = $locale == false ? session()->get('locale') : $locale;
	// remember settings for one hour 
    $settings = Cache::remember('business_settings', 3600, function () {
        return GeneralSetting::all();
    });
    
    $setting = $settings->where('name', $key)->first();
    if($locale != false)
    {
        $setting = $settings->where('name', $key)->where('locale', $locale)->first();
    }
    //$setting = !$setting ? $settings->where('name', $key)->first() : $setting;
    
    return $setting == null ? $default : $setting->value;
}

function getFileById($id)
{
    return Upload::where('id',$id)->first();
}

function notificationsCount()
{
	return Auth::user()->notifications->where('status','unread')->count();
}

function getBaseURL()
{
    $root = '//' . $_SERVER['HTTP_HOST'];
    $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return rtrim($root,'/');
}

function getFileBaseURL()
{
    if (env('FILESYSTEM_DRIVER') == 's3') {
        return env('AWS_URL') . '/';
    } else {
        return getBaseURL() . '/';
    }
}

function formatBytes($bytes, $precision = 2)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
    $bytes /= pow(1024, $pow);
    // $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

function setEnv($data = [])
{
    if(count($data) > 0)
    {
        foreach ($data as $key => $value) {
            file_put_contents(app()->environmentFilePath(), str_replace(
                $key . '=' . env($key),
                $key . '=' . trim($value),
                file_get_contents(app()->environmentFilePath())
            ));
        }
        return true;
    }

    return false;
}


function socialMediaIcons($icon = null)
{
    $icons = [
        'facebook' => '<i class="fa fa-facebook"></i>',
        'twitter' => '<i class="fa fa-twitter"></i>',
        'youtube' => '<i class="fa fa-youtube"></i>',
        'linkedin' => '<i class="fa fa-linkedin"></i>',
        'instagram' => '<i class="fa fa-instagram"></i>',
        'whatsapp' => '<i class="fa fa-whatsapp"></i>',
        'telegram' => '<i class="fa fa-telegram"></i>',
    ];

    if($icon !== null)
    {
        return $icons[$icon];
    }
    
    return $icons;
}

function getDateTime($date = null, $locale = null,$format = null)
{
    $locale = $locale !== null ? $locale : App::getLocale();
    $date = $date !== null ? Carbon::createFromDate($date) : Carbon::now();
    $dateTime = $date->locale($locale)->isoFormat($format ?? 'dddd, Do MMMM YYYY, h:mm a');
    
    return $dateTime;
} 

function userAgent()
{
    $agent = new Agent();
    $platform = $agent->platform();
    $platform_version = $agent->version($platform);
    $platform = $platform.' '.$platform_version;
    return [
        'device_name' => $agent->device(),
        'operating_system' => $platform,
        'browser' => $agent->browser(),
    ];
}

function activityLogger($log, $properties = [])
{
    $properties = Arr::add(userAgent(), 'aditional' , $properties);
    activity()
        ->withProperties($properties)
        ->log($log);
}

function checkAccess($access)
{
    if(Auth::user()->hasPermission($access) || Auth::user()->role_name == 'admin')
    {
        return true;
    }
    return false;
}

function youtubeId($link)
{
    return Str::after($link, '/watch?v=');
}

function getCountries($locale = null,$type = null)
{
    $locale = $locale ?? App::getLocale();
    $countries = Countries::getList($locale);
    // Exclude ZOG "Israel" from country list
    if($type === null)
    {
        return json_encode(Arr::except($countries, ['IL']));
    }
    
    return Arr::except($countries, ['IL']);
}

function setActiveLink($routeName = null)
{
    $routeName = $routeName ?? 'admin.home';
    if($routeName == Route::currentRouteName())
    {
        return 'active';
    }
}
?>