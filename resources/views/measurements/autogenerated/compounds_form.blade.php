<?php
if(isset($compounds->id)) {
    $action = route('compound.compound_units_list.update',$compounds->id);
    $method = 'PUT';
} else {
    $action = route('compound.compound_units_list.store');
    $method = 'POST';
}


?>
<form action="{{$action}}" method="post" autocomplete="off">
    @csrf
    @method($method)

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" style="text-align: center;">Add Compound Unit</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="alias">Alias</label>
                <input type="text" name="alias" class="form-control" value="{{$compounds->alias ?? ''}}">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="first_unit">First Unit</label>
                <select class="form-control first_unit" name="first_unit_id">
                    <option></option>
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}"
                                @if($unit->id == $compounds->first_unit_id) selected @endif>{{$unit->name ?? ''}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="quantity">Quantity</label>
                <input class="form-control" id="quantity" name="quantity" value="{{$compounds->quantity ?? ''}}">
            </div>
            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                <label for="basic">Second Unit</label>
                <select class="form-control second_unit" name="second_unit_id">
                    <option value="0" disabled="false" selected="true"></option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-refresh"></i>&nbsp;Reset&nbsp;</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>&nbsp;Save&nbsp;</button>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','.first_unit',function () {
            var first_unit_id = $(this).val();
            console.log(first_unit_id);

            var op = '';
            var div = $(this).parent().parent();
            $.ajax({
               type:'GET',
               url:'{!! route("basic_units_units") !!}' ,
                data:{
                  'first_unit_id' : first_unit_id
                },
                success:function (data) {

                    op += '<option></option>';
                    for(var i = 0; i< data.length; i++){
                        op +='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    div.find('select[name="second_unit_id"]').html(" ");
                    div.find('select[name="second_unit_id"]').append(op);
                },
                error:function () {
                    
                }
            });
        });
    });

</script>





