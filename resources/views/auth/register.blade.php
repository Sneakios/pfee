@extends('layouts.app')

@section('content')
<section>
{{--    <div class="container" style="position: relative;top: 40px; left: 40px;"><div class="row justify-content-center">--}}
{{--           <div class="col-md-8">--}}
{{--               <div class="card">--}}
{{--                  <div class="card-header">{{ __('Register') }}</div>--}}

{{--                  <div class="card-body">--}}
{{--                      <div class="login-form">--}}

{{--                          <form method="POST" action="{{ route('register') }}">--}}

{{--            @csrf--}}
{{--            <h2 class="text-center cna">Create new account</h2>--}}
{{--            <div class="form-row">--}}
{{--                <div class="form-group col-md-6">--}}
{{--                    <input type="text" class="form-control" id="firstname"  placeholder="First name" name="firstname">--}}

{{--                </div>--}}

{{--                <div class="form-group col-md-6">--}}
{{--                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">--}}

{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="form-row">--}}
{{--                <div class="form-group col-md-6">--}}
{{--                    <input type="email" aria-invalid="email" class="form-control" id="email" placeholder="Email" name="email">--}}

{{--                </div>--}}

{{--                <div class="form-group col-md-6">--}}
{{--                    <input type="text" aria-invalid="mobile" class="form-control" id="mobile" placeholder="Mobile" name="mobile">--}}

{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}

{{--                <input type="password" id="password" class="form-control"  placeholder="Password" name="password">--}}

{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <input type="password" class="form-control"  placeholder="Confirm Password" >--}}

{{--            </div>--}}


{{--            <div class="form-group">--}}
{{--                <input type="text" class="form-control" id="adresse" placeholder="Adresse .." name="adresse">--}}

{{--            </div>--}}


{{--            <div class="form-row">--}}
{{--                <div class="form-group col-md-4">--}}
{{--                    <select id="ville" class="form-control" name="ville">--}}


{{--                        <option>Ville ..</option>--}}
{{--                        <option value="ariana">Ariana</option>--}}
{{--                        <option value="beja">Beja</option>--}}
{{--                        <option value="ben arous">Ben Arous</option>--}}
{{--                        <option value="bizerte">Bizerte</option>--}}
{{--                        <option value="gabes">Gabes</option>--}}
{{--                        <option value="gafsa">Gafsa</option>--}}
{{--                        <option value="jendouba">Jandouba</option>--}}
{{--                        <option value="kairouan">Kairouan</option>--}}
{{--                        <option value="kasserine">Kasserine</option>--}}
{{--                        <option value="kebili">Kebili</option>--}}
{{--                        <option value="le kef">Le Kef</option>--}}
{{--                        <option value="mahdia">Mahdia</option>--}}
{{--                        <option value="la manouba">La Manouba</option>--}}
{{--                        <option value="mednine">Mednine</option>--}}
{{--                        <option value="monastir">Monastir</option>--}}
{{--                        <option value="sfax">Sfax</option>--}}
{{--                        <option value="sidi bouzid">Sidi Bouzid</option>--}}
{{--                        <option value="seliana">Seliana</option>--}}
{{--                        <option value="sousse">Sousse</option>--}}
{{--                        <option value="tataouine">Tataouine</option>--}}
{{--                        <option value="tozeur">Tozeur</option>--}}
{{--                        <option value="tunis">Tunis</option>--}}
{{--                        <option value="zaghouan">Zaghouan</option>--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group col-md-4">--}}

{{--                    <select id="genre" class="form-control" name="genre">--}}
{{--                        <option>Genre ..</option>--}}
{{--                        <option value="homme">Homme</option>--}}
{{--                        <option value="femme">Femme</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group col-md-4">--}}

{{--                    <select id="type" class="form-control" name="type">--}}
{{--                        <option>Type ..</option>--}}
{{--                        <option value="client">Client</option>--}}
{{--                        <option value="employeur">Employeur</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--            </div>--}}




{{--            <div class="form-row">--}}
{{--                <div class="form-group col-md-4">--}}


{{--                    <select  id="jour" class="form-control" name="jour">--}}
{{--                        <option>Jours ..</option>--}}
{{--                        @for ($i = 1; $i <= 31; $i++)--}}
{{--                            <option value="{{$i}}">{{ $i }}</option>--}}
{{--                        @endfor--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group col-md-4">--}}

{{--                    <select id="moin" class="form-control" name="moin">--}}
{{--                        <option >Moins ..</option>--}}
{{--                        <option value="01">Janvier</option>--}}
{{--                        <option value="02">Fevrier</option>--}}
{{--                        <option value="03">Mars</option>--}}
{{--                        <option value="04">Avril</option>--}}
{{--                        <option value="05">Mai</option>--}}
{{--                        <option value="06">Juin</option>--}}
{{--                        <option value="07">Juillet</option>--}}
{{--                        <option value="08">Aout</option>--}}
{{--                        <option value="09">September</option>--}}
{{--                        <option value="10">Octobre</option>--}}
{{--                        <option value="11">Nomvember</option>--}}
{{--                        <option value="12">Decembre</option>--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="form-group col-md-4">--}}

{{--                    <select id="annee" class="form-control" name="annee">--}}
{{--                        <option >Annee ..</option>--}}
{{--                        @for ($i = 1920; $i <= 2021; $i++)--}}
{{--                            <option value="{{$i}}">{{ $i }}</option>--}}
{{--                        @endfor--}}

{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="form-group row mb-0">--}}

{{--            <div class="form-group">--}}
{{--                <div class="col-md-4 offset-md-4">--}}
{{--                <button type="submit" class="btn btn-primary btn-block">Create Account</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </form>--}}

{{--</div>--}}
{{--                  </div>--}}
{{--               </div>--}}
{{--           </div>--}}
{{--           </div>--}}
{{--</div>--}}

<div class="container" style="position: relative;
top: 40px; left: 40px;">    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="password">
                            </div>

                            <div class="form-group col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse" required>
                       </div>




                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select id="ville" class="form-control" name="ville">
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
                                <select id="genre" class="form-control" name="genre">
                                    <option>Genre ..</option>
                                    <option value="homme">Homme</option>
                                    <option value="femme">Femme</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">

                                <select id="type" class="form-control" name="type">
                                    <option>Type ..</option>
                                    <option value="client">Client</option>
                                    <option value="employeur">Employeur</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select  id="jour" class="form-control" name="jour">
                                    <option>Jours ..</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select id="moin" class="form-control" name="moin">
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
                                <select id="annee" class="form-control" name="annee">
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
                </div>
            </div>
        </div>
    </div>

</div>



    <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="password">
                                </div>

                                <div class="form-group col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password">
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="text" class="form-control" id="adresse" placeholder="adresse" name="adresse" required>
                            </div>




                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select id="ville" class="form-control" name="ville">
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
                                    <select id="genre" class="form-control" name="genre">
                                        <option>Genre ..</option>
                                        <option value="homme">Homme</option>
                                        <option value="femme">Femme</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">

                                    <select id="type" class="form-control" name="type">
                                        <option>Type ..</option>
                                        <option value="client">Client</option>
                                        <option value="employeur">Employeur</option>
                                    </select>
                                </div>
                            </div>



                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <select  id="jour" class="form-control" name="jour">
                                        <option>Jours ..</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{$i}}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <select id="moin" class="form-control" name="moin">
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
                                    <select id="annee" class="form-control" name="annee">
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
                            <strong class="switch-tologin-modal" ><a href="#">Login</a></strong>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register-modal">
        Register
    </button>


</section>
@endsection
