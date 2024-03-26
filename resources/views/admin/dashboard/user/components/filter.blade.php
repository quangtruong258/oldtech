<form action="{{route('admin.dashboad.user')}}">

    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
    
                @php
                    $perpage = request('perpage') ?: old('perpage');
                @endphp
    
                <select style="height: 40px" name="perpage"
                    class="form-control input-sm perpage filter mr10" id="">
                    @for ($i = 20; $i <= 100; $i++)
                        <option {{ ($perpage == $i) ? 'selected' : ''}}  value="{{ $i }}" >{{$i}}bản ghi </option>
                    @endfor
                </select>
                <div class="action">
                    <div class="uk-flex uk-flex-middle">
                        <select name="user_catalogue_id" class="form-control mr10" id="">
                            <option value="0" selected="selected">Chọn nhóm thành viên</option>
                            <option value="1">Quản trị viên</option>
                        </select>
    
                        <div class="uk-flex uk-flex-middle mr10">
                            <div class="input-group">
                                <input type="text" name="keyword" value="{{request('keyword') ?: old('keyword')}}"
                                    placeholder="Nhập từ khóa bạn muốn tìm kiếm" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submmit" name="search" value="search"
                                        class="btn btn-primary mb0 btn-sm">Tìm kiếm</button>
                                    <a href="{{route('admin.user.create')}}" class="btn btn-danger"><i class="fa fa-plus">Thêm thành viên</i></a>
                                </span>
    
    
                            </div>
                        </div>
    
                    </div>
                </div>
    
    
            </div>
            
    
        </div>
    </div>
</form>