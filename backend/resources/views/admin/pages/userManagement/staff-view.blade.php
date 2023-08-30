@extends('admin.layout.main')

@section('content')
    <div>
        @include('admin.pages.userManagement.staff-form-search', [
            'route' => 'admin.user.management.staff',
            'roles' => $roles
        ])
        <div class="card p-[20px] mt-[40px]">
            <h4 class="mb-[40px]">Tất cả nhân viên</h4>
            @can('create-user')
                @include('common.template.add-btn', ['route' => 'admin.user.management.staff.create'])
            @endcan
            <div class="card-body p-[10px]">
                <table class="table table-hover table-light">
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Quản lý</th>
                    </tr>

                    @foreach ($staffUsers as $user)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $user->email }}</td>
                            <td class="font-bold text-[#fa896b]">{{ $user->roles->pluck('name')->join(', ') }}</td>
                            <td>
                                <nav
                                    class="font-bold text-[#fff] inline-block py-[4px] px-[10px] rounded-lg {{ $user->status === 1 ? 'bg-[#ff6b6b]' : 'bg-[#000]' }}">
                                    {{ $user->status === 1 ? 'Kích hoạt' : 'Vô hiệu' }}
                                </nav>
                            <td>
                                @can('update-user')
                                    <a href="{{ route('admin.user.management.staff.edit', ['usid' => $user->id]) }}"
                                        class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                @endcan
                                @can('update-info-user')
                                    <a href="{{ route('admin.user.management.staff.info', ['usid' => $user->id]) }}"
                                        class="btn btn-primary text-xl font-medium"><i class="ti ti-eye"></i></a>
                                @endcan
                                @can('disable-user')
                                    @if ($user->status === 1)
                                        <button class="btn btn-warning text-xl font-medium"
                                            onclick="actionModal('{{ route('admin.user.management.staff.disable', ['usid' => $user->id]) }}','modal-disable','form-disable-confirm','btn-close-disable-modal')">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-primary"
                                            onclick="actionModal('{{ route('admin.user.management.restore', ['usid' => $user->id]) }}','restore-user-modal','form-user-restore-confirm','btn-restore-user-close')">
                                            <i class="ti ti-arrow-back"></i>
                                        </button>
                                    @endif
                                @endcan
                                @can('delete-user')
                                    <button type="button" class="btn btn-danger text-xl font-medium"
                                        onclick="actionModal('{{ route('admin.user.management.staff.delete', ['usid' => $user->id]) }}', 'modal','form-confirm','btn-close')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="flex items-center justify-between bg-[#ff6b6b] py-[10px] rounded-lg">
                {{ $staffUsers->appends(['keyword' => request()->input('keyword'), 'role' => request()->input('role'), 'status' => request()->input('status')])->links('common.template.pagination') }}
                <nav class="text-[16px] font-bold text-[#fff] mr-[10px]">số lượng: {{ count($staffUsers) }}</nav>
            </div>
        </div>
    </div>
    @include('admin.pages.userManagement.disable-modal')
    @include('admin.pages.userManagement.restore-user-modal')
@endsection
