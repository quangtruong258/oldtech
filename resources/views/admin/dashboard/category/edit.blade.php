@include('admin.dashboard.components.breadcumb', ['title' => $title['category']['edit']['editTitle']])


{{-- @if ($errors->any())
<div class="alert  alert-danger">
    <ul>
        @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
    </ul>
</div>
@endif --}}


<div class="row">
    <div class="col-md-4">
        <form action="" method="POST">
            <div class="form-group">

                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" name="" placeholder="Nhập tên danh mục">

            </div>

            <div class="form-group">

                <label for="">Trạng thái</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="1">
                        Hiển thị
                    </label>
                </div>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" value="0">
                        Ẩn
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>

</div>
