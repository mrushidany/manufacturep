<?php
if(isset($semi_compound_material->id)) {
    $action = route('semi_finished_compound_materials.update', $semi_compound_material->id);
    $method = 'PUT';
    $compound_basic_id = $semi_compound_material->compound_basic_id;
    $unit_id = $semi_compound_material->unit_id;

} else {
    $action = route('semi_finished_compound_materials.store');
    $method = 'POST';
    $compound_basic_id = '';
    $unit_id = '';
}
?>

<form action="{{$action}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field($method) }}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" style="text-align: center;">Add Semi Finished Compound Material</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="" value="{{$semi_compound_material->name ?? ''}}">
            </div>
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="basic_material">Compound Material</label>
                <select class="form-control" name="compound_basic_id">
                    <option></option>
                    @foreach($compound_basic as $basic)
                        <option value="{{$basic->id}}"
                        @if($basic->id == $compound_basic_id) selected @endif>{{$basic->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                <label for="unit">Unit</label>
                <select class="form-control" name="unit_id">
                    <option></option>
                    @foreach($units as $unit)
                        <option value="{{$unit->id}}"
                        @if($unit->id == $unit_id) selected   @endif>{{$unit->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <label for="description">Description</label>
                <textarea id="description" rows="2"  type="text" class="form-control" name="description" placeholder="">{{$semi_compound_material->description ?? ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp;Reset&nbsp;</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save&nbsp;</button>
    </div>
</form>





