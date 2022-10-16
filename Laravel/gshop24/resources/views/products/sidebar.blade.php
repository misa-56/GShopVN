<div class="col-md-4 order-md-1 col-lg-3 sidebar-filter my-3">
    
    <h6 class="text-uppercase font-weight-bold mb-3">Danh mục</h6>
    
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/san-pham">Tất cả sản phẩm</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->count()}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                <a class="text-decoration-none text-info" href="/danh-muc/1-giai-tri.html">Giải trí</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',1)->count()}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                <a class="text-decoration-none text-info" href="/danh-muc/2-lam-viec.html">Làm việc</a>
                <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',2)->count()}}</span>
              </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/danh-muc/3-hoc-tap.html">Học tập</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',3)->count()}}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/danh-muc/4-tien-ich.html">Tiện ích văn phòng</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',4)->count()}}</span>
            </li>
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/danh-muc/5-thiet-ke.html">Thiết kế</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',5)->count()}}</span>
            </li>
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/danh-muc/6-vpn.html">VPN</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',6)->count()}}</span>
            </li>
              <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <a class="text-decoration-none text-info" href="/danh-muc/7-goi-data.html">Gói cước - Data</a>
              <span class="badge badge-dark badge-pill">{{DB::table('products')->where('menu_id',7)->count()}}</span>
            </li>
            
          </ul>
      
    
  </div>