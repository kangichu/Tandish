<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    {!!Form::open(['action' => ['CookbooksController@destroy', $cookbook->id], 'method' => 'POST', 'class' => 'float-right'])!!}
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Cookbook</h5>
      </div>
      <div class="modal-body">
        Are you sure you want to continue with this action? Once done, your Cookbook will be permanently deleted.
      </div>
      <div class="modal-footer">
        <button type="button" class="btns btn-primary" data-dismiss="modal" style="padding-right: 1em">Close</button>
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn submit'])}}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>