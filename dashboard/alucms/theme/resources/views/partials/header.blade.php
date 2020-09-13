<?php
/**
 * header.blade.php
 * Created by: trainheartnet
 * Created at: 7/24/20
 * Contact me at: longlengoc90@gmail.com
 */
?>
<header class="header" id="header">
    <div class="container">
        <div class="main-navigation d-flex justify-space align-center pt-10 pb-10">
            <div class="logo d-flex justify-start align-center">
                <a href="{{route('theme::home.get')}}">
                    <img src="{{asset('themes/doantat/lib/images/logo-blank.png')}}" alt="" class="img-responsive w-222 site-logo">
                </a>

                <div id="timer" class="timer color-fff font-vt fz-25 ml-15"></div>
            </div>

            @if (auth()->check())
                <div class="user-button d-flex align-center">
                    <div class="wallet-info mr-15 d-flex align-center">
                        @php
                            $wallet = \AluCMS\Wallet\Models\Wallet::select('amount')->where('user_id', auth()->id())->first();
                        @endphp

                        @if ($wallet)
                            <span class="mr-15 fz-20 lh-20 color-fff fw-700">{{number_format($wallet->amount)}}</span><img src="{{asset('themes/doantat/lib/images/coin.png')}}" alt="" class="img-responsive w-25">
                        @else
                            <a href="javascript:;" class="site-button mr-5">
                                <div class="button-red button-inner d-flex justify-center align-center">
                                    <img src="{{asset('themes/doantat/lib/images/wallet.png')}}" alt="" class="img-responsive w-35">
                                    <span class="fz-14">Kích hoạt ví</span>
                                </div>
                            </a>
                        @endif
                    </div>

                    <a href="{{route('theme.user.get')}}" class="site-button mr-15">
                        <div class="button-blue button-inner d-flex justify-center align-center">
                            @if (auth()->user()->thumbnail != '')
                                <img src="{{auth()->user()->thumbnail}}" alt="" class="img-responsive w-35">
                            @else

                                <img src="https://via.placeholder.com/35x35?text={{auth()->user()->username}}" alt="" class="img-responsive w-35">
                            @endif
                            <span class="fz-14">{{auth()->user()->username}}</span>
                        </div>
                    </a>

                    <a href="{{route('theme::logout.get')}}" title="Đăng xuất">
                        <img src="{{asset('themes/doantat/lib/images/logout.png')}}" alt="" class="img-responsive w-45">
                    </a>
                </div>
            @else
                <div class="register-button d-flex">
                    <a href="javascript:;" class="site-button mr-15" data-target="login">
                        <span class="button-blue button-inner d-flex justify-center">Đăng nhập</span>
                    </a>
                    <a href="javascript:;" class="site-button mr-15" data-target="register">
                        <span class="button-green button-inner d-flex justify-center">Đăng ký</span>
                    </a>
                </div>
            @endif

        </div>
    </div>

    <div class="popup-backdrop po-fixed po-t-0 po-b-0 po-r-0 po-l-0 d-flex justify-center align-center z-1">

        <div class="popup-content po-relative" id="global-popup">

            <div class="popup-content-close po-absolute po-t--18 po-r--18">
                <a href="javascript:;"><i class="fas fa-times"></i></a>
            </div>

            <div class="popup-content-inner color-fff">
                @if (session('message'))
                    {{session('message')}}
                @endif

                @if (count($errors) > 0)
                    <strong>@lang('dashboard::dashboard.error')</strong>
                    @foreach ($errors->all() as $e)
                        <div>{{$e}}</div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="popup-content po-relative" id="login">

            <div class="popup-content-close po-absolute po-t--18 po-r--18">
                <a href="javascript:;"><i class="fas fa-times"></i></a>
            </div>

            <div class="popup-content-inner">
                <img src="{{asset('themes/doantat/lib/images/logo.png')}}" alt="" class="img-responsive center-block w-200 mb-20">
                <form action="{{route('theme::login.post')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="color-fff">Tài khoản</label>
                        <input required type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="" class="color-fff">Mật khẩu</label>
                        <input required type="password" class="form-control" name="password">
                    </div>

                    <button type="submit" class="site-button center-block mt-35">
                        <span class="button-blue button-inner d-flex justify-center">Đăng nhập</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="popup-content po-relative" id="register">

            <div class="popup-content-close po-absolute po-t--18 po-r--18">
                <a href="javascript:;"><i class="fas fa-times"></i></a>
            </div>

            <div class="popup-content-inner">
                <img src="{{asset('themes/doantat/lib/images/logo.png')}}" alt="" class="img-responsive center-block w-200 mb-20">
                <form action="{{route('theme::register.post')}}" method="post" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="" class="color-fff">Tài khoản</label>
                        <input required type="text" class="form-control" name="username" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="color-fff">Email</label>
                        <input required type="text" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="color-fff">Mật khẩu</label>
                        <input required type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="" class="color-fff">Nhập lại mật khẩu</label>
                        <input required type="password" class="form-control" name="repassword">
                    </div>

                    <button type="submit" class="site-button center-block mt-35">
                        <span class="button-blue button-inner d-flex justify-center">Đăng ký</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</header>

@if (count($errors) > 0 || session('message'))
    @push('js')
        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('.popup-backdrop').css('display', 'flex');
                $('#global-popup').show();
            });
        </script>
    @endpush
@endif
