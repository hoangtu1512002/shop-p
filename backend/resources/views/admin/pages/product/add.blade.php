@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px]">
        @include('admin.form.product', ['action' => route('admin.product.store'), 'product' => null, 'categories' => $categories ])
    </div>
@endsection
