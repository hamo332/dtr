<!-- BEGIN: Vendor JS-->

<!-- nprogress -->
<script src="{{asset('assets/admin/plugins/custom/nprogress/nprogress.js')}}"></script>

<!-- uppy upload -->
<script src="https://releases.transloadit.com/uppy/v2.6.0/uppy.min.js"></script>
<!-- Ckeditor -->
<script src="{{asset('assets/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js')}}"></script>
<!-- Tinymc -->
<script src="{{asset('assets/admin/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
<!-- END: Vendor JS-->



<!-- BEGIN: Theme JS-->
@include('admin.parts.theme-setup')
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>

<script src="{{asset('assets/admin/js/configs.js')}}"></script>
<script src="{{asset('assets/admin/js/awd-uploader.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="{{asset('assets/admin/js/ajax.js')}}"></script>
<script src="{{asset('assets/admin/js/boot.js')}}"></script>
<script src="{{asset('assets/admin/js/events.js')}}"></script>
<script src="{{asset('assets/admin/js/qr-scanner.js')}}"></script>
<!--end::Global Javascript Bundle-->

<!-- END: Theme JS-->

<!-- BEGIN: Page Vendor JS-->
@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

