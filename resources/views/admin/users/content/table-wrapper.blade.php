@if (@count($users) > 0)
<!--begin::Datatable-->
<table id="kt_datatable_basic" class="table align-middle table-row-dashed fs-6 gy-5">
    <thead>
    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
        <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" id="dtselect" data-kt-check="true" data-kt-check-target="#kt_datatable_basic .form-check-input" value="main"/>
            </div>
        </th>
        <th>#</th>
        <th>{{__('admin.sh_user')}}</th>
        <th>{{__('admin.sh_qrcode')}}</th>
        <th>{{__('admin.us_user_mail')}}</th>
        <th>{{__('admin.us_user_phone')}}</th>
        <th>{{__('admin.us_user_role')}}</th>
        <th>{{__('admin.us_user_status')}}</th>
        <th class="text-center">{{__('admin.us_user_options')}}</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold" id="table-wrapper">
        @include('admin.users.content.show')
    </tbody>
</table>
{{ $users->links() }}
<!--end::Datatable-->
@else
    <!--Begin:: not data-->
    <div class="card-px text-center pt-15">
        <!--begin::Title-->
        <h2 class="fs-2x fw-bold mb-0">{{__('admin.sh_nodata')}}</h2>
        <!--end::Title-->
        <!--begin::Description-->
        <p class="text-gray-400 fs-4 fw-semibold py-7">
            {!!__('admin.sh_nodata_hint')!!}
        </p>
        <!--end::Description-->
    </div>
    <div class="text-center pb-15 px-5">
        <img src="{{asset('assets/admin/media/illustrations/sketchy-1/5.png')}}" alt="" class="mw-100 h-200px h-sm-325px">
    </div>
    <!--End:: not data-->
@endif