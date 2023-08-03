@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <div class="card-title">Thêm mới tài khoản nhân viên</div>
        </div>
        <div class="card-body">
            @include('admin.form.user-staff-form', [
                'action' => route('admin.user.management.staff.store'),
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
                    data: {
                        type: 'create' 
                    }
                })
                .then(function(res) {
                    $('.checkbox-container').html(res);
                })
                .catch(function(error) {
                    console.log('error:', error);
                });
        }
    });
@endsection
