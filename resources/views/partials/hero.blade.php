
    <div class="site-blocks-cover" style="background-image: url({{asset('external/images/job.jpeg')}});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row row-custom align-items-center">
            <div class="col-md-10">
              <h1 class="mb-2 text-black w-75" style="margin-top: -140px;"><span class="font-weight-bold">Largest Job</span> Site On The Net</h1>
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
                  <div class="tab-pane fade" id="pills-candidate" role="tabpanel" aria-labelledby="pills-candidate-tab">
                    <form action="#" method="post">
                      <div class="row">
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                          <input type="text" class="form-control" placeholder="eg. Carl Smith">
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                          <div class="select-wrap">
                            <span class="icon-keyboard_arrow_down arrow-down"></span>
                            <select name="" id="" class="form-control">
                              <option value="">Category</option>
                              <option value="fulltime">Full Time</option>
                              <option value="fulltime">Part Time</option>
                              <option value="freelance">Freelance</option>
                              <option value="internship">Internship</option>
                              <option value="internship">Termporary</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                          <input type="text" class="form-control form-control-block search-input" id="autocomplete" placeholder="Location" onFocus="geolocate()">
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
        </div>
      </div>  
      