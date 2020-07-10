@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 text-left">
            <button class="btn btn-success m-b-30 assessment" data-toggle="modal" data-target="#largeModal">New
                Assessments
            </button>
            <button class="btn btn-success m-b-30 projection" data-toggle="modal" data-target="#largeModal">Add
                Projection
            </button>
        </div>
        <div class="col-md-2 text-center summ">
                <span> Summary All</span>
                <label class="switch">
                    <input type="checkbox" class="summary">
                    <span class="slider round"></span>
                </label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                {{--table--}}
                <div class="table-responsive">
                    <table id="datatable" class="display table table-hover table-striped nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Assessments Type</th>
                            <th>Activity Level</th>
                            <th>Date</th>
                            <th>Weight (kg)</th>
                            <th>Total Fat (%)</th>
                            <th>Right Arm ((%)</th>
                            <th>Left Arm (%)</th>
                            <th>Right Leg (%)</th>
                            <th>Left Leg (%)</th>
                            <th>Trunk (%)</th>
                            <th>Muscle Mass (kg)</th>
                            <th>Right Arm Mass (kg)</th>
                            <th>Left Arm Mass (kg)</th>
                            <th>Right Leg Mass (kg)</th>
                            <th>Left Leg Mass (kg)</th>
                            <th>Trunk Mass (kg)</th>
                            <th>Bone Mass (kg)</th>
                            <th>Metabolic Age</th>
                            <th>Body Water ((%)</th>
                            <th>Visceral Fat (rating)</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($assessments as $key=>$val)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td class="ass_type" data-type="{{$val->type}}">
                                    @if($val->type === 0 AND $key === 0)
                                        First Assessment
                                    @elseif($val->type === 2)
                                        Projection
                                    @elseif($val->type === 1)
                                        Current Assessment
                                        @else
                                        1
                                    @endif
                                </td>
                                <td>{{$val->activity_level}}</td>
                                <td>{{$val->date}}</td>
                                <td>{{$val->weight}}</td>
                                <td>{{$val->total_fat}}</td>
                                <td>{{$val->right_arm}}</td>
                                <td>{{$val->left_arm}}</td>
                                <td>{{$val->right_leg}}</td>
                                <td>{{$val->left_leg}}</td>
                                <td>{{$val->trunk}}</td>
                                <td>{{$val->muscle_mass}}</td>
                                <td>{{$val->right_arm_mass}}</td>
                                <td>{{$val->left_arm_mass}}</td>
                                <td>{{$val->right_leg_mass}}</td>
                                <td>{{$val->left_leg_mass}}</td>
                                <td>{{$val->trunk_mass}}</td>
                                <td>{{$val->bone_mass}}</td>
                                <td>{{$val->metabolic_age}}</td>
                                <td>{{$val->body_water}}</td>
                                <td>{{$val->visceral_fat}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <h3 class="text-danger m-t-20 m-b-20 error_modal"></h3>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="type" name="type">
                    <input type="hidden" class="id" name="id" value="{{$user->id}}">

                    <div class="row form-inline">
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Activity Level</label>
                                <select class="form-control" name="activity_level">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row form-inline">
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Weight (kg)</label>
                                <input type="number" class="form-control" name="weight" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Total Fat (%)</label>
                                <input type="number" class="form-control" name="total_fat" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Right Arm (%)</label>
                                <input type="number" class="form-control" name="right_arm" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Left Arm (%)</label>
                                <input type="number" class="form-control" name="left_arm" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Right Leg (%)</label>
                                <input type="number" class="form-control" name="right_leg" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Left Leg (%)</label>
                                <input type="number" class="form-control" name="left_leg" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Trunk (%)</label>
                                <input type="number" class="form-control" name="trunk" required>
                            </div>
                        </div>
                        {{--right--}}
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Muscle Mass (kg)</label>
                                <input type="number" class="form-control" name="muscle_mass" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Right Arm Mass (kg)</label>
                                <input type="number" class="form-control" name="right_arm_mass" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Left Arm Mass (kg)</label>
                                <input type="number" class="form-control" name="left_arm_mass" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Right Leg Mass (kg)</label>
                                <input type="number" class="form-control" name="right_leg_mass" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Left Leg Mass (kg)</label>
                                <input type="number" class="form-control" name="left_leg_mass" required>
                            </div>

                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Trunk Mass (kg)</label>
                                <input type="number" class="form-control" name="trunk_mass" required>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="row form-inline">
                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Bone Mass (kg)</label>
                                <input type="number" class="form-control" name="bone_mass" required>
                            </div>
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Metabolic age</label>
                                <input type="number" class="form-control" name="metabolic_age" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Body Water (%)</label>
                                <input type="number" class="form-control" name="body_water" required>
                            </div>
                            <div class="form-group m-b-20">
                                <label for="exampleInputAmount">Visceral Fat (rating)</label>
                                <input type="number" class="form-control" name="visceral_fat" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary save_modal">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script src="{{asset('assets/plugins/swal/sweetalert.min.js')}}"></script>
    <script>
        $('#datatable').DataTable({
            columns: [
                { data: 'id' },
                { data: 'type' },
                { data: 'activity_level' },
                { data: 'date' },
                { data: 'weight' },
                { data: 'total_fat' },
                { data: 'right_arm' },
                { data: 'left_arm' },
                { data: 'right_leg' },
                { data: 'left_leg' },
                { data: 'trunk' },
                { data: 'muscle_mass' },
                { data: 'right_arm_mass' },
                { data: 'left_arm_mass' },
                { data: 'right_leg_mass' },
                { data: 'left_leg_mass' },
                { data: 'trunk_mass' },
                { data: 'bone_mass' },
                { data: 'metabolic_age' },
                { data: 'body_water' },
                { data: 'visceral_fat' },
            ]
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.assessment').click(function () {
                $('.modal-title').html('Assessment');
                $('.type').val(1);
                $('.error_modal').empty();
            });

            $('.projection').click(function () {
                $('.modal-title').html('Projection');
                $('.type').val(2);
                $('.error_modal').empty();
            });

            $('.ass_type').each(function (index, item) {
                if($(item).data('type') === 2){
                    $('.projection').attr('disabled', true);
                    return false;
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".save_modal").click(function (e) {
                let id= $("input[name=id]").val();
                let data = {};
                data = {
                    'id': id,
                    'activity_level': $('select[name=activity_level] option').filter(':selected').val(),
                    'date': $("input[name=date]").val(),
                    'weight': $("input[name=weight]").val(),
                    'total_fat': $("input[name=total_fat]").val(),
                    'right_arm': $("input[name=right_arm]").val(),
                    'left_arm': $("input[name=left_arm]").val(),
                    'right_leg': $("input[name=right_leg]").val(),
                    'left_leg': $("input[name=left_leg]").val(),
                    'trunk': $("input[name=trunk]").val(),
                    'muscle_mass': $("input[name=muscle_mass]").val(),
                    'right_arm_mass': $("input[name=right_arm_mass]").val(),
                    'left_arm_mass': $("input[name=left_arm_mass]").val(),
                    'right_leg_mass': $("input[name=right_leg_mass]").val(),
                    'left_leg_mass': $("input[name=left_leg_mass]").val(),
                    'trunk_mass': $("input[name=trunk_mass]").val(),
                    'bone_mass': $("input[name=bone_mass]").val(),
                    'metabolic_age': $("input[name=metabolic_age]").val(),
                    'body_water': $("input[name=body_water]").val(),
                    'visceral_fat': $("input[name=visceral_fat]").val(),
                    'type': $("input[name=type]").val()
                };

                for (let i in data) {
                    if (data[i] === '' || data[i] === null) {
                        $('.error_modal').html('Please Fill All Inputs!')
                        return;
                    }
                }

                $.ajax({
                    type: 'POST',
                    url: '/assessments/' + id,
                    data: data,
                    success: function (data) {
                        location.reload();
                    }
                });
            });

            $('.summary').change(function() {
                if($(this).is(":checked")) {
                    let id= $("input[name=id]").val();
                    $.ajax({
                        type: 'POST',
                        url: '/summary/assessments',
                        data: {id:id},
                        success: function (res) {
                            console.log(res)
                             $('#datatable').DataTable().clear();
                             $('#datatable').DataTable().rows.add(res).draw();
                        }
                    });
                }
                else{
                    location.reload()
                }
            });
        })
    </script>
@endpush

@push('header')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #3b8e34;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #3b8e34;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .summ{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            color: #3b8e34;
            font-weight: bold;
            font-size: 20px;
            padding: 5px;
        }
    </style>
@endpush


