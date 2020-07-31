@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="col-md-12 text-center">
                    <input id="datePicker" type="date" />
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <table class="firs-table table table-striped">
                            <thead>
                            <tr>
                                <th colspan="1">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-tr">
                                <th>Time</th>
                            </tr>
                            <tr>
                                <th>08:00</th>
                            </tr>
                            <tr>
                                <th>09:00</th>
                            </tr>
                            <tr>
                                <th>10:00</th>
                            </tr>
                            <tr>
                                <th>11:00</th>
                            </tr>
                            <tr>
                                <th>12:00</th>
                            </tr>
                            <tr>
                                <th>13:00</th>
                            </tr>
                            <tr>
                                <th>14:00</th>
                            </tr>
                            <tr>
                                <th>15:00</th>
                            </tr>
                            <tr>
                                <th>16:00</th>
                            </tr>
                            <tr>
                                <th>17:00</th>
                            </tr>
                            <tr>
                                <th>18:00</th>
                            </tr>
                            <tr>
                                <th>19:00</th>
                            </tr>
                            <tr>
                                <th>20:00</th>
                            </tr>
                            <tr>
                                <th>21:00</th>
                            </tr>
                            <tr>
                                <th>22:00</th>
                            </tr>
                            <tr>
                                <th>23:00</th>
                            </tr>
                            <tr>
                                <th>24:00</th>
                            </tr>
                            <tr>
                                <th>01:00</th>
                            </tr>
                            <tr>
                                <th>02:00</th>
                            </tr>
                            <tr>
                                <th>03:00</th>
                            </tr>
                            <tr>
                                <th>04:00</th>
                            </tr>
                            <tr>
                                <th>05:00</th>
                            </tr>
                            <tr>
                                <th>06:00</th>
                            </tr>
                            <tr>
                                <th>07:00</th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-tr">
                                <th style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
                                    Activity
                                    <button class="btn btn-success btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            @for($i = 0; $i < 24; $i++ )
                                <tr>
                                    <th>Work {{$i+1}}</th>
                                </tr>
                            @endfor

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th colspan="7" class="text-center">Energy Expenditure</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-tr">
                                <th>Total cal</th>
                                <td>Fat %</td>
                                <td>Fat (c)</td>
                                <td>Fat (g)</td>
                                <td>Carb%</td>
                                <td>Carb(c)</td>
                                <td>Carb(g)</td>
                            </tr>
                            @for($i = 0; $i < 24; $i++ )
                                <tr>
                                    <th>100</th>
                                    <td>200</td>
                                    <td>3000</td>
                                    <td>400</td>
                                    <td>5000</td>
                                    <td>600</td>
                                    <td>700</td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-2">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-tr">
                                <th style="width: 100%; display: flex; align-items: center; justify-content: space-between;">
                                    Meal / Water
                                    <button class="btn btn-danger btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>
                            @for($i = 0; $i < 24; $i++ )
                                <tr>
                                    <th>Work {{$i+1}}</th>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th colspan="7" class="text-center">Energy Expenditure</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="first-tr">
                                <th>Total cal</th>
                                <td>Fat %</td>
                                <td>Fat (c)</td>
                                <td>Fat (g)</td>
                                <td>Carb%</td>
                                <td>Carb(c)</td>
                                <td>Carb(g)</td>
                            </tr>
                            @for($i = 0; $i < 24; $i++ )
                                <tr>
                                    <th>100</th>
                                    <td>200</td>
                                    <td>3000</td>
                                    <td>400</td>
                                    <td>5000</td>
                                    <td>600</td>
                                    <td>700</td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('footer')

    <script !src="">
        $(document).ready(function () {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
            $('#datePicker').val(today);
        });
    </script>

@endpush

@push('header')
    <style>
        .firs-table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #a3c5a0;
        }

        .firs-table.table-striped tbody tr {
            background-color: #89bb83;
            color: #fff;
        }

        .first-tr {
            height: 70px;
            white-space: nowrap;
        }
    </style>
@endpush



