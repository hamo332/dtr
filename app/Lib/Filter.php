<?php

/** --------------------------------------------------------------------------------
 * This classes make elequent filtration
 * controller
 * @author     AWD - Ahmad Hozien
 *----------------------------------------------------------------------------------*/

namespace App\Lib;

class Filter {

    private $request;
    private $model;

    public function __construct($request,$model) {
        $this->request = $request;
        $this->model = $model;
    }

    /**
     * render the view
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse() {

        $data =  $this->model->orderBy('id', 'DESC')
        ->paginate(10);


        if($this->request->has('date'))
        {
            $dates = explode('-',str_replace(' ','',$this->request->date));
            $dateFrom = date('Y-m-d', strtotime($dates[0]));
            $dateTo = date('Y-m-d', strtotime($dates[1]));
        }

        if(!empty($this->request->key))
        {
            $data = $this->model->where('name','like', '%'.$this->request->key.'%')
            ->orWhere('title','like', '%'.$this->request->key.'%')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        if(!empty($this->request->date))
        {
            $data = $this->model->whereBetween('created_at', [$dateFrom, $dateTo])
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        if(!empty($this->request->status))
        {
            $data = $this->model->where('status', $this->request->status)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        if(!empty($this->request->status) && !empty($this->request->date))
        {
            $data = $this->model->whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('status', $this->request->status)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        if(!empty($this->request->key) && !empty($this->request->date))
        {
            $data = $this->model->where('name','like', '%'.$this->request->key.'%')
            ->orWhere('title','like', '%'.$this->request->key.'%')
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        if(!empty($this->request->status) && !empty($this->request->date) && !empty($this->request->key))
        {
            $data = $this->model->where('name','like', '%'.$this->request->key.'%')
            ->orWhere('title','like', '%'.$this->request->key.'%')
            ->whereBetween('created_at', [$dateFrom, $dateTo])
            ->where('status', $this->request->status)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        return $data;
    }

}
