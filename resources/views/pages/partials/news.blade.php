<div class="container">
  <div class="row no-gutters">
    <div class="col col-lg-6 pr-lg-1">
      <div id="carouselNews" class="carousel slide carousel-fade " data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
          @for($i = 0; $i < 4; $i++)
            <li data-target="#carouselNews" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
          @endfor
        </ol>
        
        <div class="carousel-inner">
          @for($i = 0; $i < 4; $i++)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
              <img class="d-block w-100" src="http://via.placeholder.com/800x400">

              <a href="#">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="text-center text-shadow">{{ $faker->sentence(rand(6, 12), true) }}</h5>
                  {{-- <p>...</p> --}}
                </div>
              </a>
            </div>
          @endfor
        </div>
      </div>
    </div>
    
    <div id="secondaryNews" class="d-none d-lg-block col-lg-6 pl-1">
      <div class="row no-gutters">
        @for($i = 0; $i < 4; $i++)
          <div class="col-lg-6">
            <div class="card box-shadow border-0 text-white mb-2 mr-2">
              <img class="card-img" src="http://via.placeholder.com/300x150">

              <div class="card-img-overlay d-flex p-0">
                <a href="#" class="align-self-end text-white bg-op-black px-2 w-100">
                  <h6 class="title">{{ str_limit($faker->sentence(rand(6, 12), false), 50) }}</h6>
                </a>
              </div>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</div>