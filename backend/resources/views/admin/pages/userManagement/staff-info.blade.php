@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <div class="card-title">Thông tin tài khoản nhân viên</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="form-label">Họ tên nhân viên</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Nguyễn Văn A">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Biệt danh</label>
                    <input type="text" class="form-control" name="nickname">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">ngày sinh</label>
                    <input type="text" class="form-control date" name="date_of_birth" maxlength="10"
                        placeholder="dd-mm-yyyy">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Số điện thoại</label>
                    <input type="text" class="form-control number" name="phone" maxlength="10"
                        placeholder="0382584001">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Ngày bắt đầu làm việc</label>
                    <input type="text" class="form-control date" name="date_start_work" maxlength="10" placeholder="dd-mm-yyyy">
                </div>

                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Mức lương</label>
                    <input type="text" class="form-control number" name="salary">
                </div>


                <div class="form-group">
                    <label for="" class="form-label mt-[20px]">Sở thích</label>
                    <input type="text" class="form-control" name="interest">
                </div>

                <button type="submit" id="button"
                    class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
                    nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    $(document).ready(function() {
        $('.number').inputmask('9999999999')
        $('.date').inputmask('dd-mm-yyyy')
        $('.textarea').inputmask('')
    })
@endsection
