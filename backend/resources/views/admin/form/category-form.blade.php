<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <div class="from-group">
        <label for="" class="form-label flex">Tên danh mục <nav class="text-[#ff443d] text-[20px] ml-[4px]">*</nav>
        </label>
        <input type="text" class="form-control" name="name"
            value="{{ $category->name ?? (old('name') ?? session('name')) }}">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label flex">hình ảnh <nav class="text-[#ff443d] text-[20px] ml-[4px]">*</nav>
        </label>
        <div class="bg-[#ff443d] w-[40px] h-[40px] rounded-[50%] flex items-center justify-center ml-[4px]">
            <input type="file" id="image-category" name="avatar" hidden>
            <label for="image-category" class="text-[#fff] text-[28px] cursor-pointer"><i
                    class="ti ti-cloud-upload"></i></label>
        </div>
    </div>

    <div class="preview mt-[10px]">
        @if ($category && $category->image_url)
            <img src="{{ $category->image_url }}" alt="hình ảnh"
                class="preview-img border block p-[4px] max-w-[200px] max-h-[220px] object-contain rounded-xl">
        @else
            <img src="" alt="hình ảnh"
                class="preview-img max-w-[200px] max-h-[220px] border p-[4px] object-contain rounded-xl hidden">
        @endif
    </div>

    <button type="submit" id="button"
        class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
        nhận</button>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const image_input = document.querySelector('#image-category');

        image_input.addEventListener('change', function(e) {
            previewImage(e);
        });

        document.addEventListener('load', function() {
            previewImage({
                target: image_input
            });
        });

        function previewImage(event) {
            var input = event.target;
            var previewImg = document.querySelector('.preview-img');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                previewImg.src = '';
                previewImg.classList.add('hidden');
            }
        }
    });
</script>
