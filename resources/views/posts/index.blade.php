@extends('layouts.login')

@section('content')
  <form action="/create" method="post">
    @csrf
    <input type="text"name="tweetname">
    <input type="image" src="images/post.png" alt="押して">
  </form>
@endsection
