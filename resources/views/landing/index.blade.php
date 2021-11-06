@extends('landing.app')

@section('content')
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
  <div class="home-center">
    <div class="home-desc-center">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-6">
            <div class="home-title">
              <h5 class="mb-3 text-white-50">Discover Adminto Today</h5>
              <h2 class="mb-4 text-white">Make your Site Amazing & Unique with Adminto</h2>
              <p class="text-white-50 home-desc font-16 mb-5">Adminto is a fully featured premium Landing template built on top of awesome Bootstrap 4.3.1, modern web technology HTML5, CSS3 and jQuery. </p>
              <div class="watch-video mt-5">
                <a href="#" class="btn btn-custom me-4">Get Started <i class="mdi mdi-chevron-right ms-1"></i></a>
                <a href="http://vimeo.com/99025203" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle me-2"></i> <span>Watch The Video</span></a>
              </div>

            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 col-sm-6">
            <div class="home-img mo-mt-20">
              <img src="images/home-img.png" alt="" class="img-fluid mx-auto d-block">
            </div>
          </div>
        </div>
        <!-- end row -->

      </div>
      <!-- end container-fluid -->
    </div>
  </div>
</section>
<!-- home end -->

<!-- features start -->
<section class="section" id="profil">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-pills nav-justified features-tab mb-5" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="pills-code-tab" data-bs-toggle="pill" href="#pills-code" role="tab" aria-controls="pills-code" aria-selected="true">
              <div class="clearfix">
                <div class="features-icon float-end">
                  <h1><i class="pe-7s-notebook tab-icon"></i></h1>
                </div>
                <div class="d-none d-lg-block me-4">
                  <h5 class="tab-title">Quality Code</h5>
                  <p>At vero eos et accusam et</p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="pills-customize-tab" data-bs-toggle="pill" href="#pills-customize" role="tab" aria-controls="pills-customize" aria-selected="false">
              <div class="clearfix">
                <div class="features-icon float-end">
                  <h1><i class="pe-7s-edit tab-icon"></i></h1>
                </div>
                <div class="d-none d-lg-block me-4">
                  <h5 class="tab-title">Easy to customize</h5>
                  <p>Sed ut unde iste error sit</p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-support-tab" data-bs-toggle="pill" href="#pills-support" role="tab" aria-controls="pills-support" aria-selected="false">
              <div class="features-icon float-end">
                <h1><i class="pe-7s-headphones tab-icon"></i></h1>
              </div>
              <div class="d-none d-lg-block me-4">
                <h5 class="tab-title">Awesome Support</h5>
                <p>It will be as simple as fact</p>
              </div>
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade" id="pills-code" role="tabpanel" aria-labelledby="pills-code-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="images/features-img/img-1.png" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <h1><i class="pe-7s-notebook text-primary"></i>
                      <h1>
                  </div>
                  <h5 class="mb-3">Quality Code</h5>
                  <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental. To an English person it will seem like simplified English as a skeptical Cambridge.</p>
                  <p class="text-muted">If several languages coalesce the grammar of the resulting language </p>
                  <div class="row pt-4">
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Nemo enim ipsam quia</p>
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Ut enim ad minima</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> At vero eos accusamus et </p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                  </div>
                </div>

              </div>

            </div>
            <!-- end row -->
          </div>
          <div class="tab-pane fades how active" id="pills-customize" role="tabpanel" aria-labelledby="pills-customize-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="images/features-img/img-2.png" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <h1><i class="pe-7s-edit text-primary"></i></h1>
                  </div>
                  <h5 class="mb-3">Easy to customize</h5>
                  <p class="text-muted">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et</p>
                  <p class="text-muted">If several languages coalesce the grammar of the resulting language </p>
                  <div class="row pt-4">
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Nemo enim ipsam quia</p>
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Ut enim ad minima</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> At vero eos accusamus et </p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                  </div>
                </div>

              </div>
            </div>
            <!-- end row -->
          </div>
          <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab">

            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="images/features-img/img-3.png" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <i class="pe-7s-headphones h1 text-primary"></i>
                  </div>
                  <h5 class="mb-3">Awesome Support</h5>
                  <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental. To an English person it will seem like simplified English as a skeptical Cambridge.</p>
                  <p class="text-muted">If several languages coalesce the grammar of the resulting language </p>
                  <div class="row pt-4">
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Nemo enim ipsam quia</p>
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> Ut enim ad minima</p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="text-muted">
                        <p><i class="mdi mdi-checkbox-marked-outline text-primary me-2 h6"></i> At vero eos accusamus et </p>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <a href="#" class="btn btn-custom">Learn More <i class="mdi mdi-arrow-right ms-1"></i></a>
                  </div>
                </div>

              </div>

            </div>
            <!-- end row -->
          </div>
        </div>
        <!-- end tab-content -->
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- end container-fluid -->
</section>
<!-- features end -->

