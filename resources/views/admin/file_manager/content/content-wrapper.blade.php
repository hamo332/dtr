@if (@count($all_uploads) > 0)
<!--begin::content-->
@include('admin.file_manager.content.show')
{{ $all_uploads->links() }}
<!--end::content-->
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