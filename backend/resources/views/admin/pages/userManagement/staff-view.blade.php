@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            @can('create-user')
                <div class="card-header">
                    <a href="{{ route('admin.user.management.staff.create') }}" class="btn btn-outline-danger">Thêm mới</a>
                </div>
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
                                        onclick="disableModal('{{ route('admin.user.management.staff.disable', ['usid' => $staffUser->id]) }}')">
                                        <i class="ti ti-x"></i>
                                    </button>
                                @endcan
                                @can('delete-user')
                                    <button type="button" class="btn btn-danger text-xl font-medium"
                                        onclick="deleteModal('{{ route('admin.user.management.staff.delete', ['usid' => $staffUser->id]) }}')">
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
