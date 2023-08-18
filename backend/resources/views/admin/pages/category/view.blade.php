@extends('admin.layout.main')

@section('content')
    <div>
        @include('admin.pages.category.form-search', ['route' => 'admin.category.view', 'categories' => $categories])
        <div class="card p-[20px] mt-[10px]">
            <h4 class="mb-[40px]">Tất cả danh mục</h4>
            @can('create-category')
                @include('common.template.add-btn', ['route' => 'admin.category.create'])
            @endcan
            <div class="card-body p-[10px]">
                <table class="table table-hover table-light">
                    <tr>
                        <th>Id</th>
                        <th>Tên danh mục</th>
                        <th>Trạng thái</th>
                        <th class="text-center" width="18%">Quản lí</th>
                    </tr>
                    @foreach ($categorySearch as $category)
                        <tr>
                            <td class="font-bold">{{ $index++ }}</td>
                            <td class="font-bold">{{ $category->name }}</td>
                            <td>
                                <nav
                                    class="font-bold text-[#fff] inline-block py-[4px] px-[10px] rounded-lg {{ $category->status === 1 ? 'bg-[#ff6b6b]' : 'bg-[#000]' }}">
                                    {{ $category->status === 1 ? 'Đang bán' : 'Ngưng bán' }}</nav>
                            </td>
                            <td class="font-bold text-center">
                                @can('update-category')
                                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                        class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                                @endcan
                                @can('delete-category')
                                    @if ($category->status === 1)
                                        <button type="button" class="btn btn-dark text-xl font-medium"
                                            onclick="actionModal('{{ route('admin.category.stop.selling', ['id' => $category->id]) }}', 'modal-stop', 'form-stop-selling-confirm', 'btn-close-modal-stop')">
                                            <i class="ti ti-x"></i>
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-dark text-xl font-medium"
                                            onclick="actionModal('{{ route('admin.category.restore', ['id' => $category->id]) }}', 'restore-modal', 'form-restore-confirm', 'btn-close-restore-modal')">
                                            <i class="ti ti-arrow-back"></i>
                                        </button>
                                    @endif
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
            <div class="flex items-center justify-between bg-[#ff6b6b] py-[10px] rounded-lg">
                {{ $categorySearch->appends(['keyword' => request()->input('keyword'), 'category' => request()->input('category')])->links('common.template.pagination') }}
                <nav class="text-[16px] font-bold text-[#fff] mr-[10px]">số lượng: {{ count($categorySearch) }}</nav>
            </div>
        </div>
    </div>
    @include('admin.pages.category.stop-selling-modal')
    @include('admin.pages.category.restore-modal')
@endsection
