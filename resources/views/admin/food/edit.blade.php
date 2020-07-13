@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">{{$action." ".$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <form method="post" action="{{ $route."/".$food->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")


                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Name" name="name" value="{{$food->name}}">
                            </div>

                            <div class="form-group">
                                <label for="quantity_measure">Quantity Measure (gr.)</label>
                                @error('quantity_measure')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" class="form-control" id="quantity_measure"
                                       placeholder="Quantity Measure" name="quantity_measure"
                                       value="{{$food->quantity_measure}}">
                            </div>

                            <div class="form-group">
                                <label for="name">Carbs</label>
                                @error('carbs')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="carbs"
                                       placeholder="Carbs" name="carbs" value="{{$food->carbs}}">
                            </div>

                            <div class="form-group">
                                <label for="fat">Fat</label>
                                @error('fat')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="fat"
                                       placeholder="Fat" name="fat" value="{{$food->fat}}">
                            </div>

                            <div class="form-group">
                                <label for="proteins">Proteins</label>
                                @error('proteins')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="proteins"
                                       placeholder="Proteins" name="proteins" value="{{$food->proteins}}">
                            </div>

                            <div class="form-group">
                                <label for="calories">Calories</label>
                                @error('calories')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="calories"
                                       placeholder="Calories" name="calories" value="{{$food->calories}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="fiber">Fiber</label>
                                @error('fiber')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="fiber"
                                       placeholder="Fiber" name="fiber" value="{{$food->fiber}}">
                            </div>

                            <div class="form-group">
                                <label for="glycemic_index">Glycemic Index</label>
                                @error('glycemic_index')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="glycemic_index"
                                       placeholder="Glycemic Index" name="glycemic_index"
                                       value="{{$food->glycemic_index}}">
                            </div>

                            <div class="form-group">
                                <label for="glycemic_load">Glycemic Load</label>
                                @error('glycemic_load')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="glycemic_load"
                                       placeholder="Glycemic Load" name="glycemic_load"
                                       value="{{$food->glycemic_load}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="ph">PH</label>
                                @error('ph')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="number" step=".0001" class="form-control" id="ph"
                                       placeholder="PH" name="ph" value="{{$food->ph}}">
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
