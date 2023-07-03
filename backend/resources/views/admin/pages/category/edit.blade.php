@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px]">
        @include('admin.pages.category.form', ['action' => route('admin.category.update', $category->id), 'category' => $category])
    </div>
@endsection
