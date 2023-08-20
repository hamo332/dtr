<div class="card-body">
    <div class="form-group mb-1">
      <label>{{ __('admin.fm_file_name') }}</label>
      <input type="text" class="form-control" value="{{ $file->file_name }}" disabled>
    </div>
    <div class="form-group mb-1">
      <label>{{ __('admin.fm_file_type') }}</label>
      <input type="text" class="form-control" value="{{ $file->type }}" disabled>
    </div>
    <div class="form-group mb-1">
      <label>{{ __('admin.fm_file_size') }}</label>
      <input type="text" class="form-control" value="{{ formatBytes($file->file_size) }}" disabled>
    </div>
    <div class="form-group mb-1">
      <label>{{ __('admin.fm_uploaded_by') }}</label>
      <input type="text" class="form-control" value="{{ $file->user->name }}" disabled>
    </div>
    <div class="form-group mb-1">
      <label>{{ __('admin.fm_uploaded_at') }}</label>
      <input type="text" class="form-control" value="{{ $file->created_at }}" disabled>
    </div>
    <div class="form-group text-center">
      @php
        if($file->file_original_name == null){
            $file_name = __('Unknown');
        }else{
          $file_name = $file->file_original_name;
        }
      @endphp
      <a class="btn btn-secondary" href="{{ asset($file->file_name) }}" target="_blank" download="{{ $file_name }}.{{ $file->extension }}">{{ __('admin.fm_file_download') }}</a>
    </div>
  </div>