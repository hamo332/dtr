@extends('admin.layouts/app')

@section('title', __('admin.fm_title'))

@section('vendor-style')
  <!-- vendor css files -->
@endsection

@section('page-style')
  <!-- Page css files -->
  
@endsection 

@section('content')

    @section('toolbar-actions')
        @include('admin.file_manager.misc.list_actions')
    @endsection

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!-- Begin:: filters toolbar -->
            @include('admin.file_manager.misc.filters')
            <!-- End:: filters ttolbar -->
            <!--begin::Card-->
            <div class="card mb-5 p-3" id="card-content">
                <!--begin::table-->
                @include('admin.file_manager.content.content-wrapper')
                @include('admin.modals.file-manager-delete-modal')
                @include('admin.modals.file-manager-info-modal')
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
@endsection

@section('page-script')
  <script type="text/javascript">
    function detailsInfo(e){
      $('#info-modal-content').html('<div class="c-preloader text-center absolute-center"><i class="las la-spinner la-spin la-3x opacity-70"></i></div>');
      var id = $(e).data('id')
      $('#info-modal').modal('show');
      $.post('{{ route('uploaded-files.info') }}', {_token: AWD.data.csrf, id:id}, function(data)
      {
        $('#info-modal-content').html(data);
      });
    }
    function copyUrl(e) {
      var url = $(e).data('url');
      var $temp = $("<input>");
        $("body").append($temp);
        $temp.val(url).select();
        try {
          document.execCommand("copy");
          AWD.plugins.notify('success', '{{ __('notifications.link_copied') }}');
      } catch (err) {
          AWD.plugins.notify('danger', '{{ __('notifications.error_copy') }}');
      }
        $temp.remove();
    }
    function sort_uploads(el){
      $('#sort_uploads').submit();
    }
  </script>
@endsection