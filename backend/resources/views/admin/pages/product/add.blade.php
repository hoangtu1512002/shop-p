@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        @include('admin.form.product-form', ['action' => route('admin.product.store'), 'product' => null, 'categories' => $categories ])
    </div>
@endsection

