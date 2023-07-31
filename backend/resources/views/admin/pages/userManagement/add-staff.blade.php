@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <div class="card-title">Thêm nhân viên mới</div>
        </div>
        <div class="card-body">
            @include('admin.form.user-staff-form', [
                'action' => route('admin.user.management.store.staff'),
                'roles' => $roles,
                'user' => null,
            ])
        </div>
    </div>
@endsection

@section('scripts')
    $(document).ready(function() {
        var roleId = $('.form-staff').val(); 
        loadPermissions(roleId); 
    
        $('.form-staff').on('change', function(e) {
            var newRoleId = e.target.value;
            loadPermissions(newRoleId);
    
        });

        function loadPermissions(roleId) {
            $.ajax({
                    url: "{{ url('admin/get/permission') }}/" + roleId,
                    type: "POST",
                    dataType: 'json'
                })
                .then(function(res) {
                    $('.checkbox-container').html(res.html);
                })
                .catch(function(error) {
                    console.log('error:', error);
                });
        }
    });
@endsection
