@csrf
<!--begin::Card body-->
<div class="card-body">

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_name')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="name" placeholder="{{__('admin.us_user_name')}}"/>
        </div>
    </div>
    <!--end::Row-->
    {{-- عدد ساعات العمل --}}
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">عدد ساعات العمل</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="working_hours" placeholder="عدد ساعات العمل">
        </div>
    </div>
    {{-- سعر الساعة العادية --}}
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">سعر الساعة العادية</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="normal_hour_price" placeholder="سعر الساعة العادية">
        </div>
    </div>
    {{-- سعر الساعة الاضافية --}}
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">سعر الساعة الإضافية</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="extra_hour_price" placeholder="سعر الساعة الإضافية">
        </div>
    </div>
    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_mail')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="email" class="form-control form-control-solid" name="email" placeholder="{{__('admin.us_user_mail')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_phone')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="phone" placeholder="{{__('admin.us_user_phone')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_status')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" name="status"/>
                <label class="form-check-label fw-semibold text-gray-400 ms-3" for="status">{{__('admin.sh_active')}}</label>
            </div>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_role')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <select class="form-select form-select-solid" name="role">
                <option>{{__('admin.us_user_role')}}</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <!--end::Row-->
    
    <!--begin::seperator-->
    <div class="separator border-5 border-light theme-light-show my-10"></div>
    <!--end::seperator-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.sh_section')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="section" placeholder="{{__('admin.sh_section')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.sh_qrcode')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="qrcode" placeholder="{{__('admin.sh_qrcode')}}"/>
        </div>
    </div>
    <!--end::Row-->

    <!--begin::seperator-->
    <div class="separator border-5 border-light theme-light-show my-10"></div>
    <!--end::seperator-->

    <!--begin::Row-->                        
    <div class="row mb-5">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_image')}}</div>
        </div>
        <!--end::Col-->
        <div class="col-xl-9">
            <div class="input-group" data-toggle="awduploader" data-type="image">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary">
                        {{ __('admin.browse') }}
                    </div>
                </div> 
                <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                <input type="hidden" name="types[]" value="user_img">
                <input type="hidden" name="user_img" value="" class="selected-files">
            </div>
            <div class="file-preview box sm"></div> 
        </div>
    </div>
    <!--end::Row-->

    <!--begin::seperator-->
    <div class="separator border-5 border-light theme-light-show my-10"></div>
    <!--end::seperator-->
    
    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_newpassword')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="password" placeholder="{{__('admin.us_user_newpassword')}}"/>
        </div>
    </div>
    <!--end::Row-->
    <!--begin::Row-->
    <div class="row mb-8">
        <!--begin::Col-->
        <div class="col-xl-3">
            <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.us_user_newpassword_confirm')}}</div>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-9 fv-row">
            <input type="text" class="form-control form-control-solid" name="password_confirmation" placeholder="{{__('admin.us_user_newpassword_confirm')}}"/>
        </div>
    </div>
    <!--end::Row-->
</div>
<!--end::Card body-->

        
    