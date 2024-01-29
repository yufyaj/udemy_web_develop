@extends('layouts.base')
@section('title', 'Quiz 管理')

@section('content')
  <h1>Quiz 管理</h1>
  <div class="row mt-5 mb-3">
    <div class="col text-right">
      <a href="{{route('quizzes.create')}}" type="button" class="btn btn-primary">追加</a>
    </div>
  </div>
  <div class="row my-3">
    <table class="table" id="quizzes-table">
      <thead class="thead-light">
        <tr>
          <th scope="col" style="width:10%">#</th>
          <th scope="col">問題</th>
          <th scope="col" style="width:10%" colspan="2">操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($quizzes as $quiz)
        <tr>
            <th scope="row">{{ $quiz->id }}</th>
            <td><a href="{{ route('quizzes.show', $quiz->id) }}">{{ Str::limit($quiz->question, 50, '...') }}</a></td>
            <td><button type="button" class="edit-quiz btn btn-primary btn-sm" onclick="location.href='{{ route('quizzes.edit', $quiz->id) }}'" data-id="{{ $quiz->id }}">編集</button></td>
            <td><button type="button" class="delete-quiz btn btn-danger btn-sm" data-id="{{ $quiz->id }}">削除</button></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection