<div class="modal fade login-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i>
        </button>
        <div class="login-button-container">
            <a href="#" data-section="login"><i class="fa fa-user"></i></a>
            <a href="#" data-section="sign-in"><i class="fa fa-pencil-square-o"></i></a>
            <a href="#" data-section="recovery"><i class="fa fa-lock"></i></a>
        </div>
        <div class="form-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div id="login" class="box">
                    <h2 class="title">Ingresar a tu cuenta</h2>
                    <h3 class="sub-title">Es una violación de nuestros términos y condiciones proporcionar información
                        de nombre de usuario y contraseña a terceros no autorizados. El uso no autorizado puede conducir
                        a la suspensión o terminación.</h3>
                    <div class="field">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="EMail">
                        <i class="fa fa-user user"></i>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="field">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password" placeholder="Password">
                        <i class="fa fa-ellipsis-h"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="field footer-form text-right">
                            <span class="remember"><input class="labelauty" type="checkbox" name="remember"
                                                          id="remember" {{ old('remember') ? 'checked' : '' }}
                                                          data-labelauty="Manter Conectado"></span>
                        <button type="submit" class="btn btn-default button-form">Ingresar</button>
                    </div>
                </div>
            </form>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div id="sign-in" class="box">
                    <h2 class="title">Registrarme</h2>
                    <h3 class="sub-title">Cree una cuenta gratuita y descubra cómo puede centralizar todo
                        comunicación en torno a una transacción, conectarse con clientes, comercializar sus listados y
                        Más. </h3>
                    <div class="form-inline">
                        <div class="form-group">
                            <input id="name"
                                   class="form-control input-inline margin-right @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                   type="text" placeholder="Nombre">
                            <i class="fa fa-user user"></i>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="lastname"
                                   class="form-control input-inline @error('lastname') is-invalid @enderror" type="text"
                                   name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                                   autofocus placeholder="Apellido">
                            <i class="fa fa-user user"></i>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="field" style="margin-bottom: 5%;">
                        <input id="email" class="form-control @error('email') is-invalid @enderror" type="text"
                               name="email"
                               placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        <i class="fa fa-envelope-o"></i>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="field">
                        <input id="password" class="form-control @error('password') is-invalid @enderror"
                               type="password"
                               name="password"
                               placeholder="Password" required autocomplete="new-password">
                        <i class="fa fa-ellipsis-h"></i>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="field">
                        <input id="password-confirm" class="form-control" type="password" name="password_confirmation"
                               required autocomplete="new-password" placeholder="Repetir password">
                        <i class="fa fa-ellipsis-h"></i>
                    </div>
                    <div class="field footer-form text-right">
                            <span class="remember"><input class="labelauty" type="checkbox"
                                                          data-labelauty="Leí políticas de privacidad"
                                                          checked/></span>
                        <button type="submit" class="btn btn-default button-form">Registrarme</button>
                    </div>
                </div>
            </form>

            <div id="recovery" class="box">
                <h2 class="title">Recuperar Password</h2>
                <h3 class="sub-title">Ingrese el mail con el que se registro, revise su casilla y siga las
                    instrucciones.</h3>
                <div class="field footer-form text-right">
                    <a href="{{ url('password/reset') }}" class="btn btn-primary btn-block">Resetear Contraseña</a>
                </div>
            </div>
        </div>
    </div>
</div>