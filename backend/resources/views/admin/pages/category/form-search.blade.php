<div class="w-full border bg-[#ff758f] rounded-lg">
    <div class="">
        <form action="{{ route($route) }}" method="GET">
            <div class="py-[20px] px-[10px] text-center">
                <input type="search" name="search"
                    class="input-search w-3/4 border p-[10px] rounded-lg"
                    placeholder="tìm kiếm danh mục..." value="{{ old('search') ?? session('search') }}">
            </div>
            <div class="flex justify-center mt-[40px] mb-[20px]">
                <button class="px-[100px] py-[8px] bg-[#2a3547] rounded-lg text-[14px] text-[#fff]">Tìm kiếm <i
                        class="ti ti-search"></i></button>
            </div>
        </form>
    </div>
</div>
