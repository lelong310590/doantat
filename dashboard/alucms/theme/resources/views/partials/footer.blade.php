<?php
/**
 * footer.blade.php
 * Created by: trainheartnet
 * Created at: 9/13/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

<footer id="footer" class="footer">
    <div class="footer-partner d-flex align-center">
        <img src="{{asset('themes/doantat/lib/images/partner01.svg')}}" alt="" class="img-responsive w-150">
        <img src="{{asset('themes/doantat/lib/images/partner02.svg')}}" alt="" class="img-responsive w-150">
        <img src="{{asset('themes/doantat/lib/images/partner03.svg')}}" alt="" class="img-responsive w-150">
        <img src="{{asset('themes/doantat/lib/images/partner04.svg')}}" alt="" class="img-responsive w-150">
        <img src="{{asset('themes/doantat/lib/images/partner05.svg')}}" alt="" class="img-responsive w-150">
        <img src="{{asset('themes/doantat/lib/images/partner06.svg')}}" alt="" class="img-responsive w-150">
    </div>

    <div class="footer-bottom pt-50 pb-30">
        <div class="container">
            <div class="footer-menu d-flex justify-center">
                <a href="">Điều khoản & Quy định</a>
                <a href="">Trách nhiệm người chơi</a>
                <a href="">Chính sách bảo mật</a>
                <a href="">Bản quyền</a>
            </div>

            <div class="footer-bank d-flex align-end mt-30 mb-50">
                <img src="{{asset('themes/doantat/lib/images/bank01.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank02.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank03.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank04.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank05.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank06.png')}}" alt="" class="img-responsive">
                <img src="{{asset('themes/doantat/lib/images/bank07.png')}}" alt="" class="img-responsive">
            </div>

            <div class="footer-bottom-inner color-fff">
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="footer-text d-flex justify-center align-center h-100 m-mt-20">
                            <img src="{{asset('themes/doantat/lib/images/logo-pagcor.png')}}" alt="" class="img-responsive">
                            <p>
                                Trang mạng cá cược <a href="/" class="color-f49e1d txt-uper">Doantat</a> hoạt động hợp pháp tại Philippines
                                (Giấy phép PAGCOR số OGL16-0023) được giám sát bởi tổ chức Gaming Associates.
                            </p>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="footer-text m-mt-70 d-flex justify-center align-center h-100">
                            <img src="{{asset('themes/doantat/lib/images/18+.png')}}" alt="" class="img-responsive mr-20">
                            <p class="lh-20 text-justify">
                                Chúng tôi tích cực đẩy mạnh cá cược có trách
                                nhiệm và cương quyết từ chối trẻ vị thành niên sử dụng phần mềm của
                                chúng tôi để cá cược trên mạng.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@auth
    <div class="fixed-footer">
        <a href="tel:0979498888" class="fixed-hotline"><i class="fas fa-phone"></i> 0979.49.8888</a>
        <a href="" class="fixed-live-chat"><i class="far fa-comment-dots"></i> Livechat</a>
    </div>
@endauth
