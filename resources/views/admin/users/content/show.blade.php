@foreach ($users as $user)
    <tr>
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" id="dtselect" value="{{$user->id}}">
            </div>
        </td>
        <td>{{$user->id}}</td>
        <td class="d-flex">
            <!--begin::avatar-->
            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="{{route('admin.edit_user',$user->id)}}">
                    <div class="symbol-label">
                        <img src="{{asset($user->image->file_name ?? 'assets/admin/media/avatars/blank.png')}}" alt="{{$user->name}}" class="w-100">
                    </div>
                </a>
            </div>
            <!--end::avatar-->
            <!--begin::user details-->
            <div class="d-flex flex-column">
                <a href="{{route('admin.edit_user',$user->id)}}" class="text-gray-800 text-hover-primary mb-1">{{$user->name}}</a>
                <span>{{$user->email}}</span>
            </div>
            <!--end::user details-->
        </td>
        <td>
            @php 
                $qrLink = 'https://api.qrserver.com/v1/create-qr-code/?size=500x599&data='.$user->qrcode;
            @endphp
            <div class="symbol symbol-50px overflow-hidden me-3">
                <a href="{{ $qrLink }}" target="_blank">
                    <div class="symbol-label">
                        <img src="{{ $qrLink }}" class="w-100">
                    </div>
                </a>
            </div>
        </td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>
            @php 
                $role = $user->roles()->first()
            @endphp
            
            @if(isset($role))
                <span class="badge bg-secondary"> 
                    {{$role->name}} 
                </span>
            @elseif($user->role_name !== null)
                <span class="badge bg-secondary"> 
                    {{__('admin.sh_'.$user->role_name)}} 
                </span>
            @else
                <span class="badge bg-danger"> 
                    {{__('admin.us_user_norole')}} 
                </span>
            @endif
        </td>
        <td>
            @if($user->status == 'active')
                <span class="badge bg-success"> 
                    {{__('admin.sh_active')}}
                </span>
            @elseif($user->status == 'inactive')
                <span class="badge bg-danger"> 
                    {{__('admin.sh_inactive')}}
                </span>
            @else
                <span class="badge bg-warning"> 
                    {{__('admin.us_user_pending')}}
                </span>
            @endif
        </td>
        <td class="text-center">
            <!--begin::Menu-->
            <div class="dropdown">
                <button class="btn btn-light btn-active-light-primary btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('admin.sh_options')}}
                    <span class="svg-icon svg-icon-5 m-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                            </g>
                        </svg>
                    </span>
                </button>
                <ul class="dropdown-menu menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4">
                  <li class="menu-item px-3">
                    <a class="menu-link px-3" href="{{route('admin.edit_user',$user->id)}}">
                        {{__('admin.rs_edit')}}
                    </a>
                  </li>
                  <li class="menu-item px-3">
                    <a href="#" class="menu-link px-3" id="del_{{$user->id}}" data-kt-docs-table-filter="delete_row" data-ajax-type="DELETE" data-url="{{route('admin.users.delete', $user->id)}}">
                        {{__('admin.rs_delete')}}
                    </a>
                  </li>
                </ul>
            </div>
            <!--end::Menu-->
        </td>
    </tr>
@endforeach