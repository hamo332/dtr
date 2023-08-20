<?php

namespace App\Http\Controllers\Responses\Authentication;
use Illuminate\Contracts\Support\Responsable;

class AuthenticateResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //full payload array 
        $payload = $this->payload;

        $jsondata = [];

        
        /** --------------------------------------------
         * set variables
         * --------------------------------------------*/
        if($redirect_url !== null)
        {
            $jsondata['redirect_url'] = $redirect_url;
        }

        $jsondata['notification'] = array('type' => $status, 'value' => $message);
        
        /** --------------------------------------------
         * successful login - from timeout mdal login
         * --------------------------------------------*/
        if ($type == 'relogin') {

            //update csrf token in header meta tag
            $jsondata['dom_attributes'][] = [
                'selector' => '#meta-csrf',
                'attr' => 'content',
                'value' => csrf_token(),
            ];

            //close modal
            $jsondata['dom_visibility'][] = array('selector' => '#reloginModal', 'action' => 'close-modal');

            //notice
            $jsondata['notification'] = array('type' => 'success', 'value' => __('lang.you_are_now_logged_in'));
        }

        //ajax response
        return response()->json($jsondata);
    }

}
