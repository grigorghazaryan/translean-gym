@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">{{$action." ".$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <form method="post" action="{{ $route."/".$activity->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")


                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Name" name="name" value="{{$activity->name}}">
                            </div>

                            <div class="form-group">
                                <label for="met">Met</label>
                                @error('met')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="met"
                                       placeholder="Met" name="met" value="{{$activity->met}}">
                            </div>

                            <div class="form-group">
                                <label for="carb_ratio">Carb-Ratio</label>
                                @error('carb_ratio')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="carb_ratio"
                                       placeholder="Carb-Ratio" name="carb_ratio" value="{{$activity->carb_ratio}}">
                            </div>

                            <div class="form-group">
                                <label for="fat_ratio">Fat-Ratio</label>
                                @error('fat_ratio')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="fat_ratio"
                                       placeholder="Fat-Ratio" name="fat_ratio" value="{{$activity->fat_ratio}}">
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
    <script !src="">
        $(document).ready(function () {

            $('#carbs').on('input',function () {
                let carbs = $(this).val()
                let fat = $('#fat').val();
                let proteins = $('#proteins').val();
                let glycemic_index = $('#glycemic_index').val();

                let calories = calories_calculate(carbs, fat, proteins);
                $('#calories').val(calories);

                let glycemic_load = glycemic_load_calculate(carbs, glycemic_index);
                $('#glycemic_load').val(glycemic_load);
            });

            $('#fat').on('input',function () {
                let carbs = $('#carbs').val();
                let fat = $(this).val();
                let proteins = $('#proteins').val();

                let calories = calories_calculate(carbs, fat, proteins);
                $('#calories').val(calories)
            });

            $('#proteins').on('input',function () {
                let carbs = $('#carbs').val();
                let fat = $('#fat').val();
                let proteins = $(this).val()

                let calories = calories_calculate(carbs, fat, proteins);
                $('#calories').val(calories)
            });

            $('#glycemic_index').on('input',function () {
                let carbs = $('#carbs').val();
                let glycemic_index = $(this).val()

                let glycemic_load = glycemic_load_calculate(carbs, glycemic_index);
                $('#glycemic_load').val(glycemic_load)
            });

            function calories_calculate(carbs, fat, proteins) {
                return carbs * 4 + fat * 9 + proteins * 4;
            }

            function glycemic_load_calculate(carbs, glycemic_index) {
                return glycemic_index * carbs / 100;
            }

        })
    </script>
@endpush
