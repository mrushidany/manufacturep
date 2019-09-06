@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Basic Unit List</h3>
            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <button class="btn btn-default btn-xs" onclick="create('{{ route('basic.basic_units_list.create') }}')"><i class="fa fa-plus"></i>Add Basic Unit</button>                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="basic_units_list" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Symbol</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let main_datatable = $('#basic_units_list').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [ [10, 25, 50], [10, 25, 50] ],
            ajax: '{{ route('basic_units_datatable') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'symbol', name: 'symbol'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],

        });
    </script>





@endsection
