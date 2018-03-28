@extends('layouts.app')


@section('content')
<br>
<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                @if(Auth::user()->types['id'] == 2)
                    <a href="/post/create" class="btn btn-primary">Create Post</a>
                    @if(count($posts) > 0)
                        <h3>{{Auth::user()->name}}'s Posts</h3>
                        @foreach($posts as $post)
                            <table class="table table-striped">
                                <tr>
                                    <th>{{$post->title}}</th>
                                    <th>
                                    <a href="/post/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                    </th>
                                    <th>
                                        {!! Form::open(['action' => ['PostController@destroy', $post->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </th>
                                    <th></th>
                                </tr>
                            @endforeach
                    @else
                                <p>No posts found</p>
                    @endif
                @elseif(Auth::user()->types['id'] == 3)
                    @if(count($condos) > 0)
                    @foreach($condos as $condo)
                        <table class="table table-striped">
                            <tr>
                                <th>{{$condo->name}}</th>
                                <th>
                                <a href="/post/{{$condo->id}}/edit" class="btn btn-info">Edit</a>
                                </th>
                                <th>
                                    {!! Form::open(['action' => ['PostController@destroy', $condo->id],'method'=>'POST', 'class'=>'pull-right']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>
                                <th></th>
                            </tr>
                        @endforeach
                    @else
                                <p>No posts found</p>
                    @endif
                @endif
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
