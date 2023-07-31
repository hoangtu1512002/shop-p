@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            @can('create-category')
                <div class="card-header">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-outline-danger">Thêm mới</a>
                </div>
            @endcan
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th class="text-center" width="18%">Quản lí</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $category->name }}</td>
                            <td>
                                <img class="w-[120px] h-[140px] bg-contain rounded-md block"
                                    src="{{ $category->image_url }}" alt="hình ảnh">
                            </td>
                            <td class="font-bold text-end">
                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                    class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                <button type="button" class="btn btn-dark text-xl font-medium"
                                    onclick="stopSellingModal('{{ route('admin.category.stop.selling', ['id' => $category->id]) }}')">
                                    <i class="ti ti-x"></i>
                                </button>
                                <button type="button" class="btn btn-danger text-xl font-medium"
                                    onclick="deleteModal('{{ route('admin.category.delete', ['id' => $category->id]) }}')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    @include('admin.pages.category.stop-selling-modal')
@endsection
