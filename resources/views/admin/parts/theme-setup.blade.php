<script>
    var defaultThemeMode = "light"; 
    var themeMode; 
    if ( document.documentElement ) 
    { 
        if ( document.documentElement.hasAttribute("data-theme-mode")) 
        { 
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } 
        else 
        { 
            if ( localStorage.getItem("data-theme") !== null ) 
            { 
                themeMode = localStorage.getItem("data-theme"); 
            } 
            else 
            { 
                themeMode = defaultThemeMode; 
            } 
        } 
        if (themeMode === "system") 
        { 
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; 
        } 
        
        document.documentElement.setAttribute("data-theme", themeMode); 
    }
</script>

<script>
	var AWD = AWD || {};
    var lang = '{{$locale}}';
    AWD.locale = {
        nothing_selected: '{{ __('admin.fm_not_selected') }}',
        nothing_found: '{{ __('admin.fm_no_files') }}',
        choose_file: '{{ __('admin.choose_file') }}',
        file_selected: '{{ __('admin.fm_file_selected') }}',
        files_selected: '{{ __('admin.fm_files_selected') }}',
        add_more_files: '{{ __('admin.fm_add_more') }}',
        adding_more_files: '{{ __('admin.fm_adding_more') }}',
        drop_files_here_paste_or: '{{ __('admin.fm_drag_files') }}',
        browse: '{{ __('admin.browse') }}',
        upload_complete: '{{ __('admin.fm_upload_complete') }}',
        upload_paused: '{{ __('admin.fm_upload_paused') }}',
        resume_upload: '{{ __('admin.fm_resume_upload') }}',
        pause_upload: '{{ __('admin.fm_pause_upload') }}',
        retry_upload: '{{ __('admin.fm_retry_upload') }}',
        cancel_upload: '{{ __('admin.fm_cancel_upload') }}',
        uploading: '{{ __('admin.fm_uploading') }}',
        processing: '{{ __('admin.fm_processing') }}',
        complete: '{{ __('admin.fm_complete') }}',
        file: '{{ __('admin.fm_file') }}',
        files: '{{ __('admin.fm_files') }}',
        success: '{{ __('notifications.success') }}',
        error: '{{ __('notifications.error') }}',
        export: '{{ __('admin.dt_export') }}',
        print: '{{ __('admin.dt_print') }}',
        copy: '{{ __('admin.dt_copy') }}',
        new_record: '{{ __('admin.dt_new_record') }}',
        delete_title: '{{ __('admin.delete_title') }}',
        delete_text: '{{ __('admin.delete_text') }}',
        delete_button: '{{ __('admin.delete_button') }}',
        delete_cancel: '{{ __('admin.delete_cancel') }}',
        invalid_email: '{{ __('auth.invalid_email') }}',
        required_email: '{{ __('auth.required_email') }}',
        required_password: '{{ __('auth.required_password') }}',
        some_error: '{{ __('auth.some_error') }}',
        required_field: '{{ __('validation.required') }}',
        required_url: '{{ __('validation.url') }}',
        ok: '{{ __('auth.ok') }}',
        server_error: '{{ __('errors.server_error') }}',
        not_deleted: '{{__('admin.not_deleted') }}',
    }
</script>