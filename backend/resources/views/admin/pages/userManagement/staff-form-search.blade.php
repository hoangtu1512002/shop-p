<style>
    input[type="radio"] {
        accent-color: #ff443d;
    }
</style>

<div class="w-full border bg-[rgb(255,255,255)] rounded-lg">
    <form action="{{ route($route) }}" method="GET">
        <div class="grid grid-cols-3">
            <div class="form-group mx-[20px] mt-[16px] col-span-1">
                <label class="form-label pb-[6px] text-[16px]">Tìm kiếm theo chức vụ</label>
                <select class="form-select select2" name="role">
                    <option value="" class="form-option"></option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mx-[20px] mt-[16px] col-span-2">
                <label class="form-label pb-[6px] text-[16px]">Tìm kiếm theo từ khóa</label>
                <input type="search" name="keyword" class="form-control"
                    value="{{ old('keyword') ?? session('keyword') }}">
            </div>
        </div>

        <div class="form-group mx-[20px] mt-[16px]">
            <label class="form-label pb-[6px] text-[16px]">Trạng thái</label>
            <div class="flex gap-[20px]">
                <div class="form-group">
                    <input type="radio" name="status" value="1" id="active">
                    <label for="active">Kích hoạt</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="status" value="2" id="in-active">
                    <label for="in_active">Vô hiệu</label>
                </div>
            </div>
        </div>

        <button
            class="bg-[#2a3547] text-[#fff] font-bold text-[16px] block mx-auto m-[40px] px-[100px] py-[6px] rounded-lg">Tìm
            kiếm</button>
    </form>
</div>
