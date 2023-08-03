@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            <div class="card-header">
                <a href="{{ route('admin.user.management.staff.create') }}" class="btn btn-outline-danger">Thêm tài khoản
                    mới</a>
            </div>
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
                                <a href="{{ route('admin.user.management.staff.edit', ['usid' => $staffUser->id]) }}"
                                    class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                <a href="{{ route('admin.user.management.staff.info', ['usid' => $staffUser->id]) }}"
                                    class="btn btn-primary text-xl font-medium"><i class="ti ti-eye"></i></a>
                                <button type="button" class="btn btn-danger text-xl font-medium">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
