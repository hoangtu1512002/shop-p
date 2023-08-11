@extends('admin.layout.main')

@section('content')
    <div>
        @include('admin.pages.category.form-search', ['route' => 'admin.category.stop.selling.view'])
        <div class="card p-[20px]">
            <div class="card-header">
                <h4 class="card-title">Danh mục tạm ngừng sử dụng</h4>
            </div>
            <div class="card-body p-[10px]">
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th width="50%">Tên danh mục</th>
                        <th class="text-center" width="18%">Quản lí</th>
                    </tr>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $category->name }}</td>
                            <td class="font-bold text-center">
                                <button type="button" class="btn btn-success text-xl font-medium"
                                    onclick="actionModal('{{ route('admin.category.restore', ['id' => $category->id]) }}', 'restore-modal', 'form-restore-confirm', 'btn-close-restore-modal')">
                                    <i class="ti ti-arrow-back"></i>
                                </button>
                                <button type="button" class="btn btn-danger text-xl font-medium"
                                    onclick="actionModal('{{ route('admin.category.delete', ['id' => $category->id]) }}', 'modal', 'form-confirm', 'btn-close')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="flex items-center justify-between bg-[#2a3547] py-[10px]">
                {{ $categories->links('common.pagination') }}
                <nav class="text-[16px] font-bold text-[#fff] mr-[10px]">số lượng: {{ count($categories) }}</nav>
            </div>
        </div>
    </div>
    @include('admin.pages.category.restore-modal')
@endsection
