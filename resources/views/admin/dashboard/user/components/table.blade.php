<table class="table table-striped table-bordered">

    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>

            <th class="text-center">Ảnh</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phân Quyền</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($users) && is_object($users))

            @foreach ($users as $user)
                <tr>
                    <td class="text-center"><input type="checkbox" value="" class="input-checkbox checkBoxItem">
                    </td>

                    <td class="text-center">
                        <span class="image img-cover"><img src="" alt=""></span>
                    </td>

                    <td class="text-center">{{ $user->email }}</td>

                    @if ($user->user_catalogue_id == 1)
                        <td class="text-center">Quản trị viên</td>
                    @else
                        <td class="text-center">Nhân viên</td>
                    @endif


                   


                    @if ($user->publish == 1)
                    <td class="text-center">Đang hoạt động</td>
                @else
                    <td class="text-center">Dừng hoạt động</td>
                @endif

                    {{-- <td class="text-center">
                        <input value="{{$user->publish}}" type="checkbox" class="js-switch status" data-field="publish" data-model="User" {{($user->publish == 1) ? 'checked ' : ' '}} 
                        data-modelId="{{$user->id}}" />
                    </td> --}}



                    <td class="text-center">
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>



</table>
{{ $users->links('pagination::bootstrap-4') }}



{{-- <script>
    $(document).ready(function() {
        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, {
            color: '#1AB394'
        });
    })
</script> --}}
