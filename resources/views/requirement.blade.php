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
                    
                <div>
                    <b><i class='fas fa-user'></i> {{ $files[0]->customer_name }}</b>
                    <b>&lt;{{ $files[0]->customer_email }}&gt;</b>
                </div>
                
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
                                    
                                    <div>
                                        <i aria-hidden="true" class="fas fa-thumbs-up gray"></i> 
                                        <i aria-hidden="true" class="fas fa-thumbs-down gray"></i>
                                    </div>
                                    @if($file->file_name == null)
                                        <!-- <i class="fa fa-times-circle"></i> -->
                                        <i aria-hidden="true" class="fas fa-eye-slash gray"></i> 

                                        
                                    @else
                                        @if($file->status)
                                        <i aria-hidden="true" class="fas fa-eye"></i> 
                                        @else
                                        <i aria-hidden="true" class="fas fa-eye-slash"></i> 
                                        @endif 
                                        <a href="{{  route('file',[$file->file_id]) }}" title="{{$file->file_name}}"><i class="fas fa-cloud-download-alt abailable"></i></a>
                                        <i aria-hidden="true" class="fas fa-check-circle green"></i>
                                    @endif
                                    
                                </li>
                                @if($file->file_name == null)
                                <li class="list-group-item flex">
                                    <div class="input-group">
                                        <div class="custom-file">
                                        <form id="update-file-{{$file->file_type_id}}" 
                                            action="{{ route('files.store') }}" 
                                            method="POST" 
                                            enctype="multipart/form-data">
                                            <input type="file" class="custom-file-input" id="file{{$file->file_type_id}}" name="file">
                                            <label class="custom-file-label" for="file{{$file->file_type_id}}">Choose file</label>
                                            <input type="hidden" name="status" value="{}">
                                            <input type="hidden" name="processes_id" value="{{$file->processes_id}}">
                                            <input type="hidden" name="file_types_id" value="{{$file->file_type_id}}">
                                            
                                            {{ csrf_field() }}
                                        </form>
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" 
                                            onclick="event.preventDefault();
                                                    document.getElementById(
                                                        'update-file-{{$file->file_type_id}}'
                                                    ).submit();"
                                            ><i class="fas fa-cloud-upload-alt green"></i></button>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        @else
    
                        @endif
                        
                        
                    </ul>









                </div>
            </div>
        </div>
</div>

</div>
@endsection