@section('styles')
    <style>
        .tox.tox-tinymce {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .tox-statusbar,
        .tox-promotion {
            display: none !important;
        }

        .upload,
        .upload-image-list {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .delete-img {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            transform: translateX(-50%)
        }

        .upload-image-list:hover .delete-img {
            opacity: 1;
            visibility: visible;
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
                <input type="file" class="form-control" name="image[]" id="input-image" accept="image/*" multiple
                    hidden>

                <div class="upload border w-full h-auto min-h-[200px] rounded-sm relative">
                    <div class="upload-image-item w-full min-h-[200px] rounded-sm grid grid-cols-5 gap-[8px] p-[8px]">
                       {{-- display image using js --}}
                    </div>
                    <div class="upload-action w-full h-auto flex justify-end">
                        <button type="button" class="bg-[#ff6b6b] text-[#fff] rounded-sm">
                            <label for="input-image" class="py-[10px] px-[40px]">Chọn ảnh</label>
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label">Mô tả sản phẩm</label>
                <textarea name="description" id="description">{{ $product->description ?? (old('name') ?? session('name')) }}</textarea>
            </div>
        </div>

        <div class="col-span-1">
            <div class="form-group">
                <label for="" class="form-label flex">Giá tiền <nav class="text-[#ff443d] text-[20px] ml-[4px]">
                        *</nav></label>
                <input type="text" name="price" class="form-control price" placeholder="nhập giá tiền" value="{{ $product->price ?? (old('name') ?? session('name')) }}">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label flex">Số lượng sản phẩm <nav
                        class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                <input type="text" name="total" class="total form-control" placeholder="nhập số lượng" value="{{ $product->total ?? (old('name') ?? session('name')) }}">
            </div>

            <div class="form-group mt-[20px]">
                <label for="" class="form-label flex">Danh mục sản phẩm</label>
                <select name="category_id" id="" class="select2 form-control">
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
            $('.price').inputmask('9999999 đ');
            $('.total').inputmask('999');

            $('#input-image').on('change', function(event) {
                const files = event.target.files;
                const showImages = $('.upload-image-item');
                $('.loader-container').addClass('show');
                previewImages(files, showImages);
                $('.loader-container').removeClass('show');
            })

            function previewImages(files, showImagesElement) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();

                    reader.onload = function(result) {
                        const showImage = $('<div></div>');
                        showImage.attr('class', 'upload-image-list grid-span-1 border relative z-[99]')
                        showImagesElement.append(showImage);

                        const img = $('<img/>');
                        img.attr('src', result.target.result);
                        img.attr('alt', 'hình ảnh');
                        img.attr('class', 'w-[160px] h-[200px] rounded-sm bg-contain');
                        showImage.append(img);

                        const deleteImgButton = $('<button></button>');
                        deleteImgButton.attr('type', 'button');
                        deleteImgButton.attr('class',
                            'delete-img absolute bottom-[0] left-[50%] bg-[#ff6b6b] text-[18px] text-[#fff] cursor-pointer px-[10px] py-[4px] rounded-sm z-[999]'
                            );

                        const deleteImgButtonIcon = $('<i></i>');
                        deleteImgButtonIcon.attr('class', 'ti ti-trash');
                        deleteImgButton.append(deleteImgButtonIcon);

                        showImage.append(deleteImgButton);

                        deleteImgButton.on('click', function() {
                            showImage.remove();
                        });
                    }
                    reader.readAsDataURL(file);
                }
            }
        })
        tinymce.init({
            selector: '#description',
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
        });
    </script>
@endsection
