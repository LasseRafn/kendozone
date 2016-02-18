@extends('layouts.guest')

@section('content')
    {!! Form::open(['action' => 'Auth\PasswordController@postEmail']) !!}


    <div class="panel panel-body login-form">
        @include('layouts.flash')
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
            <h5 class="content-group">{{  Lang::get('auth.password_recovery') }}
                <small class="display-block">{{  Lang::get('auth.we_will_send_instructions') }}</small>
            </h5>
        </div>

        <div class="form-group has-feedback">
            {!! Form::text('email', null, ['placeholder' => Lang::get('auth.your_email'), 'class' => 'form-control', 'required' => 'required'])!!}
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">{{  Lang::get('auth.send_password') }} <i
                    class="icon-arrow-right14 position-right"></i></button>
    </div>
    {!! Form::close() !!}
            <!-- /password recovery -->
@stop