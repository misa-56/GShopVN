import './Header.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCartPlus, faSearch } from '@fortawesome/free-solid-svg-icons';
import images from '../../../assets/images';
import { NavDropdown, Nav, Navbar, Container } from 'react-bootstrap';
import './Login/index';
import Login from './Login/index';
import { Link } from 'react-router-dom';
// import { LinkContainer } from 'react-router-bootstrap';

function Header() {
    return (
        <header>
            {/* headerTop */}
            <div className="d-none d-md-block">
                <nav className="container d-none d-md-flex justify-content-between align-items-center">
                    <div className="text-white rounded bg-info px-2 ">
                        <span>
                            Hỗ trợ nhanh nhất tại Zalo:{' '}
                            <a
                                className="text-white"
                                href="https://zalo.me/0965324305"
                                target="_blank"
                                rel="noreferrer"
                            >
                                0965324305
                            </a>
                        </span>
                    </div>
                    {/* LOGIN */}
                    <Login />
                    {/* LOGIN */}
                </nav>
            </div>

            {/* header Mid */}

            <div className="bg-white">
                <nav className="headerTop container navbar d-md-flex justify-content-between align-items-center ">
                    <div className="logo mx-auto mx-md-0 d-flex justify-content-center d-md-block">
                        <Link to="/" className="text-decoration-none">
                            <div className="d-flex">
                                <div className="pt-2">
                                    <img
                                        className="rounded"
                                        src={images.logo}
                                        alt="GShop"
                                        width="100px"
                                        height="100px"
                                    />
                                </div>
                                <div className="">
                                    <div
                                        className="navbar-brand text-dark w-100 m-0 py-0 gshop"
                                        style={{ fontSize: '50px' }}
                                    >
                                        GShop
                                    </div>
                                    <div
                                        className="navbar-brand text-dark d-block text-center py-0 m-0 w-100 premium"
                                        style={{ fontSize: '17px' }}
                                    >
                                        Tài khoản Premium
                                    </div>
                                </div>
                            </div>
                        </Link>
                    </div>

                    <div className="search-bar text-center mt-4 w-100 w-md-50">
                        {/* {{-- -----------------------SEARCH BAR--------------------- --}} */}
                        <div className="bg-light border border-info rounded p-1">
                            <form
                                className="input-group bg-light"
                                role="search"
                                method="get"
                                action="{{ URL::to('search') }}"
                            >
                                <input
                                    className="form-control border-0 mr-1 bg-light"
                                    type="text"
                                    // value=""
                                    name="key"
                                    placeholder="Tìm sản phẩm..."
                                />
                                <button className="btn btn-info" type="submit">
                                    <FontAwesomeIcon icon={faSearch} />
                                </button>
                            </form>
                        </div>
                        <div className="pt-1">
                            <span className="slogan text-dark" style={{ fontSize: '21px' }}>
                                <b>An toàn - Chất lượng - Uy tín</b>
                            </span>
                        </div>
                        {/* {{-- -----------------------SEARCH BAR--------------------- --}} */}
                    </div>

                    <div className="rounded mb-2">
                        <div className="d-none d-md-block">
                            {/* {{-- -----------------------CARTS--------------------- --}} */}
                            <Link to="/carts">
                                <button className="btn btn-light border-dark mb-2 p-2">
                                    <b className="d-none d-lg-inline">Giỏ Hàng </b>
                                    <FontAwesomeIcon className="cart" icon={faCartPlus} />
                                    <span className="badge badge-info" id="lblCartCount">
                                        {' '}
                                        0{/* {{ $productQuantity }}{' '} */}
                                    </span>
                                </button>
                            </Link>
                            {/* {{-- -----------------------CARTS--------------------- --}} */}
                        </div>
                    </div>
                </nav>
            </div>
            {/* headerBot */}
            <Navbar expand="md" className="headerBot p-0" variant="dark">
                <Container>
                    <Navbar.Toggle aria-controls="basic-navbar-nav" className="border-0 text-white" />
                    <div className="d-flex justify-content-end align-items-center">
                        <div className="d-block d-md-none">
                            {/* {{-- -----------------------CARTS--------------------- --}} */}
                            <Link to="/carts">
                                <button className="btn text-light">
                                    <b className="d-none d-lg-inline">Giỏ Hàng</b>
                                    <FontAwesomeIcon className="cart" icon={faCartPlus} />
                                    <span className="bg-info badge badge-warning" id="lblCartCount">
                                        0{/* {{ $productQuantity }} */}
                                    </span>
                                </button>
                            </Link>
                            {/* {{-- -----------------------CARTS--------------------- --}} */}
                        </div>

                        <div className="d-block d-md-none">
                            {/* {{-- ------------------ACCOUNT--------------------------- --}}
                    @if (Auth::check())
                        <a className="btn text-white" href="{{ url('profile') }}">
                            <i className="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
                            <span className="d-none d-md-inline"> Chào {{ Auth::user()->name }}</span>
                        </a>
                    @else */}
                            <Login />
                            {/* @endif */}
                            {/* {{-- ------------------ACCOUNT--------------------------- --}} */}
                        </div>
                    </div>
                    <Navbar.Collapse className="collapse navbar-collapse" id="basic-navbar-nav">
                        <Nav className="me-auto">
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/">
                                Trang chủ
                            </Nav.Link>
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/1-about">
                                Giới thiệu
                            </Nav.Link>

                            <NavDropdown
                                title={<span className="text-white">Sản phẩm</span>}
                                className="text-white px-3 nav-links"
                            >
                                <NavDropdown.Item as={Link} to="/danh-muc/1-giai-tri.html">
                                    Giải trí
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/2-lam-viec.html">
                                    Làm việc
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/3-hoc-tap.html">
                                    Học tập
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/4-tien-ich-van-phong.html">
                                    Tiện ích văn phòng
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/5-thiet-ke.htmll">
                                    Thiết kế
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/6-vpn.html">
                                    VPN
                                </NavDropdown.Item>
                                <NavDropdown.Item as={Link} to="/danh-muc/7-goi-cuoc-data-4g.html">
                                    Gói cước - Data 4G
                                </NavDropdown.Item>
                            </NavDropdown>
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/2-notification">
                                Thông báo
                            </Nav.Link>
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/3-review">
                                Review
                            </Nav.Link>
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/4-feedback">
                                Feedback
                            </Nav.Link>
                            <Nav.Link as={Link} className="text-white px-3 nav-links" to="/5-support">
                                Hướng dẫn mua hàng
                            </Nav.Link>
                        </Nav>
                    </Navbar.Collapse>
                </Container>
            </Navbar>
        </header>
    );
}

export default Header;
