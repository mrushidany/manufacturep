
@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Materials List</h3>
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
                                <button class="btn btn-default btn-xs" onclick="create('{{ route('basic_materials.create') }}')"><i class="fa fa-plus"></i>Add Material</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="basic_materials_list" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Unit</th>
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
        var main_datatable = $('#basic_materials_list').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [ [10, 25, 50], [10, 25, 50] ],
            ajax: '{{ route('materials_datatable') }}',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'unit_name', name: 'basic_units_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],

        });
    </script>




@endsection
