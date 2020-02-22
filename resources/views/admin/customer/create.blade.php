@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-user'></i> {{ __('Create Customer') }}</div>

                <div class="card-body">
                <form id="create-requirement" action="{{ route('customer.store') }}" method="POST" >
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"
                     placeholder="Jhon Doe">
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email"
                     placeholder="jhon.doe@gmail.com">
                    <br>
                    <button type="submit" class="btn btn-primary">
                        
                    <i class='fas fa-save'></i>
                    Create new Customer
                    </button>


                    
                    
                    @csrf
                    </form>
                </div>
            </div>
        </div>
</div>

</div>
@endsection