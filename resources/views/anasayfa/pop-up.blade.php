<!-- bootstrap-pop-up -->
<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Giriş Yap & Kayıt Ol
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <section>
                <div class="modal-body">
                    <div class="w3_login_module">
                        <div class="module form-module">
                            <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                <div class="tooltip">Tıklayınız!</div>
                            </div>
                            <div class="form">
                                <h3>Giriş Yapınız</h3>
                                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <input type="text" name="email" id="email" placeholder="Kullanıcı E-mail" required="">
                                    <input type="password" name="password" id="password" placeholder="Şİfreniz" required="">
                                    <input type="submit" value="Giriş">
                                </form>
                            </div>
                            <div class="form">
                                <h3>Hesap Oluştur.</h3>
                                <form method="POST" action="{{ route('kullanici.kayit') }}" aria-label="{{ __('Register') }}" class="form-horizontal" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="name" placeholder="Ad ve Soyadınız" required="">
                                    <input type="password" name="password" placeholder="Şifreniz" required="">
                                    <input type="password" name="password_confirmation" placeholder="Şifreniz Tekrarla" required="">
                                    <input type="email" name="email" placeholder="Email Adresiniz" required="">
                                    <input type="text" name="phone" placeholder="Telefon Numaranız" required="">
                                    <input type="file" name="avatar" placeholder="Resim Seşiniz">
                                    <input type="submit" value="Kaydet">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script>
    $('.toggle').click(function(){
        // Switches the Icon
        $(this).children('i').toggleClass('fa-pencil');
        // Switches the forms
        $('.form').animate({
            height: "toggle",
            'padding-top': 'toggle',
            'padding-bottom': 'toggle',
            opacity: "toggle"
        }, "slow");
    });
</script>
<!-- //bootstrap-pop-up -->