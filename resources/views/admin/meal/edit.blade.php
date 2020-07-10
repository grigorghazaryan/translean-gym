@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">{{$action." ".$title}}</div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                        <form method="post" action="{{ $route."/".$meal->id }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="name">Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Name" name="name" value="{{$meal->name}}">
                            </div>

                            <div class="foods">
                                @foreach($meal->attachedFoods as $key=>$val)
                                    <div class="form-group row_{{$key}} food_items">
                                        <label for="name">Food</label>
                                        <select name="food[]" id="food_sel" class="form-control m-b-20">
                                            @foreach($foods as $k=>$v)
                                                <option value="{{$v->id}}"
                                                        data-carbs="{{$v->carbs}}"
                                                        data-fat="{{$v->fat}}"
                                                        data-proteins="{{$v->proteins}}"
                                                        data-calories="{{$v->calories}}"
                                                        data-fiber="{{$v->fiber}}"
                                                        data-glycemic_index="{{$v->glycemic_index}}"
                                                        data-glycemic_load="{{$v->glycemic_load}}"
                                                        data-ph="{{$v->ph}}"
                                                        data-quantity_measure="{{$v->quantity_measure}}"
                                                    @if($v->id === $val->food_id) selected @endif
                                                >
                                                    {{$v->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="number" name="mass[]" id="mass" class="form-control m-b-20" placeholder="Mass" value="{{$val->mass}}" required>

                                        @if($key === 0)
                                            <button type="button" class="btn btn-primary col-md-12 m-b-20 plus"><i class="fa fa-plus"></i></button>
                                        @else
                                            <button type="button" class="btn btn-danger col-md-12 m-b-20 minus" data-row="{{$key}}"><i class="fa fa-minus"></i></button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="total_mass">Total Mass</label>
                                <input type="number" class="form-control" id="total_mass" placeholder="Total Mass"
                                       name="total_mass" readonly required value="{{$meal->mass}}">
                            </div>

                            <div class="form-group">
                                <label for="total_carbs">Total Carbs</label>
                                <input type="number" class="form-control" id="total_carbs" placeholder="Total Carbs"
                                       name="total_carbs" readonly required value="{{$meal->carbs}}">
                            </div>

                            <div class="form-group">
                                <label for="total_fat">Total Fat</label>
                                <input type="number" class="form-control" id="total_fat" placeholder="Total Fat"
                                       name="total_fat" readonly required value="{{$meal->fat}}">
                            </div>

                            <div class="form-group">
                                <label for="total_proteins">Total Proteins</label>
                                <input type="number" class="form-control" id="total_proteins"
                                       placeholder="Total Proteins" name="total_proteins" readonly required value="{{$meal->proteins}}">
                            </div>

                            <div class="form-group">
                                <label for="total_calories">Total Calories</label>
                                <input type="number" class="form-control" id="total_calories"
                                       placeholder="Total Calories" name="total_calories" readonly required value="{{$meal->calories}}">
                            </div>

                            <div class="form-group">
                                <label for="total_ph">Total PH</label>
                                <input type="number" class="form-control" id="total_ph" placeholder="Total PH"
                                       name="total_ph" readonly required value="{{$meal->ph}}">
                            </div>

                            <div class="form-group">
                                <label for="total_glycemic_load">Total Glycemic Load</label>
                                <input type="number" class="form-control" id="total_glycemic_load"
                                       placeholder="Total Glycemic Load" name="total_glycemic_load" readonly required value="{{$meal->glycemic_load}}">
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
            let foods = '<?php echo $foods ?>';
            foods = JSON.parse(foods);

            let meals = '<?php echo $meal->attachedFoods ?>';
            let row = JSON.parse(meals).length;

            function add() {
                let food = '';
                for (var i = 0; i < foods.length; i++) {
                    food += `<option value="${foods[i].id}"
                             data-carbs="${foods[i].carbs}"
                             data-fat="${foods[i].fat}"
                             data-proteins="${foods[i].proteins}"
                             data-calories="${foods[i].calories}"
                             data-fiber="${foods[i].fiber}"
                             data-glycemic_index="${foods[i].glycemic_index}"
                             data-glycemic_load="${foods[i].glycemic_load}"
                             data-ph="${foods[i].ph}"
                             data-quantity_measure="${foods[i].quantity_measure}"
                            >${foods[i].name}</option>`
                }

                let btn = '';
                if (row > 0) {
                    btn = `<button type="button" class="btn btn-danger col-md-12 m-b-20 minus" data-row="${row}"><i class="fa fa-minus"></i></button>`
                } else {
                    btn = `<button type="button" class="btn btn-primary col-md-12 m-b-20 plus"><i class="fa fa-plus"></i></button>`
                }

                let element = `
                                <div class="form-group row_${row} food_items">
                                    <label for="name">Food</label>
                                    <select name="food[]" id="food_sel" class="form-control m-b-20">
                                        ${food}
                                    </select>
                                    <input type="number" name="mass[]" id="mass" class="form-control m-b-20" placeholder="Mass" required>
                                    ${btn}
                                </div>`

                $('.foods').append(element);
                row++;
            }

            $(document).on('click', '.plus', function () {
                add();
                row++;
            });

            $(document).on('click', '.minus', function () {
                let food_row = $(this).data('row');
                $('.row_' + food_row).remove();
                row--;
                calculate();
            });

            $(document).find(".food_items").each(function () {
                $(document).on('change', '#food_sel', function () {
                    calculate();
                });
                $(document).on('input', '#mass', function () {
                    calculate();
                });
            });

            function calculate() {
                let total_mass = 0;
                let total_carbs = 0;
                let total_fat = 0;
                let total_proteins = 0;
                let total_calories = 0;
                let total_ph = 0;
                let total_glycemic_load = 0;

                // other variable
                var ph_sum = 0;
                var ph_d = 0;
                var gl_sum = 0;
                var gl_d = 0;


                $(document).find(".food_items").each(function () {
                    total_mass += parseFloat($(this).find("#mass").val());
                    total_carbs += parseFloat($(this).find("#food_sel").find(":selected").data('carbs'))
                    total_fat += parseFloat($(this).find("#food_sel").find(":selected").data('fat'))
                    total_proteins += parseFloat($(this).find("#food_sel").find(":selected").data('proteins'))
                    total_calories += parseFloat($(this).find("#food_sel").find(":selected").data('calories'))

                    let mass = parseFloat($(this).find("#mass").val());
                    let nums = $('.food_items').length;

                    // ph calculate Average (Sum of (Food Item Mass * PH) / total Mass)
                    let ph = Number($(this).find("#food_sel").find(":selected").data('ph'));
                    ph_sum += parseFloat(mass * ph);
                    ph_d += ph_sum / total_mass;
                    total_ph = parseFloat(ph_d / nums).toFixed(2);

                    // total_glycemic_load calculate Average (Sum of (Food Item Mass * Glycemic Load) / total Mass)
                    let gl = parseFloat($(this).find("#food_sel").find(":selected").data('glycemic_load'));
                    gl_sum += parseFloat(mass * gl);
                    gl_d += gl_sum / total_mass;
                    total_glycemic_load = parseFloat(gl_d / nums).toFixed(2);

                    $('#total_mass').val(total_mass);
                    $('#total_carbs').val(total_carbs);
                    $('#total_fat').val(total_fat);
                    $('#total_proteins').val(total_proteins);
                    $('#total_calories').val(total_calories);
                    $('#total_ph').val(total_ph);
                    $('#total_glycemic_load').val(total_glycemic_load);
                });
            }

        })
    </script>
@endpush
