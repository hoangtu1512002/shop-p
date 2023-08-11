<div class="card">
    <div class="card-body">
        <form action="{{ route($route) }}" method="GET">
            <div class="form-group pt-[50px]">
                <input type="search" name="search" class="form-control" placeholder="search..."
                    value="{{ old('search') ?? session('search') }}">
            </div>
            <div class="flex justify-center mt-[80px]">
                <button class="px-[100px] py-[8px] bg-[#2a3547] rounded-lg text-[14px] text-[#fff]">Tìm kiếm <i
                        class="ti ti-search"></i></button>
            </div>
        </form>
    </div>
</div>
