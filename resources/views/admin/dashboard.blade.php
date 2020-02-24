@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Work with') }}</div>

                <div class="card-body">
                    <!-- <label for="exampleInputEmail1">Search:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" 
                    aria-describedby="emailHelp" placeholder="#R400 - Request Benefit">
                    <br>
                    <label for="exampleInputEmail1">Suggested:</label>
                    <ul class="list-group">
                        <li class="list-group-item">#R400 - Request Benefit</li>
                        <li class="list-group-item">#R314 - Enroll Institution</li>
                        <li class="list-group-item">#B017 - Booking Room</li>
                        <li class="list-group-item">#R623 - Apply Visa</li>
                        <li class="list-group-item">#R400 - Make Complain</li>
                    </ul>
                    <hr> -->
                    <a class="btn btn-primary" href="{{ route('requirement.index') }}">
                    <i class='fas fa-sitemap'></i>
                    Requirements
                    </a>
                    <hr>
                    <a class="btn btn-primary" href="{{ route('customer.index') }}">
                    <i class='fas fa-user'></i>
                    Customers
                    </a>
                    
                    
                </div>
            </div>
        </div>
        <!-- Customers -->
        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Customers') }}</div>

                <div class="card-body">
                    <label for="exampleInputEmail1">Search:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" 
                    aria-describedby="emailHelp" placeholder="#C084 Jhon Doe">
                    <br>
                    <label for="exampleInputEmail1">Suggested:</label>
                    <ul class="list-group">
                        <li class="list-group-item">#C084 Jhon Doe</li>
                        <li class="list-group-item">#C874 Peter Smith</li>
                        <li class="list-group-item">#C975 Matthew Cook</li>
                        <li class="list-group-item">#C145 Mark Obama</li>
                        <li class="list-group-item">#C432 Luke S. Good</li>
                    </ul>
                    <hr>
                    <button type="submit" class="btn btn-primary">
                    <i class='fas fa-user'></i>
                    Create new user
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Requirement -->
        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Requirement') }}</div>

                <div class="card-body">
                    <label for="exampleInputEmail1">Files:</label>
                    <ul class="list-group files">
                        <li class="list-group-item">
                            <span>#F400 - Request Benefit</span> 
                            <i class='fas fa-envelope-open'></i>
                            <i class='fas fa-clock'></i>
                        </li>
                        <li class="list-group-item">
                            <span>#F400 - Request Benefit</span> 
                            <i class='fas fa-eye-slash'></i>
                            <i class='fas fa-clock'></i>
                        </li>
                        <li class="list-group-item">
                            <span>#F400 - Request Benefit</span> 
                            <i class='fas fa-eye'></i>
                            <i class='fas fa-clock'></i>
                        </li>
                        <li class="list-group-item"><span>#F400 - Request Benefit</span> <i class='fas fa-check-circle'></i></li>
                        <li class="list-group-item"><span>#F400 - Request Benefit</span> <i class='fas fas fa-exclamation-circle'></i></li>
                        <li class="list-group-item">#F017 - Booking Room</li>
                        <li class="list-group-item">#F623 - Apply Visa</li>
                        <li class="list-group-item">#F400 - Make Complain</li>
                    </ul>
                </div>
            </div>
        </div> -->


        <!-- File -->
        <!-- <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('File') }}</div>

                <div class="card-body">
                    <label for="exampleInputEmail1">#F400 - Request Benefit</label>
                    <ul class="list-group files">
                        <li class="list-group-item">
                            <span>{{\Carbon\Carbon::now()}}</span> 
                            <i class='fas fa-envelope-open'></i>
                            <i class='fas fa-clock'></i>
                            <i class='fas fa-eye-slash'></i>
                            <i class='fas fa-eye'></i>
                            <i class='fas fas fa-exclamation-circle'></i>
                            <i class='fas fa-check-circle'></i>
                        </li>
                    </ul>
                    <ul class="list-group files">
                        <li class="list-group-item">
                            <span>{{\Carbon\Carbon::now()}}</span> 
                            <i class='fas fa-envelope-open'></i>
                            <i class='fas fa-clock'></i>
                            <i class='fas fa-eye-slash'></i>
                            <i class='fas fa-eye'></i>
                            <i class='fas fas fa-exclamation-circle'></i>
                            <i class='fas fa-check-circle'></i>
                        </li>
                    </ul>
                    <ul class="list-group files">
                        <li class="list-group-item">
                            <span>{{\Carbon\Carbon::now()}}</span> 
                            <i class='fas fa-envelope-open'></i>
                            <i class='fas fa-clock'></i>
                            <i class='fas fa-eye-slash'></i>
                            <i class='fas fa-eye'></i>
                            <i class='fas fas fa-exclamation-circle'></i>
                            <i class='fas fa-check-circle'></i>
                        </li>
                    </ul>
                    <ul class="list-group files">
                        <li class="list-group-item">
                            <span>{{\Carbon\Carbon::now()}}</span> 
                            <i class='fas fa-envelope-open'></i>
                            <i class='fas fa-clock'></i>
                            <i class='fas fa-eye-slash'></i>
                            <i class='fas fa-eye'></i>
                            <i class='fas fas fa-exclamation-circle'></i>
                            <i class='fas fa-check-circle'></i>
                        </li>
                    </ul> 
                </div>
            </div>
        </div> -->
    </div>
</div>

</div>
@endsection