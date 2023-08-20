<!-- notifications toast script -->
@if(session()->has('success'))
<span id="js-trigger-session-message" data-type="success" data-title="{{__('notifications.success')}}"
    data-message="{{session()->get('success')}}"></span>
@endif

@if(session()->has('error'))
<span id="js-trigger-session-message" data-type="error" data-title="{{__('notifications.error')}}"
    data-message="{{session()->get('error')}}"></span>
@endif

@if(isset($errors) && $errors->has('failed_login'))
<span id="js-trigger-session-message" data-type="error" data-title="{{__('notifications.error')}}"
    data-message="{{$errors->first('failed_login')}}"></span>
@endif
<!-- end notifications toast script -->