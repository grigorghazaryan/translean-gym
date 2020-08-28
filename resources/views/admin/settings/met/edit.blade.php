@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">{{$action." ".$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <form method="post" action="{{ $route."/".$data->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="lower_limit">Lower Limit</label>
                                @error('lower_limit')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step="any" class="form-control" id="lower_limit"
                                       placeholder="Lower Limit" name="lower_limit" value="{{$data->lower_limit}}">
                            </div>

                            <div class="form-group">
                                <label for="upper_limit">Upper Limit</label>
                                @error('upper_limit')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step="any" class="form-control" id="upper_limit"
                                       placeholder="Upper Limit" name="upper_limit" value="{{$data->upper_limit}}">
                            </div>

                            <div class="form-group">
                                <label for="met_variable">MET Variable</label>
                                @error('met_variable')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step="any" class="form-control" id="name"
                                       placeholder="MET Variable" name="met_variable" value="{{$data->met_variable}}">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                Save {{$title}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
