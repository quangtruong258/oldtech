@include('admin.dashboard.components.breadcumb', ['title' => $title['product']['create']['createTitle']])


@if ($errors->any())
    <div class="alert  alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">


            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="">Chọn danh mục</label>

                <select name="category" id="" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach ($categories as $category)
                        {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                        <option value="{{ $category->id }}">{{ $category->ten }}</option>
                    @endforeach
                </select>

            </div>




            <div class="form-group">
                <label for="">Chọn thương hiệu</label>

                <select name="brand" id="" class="form-control">
                    <option value="">Chọn thương hiệu</option>
                    @foreach ($brands as $brand)
                        {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                        <option value="{{ $brand->id }}">{{ $brand->ten }}</option>
                    @endforeach
                </select>

            </div>


            <div class="form-group">
                <label for="">Chọn dòng sản phẩm</label>

                <select name="serie" id="" class="form-control">
                    <option value="">Chọn dòng sản phẩm</option>
                    @foreach ($series as $serie)
                        {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                        <option value="{{ $serie->id }}">{{ $serie->ten }}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="">Chọn loại sản phẩm</label>

                <select name="type" id="" class="form-control">
                    <option value="">Chọn loại sản phẩm</option>
                    @foreach ($typeproducts as $typeproduct)
                        {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                        <option value="{{ $typeproduct->id }}">{{ $typeproduct->ten }}</option>
                    @endforeach
                </select>

            </div>





            <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" class="form-control" name="price" placeholder="Nhập giá bán">
            </div>
            
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="product_status" id="" class="form-control">
                    <option value="" selected>Chọn trạng thái</option>
                    <option value="1">Hiện</option>
                    <option value="2">Ẩn</option>
                </select>
            </div>



        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Chọn ảnh</label>
                <input type="file" class="form-control" name="image" placeholder="">
            </div>

            <div class="form-group">
                <label for="">Chọn ảnh chi tiết</label>
                <input type="file" name="other_image[]" class="form-control" multiple>
            </div>
        </div>

        <div class="col-md-4">
            <br>
            <button type="submit" class="btn btn-primary">Lưu</button>

        </div>

    </div>

</form>
