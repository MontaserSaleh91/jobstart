<!DOCTYPE html>
<html lang="en">

 @include('partials.head')

  <body>
  
  @include('partials.nav')

  @include('partials.hero')

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-start text-left mb-5">
          <div class="col-md-9" data-aos="fade">
            <h2 class="font-weight-bold text-black">Recent Jobs</h2>
          </div>

          @if(Auth::check()&&Auth::user()->user_type=='employer')
          <div class="col-md-3" data-aos="fade" data-aos-delay="200">
            <a href="{{route('job.create')}}" class="btn btn-primary py-3 btn-block"><span class="h5">+</span> Post a Job</a>
          </div>
          @endif
        </div>

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
      
      <div class="col-md-12 text-center mt-5">
          <a href="{{route('alljobs')}}" class="btn btn-primary rounded py-3 px-5"><span class="icon-plus-circle"></span> Show More Jobs</a>
        </div>


      </div>
    </div>    


    

    
@include('partials.category')
@include('partials.testimonial')

    

   @include('partials.blog')
  
  @include('partials.footer')

  </body>
</html>