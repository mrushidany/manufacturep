<?php
if(isset($compounds->id)) {
    $action = route('compound_materials.update', $compounds->id);
    $method = 'PUT';
    $compound_material_id = $compounds->basic_material_id;
    $compound_unit_id = $compounds->unit_id;
} else {
    $action = route('compound_materials.store');
    $method = 'POST';
    $compound_material_id = '';
    $compound_unit_id = '';
}
?>

<form action="{{$action}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field($method) }}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" style="text-align: center;">Add Compound Material</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="" value="{{$compounds->name ?? ''}}">
            </div>
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="basic_material">Basic Material</label>
                <select class="form-control" name="basic_material_id">
                    <option></option>
                    @foreach($materials as $material)
                        <option value="{{$material->id}}"
                         @if($material->id == $compound_material_id) selected @endif>{{$material->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="unit">Unit</label>
                <select class="form-control" name="unit_id">
                    <option></option>
                    @foreach($units as $unit)
                        <option value="{{$unit->id}}"
                        @if($unit->id == $compound_unit_id) selected @endif>{{$unit->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <label for="description">Description</label>
                <textarea id="description" rows="2"  type="text" class="form-control material_description" name="description" placeholder="">{{$compounds->description ?? ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp;Reset&nbsp;</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save&nbsp;</button>
    </div>
</form>





