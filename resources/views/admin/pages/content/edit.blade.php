<!--begin::Navs-->
<div class="card-header d-flex flex-center mb-10">
    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
        @foreach (languageList() as $langCode => $langName)
            <!--begin::Nav item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{$langCode == $lang ? 'active' : ''}} js-ajax-ux-request" data-url="{{route('admin.pages.edit', $page->id)}}?lang={{$langCode}}" data-loading-target="commonModalMultiLangBody" data-action-method="get" data-action-ajax-loading-target="commonModalMultiLangBody">
                    {{$langName}}
                </a>
            </li>
            <!--end::Nav item-->
        @endforeach
    </ul>
</div>
<!--end::Navs-->

@foreach (languageList() as $langCode => $langName)
    @if($lang == $langCode)
        @csrf
        <!--begin::set locale -->
        <input type="hidden" name="locale" value="{{$langCode}}">
        <!-- end::set locale -->
        <!--begin::Card body-->
        <div class="card-body">
            @php 
                $name = json_decode($page->name);
                $title = json_decode($page->title);
                $content = json_decode($page->content);
            @endphp
            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_page_name')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="name" value="{{$name->$langCode}}" placeholder="{{__('admin.pc_page_name')}}"/>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_page_title')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="title" value="{{$title->$langCode}}" placeholder="{{__('admin.pc_page_title')}}"/>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_page_slug')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="slug" value="{{$page->slug}}" placeholder="{{__('admin.pc_page_slug')}}"/>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_page_content')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="content" placeholder="{{__('admin.pc_page_content')}}" id="kt_ckeditor_classic_{{$langCode}}" class="form-control form-control-solid">{{$content->$langCode}}</textarea>
                </div>
                <!--begin::Col-->
            </div>
            <!--end::Row-->

            <div class="separator border-5 border-light theme-light-show my-10"></div>

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_title')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" class="form-control form-control-solid" name="meta_title" value="{{$page->meta_title}}" placeholder="{{__('admin.pc_meta_title')}}"/>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_description')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <textarea name="meta_description" placeholder="{{__('admin.pc_meta_description')}}" class="form-control form-control-solid" data-kt-autosize="true">{{$page->meta_description}}</textarea>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row mb-8">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_keywords')}}</div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-9 fv-row">
                    <input type="text" id="meta_tags_{{$langCode}}" class="form-control form-control-solid meta_tags"  name="meta_keywords" value="{{$page->meta_keywords}}" placeholder="{{__('admin.pc_meta_keywords')}}"/>
                </div>
            </div>
            <!--end::Row-->

            <!--begin::Row-->                        
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-xl-3">
                    <div class="fs-6 fw-semibold mt-2 mb-3">{{__('admin.pc_meta_img')}}</div>
                </div>
                <!--end::Col-->
                <div class="col-xl-9">
                    <div class="input-group" data-toggle="awduploader" data-type="image">
                        <div class="input-group-prepend">
                            <div class="input-group-text bg-soft-secondary input-solid">
                                {{ __('admin.browse') }}
                            </div>
                        </div> 
                        <div class="form-control file-amount">{{ __('admin.choose_file') }}</div>
                        <input type="hidden" name="types[]" value="meta_img">
                        <input type="hidden" name="meta_img" value="{{$page->meta_image}}" class="selected-files">
                    </div>
                    <div class="file-preview box sm"></div> 
                </div>
            </div>
            <!--end::Row-->
            <div class="separator border-5 border-light theme-light-show my-10"></div>
        </div>
        <!--end::Card body-->
    @endif
@endforeach
