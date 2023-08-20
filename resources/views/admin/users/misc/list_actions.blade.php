<div class="d-flex align-items-center gap-2 gap-lg-3">
    <!--begin::add button-->
    @if(isset($rank) && $rank != '')
        <button class="btn btn-sm fw-bold btn-primary hover-rotate-end edit-add-modal-button js-ajax-ux-request reset-target-modal-form" data-bs-toggle="modal" data-bs-target="#commonModal" data-url="{{route('admin.users.add.byrank',$rank)}}" data-loading-target="commonModalBody" data-modal-title="{{__('admin.users_create')}} ({{__('admin.sh_'.$rank)}})" data-action-url="{{route('admin.users.store.byrank',$rank)}}" data-action-method="POST"  data-action-ajax-loading-target="commonModalBody" data-postrun-functions="AWDsetCheckActive,ReInitAppjs,initDateTimePicker">
            <!--begin::Svg Icon | path: /icons/duotune/general/gen041.svg-->
            <span class="svg-icon svg-icon-muted">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
            {{__('admin.sh_add')}}
        </button>
    @else
        <button class="btn btn-sm fw-bold btn-primary hover-rotate-end edit-add-modal-button js-ajax-ux-request reset-target-modal-form" data-bs-toggle="modal" data-bs-target="#commonModal" data-url="{{route('admin.users.create')}}" data-loading-target="commonModalBody" data-modal-title="{{__('admin.users_create')}}" data-action-url="{{route('admin.users.store')}}" data-action-method="POST"  data-action-ajax-loading-target="commonModalBody" data-postrun-functions="AWDsetCheckActive">
            <!--begin::Svg Icon | path: /icons/duotune/general/gen041.svg-->
            <span class="svg-icon svg-icon-muted">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>
                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
            {{__('admin.sh_add')}}
        </button>
    @endif
    <!--end::add button-->
    <!--begin::back button-->
    <a href="{{url()->previous()}}" class="btn btn-sm fw-bold btn-dark hover-rotate-end">
        <!--begin::Svg Icon | path: /icons/duotune/arrows/arr002.svg-->
        <span class="svg-icon svg-icon-muted">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
        {{__('admin.back')}}
    </a>
    <!--end::back button-->
</div>

