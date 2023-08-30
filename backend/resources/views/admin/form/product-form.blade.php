@section('styles')
    <style>
        .tox-statusbar, .tox-promotion {
            display: none !important;
        }

        .upload {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>
@endsection

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <div class="grid grid-cols-4 gap-[20px]">
        <div class="col-span-3">
            <div class="from-group">
                <label for="" class="form-label flex">Tên sản phẩm <nav
                        class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                <input type="text" class="form-control" name="name"
                    value="{{ $product->name ?? (old('name') ?? session('name')) }}" placeholder="nhập tên sản phẩm">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label flex">hình ảnh <nav class="text-[#ff443d] text-[20px] ml-[4px]">
                        *</nav></label>
                <input type="file" class="form-control" name="image[]" id="image" hidden>

                <div class="upload border w-full h-auto min-h-[200px] rounded-sm">
                    <div class="upload-image-item grid grid-cols-5 p-[10px] gap-[8px]">
                        <div class="upload-image-list js-show-image w-[160px] min-h-[180px] rounded-sm  bg-contain">
                            {{-- <img src="" alt="" class="w-full h-full rounded-sm bg-contain"> --}}
                        </div>
                    </div>
                    <div class="upload-action w-full h-auto flex justify-end">
                        <button type="button" class="bg-[#ff6b6b] text-[#fff] rounded-sm">
                            <label for="image" class="py-[10px] px-[40px]">Chọn ảnh</label>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label">Mô tả sản phẩm</label>
                <textarea name="description" id="description"></textarea>
            </div>
        </div>

        <div class="col-span-1">
            <div class="form-group">
                <label for="" class="form-label flex">Giá tiền <nav class="text-[#ff443d] text-[20px] ml-[4px]">
                        *</nav></label>
                <input type="text" class="form-control price" placeholder="nhập giá tiền">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label flex">Số lượng sản phẩm <nav
                        class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                <input type="text" class="form-control" placeholder="nhập số lượng">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label flex">Danh mục sản phẩm <nav
                        class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                <select name="" id="" class="select2 form-select">
                    <option value="" class="form-option"></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <button type="submit" id="button"
        class="border-2 border-[#ff6b6b] text-[16px] rounded-lg py-[6px] px-[60px] mt-[20px] mx-auto hover:bg-[#ff6b6b] hover:text-white duration-200">xác
        nhận</button>
</form>

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.price').inputmask('9999999 đ')
        })
        tinymce.init({
            selector: '#description',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection
