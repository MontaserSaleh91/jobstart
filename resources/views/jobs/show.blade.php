@extends('layouts.main')
@section('content')
<div class="unit-5 overlay" style="background-image: url({{asset('external/images/hero.jpg')}});"  data-stellar-background-ratio="0.5">
    <div class="container text-center">
      <h2 class="mb-0">{{$job->title}}</h2>
      <br><br><br><br>
    </div>
  </div>

  
  

  <div class="site-section bg-light" >
    <div class="container">
            @if(Session::has('message'))

            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
              @if(Session::has('err_message'))
      
            <div class="alert alert-danger">{{Session::get('err_message')}}</div>
            @endif
            @if(isset($errors)&&count($errors)>0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </ul>
            </div>
      
            @endif
      <div class="row"  id="app">
     
        <div class="col-md-12 col-lg-8 mb-5">
        
          
        
          <div class="p-5 bg-white">

            <div class="mb-4 mb-md-5 mr-5">
                    <div> <span class="fl-bigmug-line-weekly15"aria-hidden="true" style="color:crimson">&nbsp;{{date('F d, Y', strtotime($job->created_at))}}</span></div>
<br>
             <div class="job-post-item-header d-flex align-items-center">
             <h2 class="mr-3 text-black h4">{{$job->position}}</h2>&nbsp;&nbsp;&nbsp;
             @if ($job->type=='Full Time')
             <div class="badge-wrap">
                    <span class="bg-info text-white badge py-2 px-4">{{$job->type}}</span>
                   </div>
             @elseif($job->type=='Part Time')
             <div class="badge-wrap">
                    <span class="bg-warning text-white badge py-2 px-4">{{$job->type}}</span>
                   </div>
             @else
             <div class="badge-wrap">
                    <span class="bg-danger text-white badge py-2 px-4">{{$job->type}}</span>
                   </div>
             @endif
             <br><br><br><br>
               
             </div>
             <div class="job-post-item-body d-block d-md-flex">
               <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="{{route('company.index',[$job->company->id,$job->company->slug])}}">{{$job->company->cname}}</a></div>
            </div>
               <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>
     
             
            </div>
            <div><h3>Description</h3><p>{{$job->description}}</p></div><br>
            <div><h3>Roles and Responsibilities</h3><p>{{$job->roles}}</p></div>
        
            
            <p>
<br>
            @if(Auth::check()&&Auth::user()->user_type=='seeker')
           

            @if(!$job->checkApplication())
            
            <apply-component :jobid={{$job->id}}></apply-component>
            @else
            <center><span style="color: green;">You applied this job</span></center>
            @endif
<br>
            <favorite-component :jobid={{$job->id}} :favorited={{$job->checkSaved()?'true':'false'}}  ></favorite-component>
            
            @elseif(Auth::check()&&Auth::user()->user_type=='employer')
            
            
            <button type="button" class="btn btn-secondary btn-lg" disabled>
              <center>
                <span style="color: red;">Please login as a seeker to apply this job</span>
              </center>
            </button>
            
            @else
            
            
            <button type="button" class="btn btn-secondary btn-lg" disabled>
              <center>
                <span style="color: red;">Please login to apply this job</span>
              </center>
            </button>
            @endif
            
         </p>
          </div>
          <br>
          @if(count($jobRecommendations)>0)
          <h3 style="text-align: center">Jobs may interest you</h3>
          @foreach($jobRecommendations as $jobRecommendation)

          <div class="row" data-aos="fade">
           <div class="col-md-12">
  
             <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
  
                <div class="mb-4 mb-md-0 mr-5">
                 <div class="job-post-item-header d-flex align-items-center">
                   <h2 class="mr-3 text-black h4">{{$jobRecommendation->position}}</h2>
                   @if ($jobRecommendation->type=='Full Time')
                   <div class="badge-wrap">
                      <span class="bg-info text-white badge py-2 px-4">{{$jobRecommendation->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                     </div>
                    @elseif ($jobRecommendation->type=='Part Time')
                    <div class="badge-wrap">
                        <span class="bg-warning text-white badge py-2 px-4">{{$jobRecommendation->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                       </div>
                     @else
                       <div class="badge-wrap">
                           <span class="bg-danger text-white badge py-2 px-4">{{$jobRecommendation->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                          </div>
                   @endif
                   
                 </div>
                 <div class="job-post-item-body d-block d-md-flex">
                   <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$jobRecommendation->company->cname}}</a></div>
                   <div><span class="fl-bigmug-line-big104"></span> <span>{{str_limit($jobRecommendation->address,30)}}&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                   <span class="fl-bigmug-line-alarm31"aria-hidden="true" style="color:crimson">&nbsp;{{$jobRecommendation->created_at->diffForHumans()}}</span>
                 </div>
                </div>
  
                <div class="ml-auto">
                  {{-- <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a> --}}
                  <a href="{{route('jobs.show',[$jobRecommendation->id,$jobRecommendation->slug])}}" class="btn btn-primary py-2">Apply Job</a>
                </div>
             </div>
  
           </div>
          </div>
          
        @endforeach
        @endif
        </div>



        <div class="col-lg-4">
          
          
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">Company Info</h3>
            <p>Company name:&nbsp;&nbsp;{{$job->company->cname}}</p>
                <p>Address:&nbsp;&nbsp;<span class="fl-bigmug-line-big104"></span>&nbsp;{{$job->company->address}}</p>
                <p>Phone:&nbsp;&nbsp;<span class="fl-bigmug-line-phone351"></span>&nbsp;{{$job->company->phone}}</p>
                <p>Website:&nbsp;&nbsp;<a href="http://{{$job->company->website}}"><span class="fl-bigmug-line-planetary2"></span>&nbsp;{{$job->company->website}}</a></p>
            <p><a href="{{route('company.index',[$job->company->id,$job->company->slug])}}" class="btn btn-warning  py-2 px-4">Visit Company Page</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

