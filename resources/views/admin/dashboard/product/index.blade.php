@include('admin.dashboard.components.breadcumb', ['title' => $title['product']['index']['indexTitle']])


<div class="row ">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $title['product']['index']['indexTableHeading'] }}</h5>
                <table class="table table-striped table-bordered">

                    <thead class="">
                        <tr>

                            <th class="">STT</th>
                            <th class="">Tên sản phẩm</th>
                            <th class="">Danh mục</th>
                            <th>Loại sản phẩm</th>
                            <th class="">Giá bán</th>
                            <th class="">Ảnh</th>
                            <th class="">Trạng thái</th>
                            <th class="">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product->ten }}</td>
                            <td>{{ $product->category->ten }}</td>
                            <td>{{ $product->type->ten }}</td>
                            <td>{{ $product->price }}</td>
                            <td><img src="uploads/images/{{ $product->image }}" alt="" width="40"></td>
                            @if ($product->status == 1)
                                <td class="">Hiện</td>
                            @else
                                <td class="">Ẩn</td>
                            @endif


                            <td class="">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <form method="post" action="{{ route('product.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Xóa sản phẩm này?')"
                                        href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger"><i
                                            class="fa fa-trash"></i></button>

                                </form>
                            </td>
                            </tr>
                        @endforeach

                    </tbody>



                </table>

            </div>
            <div class="ibox-content">

            </div>

        </div>
