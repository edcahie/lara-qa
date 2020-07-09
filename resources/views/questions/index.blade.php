@extends('layouts.app')

@section('content')
    <question-list :questions="{{ $questions }}"></question-list>
@endsection
