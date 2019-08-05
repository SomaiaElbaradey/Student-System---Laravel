@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')

<div class="container">
  <div class="card">
     
    <div class="card-body">
      <form class="" action="{{ url('students' . '/' . $student->id) }}" method="post">
        @method('PATCH')
        <label for="name">Name </label>
        <input type="text" name="name" value="{{ $student->name }}">
        <label for="degree">Degree</label>
        <input type="nubmer" name="degree" value="{{ $student->degree }}">
        
        @csrf
        <div>
        <input type="submit" name="send" value="Edit" class="btn btn-info">
        </div>
      </form>
      
  </div>
</div>

@endsection
