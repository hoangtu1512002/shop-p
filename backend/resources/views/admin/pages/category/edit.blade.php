@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        @include('admin.form.category-form', ['action' => route('admin.category.update', $category->id), 'category' => $category])
    </div>
@endsection
