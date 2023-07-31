<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <div class="grid grid-cols-4 gap-[20px]">
        <div class="col-span-3">
            <div class="from-group">
                <label for="" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name"
                    value="{{ $product->name ?? (old('name') ?? session('name')) }}">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label">hình ảnh</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>

        <div class="col-span-1">
            <div class="form-group">
                <label for="" class="form-label">Giá tiền</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label">Số lượng sản phẩm</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label">Danh mục sản phẩm</label>
                <select name="" id="" class="w-full border p-[10px] rounded-lg">
                    <option class="w-full p-[4px]" value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" id="button"
        class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
        nhận</button>
</form>