<!-- services start -->
<section class="section bg-light" id="berita">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center">
          <h6 class="text-primary small-title">Berita Hari Ini</h6>
          <p class="text-muted">{{\Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y")}}</p>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-xl-4 col-sm-6">
        <div class="services-box p-4 bg-white mt-4">
          <div class="services-img float-start me-4">
            <img src="images/icons/layers.png" alt="">
          </div>
          <h5>Responsive Layouts</h5>
          <div class="overflow-hidden">
            <p class="text-muted">The new common language will be more simple and regular than the existing European languages.</p>
            <a href="#" class="text-custom">Read more...</a>
          </div>
        </div>
      </div>

    </div>
    <!-- end row -->
  </div>
  <!-- end container-fluid -->
</section>
<!-- services end -->

<!-- Demo start -->
<section class="section" id="lembaga">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center">
          <h6 class="text-primary small-title">Demos</h6>
          <h4>Available Demos</h4>
          <p class="text-muted">At solmen va esser far uniform grammatica.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-1.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Light Layouts</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-2.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Horizontal Layouts</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-3.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Semi Dark Layout</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-4.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Semi Dark Horizontal</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-5.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Landing Page</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="images/demo/demo-6.jpg" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">Dark Sidebar</h5>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-12">
        <div class="text-center mt-4">
          <button class="btn btn-custom">More Demos <i class="mdi mdi-chevron-right"></i></button>
        </div>
      </div>
    </div>
  </div>
  <!-- end container-fluid -->
</section>
<!-- Demo end -->

<!-- clients start -->
<section class="section bg-light" id="layanan">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center mb-4">
          <h6 class="text-primary small-title">Clients</h6>
          <h4>What our Users Says</h4>
          <p class="text-muted">At solmen va esser far uniform grammatica.</p>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-lg-4">
        <div class="testi-box p-4 bg-white mt-4 text-center">
          <p class="text-muted mb-4">" The designer of this theme delivered a quality product. I am not a front-end developer and I hate when the theme I download has glitches or needs minor tweaks here and there. This worked for my needs just out of the boxes. Also, it is fast and elegant."</p>
          <div class="testi-img mb-4">
            <img src="images/testi/img-1.png" alt="" class="rounded-circle img-thumbnail">
          </div>
          <p class="text-muted mb-1"> - Adminto User</p>
          <h5 class="font-18">Xpanta</h5>

          <div class="testi-icon">
            <i class="mdi mdi-format-quote-open display-2"></i>
          </div>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="testi-box p-4 bg-white mt-4 text-center">
          <p class="text-muted mb-4">" Extremely well designed and the documentation is very well done. Super happy with the purchase and definitely recommend this! "</p>
          <div class="testi-img mb-4">
            <img src="images/testi/img-2.png" alt="" class="rounded-circle img-thumbnail">
          </div>
          <p class="text-muted mb-1"> - Adminto User</p>
          <h5 class="font-18">G_Sam</h5>

          <div class="testi-icon">
            <i class="mdi mdi-format-quote-open display-2"></i>
          </div>

        </div>
      </div>
      <div class="col-lg-4">
        <div class="testi-box p-4 bg-white mt-4 text-center">
          <p class="text-muted mb-4">" We used this theme to save some design time but... wow it has everything you didn't realize you would need later. I highly recommend this template to get your web design headed in the right direction quickly. "</p>
          <div class="testi-img mb-4">
            <img src="images/testi/img-3.png" alt="" class="rounded-circle img-thumbnail">
          </div>
          <p class="text-muted mb-1"> - Adminto User</p>
          <h5 class="font-18">Isaacfab</h5>

          <div class="testi-icon">
            <i class="mdi mdi-format-quote-open display-2"></i>
          </div>

        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row mt-5 pt-5">
      <div class="col-lg-3 col-sm-6">
        <div class="client-images">
          <img src="images/clients/1.png" alt="logo-img" class="mx-auto img-fluid d-block">
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="client-images">
          <img src="images/clients/2.png" alt="logo-img" class="mx-auto img-fluid d-block">
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="client-images">
          <img src="images/clients/3.png" alt="logo-img" class="mx-auto img-fluid d-block">
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="client-images">
          <img src="images/clients/4.png" alt="logo-img" class="mx-auto img-fluid d-block">
        </div>
      </div>
    </div>
  </div>
  <!-- end container-fluid -->
</section>
<!-- clients end -->



@endsection