@extends('admin.layouts/app')

@section('title', __('admin.ps_title'))

@section('vendor-style')
  <!-- vendor css files -->
  <link href="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-style')
  <!-- Page css files -->
  
@endsection 

@section('content')

    @section('toolbar-actions')
        @include('admin.pages.misc.list_actions')
    @endsection

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!-- Begin:: filters toolbar -->
            @include('admin.pages.misc.filters')
            <!-- End:: filters ttolbar -->
            <!--begin::Card-->
            <div class="card mb-5 p-3" id="card-content">
                <!--begin::table-->
                @include('admin.pages.content.table-wrapper')
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
  <script src="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.js')}}"></script>
@endsection

@section('page-script')
@endsection