@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        @include('admin.form.category-form', ['action' => route('admin.category.update', $category->id), 'category' => $category])
    </div>
@endsection

@section('scripts')
$(document).ready(function() {
    const image_input = $('#image-category');

    image_input.on('change', function(e) {
        previewImage(e);
    });

    $(document).on('load', function() {
        previewImage({
            target: image_input.get(0)
        });
    });

    function previewImage(event) {
        const input = event.target;
        const loader = $('.loader-container');
        const previewImg = $('.preview-img');
        const reader = new FileReader();

        if (input.files && input.files[0]) {

            reader.onload = function(e) {
                previewImg.attr('src', e.target.result);
                previewImg.removeClass('hidden');
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            previewImg.attr('src', '');
            previewImg.addClass('hidden');
        }
    }
});
@endsection
