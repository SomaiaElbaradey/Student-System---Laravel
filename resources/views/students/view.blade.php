@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Data </div>
               
                

                <div class="card-body">
                    <h2>student Name: </h2>
                    <p>{{ $student->name }}</p>

                    <h3>student Belongs to</h3>

                    <ul>
                        @foreach($student->subjects as $subject)
                        <li>{{ $subject->subjectName }}</li>
                      
                       
                    </ul>
                    <a href="{{ url('students') }}" class='float-right'>Back</a></div>
                    <form class="d-inline" action="{{ url('students' . '/' . $student->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit"  value="Confirm Delete ">
                    </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection
