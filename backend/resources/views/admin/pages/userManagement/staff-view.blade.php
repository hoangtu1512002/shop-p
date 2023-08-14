@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            @can('create-user')
                @include('common.template.add-btn', ['route' => 'admin.user.management.staff.create'])
            @endcan
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Quản lý</th>
                    </tr>

                    @foreach ($staffUsers as $staffUser)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $staffUser->email }}</td>
                            <td class="font-bold text-[#fa896b]">{{ $staffUser->roles->pluck('name')->join(', ') }}</td>
                            <td>
                                @can('update-user')
                                    <a href="{{ route('admin.user.management.staff.edit', ['usid' => $staffUser->id]) }}"
                                        class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                @endcan
                                @can('update-info-user')
                                    <a href="{{ route('admin.user.management.staff.info', ['usid' => $staffUser->id]) }}"
                                        class="btn btn-primary text-xl font-medium"><i class="ti ti-eye"></i></a>
                                @endcan
                                @can('disable-user')
                                    <button class="btn btn-warning text-xl font-medium"
                                        onclick="actionModal('{{ route('admin.user.management.staff.disable', ['usid' => $staffUser->id]) }}','modal-disable','form-disable-confirm','btn-close-disable-modal')">
                                        <i class="ti ti-x"></i>
                                    </button>
                                @endcan
                                @can('delete-user')
                                    <button type="button" class="btn btn-danger text-xl font-medium"
                                        onclick="actionModal('{{ route('admin.user.management.staff.delete', ['usid' => $staffUser->id]) }}', 'modal','form-confirm','btn-close')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('admin.pages.userManagement.disable-modal')
@endsection
