@extends('layouts.main')
@section('content')

@if ($categoryName->name=='Technology')
    <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Technology.jpg')}});"  data-stellar-background-ratio="0.5">
@elseif($categoryName->name=='Engineering')
    <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Engineering.jpg')}});"  data-stellar-background-ratio="0.5">
@elseif($categoryName->name=='Government')
    <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Government.jpg')}});"  data-stellar-background-ratio="0.5">
@elseif($categoryName->name=='Medical')
    <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Medical.jpg')}});"  data-stellar-background-ratio="0.5">
@elseif($categoryName->name=='Construction')
    <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Construction.jpg')}});"  data-stellar-background-ratio="0.5">
@elseif($categoryName->name=='Software')
      <div class="unit-5 overlay" style="background-image: url({{asset('external/images/Software.jpg')}});"  data-stellar-background-ratio="0.5">
@else
      <div class="unit-5 overlay" style="background-image: url({{asset('external/images/other.jpg')}});"  data-stellar-background-ratio="0.5">

@endif
  <div class="container text-center">
  <h2 class="mb-0">{{$categoryName->name}}</h2>
    <br><br><br><br>
  </div>
</div>

<div class="container">
    <div class="row">


    <div class="col-md-12">
      <br>
        <div class="rounded border jobs-wrap">
            @if(count($jobs)>0)
            @foreach($jobs as $job)

            <div class="row" data-aos="fade">
             <div class="col-md-12">
    
               <div class="job-post-item bg-white p-4 d-block d-md-flex align-items-center">
    
                  <div class="mb-4 mb-md-0 mr-5">
                   <div class="job-post-item-header d-flex align-items-center">
                     <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                     @if ($job->type=='Full Time')
                     <div class="badge-wrap">
                        <span class="bg-info text-white badge py-2 px-4">{{$job->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                       </div>
                      @elseif ($job->type=='Part Time')
                      <div class="badge-wrap">
                          <span class="bg-warning text-white badge py-2 px-4">{{$job->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                         </div>
                       @else
                         <div class="badge-wrap">
                             <span class="bg-danger text-white badge py-2 px-4">{{$job->type}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                     @endif
                     
                   </div>
                   <div class="job-post-item-body d-block d-md-flex">
                     <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">{{$job->company->cname}}</a></div>
                     <div><span class="fl-bigmug-line-big104"></span> <span>{{str_limit($job->address,30)}}&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
                     <span class="fl-bigmug-line-alarm31"aria-hidden="true" style="color:crimson">&nbsp;{{$job->created_at->diffForHumans()}}</span>
                   </div>
                  </div>
    
                  <div class="ml-auto">
                    {{-- <a href="#" class="btn btn-secondary rounded-circle btn-favorite text-gray-500"><span class="icon-heart"></span></a> --}}
                    <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-primary py-2">Apply Job</a>
                  </div>
               </div>
    
             </div>
            </div>
            
          @endforeach
            @else
           <h1 style="text-align: center">No jobs found</h1> 
            @endif


            </div>
        </div>
        <br>    
        <div class="row" style="padding-left: 30% ;margin-top: 10px" >
                <div class="col-md-12 text-center" >
                        <div class="site-block-27">
                                
                                        {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                
                        
                     
                
                       </div>
                </div>
         </div>

    </div>

</div>
<br>

@endsection

