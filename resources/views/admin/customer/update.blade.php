@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-user'></i> {{ __('Update Customer') }}</div>
                
                <div class="card-body">
                <form id="update-customer" action="{{ route('customer.update', [$customer->id]) }}" method="POST" >
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" id="customer_id" value="{{ $customer->id }}">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" 
                    placeholder="Request Benefit" name="name"
                    value="{{ $customer->name }}">
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email"
                     placeholder="jhon.doe@gmail.com" value="{{ $customer->email }}">
                     @csrf
                </form>
                    <br>

                    
                    <ul class="list-group "> 
                        <!-- <li class="list-group-item flex">
                            <i class="fas fa-toggle-on"></i> -->
                            <!-- <i class="fas fa-toggle-off"></i> -->
                            <!-- <span>#R999 - First Requirement</span>
                            <i class="	fas fa-plus-circle"></i> -->
                            <!-- fas fa-minus-circle -->
                        <!-- </li> -->
                        @if (isset($requirements) && count($requirements) > 0)
                            @foreach ($requirements as $requirement)
                                <li class="list-group-item flex">
                                    <!-- <i class="fas fa-toggle-on"></i> -->
                                    <i class="fas fa-toggle-off"></i>
                                    <i class='fas fa-sitemap'></i>
                                    <span>#R{{$requirement->id}} - {{$requirement->name}}</span>
                                    <a href="{{ route('process.edit', ['process' => $requirement->processes_id]) }}">
                                    <i class="fas fa-plus-circle"></i>
                                    </a>
                                    <!-- fas fa-minus-circle -->
                                </li>
                            @endforeach
                        @else
    
                        @endif

                        <li class="list-group-item">
                        <requirement-to-customer></requirement-to-customer>
                            <label for="search-requirement">Search Requirement:</label>
                            <input type="text" class="form-control" id="search-requirement" name="search-requirement"
                                placeholder="#R1 - Req. Vaughn Kunze" 
                                value="">
                            <search-requirement></search-requirement>
                        </li>
                    </ul>
                    <br>
                    <button type="submit" class="btn btn-primary" 
                    onclick="event.preventDefault();
                    document.getElementById('update-customer').submit();">
                    <i class='fas fa-save'></i>
                    Save changes
                    </button>
                </div>
            </div>
        </div>
</div>

</div>
@endsection