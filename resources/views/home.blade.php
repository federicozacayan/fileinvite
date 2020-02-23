@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="requirement-list">
                        @if (isset($data) && count($data) > 0)
                            <label for="123">Requirement in progress :</label>
                            <ul class="list-group">    
                            @foreach ($data as $requirement)
                            <li class="list-group-item">
                                <a href="./requirement/{{$requirement->id}}">
                                #R{{$requirement->id}} - {{$requirement->name}}</a>
                            </li>
                            @endforeach
                            </ul>
                        @else
                        <label for="123">Requirement in progress :</label>
                            <ul class="list-group"> 
                                <li class="list-group-item">No Requirement found</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
