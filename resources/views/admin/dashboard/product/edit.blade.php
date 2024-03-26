@include('admin.dashboard.components.breadcumb', ['title' => $title['product']['edit']['editTitle']])


@if ($errors->any())
    <div class="alert  alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-4">

                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm"
                        value="{{ $product->ten }}">
                </div>

                <div class="form-group">
                    <label for="">Chọn danh mục</label>

                    <select name="category" id="" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                            <option value="{{ $category->id }}" selected>{{ $category->ten }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">Chọn thương hiệu</label>

                    <select name="brand" id="" class="form-control">
                        <option value="">Chọn thương hiệu</option>
                        @foreach ($brands as $brand)
                            {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                            <option value="{{ $brand->id }}" selected>{{ $brand->ten }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">Chọn dòng sản phẩm</label>

                    <select name="serie" id="" class="form-control">
                        <option value="">Chọn dòng sản phẩm</option>
                        @foreach ($series as $serie)
                            {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                            <option value="{{ $serie->id }} " selected>{{ $serie->ten }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">Chọn loại sản phẩm</label>

                    <select name="type" id="" class="form-control">
                        <option value="">Chọn loại sản phẩm</option>
                        @foreach ($typeproducts as $typeproduct)
                            {{-- <option value="0">[Chọn nhóm thành viên]</option> --}}
                            <option value="{{ $typeproduct->id }}" selected>{{ $typeproduct->ten }}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá bán"
                        value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="product_status" id="" class="form-control">
                        <option value="" selected>Chọn trạng thái</option>
                        @if ($product->status == 1)
                            <option value="1" selected>Hiện</option>

                            <option value="2">Ẩn</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                {{-- <div class="form-group">
                    <label for="">Chọn loại sản phẩm</label>
            
                    <select name="type" id="" class="form-control">
                        <option value="">Chọn loại sản phẩm</option>
                        @foreach ($typeproducts as $typeproduct)
                            
                            <option value="{{ $typeproduct->id }}" selected>{{ $typeproduct->ten }}</option>
                        @endforeach
                    </select>
            
                </div> --}}





                <div class="form-group">
                    <label for="">Chọn ảnh đại diện</label>
                    <input type="file" class="form-control" name="image" placeholder="">
                    <img src="uploads/images/{{ $product->image }}" alt="" width="40%"></img>
                </div>


            </div>
            <div class="col-md-4">

                <div class="form-group">
                    <label for="">Chọn ảnh chi tiết</label>
                    <input type="file" name="other_image[]" class="form-control" multiple>


                    <div class="row">
                        @foreach ($product->images as $image)
                            <div class="col-md-3" style="position: relative">
                                <a href="" class="thumbnail">
                                    <img src="uploads/images/{{$image->image}}"
                                        alt="" width="40%"></img>
                                    <a onclick="return confirm('Xóa ảnh này?')" style="position: absolute; top:5px; right:20px" href="{{route('product.deleteImage', $image->id)}}"
                                        class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>

                                </a>


                            </div>
                        @endforeach


                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>


</form>
