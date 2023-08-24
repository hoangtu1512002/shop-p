<style>
    input[type="radio"] {
        accent-color: #ff443d;
    }
</style>
@php
    $category_id = request()->get('category_id') ? request()->get('category_id') : null;
    $status = request()->get('status') ? request()->get('status') : null;
@endphp
<div class="w-full border bg-[rgb(255,255,255)] rounded-lg">
    <form action="{{ route($route) }}" method="GET">
        <div class="grid grid-cols-3">
            <div class="form-group mx-[20px] mt-[16px] col-span-1">
                <label class="form-label pb-[6px] text-[16px]">Tìm kiếm danh mục</label>
                <select class="form-select select2" name="category_id">
                    <option value="" class="form-option"></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mx-[20px] mt-[16px] col-span-2">
                <label class="form-label pb-[6px] text-[16px]">Tìm kiếm theo từ khóa</label>
                <input type="search" name="keyword" class="form-control" value="{{ old('keyword') ?? session('keyword') }}">
            </div>
        </div>

        <div class="form-group mx-[20px] mt-[16px]">
            <label class="form-label pb-[6px] text-[16px]">Trạng thái</label>
            <div class="flex gap-[20px]">
                <div class="form-group">
                    <input type="radio" name="status" value="active" id="active">
                    <label for="active">Đang bán</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="status" value="in_active" id="in-active">
                    <label for="in_active">Ngưng bán</label>
                </div>
            </div>
        </div>

        <button
            class="bg-[#2a3547] text-[#fff] font-bold text-[16px] block mx-auto m-[40px] px-[100px] py-[6px] rounded-lg">Tìm
            kiếm</button>
    </form>
</div>

@section('scripts')
    <script>
        $('document').ready(function() {

        })
    </script>
@endsection
