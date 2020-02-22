@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><i class='fas fa-user'></i> {{ __('Customers') }}</div>

                <div class="card-body">

                    <label for="search-customer">Search:</label>
                    <input type="text" class="form-control" id="search-customer" 
                    placeholder="#C084 Jhon Doe">
                    <search-customer></search-customer>
                    <br>
                    <customer-list></customer-list>
                    <div id="customer-list">
                    @if (isset($data) && count($data) > 0)
                        <label for="exampleInputEmail1">Suggested:</label>
                        <ul class="list-group">    
                        @foreach ($data as $customer)
                            <li class="list-group-item">
                                <a href="./customer/{{$customer->id}}/edit">#R{{$customer->id}} - {{$customer->name}}</a>
                            </li>
                        @endforeach
                        </ul>
                    @else
                    <li class="list-group-item">No Customer found</li>
                    @endif
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" 
                    onclick="location.href='{{route('customer.create')}}'">
                        
                    <i class='fas fa-user'></i>
                    Create new Customer
                    </button>
                </div>
            </div>
        </div>
</div>

</div>
@endsection