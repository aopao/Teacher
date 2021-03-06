@extends('admin.layouts.layout')
@section('css')
    <link rel="stylesheet" href="{{ asset('v1/css/student.css') }}">
    <link rel="stylesheet" href="{{ asset('v1/vendor/bootstrap-table/bootstrap-table.css') }}">
@endsection
@section('content')
    <div class="page-header">
        <h1 class="page-title"><i class="icon wb-user" aria-hidden="true"></i>@lang('plan.search_college')</h1>
    </div>
    <div class="panel">
        <div class="card-block ">
            <div class="project-controls clearfix">
                <div class="float-left">
                    <a href="{{ route('admin.student.create') }}" class="btn btn-sm btn-outline btn-primary">@lang('plan.add_plan')</a>
                </div>
            </div>
        </div>
        <div class="panel-body pt-0">
            <form action="">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                    <tr align="center">
                        <th class="w-50">
                            <span class="checkbox-custom checkbox-primary">
                              <input class="selectable-all" type="checkbox"><label></label>
                            </span>
                        </th>
                        <th>@lang('planDetail.school_name')</th>
                        <th>@lang('planDetail.year')</th>
                        <th>@lang('planDetail.province')</th>
                        <th>@lang('planDetail.batch')</th>
                        <th>@lang('planDetail.admit')</th>
                        <th>@lang('planDetail.major')</th>
                        <th>@lang('planDetail.planNumbers')</th>
                        <th>@lang('planDetail.lowest')</th>
                        <th>@lang('planDetail.lowRanking')</th>
                        <th>@lang('planDetail.average')</th>
                        <th>@lang('planDetail.averageLine')</th>
                        <th>@lang('planDetail.advantage')</th>
                        <th>@lang('planDetail.explain')</th>
                    </tr>
                    </thead>
                    @if(isset($lists))
                        <tbody >
                        @foreach($lists as $list)
                            <tr align="center">
                                <td>
                            <span class="checkbox-custom checkbox-primary">
                              <input class="selectable-item" type="checkbox" id="row-{{ $list['_id'] }}" value="{{ $list['_id'] }}"><label for="row-{{ $list['_id'] }}"></label>
                            </span>
                                </td>
                                <td>{{ $list['school'] }}</td>
                                <td>{{ $list['year'] }}</td>
                                <td>{{ $list['provinces'] }}</td>
                                <td>{{ $list['batch'] }}</td>
                                <td>{{ $list['subject'] }}</td>
                                <td>{{ $list['major'] }}</td>
                                <td>{{ $list['planNumbers'] }}</td>
                                <td>{{ $list['lowest'] }}</td>
                                <td>{{ $list['lowRanking'] }}</td>
                                <td>{{ $list['average'] }}</td>
                                <td>{{ $list['averageLine'] }}</td>
                                <td>{{ $list['advantage'] }}</td>
                                <td>{{ $list['explain'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    @endif
                </table>
            </form>
        </div>
        <div class="example">
            <table id="exampleTableLargeColumns" data-show-columns="true" data-height="400"
                   data-mobile-responsive="true"></table>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('v1/js/Plugin/table.js') }}"></script>
    <script src="{{ asset('v1/vendor/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script>
        $(".selectable-all").on("change", function () {
            if ($(".selectable-all").is(':checked')) {
                $('.selectable-item').attr("checked", "checked");
            } else {
                $('.selectable-item').attr("checked", false);
            }
        });
        function buildTable() {
            var i,
                j,
                row,
                columns = [
                    {field:'1',title:"@lang('planDetail.school_name')"},
                    {field:'1',title:"@lang('planDetail.school_name')"}
                ],
                data = [];

            for (i = 0; i < 20; i++) {
                row = {};
                for (j = 0; j < 50; j++) {
                    row['field' + j] = 'Row-' + i + '-' + j;
                }
                data.push(row);
            }
            $('#exampleTableLargeColumns').bootstrapTable('destroy').bootstrapTable({
                columns: columns,
                data: data,
                iconSize: 'outline',
                icons: {
                    columns: 'wb-list-bulleted'
                }
            });
        }
        buildTable()
    </script>
@endsection






