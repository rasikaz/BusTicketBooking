@extends('../layout.master')

@section('logo')
    Sign Up
@endsection
@section('content')

    <div id="signup-page" class="row">
        <div class="col s12 z-depth-6 " style="padding: 3%">
            <form class="login-form row" style="color: #2e6da4; margin-left: 10%;width: 80%" method="post" action="/submitownersignup">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">

                </div>
                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">perm_identity</i>
                        <input id="name" type="text" name="name">
                        <label for="name">Name</label>
                    </div>

                    <div class="input-field col s4">
                        {{--<i class="prefix"></i>--}}
                        <i class="material-icons prefix">featured_video</i>
                        <input id="nic" name="nic" type="text">
                        <label for="nic">NIC</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">location_on</i>
                        <input id="address" type="text" name="address">
                        <label for="address">Address</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="material-icons prefix">email</i>
                        <input class="validate" id="email" name="email" type="email">
                        <label for="email" data-error="wrong" data-success="right">Email</label>
                    </div>

                    <div class="input-field col s4">
                        <i class="material-icons prefix">phone</i>
                        <input id="telephone" type="text" name="telephone">
                        <label for="telephone">Telephone</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">credit_card</i>
                        <input id="account_num" type="text" name="account_num">
                        <label for="account_num">Bank Account Number</label>
                    </div>
                </div>

                <div class="row margin">
                    <div class="input-field col s4">
                        <i class="material-icons prefix" style="color: purple">contacts</i>
                        <input  id="token" name="token" type="text">
                        <label for="token">Token got from NTC</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="password" type="password" name="password">
                        <label for="password">Password</label>
                    </div>
                    <div class="input-field col s4">
                        <i class="material-icons prefix">check_circle</i>
                        <input id="password_confirm" type="password" name="password_confirm">
                        <label for="password_confirm">Confirm Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text" style="margin-left: 2.6%">
                        <input type="checkbox" id="remember-me"/>
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 center" style="width: 70%;margin-left: 15%">
                        {{--<a href="login.html" class="btn waves-effect waves-light col s12">Login</a>--}}
                        <button class="btn waves-effect waves-light col s12" style="background-color:  #2e6da4"
                                type="submit">Sign up
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="/ownersignin">Sign in</a></p>
                    </div>
                    <div class="input-field col s6 m6 l6">
                        <p class="margin right-align medium-small"><a href="forgot-password.html">Forgot password?</a>
                        </p>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection