@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">{{$action." ".$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="{{ $route }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Protein meter</label>
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $error }}</strong></p>
                                    @endforeach
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td>
                                                <input type="number" step="any" name="lower_limit[]"
                                                       placeholder="Met lower limit"
                                                       class="form-control" required/>
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="upper_limit[]"
                                                       placeholder="Met upper limit"
                                                       class="form-control" required/>
                                            </td>
                                            <td>
                                                <input type="number" step="any" name="met_variable[]"
                                                       placeholder="Met Variable"
                                                       class="form-control" required/>
                                            </td>
                                            <td>
                                                <button type="button" id="add" class="btn btn-success"><i
                                                        class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
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

@push('footer')
    <script>
        $(document).ready(function () {
            var i = 1;
            $('#add').click(function () {
                i++;
                $('#dynamic_field').append(`<tr id="row${i}">
                                                <td>
                                                    <input type="number" step="any" name="lower_limit[]" placeholder="Met lower limit"
                                                           class="form-control" required/>
                                                </td>
                                                <td>
                                                    <input type="number" step="any" name="upper_limit[]" placeholder="Met upper limit"
                                                           class="form-control" required/>
                                                </td>
                                                <td>
                                                    <input type="number" step="any" name="met_variable[]" placeholder="Met Variable"
                                                           class="form-control" required/>
                                                </td>
                                                <td>
                                                    <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </td>
                                            </tr>`
                );
            });

            $(document).on('click', '.btn_remove', function () {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
@endpush
