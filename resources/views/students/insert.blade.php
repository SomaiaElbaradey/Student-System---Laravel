@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Student </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            
                        </div>
                    @endif
                    <form method="POST" action="{{url ('students')}}">
                    @csrf
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="degree"placeholder="Degree">

                    <select name="subjectName" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        
                        <option name="subjectName" value="Physics">Physics</option>
                        <option name="subjectName" value="Mathmatics">Mathmatics</option>
                        <option name="subjectName" value="English">English</option>
                    </select>
                    <input type="submit" name="send" value="save" class="btn btn-info">
                    </form>
            
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
