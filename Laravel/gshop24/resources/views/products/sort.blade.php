<div class="row ">
    <div class="col-12">
      <div class="dropdown text-md-left text-center float-md-right mb-3 mt-3 mt-md-0 mb-md-0">
        
        <a class="btn btn-light dropdown-toggle border" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mặc định <span class="caret"></span></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
          {{-- <a class="dropdown-item" href="{{ request()->url() }}">Mặc định</a> --}}
          <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}">Giá từ thấp đến cao</a>
          <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}">Giá từ cao đến thấp</a>
          
        </div>
      </div>
      {{-- <div class="btn-group float-md-right ml-3">
        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-left"></span> </button>
        <button type="button" class="btn btn-lg btn-light"> <span class="fa fa-arrow-right"></span> </button>
      </div>
      <div class="dropdown float-right">
        <label class="mr-2">View:</label>
        <a class="btn btn-lg btn-light dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">9 <span class="caret"></span></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
          <a class="dropdown-item" href="#">12</a>
          <a class="dropdown-item" href="#">24</a>
          <a class="dropdown-item" href="#">48</a>
          <a class="dropdown-item" href="#">96</a>
        </div>
      </div> --}}
    </div>
  </div>