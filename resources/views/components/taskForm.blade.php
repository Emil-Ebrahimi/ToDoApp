{{Form::label('name', 'Task', ['class' => 'control-label']) }}
{{Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Task Name']) }}

{{Form::label('description', 'Description', ['class' => 'control-label mt-3']) }}
{{Form::textarea('description', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Task description']) }}

{{Form::label('priority', 'Priority', ['class' => 'control-label mt-3']) }}
{{ Form::select('priority', [ '(3) Low Priority' => 'Low', '(2) Medium Priority' => 'Medium', '(1) High Priority' => 'High'], 'Low', ['class' => 'form-control form-control-lg']) }}

{{Form::label('progress', 'Progress', ['class' => 'control-label mt-3']) }}
{{Form::select('progress', ['Not Started' => 'Not Started', 'In Progress' => 'In Progress', 'Done' => 'Done'], 'N', ['class' => 'form-control form-control-lg']) }}


<div class="row justify-content-center mt-5">
  <div class="col-sm-4">
    <a href="{{ route('task.index') }}" class="btn btn-block btn-secondary">Go back</a>
  </div>
  <div class="col-sm-4">
    <button class="btn btn-block btn-success" type="submit">Save Task</button>
  </div>
</div>
