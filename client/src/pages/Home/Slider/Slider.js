import React from 'react';
import { Link } from 'react-router-dom';
import request from '../../../utils/request';
import { Carousel } from 'react-bootstrap';
import images from '../../../assets/images';

class Slider extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            sliders: [],
        };
    }
    componentDidMount() {
        request
            .get('/sliders')
            .then((res) => {
                const sliders = res.data;
                this.setState({ sliders });
            })
            .catch((error) => console.log(error));
    }

    render() {
        // let { slider } = this.state;
        return (
            <div className="d-flex">
                <div className=" col-3 p-0 bg-white rounded-left d-none d-xl-block">
                    <div className="rounded-left listGroup">
                        <span className="list-group-title list-group-item text-white">
                            <b>Danh mục sản phẩm</b>
                        </span>
                        <ul
                            className="p-0 m-0"
                            // style="transform: rotate(-180deg);"
                        >
                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/1-giai-tri.html"
                                >
                                    Giải Trí
                                </Link>
                            </li>
                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/2-lam-viec.html"
                                >
                                    Làm Việc
                                </Link>
                            </li>

                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/3-hoc-tap.html"
                                >
                                    Học Tập
                                </Link>
                            </li>

                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/4-tien-ich-van-phong.html"
                                >
                                    Tiện Ích Văn Phòng
                                </Link>
                            </li>

                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/5-thiet-ke.html"
                                >
                                    Thiết Kế
                                </Link>
                            </li>

                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/6-vpn.html"
                                >
                                    VPN
                                </Link>
                            </li>

                            <li className="text-decoration-none list-unstyled">
                                <Link
                                    className="list-group-item list-group-item-action border-0"
                                    to="/danh-muc/7-goi-cuoc-data-4g.html"
                                >
                                    Gói cước - Data 4G
                                </Link>
                            </li>

                            {/* {!! \App\Helpers\Helper::menus($menus) !!} */}
                        </ul>
                    </div>
                </div>
                <div>
                    <Carousel>
                        {
                            // let { sliders } = ;
                            this.state.sliders.map((slider) => (
                                <Carousel.Item key={slider.id} interval={3000}>
                                    <img
                                        className="d-block w-100"
                                        src={images.urlImg + slider.thumb}
                                        alt={slider.name}
                                    />
                                    <Carousel.Caption>
                                        <h3>
                                            <Link to={'/san-pham'} className="text-white">
                                                {slider.name}
                                            </Link>
                                        </h3>
                                    </Carousel.Caption>
                                </Carousel.Item>
                            ))
                        }
                    </Carousel>
                    {/* <ul>
                        {this.state.sliders.map((slider) => (
                            <li>{slider.name}</li>
                        ))}
                    </ul> */}
                </div>

                {/* @include('slider') */}
            </div>
        );
    }
}

export default Slider;
