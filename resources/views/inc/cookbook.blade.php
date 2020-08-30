<!-- Modal -->
<div class="modal fade" id="cookbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    {!! Form::open(['action' => 'CookbooksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) !!}
    <div class="modal-content" style="padding: 1.5em">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel" style="color: #1b1931;">Create a new Cookbook, a collection of related recipes.</h5><br>
      </div>
      <div class="modal-body">
        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control clean-slide', 'placeholder' => 'Title'])}}
            @if ($errors->has('title'))
                <span class="text-danger">This field is required!</span>
            @endif
        </div><br>
        <div class="form-group">
            {{Form::textarea('description', '', ['class' => 'form-control clean-slide', 'placeholder' => 'Description'])}}
            @if ($errors->has('body'))
                <span class="text-danger">This field is required!</span>
            @endif
        </div>
      </div>
      <div class="modal-footer" >
        <button type="button" class="btns btn-secondary" data-dismiss="modal" style="padding-right: 1em">Close</button>
        <button type="submit" class="btns btn-primary">Save</button>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>