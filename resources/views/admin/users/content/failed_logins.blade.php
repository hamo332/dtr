@extends('admin.layouts/app')

@section('title', __('admin.users_activities'))

@section('vendor-style')
  <!-- vendor css files -->
  <link href="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('page-style')
  <!-- Page css files -->
  
@endsection 

@section('content')

    @section('toolbar-actions')
        @include('admin.users.misc.list_actions')
    @endsection

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Card-->
            <div class="card mb-5 p-3" id="card-content">
                <!--begin::Datatable-->
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-start">{{__('admin.us_activity_type')}}</th>
                        <th>{{__('admin.us_activity_device')}}</th>
                        <th>{{__('admin.us_activity_browser')}}</th>
                        <th>{{__('admin.us_activity_platform')}}</th>
                        <th>{{__('admin.us_activity_credintials')}}</th>
                        <th>{{__('admin.us_activity_date')}}</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold" id="table-wrapper">
                        @foreach($activities as $activity)
                            @php 
                                $properties = json_decode($activity->properties);
                            @endphp
                            <tr>
                                <td  class="text-start">{{__($activity->description)}}</td>
                                <td>
                                    @if($properties->device_name == false)
                                        {{__('admin.us_activity_computer')}}
                                    @else 
                                        {{$properties->device_name}}
                                    @endif
                                </td>
                                <td>
                                    <div class="avatar me-25">
                                        @if($properties->browser == 'Firefox')
                                            <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="avatar" width="20" height="20" />
                                        @elseif($properties->browser == 'Chrome')
                                            <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="avatar" width="20" height="20" />
                                        @elseif($properties->browser == 'Safari')
                                            <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="avatar" width="20" height="20" />
                                        @elseif($properties->browser == 'Opera')
                                            <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="avatar" width="20" height="20" />
                                        @elseif($properties->browser == 'Edge')
                                            <img src="{{asset('assets/admin/media/browser-logos/internet-explorer.png')}}" alt="avatar" width="20" height="20" />
                                        @endif
                                    </div>
                                    <span class="fw-bolder">{{$properties->browser}}</span>
                                </td>
                                <td>{{$properties->operating_system}}</td>
                                <td>{{$properties->aditional->mail}} <br/> {{$properties->aditional->password}}</td>
                                <td>{{getDateTime($activity->created_at)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $activities->links() }}
                <!--end::Datatable-->
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