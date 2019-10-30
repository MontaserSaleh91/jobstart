@extends('layouts.main')
@section('content')

<div class="unit-5 overlay" style="background-image: url({{asset('external/images/hero_bg_2.jpg')}});"  data-stellar-background-ratio="0.5">
    <div class="container text-center">
      <h2 class="mb-0"></h2>
      <br><br><br><br>
      <div class="job-search">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <span class="nav-link active py-3" id="pills-job-tab" data-toggle="pill" href="#pills-job" role="tab" aria-controls="pills-job" aria-selected="true">Find A Job</span>
              </li>
            
            </ul>
      <div class="tab-content bg-white p-4 rounded" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-job" role="tabpanel" aria-labelledby="pills-job-tab">
              <form action="{{route('alljobs')}}" method="GET">
                <div class="row">
                  <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <input type="text" name="position" class="form-control" placeholder="eg. Web Developer">
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <div class="select-wrap">
                      <span class="icon-keyboard_arrow_down arrow-down"></span>
                      <select name="category_id" class="form-control">
                            <option value="">-Category-</option>
            
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                    </div>
                  </div>
                  
                  <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <input type="text" class="form-control form-control-block search-input" name="address" id="autocomplete" placeholder="Location" onFocus="geolocate()">
                  </div>
                  <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                    <input type="submit" class="btn btn-primary btn-block" value="Search">
                  </div>
                </div>
              </form>
            </div>
        </div>
            
          </div>
    </div>
  </div>
<br>
<div class="container">
    <div class="row">


    <div class="col-md-12">
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
            <br>  
            <div class="row" style="padding-left: 30%" >
                    <div class="col-md-12 text-center" >
                            <div class="site-block-27">
                                    
                                            {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
                    
                            
                         
                    
                           </div>
                    </div>
             </div>
        </div>
 
           
<br>
    </div>

</div>




@endsection

{{-- <style>
    .site-block-27 ul li a, .site-block-27 ul li span {
    text-align: center;
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    border: 1px solid #ccc;
}
</style> --}}