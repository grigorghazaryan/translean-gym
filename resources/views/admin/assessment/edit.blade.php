@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">

                <div class="panel-heading">
                    @if($data->type == 2)
                        Edit Projection
                    @else
                        Edit Assessment
                    @endif
                </div>


                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <form method="post" action="/assessments/update/{{$data->id}}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <input type="hidden" name="type" value="{{$data->type}}">

                            <div class="modal-body">
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Activity Level</label>
                                            <select class="form-control" name="activity_level">
                                                <option value="1" @if($data->activity_level == 1) selected @endif>1
                                                </option>
                                                <option value="2" @if($data->activity_level == 2) selected @endif>2
                                                </option>
                                                <option value="3" @if($data->activity_level == 3) selected @endif>3
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Date</label>
                                            <input type="date" class="form-control" name="date" required
                                                   value="{{$data->date}}">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Weight (kg)</label>
                                            <input type="number" class="form-control" name="weight" required
                                                   value="{{$data->weight}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Total Fat (%)</label>
                                            <input type="number" class="form-control" name="total_fat" required
                                                   value="{{$data->total_fat}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Arm (%)</label>
                                            <input type="number" class="form-control" name="right_arm" required
                                                   value="{{$data->right_arm}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Arm (%)</label>
                                            <input type="number" class="form-control" name="left_arm" required
                                                   value="{{$data->left_arm}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Leg (%)</label>
                                            <input type="number" class="form-control" name="right_leg" required
                                                   value="{{$data->right_leg}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Leg (%)</label>
                                            <input type="number" class="form-control" name="left_leg" required
                                                   value="{{$data->left_leg}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Trunk (%)</label>
                                            <input type="number" class="form-control" name="trunk" required
                                                   value="{{$data->trunk}}">
                                        </div>
                                    </div>
                                    {{--right--}}
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Muscle Mass (kg)</label>
                                            <input type="number" class="form-control" name="muscle_mass" required
                                                   value="{{$data->muscle_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Arm Mass (kg)</label>
                                            <input type="number" class="form-control" name="right_arm_mass" required
                                                   value="{{$data->right_arm_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Arm Mass (kg)</label>
                                            <input type="number" class="form-control" name="left_arm_mass" required
                                                   value="{{$data->left_arm_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Right Leg Mass (kg)</label>
                                            <input type="number" class="form-control" name="right_leg_mass" required
                                                   value="{{$data->right_leg_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Left Leg Mass (kg)</label>
                                            <input type="number" class="form-control" name="left_leg_mass" required
                                                   value="{{$data->left_leg_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Trunk Mass (kg)</label>
                                            <input type="number" class="form-control" name="trunk_mass" required
                                                   value="{{$data->trunk_mass}}">
                                        </div>

                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Lean Mass (kg)</label>
                                            <input type="number" class="form-control" name="lean_mass" readonly required
                                                   value="{{$data->lean_mass}}">
                                        </div>

                                    </div>
                                </div>

                                <hr>
                                <div class="row form-inline">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Bone Mass (kg)</label>
                                            <input type="number" class="form-control" name="bone_mass" required
                                                   value="{{$data->bone_mass}}">
                                        </div>
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Metabolic age</label>
                                            <input type="number" class="form-control" name="metabolic_age" required
                                                   value="{{$data->metabolic_age}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 down">
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Body Water (%)</label>
                                            <input type="number" class="form-control" name="body_water" required
                                                   value="{{$data->body_water}}">
                                        </div>
                                        <div class="form-group col-md-12 m-b-20">
                                            <label>Visceral Fat (rating)</label>
                                            <input type="number" class="form-control" name="visceral_fat" required
                                                   value="{{$data->visceral_fat}}">
                                        </div>

                                        @if($data->type == 2)
                                            <div class="form-group col-md-12 m-b-20 glycogen_store">
                                                <label>Glycogen Store (gr)</label>
                                                <input type="number" class="form-control" name="glycogen_store" readonly
                                                       value="{{$data->glycogen_store}}">
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                Save
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
