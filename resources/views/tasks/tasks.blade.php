@extends('layouts.app')

@section('content')
    @if  (Auth::id() == $user->id)
    <h1>{{ Auth::user()->name }}のタスク一覧</h1>

        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>タスクリスト</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{!! link_to_route("tasks.show", $task->id, ["id" => $task->id]) !!}</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to Tasklist</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
    {!! link_to_route("tasks.create", "新規タスクの追加", null, ["class" => "btn btn-primary"]) !!}

@endsection