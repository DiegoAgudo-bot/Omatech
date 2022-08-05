<!DOCTYPE html>
<html>
    @include('back.layouts.partials.head')
    <body>
        <div id="card-container">
            <div id="card">
                <div id="card-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="{{asset('images/logo/logo.png')}}" class="logo">
                        </div>
                        <div class="col-md-6">
                            <div id="card-title" class="sign-change" data-method="login">
                                <h2 id="card-login">LOGIN</h2>
                                <div class="underline-title"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="card-title" class="sign-change" data-method="register">
                                <h2 id="card-login">SIGN UP</h2>
                                <div class="underline-title sign-up-active"></div>
                            </div>
                        </div>
                    </div>
                    <form method="post" class="form login-form" action="{{route('login')}}">
                        @csrf
                        <label for="user-email" style="padding-top:13px">
                            &nbsp;Email
                        </label>
                        <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
                        <div class="form-border"></div>
                        <label for="user-password" style="padding-top:22px">&nbsp;Password
                            </label>
                        <input id="user-password" class="form-content" type="password" name="password" required />
                        <div class="form-border"></div>
                        <input id="submit-btn" type="submit" name="submit" value="LOGIN" class="mb-3" />
                    </form>

                    <form method="post" class="form register-form d-none" action="{{route('register')}}">
                        @csrf
                        <div class="form-border"></div>
                        <label for="user-name" style="padding-top:13px">
                            Name
                        </label>
                        <input id="user-name" class="form-content" type="text" name="name" autocomplete="on" required />

                        <div class="form-border"></div>
                        <label for="user-email" style="padding-top:13px">
                            Email
                        </label>
                        <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />

                        <div class="form-border"></div>
                        <label for="user-password" style="padding-top:22px">
                            Password
                        </label>
                        <input id="user-password" class="form-content" type="password" name="password" required />

                        <div class="form-border"></div>
                        <label for="user-password" style="padding-top:22px">
                            Confirm password
                        </label>
                        <input id="user-password" class="form-content" type="password" name="password_confirmation" required />

                        <div class="form-border"></div>
                        <input id="submit-btn" type="submit" name="submit" value="LOGIN" class="mb-3" />
                    </form>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <script>
            $('.sign-change').click(function(){
                //Hide all underline and active only the child of the clicked element
                $('.underline-title').css('opacity', "0");
                $(this).children(".underline-title").css('opacity', "1");

                //If login is clicked, the login form will popup, other way the register form will
                if($(this).data('method') == "login") {
                    $('.login-form').removeClass('d-none');
                    $('.register-form').addClass('d-none');
                } else {
                    $('.login-form').addClass('d-none');
                    $('.register-form').removeClass('d-none');
                }
            });
        </script>
    </body>
</html>
