<?php
if(isset($materials->id)) {
    $action = route('basic_materials.update', $materials->id);
    $method = 'PUT';
} else {
    $action = route('basic_materials.store');
    $method = 'POST';
}
?>

<form action="{{$action}}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field($method) }}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" style="text-align: center;">Add Material</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="" value="{{$materials->name}}">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="description">Description</label>
                <input id="description" type="text" class="form-control" name="description" placeholder="" value="{{$materials->description}}">
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <label for="name">Basic Unit</label>
                <select class="form-control" name="unit_id">

                    <option></option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}"
                                @if($unit->id == $materials->unit_id) selected @endif>{{$unit->name}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp;Reset&nbsp;</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save&nbsp;</button>
    </div>
</form>





