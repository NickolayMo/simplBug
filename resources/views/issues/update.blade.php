@extends('layouts.app') @section('content')
<div class="container">
    <h2 class="col-md-12">Add issue</h2>
    <form method="POST" action="{{route('issues.store')}}" class="form">

        <div class="col-md-8">
            <div class="form-group @if ($errors->has('title')) has-error  @endif">
                <label class="control-label" for="title">Title</label>
                <input name="title" type="text" class="form-control" id="title" aria-describedby="helpBlockTitle" placeholder="Enter issue title" required value="{{$issue->title}}">
                @if ($errors->has('title'))
                @foreach($errors->get('title') as $error)
                <span class="help-block">{{ $errors->first('title') }}</span>
                @endforeach 
                @endif
            </div>
            <div class="form-group @if ($errors->has('description')) has-error  @endif">
                <label class="control-label" for="description">Description</label>
                <textarea rows="16" name="description" type="text" class="form-control" id="description" aria-describedby="helpBlockDescription" placeholder="Enter issue description" required>{{$issue->description}}</textarea>                
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
                    @foreach($issue->project->get() as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="status_id">Status</label>
                <select name="status_id" class="form-control" id="status_id" aria-describedby="helpBlockStatus">
                    <option>{{$issue->status->title or 'not set'}}</option>
                    @foreach([] as $status)
                    <option value="{{$status->id}}">{{$status->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="severity_id">Priority</label>
                <select name="severity_id" class="form-control" id="severity_id" aria-describedby="helpBlockSeverity">
                    <option>{{$issue->severity->title or 'not set'}}</option>
                    @foreach([] as $severity)
                    <option value="{{$severity->id}}">{{$severity->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="responsible_id">Assign to</label>
                <select name="responsible_id" class="form-control" id="responsible_id" aria-describedby="helpBlockResponsible">
                    <option></option>
                    @foreach($issue->creator->get() as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="control-label" for="start_date">Start date</label>
                <input name="start_date" type="date" class="form-control" id="start_date" aria-describedby="helpBlockStartDate">
            </div>

            <div class="form-group">
                <label class="control-label" for="expected_time">Expected time</label>
                <input name="expected_time" type="number" class="form-control" id="expected_time" aria-describedby="helpBlockExpectedTime">
            </div>

        </div>
        <div class="col-md-12">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" class="btn btn-default" name="issue_save" value="Save issue" />
            <input type="submit" class="btn btn-default" name="issue_save_and_repeat" value="Save issue and add another" />
        </div>
        
    </form>
</div>

@endsection