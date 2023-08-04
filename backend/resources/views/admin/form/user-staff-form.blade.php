<form action="{{ $action }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
    <div class="from-group">
        <label for="" class="form-label flex">Email <nav class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
        <input type="text" class="form-control" name="email" autocomplete="off"
            value="{{ $user->email ?? (old('email') ?? session('email')) }}">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label flex">Mật khẩu <nav class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
        <input type="password" class="form-control" name="password" autocomplete="new-password">
    </div>

    <div class="form-group mt-[20px]">
        <label for="" class="form-label flex">Chức vụ <nav class="text-[#ff443d] text-[20px] ml-[4px]">*</nav></label>
        <select class="form-staff form-select select2" name="role">
            @foreach ($roles as $role)
                @php
                    $selected = isset($user) ? $user->roles->contains('id', $role->id) : false;
                @endphp
                <option value="{{ $role->id }}" @if ($selected) selected @endif>
                    {{ $role->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group checkbox-container mt-[20px]">
        {{-- show checkbox input when call ajax  --}}
    </div>

    <button type="submit" id="button"
        class="border-2 border-[#5d87ff] rounded-lg py-[10px] px-[60px] mt-[20px] mx-auto hover:bg-[#5d87ff] hover:text-white duration-200">xác
        nhận</button>
</form>
