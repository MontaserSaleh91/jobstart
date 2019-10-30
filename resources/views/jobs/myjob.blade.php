@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your jobs</div>

                <div class="card-body">
                    

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
                                <a href="{{route('jobs.show',[$job->id,$job->slug])}}" class="btn btn-primary py-2">Show Job</a>
                                <a href="{{route('job.edit',[$job->id])}}" class="btn btn-dark py-2">Edit Job</a>
                              </div>
                           </div>
                
                         </div>
                        </div>
                        
                      @endforeach

   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
