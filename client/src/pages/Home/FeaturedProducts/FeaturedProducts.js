import React from 'react';
import { Link } from 'react-router-dom';
import request from '../../../utils/request';
import Slider from 'react-slick';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import './FeaturedProducts.css';
// import RemoveVietnamese from '../../../scripts/RemoveVietnamese/RemoveVietnamese';
import images from '../../../assets/images';

class FeaturedProducts extends React.Component {
    constructor(props) {
        super(props);
        this.state = { featureds: [] };
    }

    componentDidMount() {
        request
            .get('/categories')
            .then((res) => {
                const featureds = res.data.featureds;
                this.setState({ featureds });
            })
            .catch((error) => console.log(error));
    }

    render() {
        const settings = {
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            centerMode: true,
            autoplay: true,
            autoplaySpeed: 2000,

            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true,
                    },
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    },
                },
            ],
        };
        return (
            <div className="mx-auto my-3 my-lg-5">
                <div className="d-flex justify-content-between">
                    <h4>Sản phẩm nổi bật</h4>
                    <Link className="text-decoration-none text-info" to="san-pham">
                        Xem thêm
                    </Link>
                </div>
                {/* <!-- ------------------ --> */}
                <div className="main">
                    <Slider {...settings}>
                        {this.state.featureds.map((product) => (
                            <div className="border rounded text-center p-3 bg-white" key={product.id}>
                                <Link to={'/product/' + product.id}>
                                    <img
                                        className="w-100 rounded mb-3"
                                        src={images.urlImg + product.thumb}
                                        alt={product.name}
                                    />
                                </Link>

                                <h6>
                                    <Link className="text-decoration-none" to={'/product/' + product.id}>
                                        {product.name}
                                    </Link>
                                </h6>
                                <p className="text-danger">
                                    {(() => {
                                        if (product.price_sale != null) {
                                            return (
                                                <span>
                                                    {product.price_sale}
                                                    <sup>đ </sup>
                                                    <small className="text-muted">
                                                        <del>
                                                            {product.price}
                                                            <sup>đ</sup>
                                                        </del>
                                                    </small>
                                                </span>
                                            );
                                        } else {
                                            return (
                                                <span>
                                                    {product.price}
                                                    <sup>đ</sup>
                                                </span>
                                            );
                                        }
                                    })()}
                                </p>
                            </div>
                        ))}
                        {/* {{-- ------------------------- --}} */}
                    </Slider>
                </div>
                {/* <!-- ------------------- --> */}
            </div>
        );
    }
}

export default FeaturedProducts;
