<?php

/** --------------------------------------------------------------------------------
 * This classes renders the response for the [create] process
 * controller
 * @author     AWD - Ahmad Hozien
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers\Responses\Common;
use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable {

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
            'action' => 'replace',
            'value' => $view);

        //show modal footer
        $jsondata['dom_visibility'][] = array('selector' => '#commonModalFooter', 'action' => 'show');

        // POSTRUN FUNCTIONS------
        $jsondata['postrun_functions'][] = [
            'value' => 'closeModals',
        ];

        //ajax response
        return response()->json($jsondata);

    }

}
