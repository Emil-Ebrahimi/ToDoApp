@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')
<div class="row justify-content-center mb-3 mt-4">
  <div class="col-sm-4">
    <a href="{{ route('task.create')  }}" class="btn btn-block btn-success">Create Task</a>
  </div>
</div>
@if($tasks->count() == 0)
<p class="lead text-center">No Tasks Created Yet!</p>
@else
@foreach($tasks as $task)

<div class="row mb-5">
  <div class="col-sm-12">
   <a href="{{ route('view_task', ['task' => $task->id])  }}"><h3>  {{ $task->name }}
<small>{{ $task->created_at }}</small>
       </h3></a>
       <hr>
  <p>{{ $task->description }}</p>
  <h4>{{ $task->priority }}</h4>
  <h4>{{ $task->progress }}</h4>
{!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
<a href=" {{ route('task.edit', $task->id) }} " class="btn btn-sm btn-primary" >Edit</a>
<button type="submit" class="btn btn-sm btn-danger">Delete</button>
{!! Form::close() !!}
  </div>
</div>

@endforeach
@endif
<div class="row justify-content-center">
  <div class="col-sm-6 text-center">
    {{ $tasks->links() }}
  </div>
</div>

@endsection
