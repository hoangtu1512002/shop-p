@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px]">
        @include('category.form', ['action' => route('category.update', $category->id), 'category' => $category,])
    </div>
@endsection
