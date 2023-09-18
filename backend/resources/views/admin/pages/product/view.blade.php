@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            <h4 class="mb-[40px]">Tất cả sản phẩm</h4>
            @include('common.template.add-btn', ['route' => 'admin.product.create'])
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

                    @foreach ($products as $product)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $product->name }}</td>
                            <td>
                                <img class="w-[120px] h-[140px] bg-contain rounded-md block"
                                    src="{{ json_decode($product->image_url)[0] }}"
                                    alt="hình ảnh">
                            </td>
                            <td>
                                <nav class="bg-[#ff443d] rounded-lg inline-block py-[4px] px-[10px] font-bold text-[#fff]">
                                    {{ number_format((int)$product->price, 0, ',', '.') . 'đ' }}
                                </nav>
                            </td>
                            <td>
                                <nav class="border-[2px] border-[#ff443d] text-[#ff443d] inline-block rounded-lg py-[4px] px-[8px] font-bold">
                                    {{ $product->total }}
                                </nav>
                            </td>
                            <td class="font-bold">{{ $product->Category->name }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['productId' => $product->id]) }}" class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
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
