@extends('admin.layout.main')

@section('content')
    <div class="card p-[20px] mt-[40px]">
        <div class="card-header">
            <div class="card-title">Thêm mới tài khoản nhân viên</div>
        </div>
        <div class="card-body">
            @include('admin.form.user-staff-form', [
                'action' => route('admin.user.management.staff.update', $user->id),
                'roles' => $roles,
                'user' => $user,
            ])
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var roleId = $('.form-staff').val();
            var user = @json($user);
            loadPermissions(roleId, user.id);

            $('.form-staff').on('change', function(e) {
                var newRoleId = e.target.value;
                loadPermissions(newRoleId, user.id);

            });



            function loadPermissions(roleId, userId = null) {
                $.ajax({
                        url: "{{ url('admin/get/permission') }}/" + roleId,
                        type: "POST",
                        data: {
                            type: "edit",
                            userId: userId
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
    </script>
@endsection
