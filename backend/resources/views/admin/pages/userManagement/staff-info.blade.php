@extends('admin.layout.main')
<style>
    input[type="radio"] {
        accent-color: #ff443d;
    }
</style>
@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <div class="card-title">Thông tin tài khoản nhân viên</div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.management.staff.info.update', ['usid' => $usid]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label flex">Họ tên nhân viên <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                    <input type="text" class="form-control" name="fullname" placeholder="Nguyễn Văn A"
                        value="{{ $user->fullname ?? (old('fullname') ?? session('fullname')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label">Biệt danh</label>
                    <input type="text" class="form-control" name="nickname"
                        value="{{ $user->nickname ?? (old('nickname') ?? session('nickname')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">ngày sinh <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*
                        </nav></label>
                    <input type="text" class="form-control date" name="date_of_birth" maxlength="10"
                        placeholder="dd-mm-yyyy"
                        value="{{ $user->date_of_birth ?? (old('date_of_birth') ?? session('date_of_birth')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">giới tính <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*
                        </nav></label>
                    <div class="flex">
                        <div>
                            <input type="radio" value="male" id="male" name="gender"
                                @if (isset($user->gender) && $user->gender === 'male') checked @endif>
                            <label for="male" class="form-label">Nam</label>
                        </div>

                        <div class="ml-[20px]">
                            <input type="radio" value="female" id="female" name="gender"
                                @if (isset($user->gender) && $user->gender === 'female') checked @endif>
                            <label for="female" class="form-label">Nữ</label>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">Số điện thoại <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                    <input type="text" class="form-control phone" name="phone" maxlength="10" placeholder="0382584001"
                        value="{{ $user->phone ?? (old('phone') ?? session('phone')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">Địa chỉ <nav class="text-[#ff443d] text-[20px] ml-[4px]">*
                        </nav></label>
                    <input type="text" class="form-control" name="address"
                        value="{{ $user->address ?? (old('address') ?? session('address')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">Ngày bắt đầu làm việc <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
                    <input type="text" class="form-control date" name="date_start_work" maxlength="10"
                        placeholder="dd-mm-yyyy"
                        value="{{ $user->date_start_work ?? (old('date_start_work') ?? session('date_start_work')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label flex">Mức lương <nav
                            class="text-[#ff443d] text-[20px] ml-[4px]">*
                        </nav></label>
                    <input type="text" class="form-control number" name="salary"
                        value="{{ $user->salary ?? (old('salary') ?? session('salary')) }}">
                </div>

                <div class="form-group mt-[20px]">
                    <label for="" class="form-label">Avatar</label>
                    @include('admin.pages.userManagement.avatar', [
                        'avatar_url' => $user->avatar_url ?? null,
                    ])
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
    $('.number').inputmask('99999999 đ')
    $('.phone').inputmask('9999999999 đ')
    $('.date').inputmask('dd-mm-yyyy')
    $('#upload').on('change', function(e) {
    var input = event.target;
    if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    $('#show-avatar').attr('src', e.target.result)
    }
    reader.readAsDataURL(input.files[0]);
    }
    })
    })
@endsection
