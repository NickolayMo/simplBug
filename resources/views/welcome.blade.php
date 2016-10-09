@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

                     <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-star fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$newIssuesCount}}</div>
                                        <div>New issues</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('issues.index', 'status_id[]=0')}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-code fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$inProgressIssuesCount->aggregate}}</div>
                                        <div>In progress</div>
                                    </div>
                                </div>
                            </div>
                             <a href="{{route('issues.index', 'status_id[]='. $inProgressIssuesCount->id)}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-recycle fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$testIssuesCount->aggregate}}</div>
                                        <div>Test</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('issues.index', 'status_id[]='. $testIssuesCount->id)}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-rocket fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$releaseIssuesCount->aggregate}}</div>
                                        <div>Relise</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('issues.index', 'status_id[]='. $releaseIssuesCount->id)}}">
                                <div class="panel-footer">
                                    <span class="pull-left">View</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                       <div class="panel panel-primary">
                            <div class="panel-heading">Last 10 updated issues</div>
                            <div class="panel-body">
                                @foreach ($issues as $issue)        
                                <div class="panel panel-default">
                                        <div class="panel-body issue-title-row">
                                            <div class="col-md-2">
                                                <a href="{{route('issues.edit',  $issue->id)}}">
                                                <span>
                                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    {{$issue->id}}
                                                </span>   
                                                </a>                 
                                            </div>
                                            <div class="col-md-8">
                                                <strong>
                                                {{ $issue->title }}
                                                </strong> 
                                            </div>
                                            
                                            <div class="col-md-2">
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="panel panel-primary">
                            <div class="panel-heading">Last 10 comments</div>
                            <div class="panel-body">
                              @foreach ($comments as $comment) 
                              <div class="panel panel-default">
                                    <div class="panel-body issue-title-row">
                                            <div class="col-md-2">
                                                <a href="{{route('issues.edit',  $issue->id)}}">
                                                <span>
                                                    <i class="fa fa-hashtag" aria-hidden="true"></i>
                                                    {{$comment->issue->id}}
                                                </span>   
                                                </a>                 
                                            </div>
                                            <div class="col-md-10">
                                                <strong>
                                                {{ $comment->issue->title }}
                                                </strong> 
                                            </div> 

                                        </div> 
                                    <div class="panel-body">
                                    {{$comment->text}}
                                    <br/>
                                     <small>
                                          Added by <strong>{{ $comment->user->name or 'not set'}}</strong>                     
                                                    at {{ $comment->created_at }}.
                                     </small>
                                    </div>
                              </div>
                              @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
                
</div>
@endsection
