@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @if (session('status'))
				    <div class="alert alert-success">
				        {{ session('status') }}
				    </div>
				@endif

                <div class="panel-body">
                    
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Student_type</th>
                            <th>Semestar</th>
                           
                            <th>Status</th>                            
                        </thead>
                        <tbody>
                            @foreach($list as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->department}}</td>
                                <td>{{$row->student_type}}</td>
                                <td>{{$row->level}}</td>
                                
                                <td>
                                    {{$row->status == 3?'Complete':'In progress'}}
                                </td>

                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
