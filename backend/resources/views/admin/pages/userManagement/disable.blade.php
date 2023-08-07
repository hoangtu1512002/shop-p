@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Quản lý</th>
                    </tr>

                    @foreach ($users as $user)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $user->email }}</td>
                            <td class="font-bold text-[#fa896b]">{{ $user->roles->pluck('name')->join(', ') }}</td>
                            <td>
                                <button class="btn btn-primary"
                                    onclick="restoreUserModal('{{ route('admin.user.management.restore', ['usid' => $user->id]) }}')">
                                    <i class="ti ti-arrow-back"></i>
                                </button>

                                @can('delete-user')
                                    <button type="button" class="btn btn-danger text-xl font-medium"
                                        onclick="deleteModal('{{ route('admin.user.management.staff.delete', ['usid' => $user->id]) }}')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @include('admin.pages.userManagement.restore-user-modal')
    </div>
@endsection
