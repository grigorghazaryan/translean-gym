@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

                <div class="container m-t-10 m-b-20">
                    <div class="row">
                        <div class="col-md-12" style="display: flex; justify-content: center; align-items: center">
                            <div class="day-parent" style="display: flex; justify-content: center; align-items: center">
                                <div style="cursor: pointer" class="date-minus">
                                    <i class="fas fa-angle-left"></i>
                                </div>
                                <div class="m-r-10 m-l-10 date-show">
                                    Today - July 1 2020
                                </div>
                                <div style="cursor: pointer" class="date-plus">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-parent">
                    <div class="col-small m-r-5">
                        <table class="firs-table table table-striped">
                            <thead>
                            <tr>
                                <th colspan="1">&nbsp;</th>
                            </tr>
                            <tr>
                                <th colspan="1">Time</th>
                            </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                    </div>

                    <div class="col-medium m-r-5">
                        <table class="medium-table table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody class="font-sm">
                            <tr>
                                <th style="display: flex; justify-content: space-between; align-items: center;">
                                    Activity
                                    <button class="add-btn green" data-toggle="modal" data-target="#activity">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </th>
                            </tr>
                            <tr>
                                <td style="display: flex; justify-content: space-between; align-items: center">
                                    <div class="green">
                                        Power Yoga
                                    </div>
                                    <div>
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="col-big m-r-5">
                        <table class="energy-table table table-striped border-green">
                            <thead>
                            <tr>
                                <th colspan="7" class="text-center">
                                    Energy Expenditure
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Total&nbsp;cal</td>
                                <td>Fat&nbsp;%</td>
                                <td>Fat&nbsp;(c)</td>
                                <td>Fat&nbsp;(g)</td>
                                <td>Carb&nbsp;%</td>
                                <td>Carb&nbsp;(c)</td>
                                <td>Carb&nbsp;(g)</td>
                            </tr>
                            <tr>
                                <td><span class="green">10</span></td>
                                <td>200</td>
                                <td><span class="green">4000</span></td>
                                <td>400</td>
                                <td>5000</td>
                                <td>600</td>
                                <td>700</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-medium m-r-5">
                        <table class="medium-table table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="display: flex; justify-content: space-between; align-items: center;">
                                    Meal / Water
                                    <button class="add-btn red" data-toggle="modal" data-target="#meal">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </th>
                            </tr>
                            <tr>
                                <td style="display: flex; align-items: center; justify-content: space-between">
                                    <div class="red">
                                        Breakfast
                                    </div>
                                    <div>
                                        <i class="fas fa-edit"></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-big m-r-5 ">
                        <table class="intake-table border-green table table-striped">
                            <thead>
                            <tr>
                                <th colspan="6" class="text-center">Intake</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Fat&nbsp;(g)</td>
                                <td>Fat&nbsp;Diges.</td>
                                <td>Carb&nbsp;(g)</td>
                                <td>Carb&nbsp;Dig.</td>
                                <td>Protein&nbsp;(g)</td>
                                <td>Protein&nbsp;Dig.</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>3.75</td>
                                <td>120</td>
                                <td>40</td>
                                <td>10</td>
                                <td>22</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-medium-two">
                        <table class="last-table table table-striped">
                            <thead>
                            <tr>
                                <th colspan="2" class="text-center red">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white">
                                <td class="text-center">Fat</td>
                                <td class="text-center">Carb</td>
                            </tr>
                            <tr>
                                <td>
                                    5.25
                                    <span class="green">(loss)</span>
                                </td>
                                <td>
                                    10
                                    <span class="red">(access)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5.25
                                    <span class="green">(loss)</span>
                                </td>
                                <td>
                                    10
                                    <span class="red">(access)</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    5.25
                                    <span class="green">(loss)</span>
                                </td>
                                <td>
                                    10
                                    <span class="red">(access)</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="activity" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Activity</h4>
                </div>
                <div class="modal-body">
                    todo ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

    <div id="meal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Meals</h4>
                </div>
                <div class="modal-body">
                   to do ....
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('footer')
    {{--date switcher script--}}
    <script !src="">
        $(document).ready(function () {
            function show_date(type = 0, dateString = "2010-09-11") {
                let date = 0;

                if (type == 1) {
                    date = new Date(dateString);
                    date.setDate(date.getDate() + 1);
                } else if (type == 2) {
                    date = new Date(dateString);
                    date.setDate(date.getDate() - 1);
                } else {
                    date = new Date();
                    date.setDate(date.getDate());
                }

                let day = ("0" + date.getDate()).slice(-2);
                let month = ("0" + (date.getMonth() + 1)).slice(-2);
                let dateShow = date.getFullYear() + "-" + (month) + "-" + (day);

                $('.date-show').html(dateShow);
            }

            $('.date-plus').click(function () {
                let dateString = $('.date-show').html();
                show_date(1, dateString)
            });

            $('.date-minus').click(function () {
                let dateString = $('.date-show').html();
                show_date(2, dateString)
            });

            show_date();
        });
    </script>

    <script !src="">

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

        .table thead th {
            border-bottom: none !important;
        }

        .table td, .table th {
            border-top: none;
        }

        .medium-table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #EEEFF1;
        }

        .medium-table.table-striped tbody tr {
            background-color: #E6E7E9;
        }

        .last-table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #F6F6F6;
        }

        .last-table.table-striped tbody tr {
            background-color: #FAFAFA;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(1) {
            background-color: #F6F6F7;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(1) {
            background-color: #FBF9F9;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(2) {
            background-color: #F6F4E8;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(2) {
            background-color: #FAF8EC;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(3) {
            background-color: #F6F4E8;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(3) {
            background-color: #FAF8EC;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(4) {
            background-color: #F6F4E8;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(4) {
            background-color: #FAF8EC;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(5) {
            background-color: #F1ECF3;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(5) {
            background-color: #F5EEF6;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(6) {
            background-color: #F1ECF3;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(6) {
            background-color: #F5EEF6;
        }

        .energy-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(7) {
            background-color: #F1ECF3;
        }

        .energy-table.table-striped tbody tr:nth-of-type(even) td:nth-child(7) {
            background-color: #F5EEF6;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(1) {
            background-color: #F6F4E8;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(1) {
            background-color: #F8F8EC;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(2) {
            background-color: #F6F4E8;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(2) {
            background-color: #F8F8EC;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(3) {
            background-color: #F1ECF3;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(3) {
            background-color: #F5EEF6;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(4) {
            background-color: #F1ECF3;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(4) {
            background-color: #F5EEF6;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(5) {
            background-color: #F7E9E9;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(5) {
            background-color: #FBEDED;
        }

        .intake-table.table-striped tbody tr:nth-of-type(odd) td:nth-child(6) {
            background-color: #F7E9E9;
        }

        .intake-table.table-striped tbody tr:nth-of-type(even) td:nth-child(6) {
            background-color: #FBEDED;
        }

        .day-parent {
            background: #F6F6F6;
            padding: 5px 10px;
            border-radius: 6px;
        }

        .border-green {
            border: 1px solid #DFEBDF;
        }

        .green {
            color: #639D5D;
        }

        .red {
            color: #B89482;
        }

        .add-btn{
            background: none;
            border: none;
        }

        .bg-white {
            background-color: #fff;
        }

        .font-medium {
            font-size: 13px;
        }

        .back-arrow {
            border-radius: 50%;
            border: 2px solid #212529;
            width: 25px;
            height: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            right: 12px;
            top: 11px;
        }

        .table-parent {
            display: flex;
        }

        .table-parent .col-small {
            flex: 1;
        }

        .table-parent .col-medium {
            flex: 2;
            min-width: 160px;
        }

        .table-parent .col-medium-two {
            flex: 3;
            min-width: 240px;
        }

        .table-parent .col-big {
            flex: 5;
        }

        /*# sourceMappingURL=style.css.map */
    </style>
@endpush



