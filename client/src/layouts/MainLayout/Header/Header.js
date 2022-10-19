import './Header.css';

function Header() {
    return (
        <header>
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

                    <a className="btn text-white" href="" data-toggle="modal" data-target="#modalLoginForm">
                        <i className="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
                        <span className="d-none d-md-inline"> Đăng nhập | Đăng ký</span>
                    </a>
                </nav>
            </div>
        </header>
    );
}

export default Header;
