@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <p class="card-title">Thêm danh mục mới</p>
        </div>
        <div class="card-body">
            @include('admin.form.category-form', [
                'action' => route('admin.category.store'),
                'category' => null,
            ])
        </div>
    </div>
@endsection
