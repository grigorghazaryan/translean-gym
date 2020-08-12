@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">

                <div class="panel-heading">
                    @if($data->type == 2)
                        Show Projection
                    @else
                        Show Assessment
                    @endif
                </div>

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">

                            <input type="hidden" name="type" value="{{$data->type}}">

                            <div class="modal-body">
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Activity Level: </label>
                                           <b>{{$data->activity_level}}</b>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Date</label>
                                            <b>{{$data->date}}</b>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Weight (kg)</label>
                                            <b>{{$data->weight}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Total Fat (%)</label>
                                            <b>{{$data->total_fat}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Arm (%)</label>
                                            <b>{{$data->right_arm}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Arm (%)</label>
                                            <b>{{$data->left_arm}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Leg (%)</label>
                                            <b>{{$data->right_leg}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Leg (%)</label>
                                            <b>{{$data->left_leg}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Trunk (%)</label>
                                            <b>{{$data->trunk}}</b>
                                        </div>
                                    </div>
                                    {{--right--}}
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Muscle Mass (kg)</label>
                                            <b>{{$data->muscle_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Arm Mass (kg)</label>
                                            <b>{{$data->right_arm_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Arm Mass (kg)</label>
                                            <b>{{$data->left_arm_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Leg Mass (kg)</label>
                                            <b>{{$data->right_leg_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Leg Mass (kg)</label>
                                            <b>{{$data->left_leg_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Trunk Mass (kg)</label>
                                            <b>{{$data->trunk_mass}}</b>
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Lean Mass (kg)</label>
                                            <b>{{$data->lean_mass}}</b>
                                        </div>

                                    </div>
                                </div>

                                <hr>
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Bone Mass (kg)</label>
                                            <b>{{$data->bone_mass}}</b>
                                        </div>
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Metabolic age</label>
                                            <b>{{$data->metabolic_age}}</b>
                                        </div>
                                    </div>

                                    <div class="col-md-6 down">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Body Water (%)</label>
                                            <b>{{$data->body_water}}</b>
                                        </div>
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Visceral Fat (rating)</label>
                                            <b>{{$data->visceral_fat}}</b>
                                        </div>

                                        @if($data->type == 2)
                                            <div class="form-group col-md-12 m-b-20 glycogen_store">
                                                <label>Glycogen Store (gr)</label>
                                                <b>{{$data->glycogen_store}}</b>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script !src="">
        $('input[name=bone_mass]').on('input', function () {
            let bone_mass = parseFloat($(this).val());
            let muscle_mass = parseFloat($('input[name=muscle_mass]').val());
            $('input[name=lean_mass]').val(bone_mass + muscle_mass)
        });

        $('input[name=muscle_mass]').on('input', function () {
            let bone_mass = parseFloat($('input[name=bone_mass]').val());
            let muscle_mass = parseFloat($(this).val());
            $('input[name=lean_mass]').val(bone_mass + muscle_mass)
        });

        $('input[name=weight]').on('input', function () {
            let weight = parseFloat($(this).val());
            $('input[name=glycogen_store]').val(weight * 5.6)
        });
    </script>
@endpush

@push('header')
    <style>
        label {
            width: 180px;
        }
    </style>
@endpush
