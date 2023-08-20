<div class="row gutters-5">
    @foreach($all_uploads as $key => $file)
      @php
        if($file->file_original_name == null){
            $file_name = __('Unknown');
        }else{
          $file_name = $file->file_original_name;
        }
      @endphp
      <div class="col-2 w-140px w-lg-220px">
        <div class="awd-file-box">
          <div class="dropdown-file" >
            <a class="dropdown-link" data-bs-toggle="dropdown">
                <!--begin::Svg Icon | path: /icons/duotune/general/gen023.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="4" fill="currentColor"/>
                    <rect x="11" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                    <rect x="15" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                    <rect x="7" y="11" width="2.6" height="2.6" rx="1.3" fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="javascript:void(0)" class="dropdown-item" onclick="detailsInfo(this)" data-id="{{ $file->id }}">
                <!--begin::Svg Icon | path: /icons/duotune/general/gen045.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                    <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor"/>
                    <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span>{{ __('admin.fm_file_info') }}</span>
              </a>
              <a href="{{ asset($file->file_name) }}" target="_blank" download="{{ $file_name }}.{{ $file->extension }}" class="dropdown-item">
                <!--begin::Svg Icon | path: /icons/duotune/arrows/arr065.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"/>
                    <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span>{{ __('admin.fm_file_download') }}</span>
              </a>
              <a href="javascript:void(0)" class="dropdown-item" onclick="copyUrl(this)" data-url="{{ asset($file->file_name) }}">
                <!--begin::Svg Icon | path: /icons/duotune/coding/cod007.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="currentColor"/>
                    <path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span>{{ __('admin.fm_file_copy') }}</span>
              </a>
              <a href="javascript:void(0)" class="dropdown-item confirm-alert" data-href="{{ route('uploaded-files.destroy', $file->id ) }}" data-bs-target="#delete-modal" data-bs-toggle="modal">
                <!--begin::Svg Icon | path: /icons/duotune/general/gen040.svg-->
                <span class="svg-icon svg-icon-muted svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"/>
                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"/>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span>{{ __('admin.fm_file_delete') }}</span>
              </a>
            </div>
          </div>
          <div class="card card-file awd-uploader-select c-default" title="{{ $file_name }}.{{ $file->extension }}">
            <div class="card-file-thumb">
              @if($file->type == 'image')
                <img src="{{ asset($file->file_name) }}" class="img-fit">
              @elseif($file->type == 'video')
                <i data-feather='video'></i>
              @else
                <i data-feather='file'></i>
              @endif
            </div>
            <div class="card-body">
              <h6 class="d-flex">
                <span class="text-truncate title">{{ $file_name }}</span>
                <span class="ext">.{{ $file->extension }}</span>
              </h6>
              <p>{{ formatBytes($file->file_size) }}</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>