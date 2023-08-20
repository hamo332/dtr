<div class="d-flex align-items-center gap-2 gap-lg-3">
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

