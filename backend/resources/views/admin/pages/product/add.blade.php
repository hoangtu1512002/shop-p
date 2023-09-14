@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[20px]">
        <div class="card-header">
            <p class="card-title">Thêm sản phẩm mới</p>
        </div>
        <div class="card-body">
            @include('admin.form.product-form', ['action' => route('admin.product.store'), 'product' => null, 'categories' => $categories ])
        </div>
    </div>
@endsection

