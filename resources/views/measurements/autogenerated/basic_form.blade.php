<?php
if(isset($units->id)) {
    $action = route('basic.basic_units_list.update', $units->id);
    $method = 'PUT';
} else {
    $action = route('basic.basic_units_list.store');
    $method = 'POST';
}
?>

<form action="{{ $action }}" method="post" autocomplete="off">
    {{ csrf_field() }}
    {{ method_field($method) }}

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" style="text-align: center;">Add Unit</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control" name="name" placeholder="" value="{{$units->name}}">
            </div>
            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                <label for="symbol">Symbol</label>
                <input id="symbol" type="text" class="form-control" name="symbol" placeholder="" value="{{$units->symbol}}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp;Reset&nbsp;</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save&nbsp;</button>
    </div>
</form>





