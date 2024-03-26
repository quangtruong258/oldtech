@include('admin.dashboard.components.breadcumb', ['title' => $title['category']['index']['indexTitle']])


<div class="row ">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $title['category']['index']['indexTableHeading'] }}</h5>
                <table class="table table-striped table-bordered">

                    <thead class="">
                        <tr>

                            <th class="">STT</th>
                            <th class="">Tên danh mục</th>
                            <th class="">Trạng thái</th>
                            <th class="">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td class="">
                            <a href="" class="btn btn-success"><i
                                    class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                        </tr>

                    </tbody>



                </table>
                {{-- {{ $users->links('pagination::bootstrap-4') }} --}}



                {{-- <script>
                    $(document).ready(function() {
                        var elem = document.querySelector('.js-switch');
                        var switchery = new Switchery(elem, {
                            color: '#1AB394'
                        });
                    })
                </script> --}}

            </div>
            <div class="ibox-content">

            </div>

        </div>
