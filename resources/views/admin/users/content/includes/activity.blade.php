<!--begin::Card-->
<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>{{__('admin.us_activity')}}</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                <!--begin::Table head-->
                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th class="min-w-100px">{{__('admin.us_activity_type')}}</th>
                        <th class="min-w-100px">{{__('admin.us_activity_device')}}</th>
                        <th>{{__('admin.us_activity_browser')}}</th>
                        <th>{{__('admin.us_activity_platform')}}</th>
                        <th>{{__('admin.us_activity_date')}}</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fs-6 fw-semibold text-gray-600">
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
                                        <img src="{{asset('assets/admin/media/browser-logos/mozila-firefox.png')}}" alt="{{$properties->browser}}" width="20" height="20" />
                                    @elseif($properties->browser == 'Google Chrome')
                                        <img src="{{asset('assets/admin/media/browser-logos/google-chrome.png')}}" alt="{{$properties->browser}}" width="20" height="20" />
                                    @elseif($properties->browser == 'Safari')
                                        <img src="{{asset('assets/admin/media/browser-logos/apple-safari.png')}}" alt="{{$properties->browser}}" width="20" height="20" />
                                    @elseif($properties->browser == 'Opera')
                                        <img src="{{asset('assets/admin/media/browser-logos/opera.png')}}" alt="{{$properties->browser}}" width="20" height="20" />
                                    @endif
                                </div>
                                <span class="fw-bolder">{{$properties->browser}}</span>
                            </td>
                            <td>{{$properties->operating_system}}</td>
                            <td>{{getDateTime($activity->created_at)}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->