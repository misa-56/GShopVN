<div
        id="slide"
        class="carousel slide m1-auto"
        data-ride="carousel"
        data-interval="3000"
      >
        <ul class="carousel-indicators">
          @foreach ($sliders as $slider)
          @php
          $slide_no = $slider->id;
          $slide_no = $slide_no + 1;
          @endphp
          <li data-target="#slide" data-slide-to="$slide_no" class=" 
          @if($slider->id == '1')
            active
          @endif"></li>
          
          @endforeach
        </ul>
        <div class="carousel-inner">
          
          
          @foreach ($sliders as $slider)
          <div class="carousel-item
          @if($slider->id == '1')
            active
          @endif
          ">
            <img
              class="rounded-right img-fluid"
              src="{{$slider->thumb}}"
              alt="{{$slider->name}}"
              width="1100"
              height="500"
            />
            <div class="carousel-caption">
              <a class="text-white" href="{{$slider->url}}">
                <h4>{{$slider->name}}</h4>
              </a>
            </div>
          </div>
          @endforeach

          
        </div>
        <a class="carousel-control-prev" href="#slide" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slide" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
</div>