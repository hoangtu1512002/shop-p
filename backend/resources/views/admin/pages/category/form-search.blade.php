<div class="w-full border bg-[#fff] rounded-lg">
    <div class="">
        <form action="{{ route($route) }}" method="GET">
            <div class="grid grid-cols-3 p-[4px]">
                <div class="form-group col-span-1 p-[10px]">
                    <label class="form-label pb-[6px]">Tìm kiếm theo danh mục</label>
                    <select class="form-select select2" name="category">
                        <option value="" class="form-option"></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-span-2 p-[10px]">
                    <label class="form-label pb-[6px]">Tìm kiếm theo từ khóa</label>
                    <input type="text" class="form-control bg-[#fff]" name="keyword">
                </div>
            </div>

            <button
                class="bg-[#2a3547] text-[#fff] font-bold text-[16px] block mx-auto m-[40px] px-[100px] py-[6px] rounded-lg">Tìm
                kiếm</button>
        </form>
    </div>
</div>
