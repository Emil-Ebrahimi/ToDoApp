@extends('layouts.main')


@section('title', 'Show Task')

@section('content')
<div class="row">
    <div class="row mb-5 mt-5">
        <div class="col-sm-12">
           <h3>  {{ $task->name }}
                    <small>{{ $task->created_at }}</small>
                </h3>
            <hr>
            <p>{{ $task->description }}</p>
            <h4>{{ $task->priority }}</h4>
            <h4>{{ $task->progress }}</h4>
            {!! Form::open(['route' => ['task.destroy', $task->id], 'method' => 'DELETE']) !!}
            <a href=" {{ route('task.edit', $task->id) }} " class="btn btn-sm btn-primary" >Edit</a>
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            {!! Form::close() !!}
            <hr>
            <h1>Recent Log</h1>
            @foreach($task->logs as $log)
            <h3>  {{ $log->old_name }}
            </h3>
            <hr>
            <p>{{ $log->old_description }}</p>
            <h4>{{ $log->old_priority }}</h4>
            <h4>{{ $log->old_progress }}</h4>
                @endforeach
            {!! Form::open(['route' => ['clear_task', $task->id], 'method' => 'DELETE']) !!}
            <button type="submit" class="btn btn-sm btn-danger">Clear Log</button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-sm-4 mt-3">
        <a href="{{ route('task.index') }}" class="btn btn-block btn-secondary">Go back</a>
    </div>
  </div>
@endsection
