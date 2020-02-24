@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- Requirements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <i class='fas fa-sitemap'></i> {{ $files[0]->requirements_name }}
                </div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                <div>
                    <a href="{{ route('customer.edit', [$files[0]->customer_id])}}">
                        <b><i class='fas fa-user'></i> {{ $files[0]->customer_name }}</b>
                        <b>&lt;{{ $files[0]->customer_email }}&gt;</b>
                    </a>
                </div>
                <!-- <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">2 weeks</div>
                </div> -->
                <h2 class="d-flex justify-content-center"><b>{{ ($isPast)?'Late '.$left.' days':$left.' days left' }}</b></h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-{{$bgColor}}" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                        
                    </div>
                </div>
                <div class="flex">
                    <span>Started: <b>{{\Carbon\Carbon::parse($files[0]->processes_created_at)->format('M d Y')}}</b> 
                        <i aria-hidden="true" class="fas fa-calendar-check"></i>
                    </span>
                    
                    
                    <span>
                        <i aria-hidden="true" class="fas fa-calendar-times"></i> Deadline: <b>{{\Carbon\Carbon::parse($files[0]->processes_created_at)->addDays(
                            $files[0]->requirements_days
                        )->format('M d Y')}}</b>
                    </span>
                </div>
                <br>
                
                
                
                    <ul class="list-group "> 
                        @if (isset($files) && count($files) > 0)
                            @foreach ($files as $file)
                                <li class="list-group-item flex">
                                    
                                    <span>
                                        <i class="fas fa-file"></i> 
                                        <span>#F{{$file->file_type_id}} - {{$file->file_type_name}}</span>
                                        <a href="#" title="{{$file->file_type_description}}"><i class="fa fa-info-circle"></i></a>
                                     </span>
                                    <!-- <span>2020-02-20 17:40:25</span>
                                    <i aria-hidden="true" class="fas fa-envelope-open"></i> 
                                    <i aria-hidden="true" class="fas fa-clock"></i> 
                                    <i aria-hidden="true" class="fas fa-eye-slash"></i> 
                                    <i aria-hidden="true" class="fas fa-eye"></i> 
                                    <i aria-hidden="true" class="fas fas fa-exclamation-circle"></i> 
                                    <i class="fas fa-cloud-download-alt"></i> 
                                    <i class="fas fa-download"></i> 
                                    <i class="fa fa-times-circle"></i> -->
                                    
                                    
                                    
                                    @if($file->file_name == null)
                                        <div>
                                            <i aria-hidden="true" class="fas fa-thumbs-up gray"></i>
                                            <i aria-hidden="true" class="fas fa-thumbs-down gray"></i>
                                        </div>
                                        <!-- <i class="fa fa-times-circle"></i> -->
                                        <i aria-hidden="true" class="fas fa-eye-slash gray"></i> 
                                        <i class="fas fa-cloud-download-alt gray"></i>
                                        <i class="fas fa-hourglass-half red"></i>
                                        
                                    @else
                                        <div>
                                            <a href="{{  route('admin.file',[$file->file_id, 'thumbs'=>'up']) }}" title="Verify Document">
                                                <i aria-hidden="true" class="fas fa-thumbs-up {{ isset($file->status['thumbs']) && $file->status['thumbs'] == 'up'?'green':'blue' }}"></i>
                                            </a>
                                            <a class="confirm-rejection"  href="{{  route('admin.file',[$file->file_id, 'thumbs'=>'down']) }}" title="Reject Document">
                                                <i aria-hidden="true" class="fas fa-thumbs-down {{ isset($file->status['thumbs']) && $file->status['thumbs'] == 'down'?'red':'blue' }}"></i>
                                            </a>
                                        </div>
                                        @if($file->status)
                                        <i aria-hidden="true" class="fas fa-eye"></i> 
                                        @else
                                        <i aria-hidden="true" class="fas fa-eye-slash"></i> 
                                        @endif
                                        <a href="{{  route('admin.file',[$file->file_id]) }}" title="{{$file->file_name}}"><i class="fas fa-cloud-download-alt abailable"></i></a>
                                        <i aria-hidden="true" class="fas fa-check-circle green"></i>
                                    @endif
                                    
                                </li>
                            @endforeach
                        @else
    
                        @endif

                        <!-- <li class="list-group-item">
                        <form id="create-requirement" action="{{ route('filetype.store') }}" method="POST" >
                            <label for="feedback">Send Feedback:</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                            <button type="submit" class="btn btn-secondary btn-sm new-file">
                                <i class="fas fa-paper-plane"></i>
                                <span>Send Feedback</span>
                            </button>
                            @csrf
                        </form>
                        </li> -->
                    </ul>
                    <!-- <br>
                    <button type="submit" class="btn btn-primary" 
                    onclick="location.href='{{route('requirement.create')}}'">
                    <i class='fas fa-save'></i>
                    Save changes
                    </button> -->
                </div>
            </div>
        </div>
</div>

</div>
@endsection