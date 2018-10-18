@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">Simple task manager - <b>GTask</b></h1>
        <footer class="blockquote-footer">Created by <cite title="Source Title">Big_Energy</cite></footer>
        <br>
        <div class="card">
            <div class="card-header">
               Add new task
            </div>
            <div class="card-body">
                @include('errors')

                <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-12">
                        <div class="form-group">
                            <label for="task" class="col-sm-3 control-label">Task</label>
                            <div class="row">
                                <div class="col-sm-8">
                                    <input type="text" name="name" id="task-name" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-block btn-success">Add new task</button>
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        @if(count($tasks) > 0 )
            <div class="card">
                <div class="card-header">
                    Current tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <tr>
                            <th scope="row">#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $task-> id }}</div>
                                    </td>
                                <td class="table-text">
                                    <div>{{ $task-> name }}</div>
                                </td>
                                <td>
                                    <form action="{{ url('task/'. $task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger">Remove task</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



    </div>
@endif
@endsection