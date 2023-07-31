<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <div class="from-group">
        <label for="" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" autocomplete="off">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Mật khẩu</label>
        <input type="password" class="form-control" name="password" autocomplete="new-password">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Họ và tên nhân viên</label>
        <input type="text" class="form-control" name="fullname">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Biệt danh</label>
        <input type="text" class="form-control" name="nickname">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" name="phone">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Địa chỉ</label>
        <input type="text" class="form-control" name="address">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Sở thích</label>
        <input type="text" class="form-control" name="interest">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label">Chức vụ</label>
        <select class="form-staff form-select select2" name="role">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group checkbox-container mt-[20px]">
        @include('admin.common.checkbox')
    </div>

    <button type="submit" id="button"
        class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
        nhận</button>
</form>
