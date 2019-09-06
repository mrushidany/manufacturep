@extends('layouts.app')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Semi Finished Compound Material</h3>
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
                                <button class="btn btn-default btn-xs" onclick="create('{{route('semi_finished_compound_materials.create')}}')"><i class="fa fa-plus"></i>Add Material</button>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="semi_finished_compound_material_list" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Composition</th>
                                <th>Units</th>
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
        let main_datatable = $('#semi_finished_compound_material_list').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [[10,25,50],[10,25,50]],
            ajax: "{!! route('semi_finished_compound_materials_datatable') !!}",
            columns : [
                {data: 'name', name:'semi_finished_compound_material_name'},
                {data: 'description', name:'semi_finished_compound_material_description'},
                {data: 'compound_basic_material_name', name:'compound_basic_material_name'},
                {data: 'basic_unit_name', name:'basic_unit_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            success:function () {
                
            },
            error:function () {
                
            }


        });
    </script>


    @endsection
