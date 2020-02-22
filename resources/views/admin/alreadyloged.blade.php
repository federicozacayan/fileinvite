@extends('admin.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Already Logged!') }}</div>

                <div class="card-body">
                    <b>Do you want logout?</b>
                    <div class="buttons">
                    <a href="{{ route('admin.logout') }}">
                        {{ __('Ok') }}
                    </a>
                    <a href="javascript:history.back();">{{ __('Cancel') }}</a>
                </div>
                <hr>
                <i>Please logout to login again with other user.</i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection