@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-sitemap'></i> {{ __('Create Requirement') }}</div>

                <div class="card-body">
                <form id="create-requirement" action="{{ route('requirement.store') }}" method="POST" >
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif  
                    <label for="name">Requirement's Name:</label>
                    <input type="text" class="form-control" name="name"
                     placeholder="Request Benefit">
                    <br>
                    <label for="description">Requirement's Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    <br>
                    <label for="name">How many days to upload the files:</label>
                    <input type="text" class="form-control" name="days"
                     placeholder="5">
                    <br>
                    <button type="submit" class="btn btn-primary">
                        
                    <i class='fas fa-save'></i>
                    Create new Requirement
                    </button>


                    
                    
                    @csrf
                    </form>
                </div>
            </div>
        </div>
</div>

</div>
@endsection