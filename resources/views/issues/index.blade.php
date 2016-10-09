@extends('layouts.app')
@section('content')

<div class="container">
    <h3 class="col-md-12">Found {{$issues->total()}} issues</h3>
    <div class="issues-content col-md-9">
         @foreach ($issues as $issue)        
           <div class="panel panel-default">
                <div class="panel-body issue-title-row">
                    <div class="col-md-1">
                        <a href="{{route('issues.edit',  $issue->id)}}">
                        <span>
                            <i class="fa fa-hashtag" aria-hidden="true"></i>
                            {{$issue->id}}
                        </span>   
                        </a>                 
                    </div>
                    <div class="col-md-10">
                         <strong>
                         {{ $issue->title }}
                        </strong> 
                    </div>
                    
                    <div class="col-md-1">
                        @if($issue->comment_count > 0)
                        <a href="{{route('issues.edit',  $issue->id)}}"><i class="fa fa-comment" aria-hidden="true"></i>
                            <span>{{$issue->comment_count}}</span>
                        </a>
                        @endif
                    </div>

                </div>   
                 <div class="panel-body issue-title-row">
                    <div class="col-md-12">
                         Project: <strong>{{$issue->project_title}}</strong>  
                     </div> 
                 </div>
                 <div class="panel-body info-row">
                     <div class="col-md-8">
                         <small>
                           Added by <strong>{{ $issue->creator_name or 'not set'}}</strong>                     
                            at {{ $issue->created_at }}.
                        </small>
                         <small>
                           Last updated at  {{ $issue->updated_at }}
                        </small>
                     </div>
                      <div class="col-md-4">                           
                           <span class="badge">
                            {{ $issue->severity_title or 'not set'}}
                        </span>
                        <span class="badge">
                            {{ $issue->status_title or 'not set'}}
                        </span>
                        
                     </div>   
                                     
                 </div>                
            </div>
            
        @endforeach
        {{$issues->links()}}
    </div>
  <div class="filter col-md-3">
   <form class="form">
      
    <div class="woll list-group">
    <a href="#sortBy" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-sort" aria-hidden="true"></i>
         Sort by
        <div style="margin-top:-2px;" class="pull-right">
            <i class="fa fa-sort-desc"></i>
        </div>
    </a>   
    <div class="collapse" id="sortBy">         
            <div class="woll col-items list-group">
                <input id="ordering-desc" type="radio" name="ordering" value="desc" 
                    {{isset($filters['ordering']) && $filters['ordering'] === 'desc' ? 'checked=checked': ""}} 
                    />
                <input id="ordering-asc" type="radio" name="ordering" value="asc" 
                     {{isset($filters['ordering']) && $filters['ordering'] === 'asc' ? 'checked=checked': ""}} 
                />
                <div class="list-group-item">
                     <input id="created_at" type="radio" name="order_by" value="created_at"
                        {{isset($filters['order_by']) && $filters['order_by'] === 'created_at' ? 'checked=checked': ""}} 
                     /> 
                     <label for="created_at">Date created</label>
                     <div class="sortBy-sort">
                        <label for="ordering-asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></label>                   
                        <label for="ordering-desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></label> 
                     </div>                     
                </div>   
                <div class="list-group-item">  
                     <input id="updated_at" type="radio" name="order_by" value="updated_at"
                        {{isset($filters['order_by']) && $filters['order_by'] === 'updated_at' ? 'checked=checked': ""}}
                     />                  
                     <label for="updated_at">Date updated</label>
                     <div class="sortBy-sort">
                        <label for="ordering-asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></label>                   
                        <label for="ordering-desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></label> 
                     </div>                                     
                </div> 
                
            </div>
        
    </div>
    <a href="#status" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
       <i class="fa fa-flag" aria-hidden="true"></i>
        Status
        <div style="margin-top:-2px;" class="pull-right"><i class="fa fa-sort-desc"></i></div>
    </a>
    <div class="collapse" id="status">         
            <div class="woll col-items list-group">
             <div class="list-group-item">
                    <input id="status_0" type="checkbox" name="status_id[]" value="0"
                     {{isset($filters['status_id']) && in_array(0, $filters['status_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="status_0">Not set</label>                                                                           
                </div>
            @foreach($statuses as $status)
               <div class="list-group-item">
                    <input id="status_{{$status->id}}" type="checkbox" name="status_id[]" value="{{$status->id}}"
                     {{isset($filters['status_id']) && in_array($status->id, $filters['status_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="status_{{$status->id}}">{{$status->title}}</label>                                                                           
                </div>
            @endforeach 
            </div>        
    </div>

    <a href="#severity" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
       <i class="fa fa-fire" aria-hidden="true"></i>
        Severity
        <div style="margin-top:-2px;" class="pull-right"><i class="fa fa-sort-desc"></i></div>
    </a>
    <div class="collapse" id="severity">         
            <div class="woll col-items list-group">

            <div class="list-group-item">
                    <input id="severity_0" type="checkbox" name="severity_id[]" value="0"
                     {{isset($filters['severity_id']) && in_array(0, $filters['severity_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="severity_0">Not set</label>                                                                           
                </div>

            @foreach($severities as $severity)
               <div class="list-group-item">
                    <input id="severity_{{$severity->id}}" type="checkbox" name="severity_id[]" value="{{$severity->id}}"
                     {{isset($filters['severity_id']) && in_array($severity->id, $filters['severity_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="severity_{{$severity->id}}">{{$severity->title}}</label>                                                                           
                </div>
            @endforeach 
            </div>        
    </div>
    <a href="#creator" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
       <i class="fa fa-user" aria-hidden="true"></i>
        Opener
        <div style="margin-top:-2px;" class="pull-right"><i class="fa fa-sort-desc"></i></div>
    </a>
    <div class="collapse" id="creator">         
            <div class="woll col-items list-group">
            @foreach($users as $creator)
               <div class="list-group-item">
                    <input id="creator_{{$creator->id}}" type="checkbox" name="creator_id[]" value="{{$creator->id}}"
                     {{isset($filters['creator_id']) && in_array($creator->id, $filters['creator_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="creator_{{$creator->id}}">{{$creator->name}}</label>                                                                           
                </div>
            @endforeach 
            </div>        
    </div>

    <a href="#excutor" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
       <i class="fa fa-code" aria-hidden="true"></i>
        Executor
        <div style="margin-top:-2px;" class="pull-right"><i class="fa fa-sort-desc"></i></div>
    </a>
    <div class="collapse" id="excutor">         
            <div class="woll col-items list-group">
            @foreach($users as $excutor)
               <div class="list-group-item">
                    <input id="excutor_{{$excutor->id}}" type="checkbox" name="excutor_id[]" value="{{$excutor->id}}"
                     {{isset($filters['excutor_id']) && in_array($excutor->id, $filters['excutor_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="excutor_{{$excutor->id}}">{{$excutor->name}}</label>                                                                           
                </div>
            @endforeach 
            </div>        
    </div>

    <a href="#responsible" class="list-group-item" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
       <i class="fa fa-arrow-right" aria-hidden="true"></i>
        Responsible
        <div style="margin-top:-2px;" class="pull-right"><i class="fa fa-sort-desc"></i></div>
    </a>
    <div class="collapse" id="responsible">         
            <div class="woll col-items list-group">
            @foreach($users as $responsible)
               <div class="list-group-item">
                    <input id="responsible_{{$responsible->id}}" type="checkbox" name="responsible_id[]" value="{{$responsible->id}}"
                     {{isset($filters['responsible_id']) && in_array($responsible->id, $filters['responsible_id']) ? 'checked=checked': ""}}
                    />
                    <span class="glyphicon glyphicon-ok"></span>
                    <label for="responsible_{{$responsible->id}}">{{$responsible->name}}</label>                                                                           
                </div>
            @endforeach 
            </div>        
    </div>
    
	
</div>
<div class="filter-input">
<input type="submit" class="btn btn-default" value="Apply filters"/>
<a href="{{route('issues.index')}}" class="btn btn-link">Clear filters</a>
</div>
    </form>

</div>

</div>

</div>



@endsection
