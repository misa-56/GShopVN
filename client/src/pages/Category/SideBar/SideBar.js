import { Link } from 'react-router-dom';

function SideBar() {
    return (
        <div className="col-md-4 order-md-1 col-lg-3 sidebar-filter my-3">
            <h6 className="text-uppercase font-weight-bold mb-3">Danh mục</h6>

            <ul className="list-group list-group-flush">
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/san-pham">
                        Tất cả sản phẩm
                    </Link>
                    <span className="badge badge-dark badge-pill">{/* {{DB::table('products')->count()}} */}</span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/1-giai-tri.html">
                        Giải trí
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',1)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/2-lam-viec.html">
                        Làm việc
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',2)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/3-hoc-tap.html">
                        Học tập
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',3)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/4-tien-ich.html">
                        Tiện ích văn phòng
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',4)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/5-thiet-ke.html">
                        Thiết kế
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',5)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/6-vpn.html">
                        VPN
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',6)->count()}} */}
                    </span>
                </li>
                <li className="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                    <Link className="text-decoration-none text-info" to="/danh-muc/7-goi-data.html">
                        Gói cước - Data
                    </Link>
                    <span className="badge badge-dark badge-pill">
                        {/* {{DB::table('products')->where('menu_id',7)->count()}} */}
                    </span>
                </li>
            </ul>
        </div>
    );
}

export default SideBar;
