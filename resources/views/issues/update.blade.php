@extends('layouts.app')
@section('content')
<div class="container">
   
    <form method="POST" action="{{route('issues.update', $issue->id)}}" class="form">

        <div class="col-md-8">
            <div class="form-group">
            <span>Created by <strong>{{$issue->creator->name}}</strong></span>
            <br/>
            <span>Created at <strong>{{ Carbon\Carbon::parse($issue->created_at)->format('d-m-Y H:i:s') }}</strong></span>
            </div>
            <div class="form-group @if ($errors->has('title')) has-error  @endif">
                <label class="control-label" for="title">Title </label>
                <a data-toggle="collapse" href="#editTitle" aria-expanded="false" aria-controls="editTitle" class="issue-edit" style="float:right">edit</a>
                <div class="collapse" id="editTitle">
                <input name="title" type="text" class="form-control" id="title" aria-describedby="helpBlockTitle" placeholder="Enter issue title" required value="{{$issue->title}}">
                <br/>
                </div>
                <div class="panel panel-default">           
                    <div class="panel-body" style="word-wrap: break-word;">
                         {{$issue->title}}
                    </div>
                </div>
                @if ($errors->has('title'))
                @foreach($errors->get('title') as $error)
                <span class="help-block">{{ $errors->first('title') }}</span>
                @endforeach 
                @endif
            </div>
            <div class="form-group @if ($errors->has('description')) has-error  @endif">
                <label class="control-label" for="description">Description</label>
                <a data-toggle="collapse" href="#editDescription" aria-expanded="false" aria-controls="editDescription" class="issue-edit" style="float:right">edit</a>
                <div class="collapse" id="editDescription">
                    <textarea name="description" type="text" class="form-control" id="description" aria-describedby="helpBlockDescription" placeholder="Enter issue description" required>{{$issue->description}}</textarea>
                    <br/>
                </div>  
                <div class="panel panel-default">           
                    <div class="panel-body"  style="word-wrap: break-word;">
                         {{$issue->description}}
                    </div>
                </div>

                @if ($errors->has('description')) 
                @foreach($errors->get('description') as $error)
                <span class="help-block">{{ $errors->first('description') }}</span> 
                @endforeach 
                @endif
            </div>            
        </div>
        <div class="col-md-4">
             <div class="form-group">
                <label class="control-label" for="project_id">Project</label>
                <select name="project_id" class="form-control" id="project_id" aria-describedby="helpBlockResponsible">
                    <option></option>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}" @if(isset($issue->project->id) && $project->id === $issue->project->id)selected="selected" @endif>{{$project->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="status_id">Status</label>
                <select name="status_id" class="form-control" id="status_id" aria-describedby="helpBlockStatus">                    
                    @foreach($statuses as $status)
                    <option value="{{$status->id}}" @if(isset($issue->status->id) && $status->id === $issue->status->id)selected="selected" @endif>{{$status->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="severity_id">Priority</label>
                <select name="severity_id" class="form-control" id="severity_id" aria-describedby="helpBlockSeverity">
                    <option></option>
                    @foreach($severities as $severity)
                    <option value="{{$severity->id}}" @if(isset($issue->severity->id) && $severity->id === $issue->severity->id)selected="selected" @endif>{{$severity->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="responsible_id">Assign to</label>
                <select name="responsible_id" class="form-control" id="responsible_id" aria-describedby="helpBlockResponsible">
                    <option></option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($issue->responsible->id) && $user->id === $issue->responsible->id)selected="selected" @endif>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
             <div class="form-group">            
                <label class="control-label" for="executor_id">Executed by</label>
                <select name="executor_id" class="form-control" id="executor_id" aria-describedby="helpBlockResponsible">
                    <option></option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}" @if(isset($issue->executor_id) && $user->id === $issue->executor_id)selected="selected" @endif>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="start_date">Start date</label>
                <input name="start_date" type="text" class="form-control" id="start_date" aria-describedby="helpBlockStartDate" value="{{ Carbon\Carbon::parse($issue->start_date)->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label class="control-label" for="expected_time">Expected time</label>
                <input name="expected_time" type="number" min="0" class="form-control" id="expected_time" aria-describedby="helpBlockExpectedTime" value="{{$issue->expected_time}}">
            </div>

        </div>
        <div class="col-md-12">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">   
            <input type="submit" class="btn btn-default" name="issue_save" value="Save changes" />
           
        </div>        
    </form>
    <div class="col-md-12 comment-region">
   
   
    <div class="col-md-12">
    <h2>Comments:  <button class="btn btn-primary" data-toggle="collapse" href="#addComment" aria-expanded="false" aria-controls="addComment">add comment</button> </h2> 
    <div class="collapse col-md-12" id="addComment">
        <form class="form-horizontal" method="POST" action="{{route('issues.comment.create')}}">
         <div class="form-group">
            <textarea class="form-control" name="text" placeholder="Put your comment"></textarea>
         </div>         
         <div class="form-group">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="hidden" name="issue_id" value="{{$issue->id}}"/>
            <input type="submit" class="btn btn-default" value="Add comment"/>
         </div>
        </form>
    </div>
     </div>
     @foreach($issue->comments as $comment)
     <div class="col-md-1">
        <span>
                 <i class="fa fa-hashtag" aria-hidden="true"></i>
                 {{$comment->id}}
             </span> 
     </div>
     <div class="col-md-11">
     <div class="panel panel-default">
           <div class="panel-heading">     
            <span>                
                 {{$comment->user->name}} wrote at {{ Carbon\Carbon::parse($comment->created_at)->format('Y-m-d H:i:s') }}
             </span>
             @if($comment->user->id === Auth::user()->id)        
             
             <form method="POST" style="float:right; margin-left:10px" action="{{route('issues.comment.destroy')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="id" value="{{$comment->id}}"/>
                <input type="hidden" name="issue_id" value="{{$issue->id}}"/>
                <input type="submit" class="btn-link"  value="delete">
             </form>             
             <button data-toggle="collapse" data-target="#edit-comment-{{$comment->id}}" aria-expanded="false" aria-controls="edit-comment-{{$comment->id}}" class="comment-edit btn-link">edit</button>
           
             <div class="collapse" id="edit-comment-{{$comment->id}}">
                <form  class="form-horizontal" method="POST" action="{{route('issues.comment.update')}}">
                    <div class="form-group" style="margin-left:0; margin-right:0">
                        <textarea class="form-control" name="text" placeholder="Put your comment">{{$comment->text}}</textarea>
                    </div>         
                    <div class="form-group" style="margin-left:0; margin-right:0">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <input type="hidden" name="id" value="{{$comment->id}}"/>
                        <input type="hidden" name="issue_id" value="{{$issue->id}}"/>
                        <input type="submit" class="btn btn-default" value="Save"/>
                    </div>
                </form>
             </div>              
           </div>
           @endif
           <div class="panel-body">
                {{$comment->text}}
           </div>
     </div>
     </div>
     @endforeach  
     </div>


</div>
@endsection
@section('scripts')
<script>
 $( function() {
     $('#start_date').datepicker({ dateFormat: 'yy-mm-dd' });
 });

</script>
@endsection
