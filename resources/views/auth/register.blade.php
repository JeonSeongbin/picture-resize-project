@extends('layouts.app')

@section('addJs')
    <script type="text/javascript" src="{{ URL::asset('js/crop.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div>
                    <form method="POST" action="{{ route('complete') }}">
                        <img src="{{URL::asset('/savedPicture/'.$filename)}}" name="filename" id="target">
                        <label>
                            X
                            <input type="text" id="x" name="x" size="4"/>
                        </label>
                        <label>
                            Y
                            <input type="text" id="y" name="y" size="4"/>
                        </label>
                        <label>
                            W
                            <input type="text" id="w" name="w" size="4"/>
                        </label>
                        <label>
                            H
                            <input type="text" id="h" name="h" size="4"/>
                        </label>

                        {{ csrf_field() }}
                        <input type="hidden" name="filename" value="{{$filename}}">
                        <input type="submit" name="complete">
                    </form>

                    <input type="button" value="Crop selection" onclick="select()"/>
                    <input type="button" value="Deselect" onclick="deselect()"/>

                    <div id="previewFlg" style="display:none">
                        <h1>Preview</h1>
                        <div style="width:100px;height:100px;overflow:hidden;margin-left:5px;">
                            <img src="{{URL::asset('/savedPicture/'.$filename)}}" id="preview" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
