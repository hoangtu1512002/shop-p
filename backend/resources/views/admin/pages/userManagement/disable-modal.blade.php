<div class="fixed inset-0 bg-[#000] bg-[rgba(0,0,0,0.2)] z-50 hidden" id="modal-disable">
    <div
        class="bg-[#fff] w-[420px] z-100 rounded-lg absolute top-[20%] -translate-y-[50%] left-[50%] -translate-x-[50%] p-[10px]">
        <nav class="flex items-center p-[10px]">
            <i class="ti ti-alert-triangle text-primary text-[18px]"></i>
            <p class="mb-0 ml-[5px] text-[18px]">Xác nhận!</p>
        </nav>

        <h4 class="text-[18px] py-[5px] pl-[10px] mb-0">Vô hiệu hóa tài khoản này ?</h4>
        <p class="text-[14px] py-[5px] pl-[10px] mb-0">Tài khoản vô hiệu hóa sẽ không thể đăng nhập.</p>

        <div class="flex justify-end py-[20px] pr-[20px] gap-[10px]">
            <form action="" method="POST" id="form-disable-confirm">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Xác nhận
                </button>
            </form>
            <button class="btn btn-success" id="btn-close-disable-modal">Hủy</button>
        </div>
    </div>
</div>
