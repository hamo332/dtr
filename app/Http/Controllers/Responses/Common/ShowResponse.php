<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [show] process
 * controller
 * @author     AWD - Ahmad Hozien
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers\Responses\Common;
use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //render the form
        $jsondata['dom_html'][] = array(
            'selector' => $selector,
            'action' => $action,
            'value' => $view);


        // POSTRUN FUNCTIONS------
        $jsondata['postrun_functions'][] = [
            'value' => $postRunFunction ?? 'AWDreInitDT',
        ];

        // to show message with response 
        if(isset($status) && isset($message))
        {
            $jsondata['notification'] = array('type' => $status, 'value' => $message);
        }
        //ajax response
        return response()->json($jsondata);

    }

}
