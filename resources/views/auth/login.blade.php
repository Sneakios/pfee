@extends('layouts.app')

@section('content')
<section>
<div class="container" style="position: relative;
top: 40px; left: 40px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div style="border:1px solid #eee;width:100%;position: static;margin-top:10px"></div>
                    <p class="text-center birth">Do not have an account ?
                    </p>
                    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                                    <h2 class="text-center r">Register</h2>
                
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                
                                </div>
                
                                <div class="modal-body">
                
                                    <div class="login-form">
                
                                        <form method="POST" action="{{ route('register') }}">
                                            <h2 class="text-center cna">Create new account</h2>
                                            @csrf
                
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="firstname"  required autocomplete="firstname" autofocus placeholder="firstname">
                                                </div>
                
                                                <div class="form-group col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname"  required autocomplete="lastname" autofocus placeholder="lastname">
                
                                                </div>
                                            </div>
                
                
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email"  required autocomplete="email" autofocus placeholder="email">
                                                </div>
                
                                                <div class="form-group col-md-6">
                                                    <input id="mobile" type="tel" class="form-control" name="mobile"  required autocomplete="mobile" autofocus placeholder="mobile">
                
                                                </div>
                                            </div>
                
                
                                            <div class="form-group">
                                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="password">
                                            </div>
                
                
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse" required>
                                            </div>
                
                
                
                
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <select id="ville" class="form-control birth" name="ville">
                                                        <option>Ville ..</option>
                                                        <option value="Ariana">Ariana</option>
                                                        <option value="Beja">Beja</option>
                                                        <option value="Ben Arous">Ben Arous</option>
                                                        <option value="Bizerte">Bizerte</option>
                                                        <option value="Gabes">Gabes</option>
                                                        <option value="Gafsa">Gafsa</option>
                                                        <option value="Jendouba">Jandouba</option>
                                                        <option value="Kairouan">Kairouan</option>
                                                        <option value="Kasserine">Kasserine</option>
                                                        <option value="Kebili">Kebili</option>
                                                        <option value="Le Kef">Le Kef</option>
                                                        <option value="Mahdia">Mahdia</option>
                                                        <option value="La Lanouba">La Manouba</option>
                                                        <option value="Mednine">Mednine</option>
                                                        <option value="Monastir">Monastir</option>
                                                        <option value="Sfax">Sfax</option>
                                                        <option value="Sidi Bouzid">Sidi Bouzid</option>
                                                        <option value="Seliana">Seliana</option>
                                                        <option value="Sousse">Sousse</option>
                                                        <option value="Tataouine">Tataouine</option>
                                                        <option value="Tozeur">Tozeur</option>
                                                        <option value="Tunis">Tunis</option>
                                                        <option value="Zaghouan">Zaghouan</option>
                
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select id="genre" class="form-control birth" name="genre">
                                                        <option>Genre ..</option>
                                                        <option value="homme">Homme</option>
                                                        <option value="femme">Femme</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                
                                                    <select id="type" class="form-control birth" name="type">
                                                        <option>Type ..</option>
                                                        <option value="client">Client</option>
                                                        <option value="employeur">Employeur</option>
                                                    </select>
                                                </div>
                                            </div>
                
                
                
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <select  id="jour" class="form-control birth" name="jour">
                                                        <option>Jours ..</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{$i}}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select id="moin" class="form-control birth" name="moin">
                                                        <option >Moins ..</option>
                                                        <option value="01">Janvier</option>
                                                        <option value="02">Fevrier</option>
                                                        <option value="03">Mars</option>
                                                        <option value="04">Avril</option>
                                                        <option value="05">Mai</option>
                                                        <option value="06">Juin</option>
                                                        <option value="07">Juillet</option>
                                                        <option value="08">Aout</option>
                                                        <option value="09">September</option>
                                                        <option value="10">Octobre</option>
                                                        <option value="11">Nomvember</option>
                                                        <option value="12">Decembre</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <select id="annee" class="form-control birth" name="annee">
                                                        <option >Annee ..</option>
                                                        @for ($i = 1920; $i <= 2021; $i++)
                                                            <option value="{{$i}}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Create Account
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <p class="text-center">having account ?
                                            <strong class="switch-tologin-modal" class="close" data-dismiss="modal" aria-label="Close"><a href="#">log in</strong>
                                        </p>
                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 offset-md-4" >
                    <button type="button" class="reg" data-toggle="modal" data-target="#register-modal">
                        Create New Account
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
