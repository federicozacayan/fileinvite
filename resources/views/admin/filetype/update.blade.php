@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-sitemap'></i>  <a href="{{ route('requirement.edit', [$filetype->requirement->id])}}">{{ $filetype->requirement->name }}</a>
                 |
                <i class="fas fa-file"></i><b> {{ __('File Type') }}</b>
                </div>
                <div class="card-body">
                    <form id="create-requirement" action="{{ route('filetype.update', [$filetype->id]) }}" method="POST" >
                        <input type="hidden" name="_method" value="PUT">
                        <label for="exampleInpnameutEmail1">File Type Name:</label>
                        <input type="text" class="form-control" id="name" name="name"
                        placeholder="File Type Name" 
                        value="{{ $filetype->name }}">
                        <br>
                        <label for="description">File Type Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $filetype->description }}</textarea>
                        <br>
                        @csrf
                        <button type="submit" class="btn btn-primary">
                        <i class='fas fa-save'></i>
                        Save Changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>

</div>
@endsection