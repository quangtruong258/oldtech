@extends('user.layout')

@section('content')
    <section id="form"><!--form-->
        <div class="container">


            <div class="signup-form"><!--sign up form-->
                <h2>ĐĂNG NHẬP</h2>
                <form action="{{ route('customer.account.check_login') }}" method="post">
                    @csrf
                    @if ($errors->has('email'))
                        <span class="error-message text-danger"> {{ $errors->first('email') }}</span>
                    @endif
                    <input type="email" placeholder="Email" name="email" />
                    @if ($errors->has('password'))
                        <span class="error-message text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <input type="password" placeholder="Mật khẩu" name="password" />
                    <button type="submit" class="btn btn-default">Đăng nhập</button>

                </form>
                <br>
                <a href="{{ route('customer.account.register') }}">Đăng ký tại đây</a>

            </div><!--/sign up form-->
        </div>

        </div>
    </section><!--/form-->
@endsection
