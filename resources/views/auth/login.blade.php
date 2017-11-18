@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">input image</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('imageUpload')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group @if(!empty($errors->first('image'))) has-error @endif">
                            <div class="col-md-6">
                                <input type="file" name="image">
                                
                                <span class="help-block">
                                    {{$errors->first('image')}}

                                    @if(isset($error['notFound']))
                                        {{$error['notFound']}}
                                    @endif

                                    @if(isset($error['sizeError']))
                                        {{$error['sizeError']}}
                                    @endif

                                    @if(isset($error['extensionError']))
                                        {{$error['extensionError']}}
                                    @endif
                                </span>
                            </div>

                            <div>
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        submit
                                    </button>
                                    <!--
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                    -->
                                </div>
                            </div>
                            <!--
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                          

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                         
                            </div>
                               -->
                        </div>
   <!--
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                  <input id="password" type="text" class="form-control" name="password" required>
                            </div>
                                -->
                   


                    </form>
                 </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
