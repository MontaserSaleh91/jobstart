
    <div class="site-section">
            <div class="container">
              <div class="row justify-content-center text-center mb-5">
                <div class="col-md-6" data-aos="fade" >
                  <h2 class="text-black">Popular<strong> Categories</strong> </h2>
                </div>
              </div>
              <div class="row hosting">
                  @foreach($categories as $category)
                <div class="col-md-6 col-lg-4 mb-5 mb-lg-4" data-aos="fade" data-aos-delay="100">
                    <a href="{{route('category.index',[$category->id])}}">
                  <div class="unit-3 h-100 bg-white">
                    
                    <div class="d-flex align-items-center mb-3 unit-3-heading">
                      <div class="unit-3-icon-wrap mr-4">
                        <svg class="unit-3-svg" xmlns="http://www.w3.org/2000/svg" width="59px" height="68px">
                         
                          <path fill-rule="evenodd" stroke-width="2px" stroke-linecap="butt" stroke-linejoin="miter" fill="none" d="M29.000,66.000 L1.012,49.750 L1.012,17.250 L29.000,1.000 L56.988,17.250 L56.988,49.750 L29.000,66.000 Z"></path>
                        </svg>
                        @if ($category->name=='Technology')
                          <span class="unit-3-icon icon fl-bigmug-line-radio46"></span>
                        @elseif($category->name=='Engineering')
                           <span class="unit-3-icon icon fl-bigmug-line-portfolio23"></span>
                        @elseif($category->name=='Government')
                           <span class="unit-3-icon icon fl-bigmug-line-flag53"></span>
                        @elseif($category->name=='Medical')
                           <span class="unit-3-icon icon fl-bigmug-line-like51"></span>
                        @elseif($category->name=='Construction')
                           <span class="unit-3-icon icon fl-bigmug-line-wrench66"></span>
                        @elseif($category->name=='Software')
                           <span class="unit-3-icon icon fl-bigmug-line-cellphone55"></span>
                        @else
                           <span class="unit-3-icon icon fl-bigmug-line-user143"></span>
                        @endif
                        
                      </div>
                      <h2>{{$category->name}}</h2>
                      
                    </div>
                    <button type="button" class="btn btn-primary"  style=" width: 100%">
                        Number of jobs <h1><span class="badge badge-light">{{$category->jobs->count()}}</span></h1>
                      </button>
                  </div>
                  </a>
                </div>
                @endforeach
      
              </div>
            
            </div>
          </div>
      