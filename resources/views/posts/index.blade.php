@extends('layouts.app')
@section('content')


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Contents</th>
            <th>Image</th>
            <th width="300px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td><img style="width:200px;height: 200px" src="/images/{{$post->image }} "> </td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table> 

@endsection

  
                    
                
