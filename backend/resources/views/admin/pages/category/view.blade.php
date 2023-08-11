@extends('admin.layout.main')

@section('content')
    <div>
        @include('admin.pages.category.form-search', ['route' => 'admin.category.view'])
        <div class="card p-[20px] mt-[10px]">
            @can('create-category')
                @include('common.add-btn', ['route' => 'admin.category.create'])
            @endcan
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
                                @can('update-category')
                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                        class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                @endcan
                                @can('delete-category')
                                    <button type="button" class="btn btn-dark text-xl font-medium"
                                        onclick="actionModal('{{ route('admin.category.stop.selling', ['id' => $category->id]) }}', 'modal-stop', 'form-stop-selling-confirm', 'btn-close-modal-stop')">
                                        <i class="ti ti-x"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger text-xl font-medium"
                                        onclick="actionModal('{{ route('admin.category.delete', ['id' => $category->id]) }}', 'modal', 'form-confirm', 'btn-close')">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                @endcan
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
    @include('admin.pages.category.stop-selling-modal')
@endsection
