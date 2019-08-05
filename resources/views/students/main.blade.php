@extends('layouts.app')

@section('content')
<div >
    <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    
                </div>
            @endif
    <div >
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Degree</th>
                <th scope="col">Subject</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <tr>
                @foreach($students as $student )
                        <td >{{$student->id}}</td>
                        <td >{{$student->name}}</td>
                        <td>{{$student->degree}}</td>
                    
                        @foreach($student->subjects as $subject)
                            <td>{{ $subject->subjectName }}</td>
                        
                            @endforeach           
                </tr>           
                </tr>
                @endforeach

            </tbody>
        </table>  
    
    <div><B>The Avarage :</B> {{ $avg }}</div>
         <a href="{{ url('students/create') }}" class="btn btn-info">Add Student</a></div>

    </div>    
   </div>
 </div>
        
 
@endsection