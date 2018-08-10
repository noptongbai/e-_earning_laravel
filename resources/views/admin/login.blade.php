
@extends('admin.layoutslogin.template')
@section('stylesheet')
    <style type="text/css">
            .well{
                margin-top: 17%;

            }
            .login-panel{
                margin-left: 20%;
                margin-top: 30%;
            }
            body{
                background: url('{{asset('images/bg.jpg')}}') ;
                background-size: 100%;
            }

    </style>
@stop
@section('content')
<div class="row">
            <div class="col-md-4 ">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In </h3>
                    </div>
                        @if(Session::has('message'))
                        <div class="panel-body bg-danger color-red">
                        {{Session::get('message')}}
                        </div>
                        @endif
                  <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/login/process') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus value="{{old('username')}}"/>
                                    {!!$errors->first('username', '<span
                            class="control-label color-red" for="username">*:message</span>')!!}
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    {!!$errors->first('password', '<span
                            class="control-label error" for="password">*:message</span>')!!}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn btn-success btn-block ">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="well">
            <h1>{{$ads->title}}</h1>
            <hr>
            <p><?php echo nl2br(BBCode::parse($ads->body)) ?></p>
             </div>    
            </div>
        </div>
        
        
@stop
