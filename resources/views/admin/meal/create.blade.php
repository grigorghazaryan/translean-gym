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
                                <label for="name">Name</label>
                                @error('name')
                                <p class="invalid-feedback text-danger" role="alert"><strong>{{ $message }}</strong></p>
                                @enderror
                                <input type="text" class="form-control" id="name"
                                       placeholder="Name" name="name" value="{{old('name')}}">
                            </div>

                            <div class="foods"></div>


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
            let row = 0;
            add();

            function add(){
                let food = '';
                for (var i = 0; i < foods.length; i++){
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
                if(row > 0){
                    btn = `<button type="button" class="btn btn-danger col-md-12 m-b-20 minus" data-row="${row}"><i class="fa fa-minus"></i></button>`
                }
                else{
                    btn = `<button type="button" class="btn btn-primary col-md-12 m-b-20 plus"><i class="fa fa-plus"></i></button>`
                }

                let element = `
                                <div class="form-group row_${row}">
                                    <label for="name">Food</label>
                                    <select name="food[]" id="food" class="form-control m-b-20">
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
                $('.row_'+food_row).remove();
                row--;
            });




        })
    </script>
@endpush
