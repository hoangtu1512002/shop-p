<form action="{{ $action }}" method="POST">
    @csrf
    <div class="from-group">
        <label for="" class="form-label">Tên danh mục</label>
        <input type="text" class="form-control" name="category[name]"
            value="{{ old('category[name]', $category->name ?? '') }}">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">hình ảnh</label>
        <input type="file" class="form-control" name="category[image]" onchange="previewImage(event)">
    </div>

    <div class="preview mt-[10px] w-[200px] h-[200px] border cover rounded-xl">
        @if ($category && $category->image)
            <img src="{{ $category->image_url }}" alt="hình ảnh" class="preview-img w-full h-full object-contain rounded-xl">
        @else
            <img src="" alt="hình ảnh" class="preview-img w-full h-full object-contain rounded-xl hidden">
        @endif
    </div>

    <button type="submit"
        class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
        nhận</button>
</form>


<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.querySelector('.preview-img');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    }

    window.addEventListener('DOMContentLoaded', function() {
        previewImage({
            target: document.querySelector('input[name="category[image]"]')
        });
    });
</script>
