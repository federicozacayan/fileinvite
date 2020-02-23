@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-sitemap'></i> {{ __('Update Requirement') }} </div>
                
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
                    <form id="update-requirement" action="{{ route('requirement.update', [$requirement->id]) }}" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                        placeholder="Request Benefit" 
                        value="{{ $requirement->name }}">
                        <br>
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $requirement->description }}</textarea>
                        <br>
                        <label for="name">How many days to upload the files:</label>
                        <input type="text" class="form-control" name="days"
                        placeholder="5" value="{{ $requirement->days }}">
                        @csrf
                    </form>
                    <br>

                    
                    <ul class="list-group "> 
                        @if (isset($files) && count($files) > 0)
                            @foreach ($files as $file)
                                <li class="list-group-item flex">
                                    <i class="fas fa-file"></i>
                                    <span>#FT{{$file->id}} - {{$file->name}}</span>
                                   <a href="{{ route('filetype.edit', ['filetype'=> $file->id]) }}"><i class="fa fa-pen green"></i></a> 
                                </li>
                            @endforeach
                        @else
    
                        @endif

                        <li class="list-group-item">
                        <form id="create-requirement" action="{{ route('filetype.store', [ $requirement->id]) }}" method="POST" >
                            <label for="name">Create File Type:</label>
                            <input type="text" class="form-control" id="name" name="name"
                                aria-describedby="emailHelp" placeholder="ID/PASSPORT" 
                                value="">
                            <input type="hidden" name="description" value="Add a description file here.">
                            <input type="hidden" name="requirement_id" value="{{$requirement->id}}">
                            <button type="submit" class="btn btn-secondary btn-sm new-file">
                                <span>Create File Type</span>
                                <i class="fas fa-file"></i>
                            </button>
                            @csrf
                        </form>
                        </li>
                    </ul>
                    <br>
                    <button type="submit" class="btn btn-primary" 
                    onclick="event.preventDefault();
                    document.getElementById('update-requirement').submit();">
                    <i class='fas fa-save'></i>
                    Save changes
                    </button>
                </div>
            </div>
        </div>
</div>

</div>
@endsection