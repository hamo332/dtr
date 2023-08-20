@foreach ($roles as $role)
    <tr>
        <td>
            <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" id="dtselect" value="{{$role->id}}">
            </div>
        </td>
        <td>{{$role->id}}</td>
        <td>{{$role->name}}</td>
        <td>{{$role->description}}</td>
        <td>{{getDateTime($role->created_at)}}</td>
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
                    <a class="menu-link px-3 edit-add-modal-button js-ajax-ux-request reset-target-modal-form" data-bs-toggle="modal" data-bs-target="#commonModal" data-url="{{route('admin.roles.edit', $role->id)}}" data-loading-target="commonModalMultiLangBody" data-modal-title="{{__('admin.pc_edit_title')}}" data-action-url="{{route('admin.roles.update', $role->id)}}" data-action-method="PUT" data-action-ajax-loading-target="table-wrapper">
                        {{__('admin.rs_edit')}}
                    </a>
                  </li>
                  <li class="menu-item px-3">
                    <a href="#" class="menu-link px-3" id="del_{{$role->id}}" data-kt-docs-table-filter="delete_row" data-ajax-type="DELETE" data-url="{{route('admin.roles.delete', $role->id)}}">
                        {{__('admin.rs_delete')}}
                    </a>
                  </li>
                </ul>
            </div>
            <!--end::Menu-->
        </td>
    </tr>
@endforeach