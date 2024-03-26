@extends('user.layout')

@section('content')
    <section id="form"><!--form-->
        <div class="container">


            <div class="signup-form"><!--sign up form-->
                <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
                <form action="" method="post">
                    @csrf
                    @if ($errors->has('name'))
                    <span class="text-danger error-message">{{ $errors->first('name') }}</span>
                    @endif
                    <input type="text" placeholder="Họ tên" name="name"/>
                    @if ($errors->has('email'))
                    <span class="text-danger error-message">{{ $errors->first('email') }}</span>
                    @endif
                    <input type="email" placeholder="Email" name="email"/>
                    @if ($errors->has('phone'))
                    <span class="text-danger error-message">{{ $errors->first('phone') }}</span>
                    @endif
                    <input type="phone" placeholder="Điện thoại" name="phone"/>
                    @if ($errors->has('address'))
                    <span class="text-danger error-message">{{ $errors->first('address') }}</span>
                    @endif
                    <input type="address" placeholder="Địa chỉ" name="address"/>
                    @if ($errors->has('password'))
                    <span class="text-danger error-message">{{ $errors->first('password') }}</span>
                    @endif
                    <input type="password" placeholder="Mật khẩu" name="password" />
                    @if ($errors->has('confirm_password'))
                    <span class="text-danger error-message">{{ $errors->first('confirm_password') }}</span>
                    @endif
					<input type="password" placeholder="Nhập lại mật khẩu" name="confirm_password" />
                    <button type="submit" class="btn btn-default">Đăng ký tài khoản</button>
                </form>
            </div><!--/sign up form-->
        </div>

        </div>
    </section><!--/form-->
@endsection
