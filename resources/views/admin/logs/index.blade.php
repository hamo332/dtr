@extends('admin.layouts/app')

@section('title', __('logs.title'))

@section('vendor-style')
  <!-- vendor css files -->
  
@endsection

@section('page-style')
  <!-- Page css files -->
  
@endsection 

@section('content')

    @section('toolbar-actions')
        @include('admin.logs.misc.list_actions')
    @endsection

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card mb-5 p-3" id="card-content">
                <!--begin::table-->
                @include('admin.logs.content.content-wrapper')
                <!--end:table-->  
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

@endsection

@section('vendor-script')
  <!-- vendor files -->
  
@endsection

@section('page-script')
@endsection