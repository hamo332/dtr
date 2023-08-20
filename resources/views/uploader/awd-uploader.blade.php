<div class="modal fade" id="awdUploaderModal" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-adaptive modal-xl" role="document">
		<div class="modal-content h-100">
			<div class="modal-header pb-0 bg-light">
				<div class="uppy-modal-nav">
					<ul class="nav nav-tabs border-0">
						<li class="nav-item">
							<a class="nav-link active font-weight-medium text-dark" data-bs-toggle="tab" href="#awd-select-file">{{ __('admin.fm_select_file') }}</a>
						</li>
						<li class="nav-item">
							<a class="nav-link font-weight-medium text-dark" data-bs-toggle="tab" href="#awd-upload-new">{{ __('admin.fm_upload_new') }}</a>
						</li>
					</ul>
				</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="tab-content h-100">
					<div class="tab-pane active h-100" id="awd-select-file">
						<div class="awd-uploader-filter pt-1 pb-1 border-bottom mb-4 pb-4">
							<div class="row align-items-center gutters-5 gutters-md-10 position-relative col-md-12">
								<div class="col-md-3">
									<div class="">
										<!-- Input -->
										<select class="form-control form-control-xs awd-selectpicker form-select" name="awd-uploader-sort">
											<option value="newest" selected>
												{{ __('admin.fm_sort_newest') }}
											</option>
											<option value="oldest"> 
												{{ __('admin.fm_sort_oldest') }} 
											</option>
											<option value="smallest">
												{{ __('admin.fm_sort_smallest') }} 
											</option>
											<option value="largest">
												{{ __('admin.fm_sort_largest') }}
											</option>
										</select>
										<!-- End Input -->
									</div> 
								</div>
								<div class="col-md-3">
									<div class="form-check form-check-custom form-check-solid me-9">
										<input class="form-check-input" type="checkbox" name="awd-show-selected" id="awd-show-selected">
										<label class="form-check-label ms-3" for="awd-show-selected">
											{{ __('admin.fm_selected_only') }}
										</label>
									</div>
								</div>
								<div class="col-md-3"></div>
								<div class="col-md-3 float-end">
									<div class="awd-uploader-search text-right">
										<input type="text" class="form-control form-control-xs form-control-solid" name="awd-uploader-search" placeholder="{{ __('admin.fm_search_files') }}">
										<i class="search-icon d-md-none"><span></span></i>
									</div>
								</div>
							</div>
						</div>
						<div class="awd-uploader-all clearfix c-scrollbar-light row">
							<div class="align-items-center d-flex h-100 min-h-300px mb-2 justify-content-center w-100">
								<div class="text-center">
									<h3>{{ __('admin.fm_no_files') }}</h3>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-pane h-100" id="awd-upload-new">
						<div id="awd-upload-files" class="h-100">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between bg-light">
				<div class="flex-grow-1 overflow-hidden d-flex">
					<div class="me-2">
						<div class="awd-uploader-selected">{{ __('admin.fm_num_selected',['num' => 0]) }}</div>
						<button type="button" class="btn-link btn btn-sm p-0 awd-uploader-selected-clear">{{ __('admin.fm_clear') }}</button>
					</div>
					<div class="mb-0 ml-3">
						<button type="button" class="btn btn-sm btn-primary" id="uploader_prev_btn">{{ __('admin.fm_prev') }}</button>
						<button type="button" class="btn btn-sm btn-primary" id="uploader_next_btn">{{ __('admin.fm_next') }}</button>
					</div>
				</div>
				<button type="button" class="btn btn-sm btn-primary" data-toggle="awdUploaderAddSelected">{{ __('admin.fm_add') }}</button>
			</div>
		</div>
	</div>
</div>
