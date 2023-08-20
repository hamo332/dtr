<?php

namespace App\Http\Controllers\Responses\Common;
use Illuminate\Contracts\Support\Responsable;

class CommonResponse implements Responsable {

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

        $jsondata = [];

        
        /** --------------------------------------------
         * set variables
         * --------------------------------------------*/
        if(isset($redirect_url) && $redirect_url !== null)
        {
            $jsondata['redirect_url'] = $redirect_url;
        }

        // reset form 
        if(isset($resetForm) && $resetForm == true)
        {
            $jsondata['dom_val'][] = array(
                'selector' => $formSelector,
                'value' => '');
        }
        
        $jsondata['notification'] = array('type' => $status, 'value' => $message);
        
        //ajax response
        return response()->json($jsondata);
    }

}
