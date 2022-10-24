@extends('layouts.app')

@section('title') create @endsection
@section('content')
        <form method="POST" action="{{route('posts.update',$post['id'])}}">
          @csrf
          @method('put')
          <div> <input type="hidden" name="post-id" value="{{$post->id}}"></div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input name="title" type="text" value="{{$post->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">{{$post->description}} </textarea>
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post Creator</label>
                <select name="posted-by" class="form-control">
                  <option value="{{$post->user->id}}">{{$post->user->name}}</option>
                </select>
              </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

@endsection