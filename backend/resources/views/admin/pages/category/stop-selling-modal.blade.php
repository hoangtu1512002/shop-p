<div class="fixed inset-0 bg-[#000] bg-[rgba(0,0,0,0.2)] z-50 hidden" id="modal-stop">
    <div
        class="bg-[#fff] w-[420px] z-100 rounded-lg absolute top-[20%] -translate-y-[50%] left-[50%] -translate-x-[50%] p-[10px]">
        <nav class="flex items-center p-[10px]">
            <i class="ti ti-alert-triangle text-primary text-[18px]"></i>
            <p class="mb-0 ml-[5px] text-[18px]">Xác nhận!</p>
        </nav>

        <h4 class="text-[18px] py-[5px] pl-[10px] mb-0">Ngưng bán sản phẩm này?</h4>
        <p class="text-[12px] pl-[10px]">các sản phẩm đang sử dụng danh mục này sẽ bị ẩn.</p>

        <div class="flex justify-end py-[20px] pr-[20px] gap-[10px]">
            <form action="" method="POST" id="form-stop-selling-confirm">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-danger">
                    Xác nhận
                </button>
            </form>
            <button class="btn btn-success" id="btn-close-modal-stop">Hủy</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.querySelector('#modal-stop');
        const btnClose = document.getElementById('btn-close-modal-stop');
        btnClose.addEventListener('click', function() {
            modal.classList.add('hidden')
        });
    });

    function stopSellingModal(route) {
        const modal = document.querySelector('#modal-stop');
        const confirm = document.querySelector('#form-stop-selling-confirm');
        modal.classList.toggle('hidden');
        confirm.action = route
    }
</script>
