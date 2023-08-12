@extends('layouts.app')

@section('bodyClass', 'form-page')
@section('title','Login')

@section('content')
    <div class="content-block">
        <div class="content-wrapper">
            <div class="form">
                <div class="section">
                    <h1>
                        Welcome!
                        <span class="sub-title">Enter your mobile number and password to login</span>
                    </h1>
                    @livewire('auth.login')
                </div>
                <hr />
                <div class="section register">
                    <table class="info">
                        <tr>
                            <td colspan="2">
                                <h5>Not a member yet?</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>Register to get reward points and exclusive promotions.</td>
                            <td valign="bottom">
                                <a href="#">
                                    <button type="submit" value="Register" class="button button-orange">Register</button>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
