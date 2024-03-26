@include('admin.dashboard.components.breadcumb', ['title' => $title['user']['edit']['editTitle']])
@if ($errors->any())
    <div class="alert  alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif




<form method="POST" action="{{ route('admin.user.update',$userById->id) }}">
    @csrf
    @method('put')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5 ">
                <div class="panel-title" style="font-size:30px">Thông tin chung</div>
                <hr>
                <div class="panel-description " style="font-size:15px">
                    <p>- Nhập thông tin chung của thành viên</p>
                    <p>- Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông tin chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb20">
                            <div class="col-lg-6">
                                <div class="form-row" style="margin-bottom: 10px">
                                    <label for="" class="control-label text-right">Email</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="text" name="email"
                                        value="{{ old('email', $userById->email ?? '') }}" class="form-control" readonly
                                        placeholder="" autocomplete="off">


                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row ">
                                    <label for="" class="control-label text-right">Nhóm thành viên</label>
                                    <span class="text-danger">(*)</span>

                                    @php
                                        $userRole = ['Quản trị viên', 'Nhân viên'];
                                    @endphp

                                    <select name="user_catalogue_id" id="" class="form-control">

                                        <option value="1" @if($userById->user_catalogue_id == 1)  selected @endif >Quản trị viên</option>
                                        <option value="2"  @if($userById->user_catalogue_id == 2) selected @endif>Nhân viên</option>
                                        {{-- @foreach ($userRole as $key => $item)
                                            <option
                                                {{ $key == old('user_catalogue_id', isset($userById->user_catalogue_id) ? $userById->user_catalogue_id : '')
                                                    ? 'selected'
                                                    : '' }}
                                                value="{{ $key }}">{{ $item }}></option>
                                        @endforeach --}}


                                    </select>

                                </div>
                            </div>
                        </div>

                        {{-- <div class="row mb20">
                            <div class="col-lg-6">
                                <div class="form-row" style="margin-bottom: 10px">
                                    <label for="" class="control-label text-right mt10 ">Mật khẩu</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="password" value="" class="form-control "
                                        placeholder="" autocomplete="off">
                                </div>




                            </div>

                            <div class="col-lg-6">
                                <div class="form-row ">
                                    <label for="" class="control-label text-right mt10">Nhập lại mật
                                        khẩu</label>
                                    <span class="text-danger">(*)</span>
                                    <input type="password" name="re_password" value="" class="form-control "
                                        placeholder="" autocomplete="off">
                                </div>

                            </div>
                        </div> --}}

                        <div class="row mb20">
                            <div class="col-lg-6">
                                <div class="form-row" style="margin-bottom: 10px">
                                    <label for="" class="control-label text-right mt10 ">Ảnh</label>
                                    <span class="text-danger">(*)</span>
                                </div>
                                <input type="text" name="image" class="form-control input-image">
                                {{-- <button class="form-control">Chọn ảnh</button> --}}
                            </div>



                        </div>

                        <div class="row mb20">
                            <div class="col-lg-6">
                                <br>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit" name="send"
                                        value="send">Lưu</button>
                                </div>
                            </div>
                        </div>




                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>


</form>
