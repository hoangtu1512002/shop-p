@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px]">
            <div class="card-header">
                <a href="{{ route('admin.category.create') }}" class="btn btn-outline-danger">Thêm mới</a>
            </div>
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>Quản lí</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img class="w-[120px] h-[140px] bg-contain rounded-md block" src="{{ $category->image_url }}"
                                    alt="hình ảnh">
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                    class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                <button type="button" class="btn btn-danger text-xl font-medium"
                                    onclick="showModal('{{ route('admin.category.delete', ['id' => $category->id]) }}')">
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
