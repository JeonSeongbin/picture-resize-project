@extends('layouts.app')

<script src="{{ asset('/js/complete.js') }}"></script>  

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">input image</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('download')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$fileName}}" name="filename">
                        <input type="submit" value="download">
                        <input type="button" value="view"  onclick=showSample("{{$fileName}}");>
                        <input type="button" value="back" onclick=backbutton()>
                        
                    </form>
                 </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
