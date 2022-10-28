import './Footer.css';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import {
    faFacebook,
    faYoutube,
    faInstagram,
    faTelegram,
    faDiscord,
    faTiktok,
    faPaypal,
} from '@fortawesome/free-brands-svg-icons';
import {
    faCreditCard,
    faHandHoldingDollar,
    faMoneyCheckDollar,
    faUserFriends,
} from '@fortawesome/free-solid-svg-icons';
import images from '../../../assets/images';

function Footer() {
    return (
        <footer className="text-center text-white mt-auto">
            <div className="container p-4">
                {/* <!-- Section: Social media --> */}

                {/* <!-- Section: Links --> */}
                <section className="">
                    {/* <!--Grid row--> */}
                    <div className="row">
                        {/* <!--Grid column--> */}
                        <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 className="text-uppercase">Về chúng tôi</h5>

                            <p>
                                Với hơn 2 năm kinh nghiệm cung cấp hàng ngàn tài khoản Premium, chúng tôi tự tin đem lại
                                chất lượng dịch vụ tốt nhất cho sự trải nghiệm của khách hàng.
                            </p>
                        </div>
                        {/* <!--Grid column--> */}

                        {/* <!--Grid column--> */}
                        <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 className="text-uppercase">SẢN PHẨM</h5>

                            <ul className="list-unstyled mb-0">
                                <li>
                                    <a href="/danh-muc/1-giai-tri.html" className="text-white">
                                        Giải trí
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/2-lam-viec.html" className="text-white">
                                        Làm việc
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/3-hoc-tap.html" className="text-white">
                                        Học tập
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/4-tien-ich-van-phong.html" className="text-white">
                                        Tiện ích văn phòng
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/5-thiet-ke.htmll" className="text-white">
                                        Thiết kế
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/6-vpn.html" className="text-white">
                                        VPN
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-muc/7-goi-cuoc-data-4g.html" className="text-white">
                                        Gói cước - Data 4G
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {/* <!--Grid column--> */}

                        {/* <!--Grid column--> */}
                        <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <div className="pb-3">
                                <h5 className="text-uppercase">THÔNG TIN</h5>

                                <ul className="list-unstyled mb-0">
                                    <li>
                                        <a href="/5-support" className="text-white">
                                            Hướng dẫn thanh toán
                                        </a>
                                    </li>
                                    <li>
                                        <a href="business.html" className="text-white">
                                            Liên hệ hợp tác
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            {/* <!--Grid column--> */}

                            {/* <!--Grid column--> */}
                            <div>
                                <h5 className="text-uppercase">HỖ TRỢ</h5>

                                <ul className="list-unstyled mb-0">
                                    <li>
                                        Facebook:{' '}
                                        <a
                                            href="https://www.facebook.com/hoangttrieugiang"
                                            className="text-white"
                                            target="_blank"
                                            rel="noreferrer"
                                        >
                                            Hoàng Triều Giang
                                        </a>
                                    </li>
                                    <li>
                                        Zalo:{' '}
                                        <a
                                            href="https://zalo.me/0965324305"
                                            className="text-white"
                                            target="_blank"
                                            rel="noreferrer"
                                        >
                                            0965324305
                                        </a>
                                    </li>
                                    <li>
                                        Email:{' '}
                                        <a
                                            href="mailto:hoangttrieugiang27@gmail.com"
                                            className="text-white"
                                            target="_blank"
                                            rel="noreferrer"
                                        >
                                            hoangttrieugiang27@gmail.com
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {/* <!--Grid column--> */}
                        {/* <!--Grid column--> */}
                        <div className="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <div className="social-media pb-3">
                                <h5 className="text-uppercase">Kết nối với GShop</h5>

                                <a
                                    href="https://www.facebook.com/Gshop.taikhoanuytin.giare"
                                    target="_blank"
                                    rel="noreferrer"
                                >
                                    <FontAwesomeIcon icon={faFacebook} />
                                </a>
                                <a
                                    href="https://www.youtube.com/channel/UC27iGZNoiSoDaebE4NHyFDA"
                                    target="_blank"
                                    rel="noreferrer"
                                >
                                    <FontAwesomeIcon icon={faYoutube} />
                                </a>
                                <a
                                    href="https://www.instagram.com/gshop_tk.premium.uytin"
                                    target="_blank"
                                    rel="noreferrer"
                                >
                                    <FontAwesomeIcon icon={faInstagram} />
                                </a>
                                <a href="http://t.me/hoangtrieugiang" target="_blank" rel="noreferrer">
                                    <FontAwesomeIcon icon={faTelegram} />
                                </a>
                                <a href="https://discord.gg/BBG8DfJXxQ" target="_blank" rel="noreferrer">
                                    <FontAwesomeIcon icon={faDiscord} />
                                </a>
                                <a href="https://www.tiktok.com/@hoang_trieugiang" target="_blank" rel="noreferrer">
                                    <FontAwesomeIcon icon={faTiktok} />
                                </a>
                                <a href="https://zalo.me/3148986815994887636" target="_blank" rel="noreferrer">
                                    <img
                                        className="zalo"
                                        // style="height: 30px; width: 30px;"
                                        src={images.zalo}
                                        alt="zalo"
                                    />
                                </a>
                            </div>
                            <div>
                                <h5 className="text-uppercase">Group</h5>

                                <ul className="list-unstyled mb-0">
                                    <li>
                                        <FontAwesomeIcon icon={faUserFriends} />{' '}
                                        <a
                                            href="https://www.facebook.com/groups/hoangtrieugiangnf"
                                            className="text-white"
                                        >
                                            Facebook Group 1
                                        </a>
                                    </li>
                                    <li>
                                        <FontAwesomeIcon icon={faUserFriends} />{' '}
                                        <a
                                            href="https://www.facebook.com/groups/gshoptaikhoanuytin"
                                            className="text-white"
                                        >
                                            Facebook Group 2
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {/* <!--Grid row--> */}
                    </div>
                </section>
                {/* <!-- Section: Links --> */}
            </div>
            {/* <!-- Grid container --> */}
            <div className="container p-3">
                <b>Hình thức thanh toán:</b> Tiền mặt <FontAwesomeIcon icon={faHandHoldingDollar} /> | Chuyển khoản{' '}
                <FontAwesomeIcon icon={faMoneyCheckDollar} /> | Thẻ cào điện thoại{' '}
                <FontAwesomeIcon icon={faCreditCard} /> | Paypal <FontAwesomeIcon icon={faPaypal} />
            </div>
            {/* <!-- Copyright --> */}
            <div className="text-center p-3 cr">
                © 2022 Copyright:
                <a className="text-white" href="/">
                    {' '}
                    gshopvn.com
                </a>
            </div>
            {/* <!-- Copyright --> */}
        </footer>
    );
}

export default Footer;
