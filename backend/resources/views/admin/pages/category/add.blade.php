@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px]">
        @include('admin.form.category', ['action' => route('admin.category.store'), 'category' => null])
    </div>
@endsection
