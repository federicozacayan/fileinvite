@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-sitemap'></i> Search {{ __('Requirements') }}</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="exampleInputEmail1">Search:</label>
                    <input type="text" class="form-control" id="search-requirement" 
                    placeholder="#R400 - Request Benefit">
                    <search-requirement></search-requirement>
                    <br>
                    <requirement-list></requirement-list>
                    <div id="requirement-list">
                        @if (isset($data) && count($data) > 0)
                            <label for="123">Suggested:</label>
                            <ul class="list-group">    
                            @foreach ($data as $requirement)
                            <li class="list-group-item">
                                <a href="./requirement/{{$requirement->id}}/edit">
                                #R{{$requirement->id}} - {{$requirement->name}}</a>
                            </li>
                            @endforeach
                            </ul>
                        @else
                            <label for="exampleInputEmail1">Suggested:</label>
                            <ul class="list-group"> 
                                <li class="list-group-item">No Requirement found</li>
                            </ul>
                        @endif
                    </div>
                      
                    
                    <hr>
                    <button type="submit" class="btn btn-primary" 
                    onclick="location.href='{{route('requirement.create')}}'">
                        
                    <i class='fas fa-sitemap'></i>
                    Create new Requirement list
                    </button>
                </div>
            </div>
        </div>
</div>

</div>
@endsection