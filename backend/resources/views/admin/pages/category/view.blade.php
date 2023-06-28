@extends('admin.layout.main')

@section('content')
    <div>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Quản lí</th>
            </tr>
            <tr class="">
                <td>1</td>
                <td class="">Cơm gà quay</td>
                <td>
                    <img class="w-[100px] rounded-md block"
                        src="https://images.deliany.co/02dNb0Qm3DjC__0SdXqPg1AEJu7v5v_MombzErRqcVc/fill/600/600/ce/1/czM6Ly9tYWZmaWFjby1jYXJhdmFuLWltYWdlcy1wcm9kdWN0aW9uL2F0dGFjaG1lbnRzL2M0NmExNTc0LWI3OGMtNDliZS1hMzA0LWMzZDhmNGM3MDFhOC1zdWdpLnBuZw"
                        alt="">
                </td>
                <td>đang bán</td>
                <td>
                    <a href="" class="btn btn-success text-xl font-medium"><i class="ti ti-edit"></i></a>
                    <a href="" class="btn btn-danger text-xl font-medium"><i class="ti ti-trash"></i></a>
                </td>
            </tr>
        </table>
    </div>
@endsection
