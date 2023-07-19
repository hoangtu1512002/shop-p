@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px]">
            <div class="card-header">
                <a href="" class="btn btn-outline-danger">Thêm nhân viên</a>
            </div>
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Tên nhân viên</th>
                        <th>Hình ảnh</th>
                        <th>Vai trò</th>
                        <th>Số điện thoại</th>
                        <th>Quản lý</th>
                    </tr>

                    <tr>
                        <td class="font-bold">1</td>
                        <td class="font-bold">Nguyễn văn A</td>
                        <td>
                            <img class="w-[120px] h-[140px] bg-contain rounded-md block"
                                src="https://images.unsplash.com/photo-1688933887296-2452acf991dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                                alt="hình ảnh">
                        </td>
                        <td class="font-bold text-[#fa896b]">Quản lý danh mục</td>
                        <td class="font-bold">0382584001</td>
                        <td>
                            <a href="" class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                            <a href="" class="btn btn-primary text-xl font-medium"><i class="ti ti-eye"></i></a>
                            <button type="button" class="btn btn-danger text-xl font-medium">
                                <i class="ti ti-trash"></i>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
