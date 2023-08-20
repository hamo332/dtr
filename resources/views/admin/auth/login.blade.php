@php $locale = App::currentLocale();@endphp
<!DOCTYPE html>
<html lang="{{$locale}}" direction="{{$locale == 'ar' ? 'rtl' : 'ltr'}}" dir="{{$locale == 'ar' ? 'rtl' : 'ltr'}}" style="direction: {{$locale == 'ar' ? 'rtl' : 'ltr'}}">
	<!--begin::Head-->
	<head><base href="{{env('APP_URL')}}"/>
		<title>{{__('admin.dashboard')}} - {{__('auth.title')}}</title>
		<meta charset="utf-8" />
		<meta name="description" content="{!! get_setting('meta_description') !!}">
        <meta name="keywords" content="{{ get_setting('meta_keywords') }}">
        <meta name="author" content="Ahmad Hozien">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="{{$locale}}" />
		<meta property="og:type" content="page" />
		<meta property="og:title" content="{{__('admin.dashboard')}} - {{__('auth.title')}}" />
		<meta property="og:url" content="{{ getBaseURL() }}" />
		<meta property="og:site_name" content="{{ get_setting('site_name') }}" />
		<link rel="apple-touch-icon" href="{{ get_setting('appleicon') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ get_setting('favicon') }}">
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
        @if($locale == 'ar')
            <link href="{{asset('assets/admin/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/admin/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        @else
            <link href="{{asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        @endif
		<!--end::Global Stylesheets Bundle-->
        <!-- noprogress -->
        <link href="{{asset('assets/admin/plugins/custom/nprogress/nprogress.css')}}" rel="stylesheet">
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank">
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Logo-->
				<a href="#" class="d-block d-lg-none mx-auto py-20">
                    @if(get_setting('footer_logo',null,'ar') !== null)
                        <img alt="Logo" src="{{asset(getFileById(get_setting('footer_logo',null,'ar'))->file_name ?? 'assets/admin/media/logos/default.png')}}" class="theme-light-show h-25px" />
                    @else
					    <img alt="Logo" src="{{asset('assets/admin/media/logos/default.png')}}" class="theme-light-show h-25px" />
					    <img alt="Logo" src="{{asset('assets/admin/media/logos/default-dark.png')}}" class="theme-dark-show h-25px" />
                    @endif
				</a>
				<!--end::Logo-->
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
					<!--begin::Wrapper-->
					<div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
						<!--begin::Header-->
						<div class="d-flex flex-stack py-2">
							<!--begin::Back link-->
							<div class="me-2"></div>
							<!--end::Back link-->
							<!--begin::Sign Up link-->
							<div class="m-0">
								<span class="text-gray-400 fw-bold fs-5 me-2">{{__('auth.please_login')}}</span>
							</div>
							<!--end::Sign Up link=-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="py-20">
							<!--begin::Form-->
							{{-- @if(session('error'))
								<div class="error">{{ session('error') }}</div>
							@endif --}}
							<form class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form" action="{{route('doAdminLogin')}}">
                                @csrf
                                <!--begin::Body-->
								<div class="card-body">
									<!--begin::Heading-->
									<div class="text-start mb-10">
										<!--begin::Title-->
										<h1 class="text-dark mb-3 fs-3x" >{{__('auth.title')}}</h1>
										<!--end::Title-->
										<!--begin::Text-->
										<div class="text-gray-400 fw-semibold fs-6">{{__('auth.hello',['appName' => get_setting('site_name')])}}</div>
										<!--end::Link-->
									</div>
									<!--begin::Heading-->
									<!--begin::Input group=-->
									<div class="fv-row mb-8">
										<!--begin::Email-->
										<input type="text" placeholder="{{__('auth.email')}}" name="email" autocomplete="off" class="form-control form-control-solid" />
										<!--end::Email-->
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif
									</div>
									<!--end::Input group=-->
									<div class="fv-row mb-7">
										<!--begin::Password-->
										<input type="password" placeholder="{{__('auth.password')}}" name="password" autocomplete="off" class="form-control form-control-solid" />
										<!--end::Password-->
                                        @if($errors->has('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif
									</div>
									<!--end::Input group=-->
									<!--begin::Wrapper-->
									<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
										<div></div>
										<!--begin::Link-->
										<a href="{{route('admin.forgot_password')}}" class="link-primary">
                                            {{__('auth.forgot_password')}}
                                        </a>
										<!--end::Link-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Actions-->
									<div class="d-flex flex-stack">
										<!--begin::Submit-->
										{{-- <input type="submit" value="login"> --}}
										{{-- button.id = kt_sign_in_submit --}}
										<button id="" type="submit" class="btn btn-primary me-2 flex-shrink-0" data-button-loading-annimation="yes" data-button-disable-on-click="yes" data-url="{{route('admin.login')}}" data-ajax-type="POST" data-button-disable-on-click="yes">
											<!--begin::Indicator label-->
											<span class="indicator-label">{{__('auth.sign_in')}}</span>
											<!--end::Indicator label-->
											<!--begin::Indicator progress-->
											<span class="indicator-progress">
												<span>{{__('auth.please_wait')}}</span>
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
											<!--end::Indicator progress-->
										</button>
										<!--end::Submit-->
                                        {{--
										<!--begin::Social-->
										<div class="d-flex align-items-center">
											<div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6">Or</div>
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
												<img alt="Logo" src="{{asset('assets/admin/media/svg/brand-logos/google-icon.svg')}}" class="p-4" />
											</a>
											<!--end::Symbol-->
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
												<img alt="Logo" src="{{asset('assets/admin/media/svg/brand-logos/facebook-3.svg')}}" class="p-4" />
											</a>
											<!--end::Symbol-->
											<!--begin::Symbol-->
											<a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
												<img alt="Logo" src="{{asset('assets/admin/media/svg/brand-logos/apple-black.svg')}}" class="theme-light-show p-4" />
												<img alt="Logo" src="{{asset('assets/admin/media/svg/brand-logos/apple-black-dark.svg')}}" class="theme-dark-show p-4" />
											</a>
											<!--end::Symbol-->
										</div>
										<!--end::Social-->
                                        --}}
									</div>
									<!--end::Actions-->
								</div>
								<!--begin::Body-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Body-->
						<!--begin::Footer-->
						<div class="m-0">
                            <span id="changeLang">
                                <input type="hidden" name="current_url" value="{{route('admin.login')}}">
                            </span>                
							<!--begin::Toggle-->
							<button class="btn btn-flex btn-link rotate" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="0px, 0px">
								<img data-kt-element="current-lang-flag" class="w-25px h-25px rounded-circle me-3" src="@php echo asset('assets/admin/media/flags/'.getLanguageFlag($locale).'.svg') @endphp" alt="" />
								<span data-kt-element="current-lang-name" class="me-2">{{getLanguageName($locale)}}</span>
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
								<span class="svg-icon svg-icon-3 svg-icon-muted rotate-180 m-0">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
							<!--end::Toggle-->
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4" data-kt-menu="true" id="kt_auth_lang_menu">
								<!--begin::Menu item-->
								<div class="menu-item px-3">
									<a class="menu-link d-flex px-5 js-ajax-request" href="javascript:void(0)" data-url="{{route('change_language','ar')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{asset('assets/admin/media/flags/egypt.svg')}}" alt="" />
										</span>
										<span data-kt-element="lang-name">العربية</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
                                    <a class="menu-link d-flex px-5 js-ajax-request" href="javascript:void(0)" data-url="{{route('change_language','en')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{asset('assets/admin/media/flags/united-states.svg')}}" alt="" />
										</span>
										<span data-kt-element="lang-name">English</span>
									</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-3">
                                    <a class="menu-link d-flex px-5 js-ajax-request" href="javascript:void(0)" data-url="{{route('change_language','fr')}}" data-type="form" data-ajax-type="get" data-form-id="changeLang">
										<span class="symbol symbol-20px me-4">
											<img data-kt-element="lang-flag" class="rounded-1" src="{{asset('assets/admin/media/flags/france.svg')}}" alt="" />
										</span>
										<span data-kt-element="lang-name">French</span>
									</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Footer-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-none d-lg-flex flex-lg-row-fluid w-50 bgi-size-cover bgi-position-y-center bgi-position-x-start bgi-no-repeat" style="background-image: url({{asset('assets/admin/media/auth/bg4.jpg')}})"></div>
				<!--begin::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
        @include('admin.parts.flash_messages')
        @include('admin.parts.theme-setup')
		<!--begin::Javascript-->
		<script>var hostUrl = "{{env('APP_URL')}}";</script>
        <!-- nprogress -->
        <script src="{{asset('assets/admin/plugins/custom/nprogress/nprogress.js')}}"></script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/admin/js/scripts.bundle.js')}}"></script>
        <script src="{{asset('assets/admin/js/configs.js')}}"></script>
        <script src="{{asset('assets/admin/js/app.js')}}"></script>
        <script src="{{asset('assets/admin/js/ajax.js')}}"></script>
        <script src="{{asset('assets/admin/js/boot.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>