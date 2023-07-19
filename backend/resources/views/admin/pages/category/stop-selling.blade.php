@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px]">
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
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $category->name }}</td>
                            <td>
                                <img class="w-[120px] h-[140px] bg-contain rounded-md block" src="{{ $category->image_url }}"
                                    alt="hình ảnh">
                            </td>
                            <td class="font-bold">
                                <button type="button" class="btn btn-success text-xl font-medium"
                                    onclick="restoreModal('{{ route('admin.category.restore', ['id' => $category->id]) }}')">
                                    <i class="ti ti-arrow-back"></i>
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
    @include('admin.pages.category.restore-modal')
@endsection