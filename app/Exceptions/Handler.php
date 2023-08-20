<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $exception)
    {
        //generic response
        $response = __('errors.request_could_not_be_completed');

        /**
         * [SERVER, SYNTAX, LARAVEL EXCEPTIONS]
         * Handle 500 server errors & other critical laravel errors
         * */
        if ($exception instanceof \Symfony\Component\Debug\Exception\FatalErrorException
            || $exception instanceof \Symfony\Component\Debug\Exception\FatalThrowableError
            || $exception instanceof ReflectionException
            || $exception instanceof ModelNotFoundException
            || $exception instanceof ErrorException
        ) {

            if (app()->environment() == 'production') {
                if ($request->ajax()) {
                    $jsondata['notification'] = array('type' => 'error', 'value' => __('errors.application_error'));
                    return response()->json($jsondata, 500);
                } else {
                    return response()->view('errors.500');
                }
            }
            return parent::render($request, $exception);
        }

        /**
         * [DEVELOPER GENERATED HTTP EXCEPTIONS]
         * Handle ajax error messages by displaying a friendly popup notice
         * Server errorswill be handled as per check above
         */
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {

            //permission denied errors
            switch ($exception->getStatusCode()) {

            //permission denied
            case 403:
                $response = ($exception->getMessage() != '') ? $exception->getMessage() : __('errors.no_permission_for_resource');
                $view = 'errors.403';
                break;

            //larevel session timeout
            case 419:
                $response = ($exception->getMessage() != '') ? $exception->getMessage() : __('errors.session_timeout');
                $view = 'errors.419';
                break;

            //not found
            case 404:
                $response = ($exception->getMessage() != '') ? $exception->getMessage() : __('errors.not_found');
                $view = 'errors.404';
                break;

            //business logic/generic errors
            case 409:
                $response = ($exception->getMessage() != '') ? $exception->getMessage() : __('errors.request_could_not_be_completed');
                $view = 'errors.409';
                break;
            
            default:
                $response = __('errors.request_could_not_be_completed');
                $view = 'errors.409';
                break;
            }

            //AJAX RESPONSE
            if ($request->ajax()) {

                //ajax reponse for a notice popup
                $jsondata['notification'] = [
                    'type' => 'error',
                    'value' => $response,
                ];

                //return response - with error code
                return response()->json($jsondata, $exception->getStatusCode());

            }

            //HTTP REPONSE
            $error = array('message' => $response);
            return response()->view($view, compact('error'));
        }

        //[DEVELOPMENT] - debug output
        return parent::render($request, $exception);
    }
}
