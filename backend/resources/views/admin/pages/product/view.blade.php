@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            <div class="card-header">
                <a href="{{ route('admin.product.create') }}" class="btn btn-outline-danger">Thêm mới <i class="ti ti-plus"></i></a>
            </div>
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Danh mục</th>
                        <th>Quản lí</th>
                    </tr>

                    <tr>
                        <td class="font-bold">2</td>
                        <td class="font-bold">cơm đùi gà</td>
                        <td>
                            <img class="w-[120px] h-[140px] bg-contain rounded-md block"
                                src="https://images.unsplash.com/photo-1688933887296-2452acf991dd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwyfHx8ZW58MHx8fHx8&auto=format&fit=crop&w=500&q=60"
                                alt="hình ảnh">
                        </td>
                        <td>
                           <nav class="bg-[#ff443d] rounded-lg inline-block py-[4px] px-[10px] font-bold text-[#fff]">
                              {{ number_format(10000, 0, ',', '.') . 'đ' }}
                           </nav>
                        </td>
                        <td>
                           <nav class="border-[2px] border-[#ff443d] text-[#ff443d] inline-block rounded-lg py-[4px] px-[8px] font-bold">10</nav>
                        </td>
                        <td class="font-bold">cơm gà</td>
                        <td>
                            <a href="" class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
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
