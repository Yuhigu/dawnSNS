@extends('layouts.login')

@section('content')
  <form action="/create" method="post">
    @csrf
    <input type="text"name="tweetname">
    <input type="image" src="images/post.png" alt="押して">
  </form>
  <table class='table table-hover'>
            @foreach ($posts as $post)
            <tr>
                <td><img src="/images/{{$post->images}}" alt=""></td>
                <td>{{ $post->username }}</td>
                <td>{{ $post->posts }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                  <img src="/images/edit.png" alt="編集ボタン" class="modalopen" data-target="{{ $post->id }}">
                </td>
                <td>
                   <form action="/postDelete" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="postId" value="{{$post->id}}">
                    <input type="image" src="images/trash_h.png" alt="押っせーい">
                  </form>
                </td>
            </tr>
            <div class="modal" id="{{ $post->id }}">
              <form action="/postUpdate" method="post">
                @csrf
                  <input type="text" name="tweet" value="{{$post->posts}}">
                  <input type="hidden" name="postId" value="{{$post->id}}">
                  <input type="image" src="images/edit.png" alt="押して">
              </form>
            </div>
            @endforeach
  </table>
@endsection
