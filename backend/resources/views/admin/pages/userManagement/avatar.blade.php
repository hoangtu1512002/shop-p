<style>

</style>

<div class="w-[200px] h-[200px] border rounded-[50%] relative">
    <div class="w-[200px] h-[200px] flex items-center justify-center bg-[#d0dbe1] rounded-[50%]">
        <img id="show-avatar" src="{{ $avatar_url ? $avatar_url : asset('images/profile/user-1.jpg' ) }}" alt=""
            class="w-full h-full rounded-[50%]  object-cover">
    </div>

    <div
        class="absolute top-0 right-[10px] bg-[#ff443d] w-[40px] h-[40px] rounded-[50%] flex items-center justify-center">
        <input type="file" id="upload" name="avatar" hidden>
        <label for="upload" class="text-[#fff] text-[28px] cursor-pointer"><i class="ti ti-cloud-upload"></i></label>
    </div>
</div>
