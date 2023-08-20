<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
          <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-warning swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: grid;">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
              <div class="swal2-icon-content">!</div>
            </div>
            <img class="swal2-image" style="display: none;">
            <h2 class="swal2-title" id="swal2-title" style="display: none;"></h2>
            <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
              {{ __('admin.fm_file_delete_confirm') }}
            </div>
            <div class="swal2-actions" style="display: flex;"><div class="swal2-loader"></div>
              <button type="button" class="swal2-confirm btn fw-bold btn-danger" style="display: inline-block;" aria-label="">{{ __('admin.fm_file_delete') }}!</button>
              <button type="button" class="swal2-cancel btn fw-bold btn-active-light-primary" style="display: inline-block;" aria-label="" data-bs-dismiss="modal">{{ __('admin.fm_delete_cancel') }}</button>
            </div>
          </div>
        </div>
    </div>
</div>