@extends('admin.layout.main')

@section('content')
    <div>
        <div class="card p-[20px] mt-[40px]">
            @can('create-category')
                <div class="card-header flex gap-[18px]">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-outline-danger">Thêm mới <i
                            class="ti ti-plus"></i></a>
                    <button type="button" class="btn btn-outline-primary flex item-center gap-[4px] px-[18px]">Csv
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-file-type-csv" width="16" height="16" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                            <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0"></path>
                            <path
                                d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75">
                            </path>
                            <path d="M16 15l2 6l2 -6"></path>
                        </svg>
                    </button>
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
        </div>
    </div>
    @include('admin.pages.category.stop-selling-modal')
    @include('common.csv-modal')
@endsection
