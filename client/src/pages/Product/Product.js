import React, { useEffect, useState } from 'react';
import { Link, useParams } from 'react-router-dom';
import request from '../../utils/request';
import images from '../../assets/images';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAngleRight, faShoppingCart } from '@fortawesome/free-solid-svg-icons';

const Product = () => {
    let { id } = useParams();
    const [products, setProducts] = useState([]);

    useEffect(() => {
        request
            .get(`/product/${id}`)
            .then((res) => {
                let products = res.data;
                setProducts(products);
                console.log(res);
            })
            .catch((error) => console.log(error));
    }, [id]);

    return (
        <section className="">
            {products.map((product) => {
                return (
                    <div className="container bg-white" key={product.id}>
                        <div className=" m-4">
                            <div className="row py-4">
                                <div className="col-md-6">
                                    <img
                                        className="w-100 h-auto rounded"
                                        alt={product.name}
                                        src={images.urlImg + product.thumb}
                                    />
                                </div>

                                <div className="col-md-6 col-lg-5">
                                    <div className="mb-2">
                                        <Link to="/" className="text-decoration-none text-dark">
                                            Trang Chủ <FontAwesomeIcon icon={faAngleRight} />
                                        </Link>

                                        <Link
                                            to="/danh-muc/product.menu.id-{{ Str::slug($product->menu->name) }}.html"
                                            className="text-decoration-none text-dark"
                                        >
                                            {/* {product.menu.name} */}
                                            <FontAwesomeIcon icon={faAngleRight} />
                                        </Link>
                                    </div>
                                    <div className="p-r-50 p-t-5 p-lr-0-lg">
                                        {/* @include('admin.alert') */}

                                        <h4 className="text-primary">{product.name}</h4>
                                        <div>
                                            {/* <span className=""> */}
                                            <i className="fas fa-store"></i>
                                            Tình trạng:
                                            {(() => {
                                                if (product.stock === '1') {
                                                    return <span className="text-success">Còn hàng</span>;
                                                } else {
                                                    return <span className="text-danger">Tạm hết hàng</span>;
                                                }
                                            })()}
                                        </div>
                                        {/* <!--  --> */}

                                        <h5 className="text-danger mt-1">
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
                                        </h5>

                                        <hr />

                                        <div className="p-t-33">
                                            <div className="flex-w flex-r-m p-b-10">
                                                <div className="d-flex">
                                                    <form action="/add-cart" method="post">
                                                        {/* @csrf */}
                                                        {/* @if ($product->price !== NULL) */}

                                                        {/* @if($product->term !== NULL) */}
                                                        {(() => {
                                                            if (product.term != null) {
                                                                return (
                                                                    <div data-toggle="">
                                                                        <p className="font-weight-bold">Thời hạn</p>

                                                                        {/* @foreach($collect as $coll) */}
                                                                        <a
                                                                            className="btn border-info
                                                                                        @if($coll->id == $product->id)
                                                                                        btn-info active
                                                                                        @endif
                                                                                        "
                                                                            href="/san-pham/{{ $coll->id }}-{{ Str::slug($coll->name, '-') }}.html"
                                                                        >
                                                                            {/* {{$coll->term}} */}
                                                                        </a>
                                                                        {/* @endforeach */}

                                                                        <hr />
                                                                    </div>
                                                                );
                                                            }
                                                        })()}

                                                        {/* @if($product->account_email == 1) */}
                                                        {(() => {
                                                            if (product.account_email === '1') {
                                                                return (
                                                                    <div>
                                                                        <p className="font-weight-bold">
                                                                            Nhập thông tin bổ sung &nbsp;
                                                                            <span className="text-danger">*</span>
                                                                        </p>
                                                                        <div className="form-group">
                                                                            <input
                                                                                className="form-control"
                                                                                type="text"
                                                                                placeholder="Email/user tài khoản"
                                                                                id="acc_email"
                                                                                name="acc_email"
                                                                                // value=""
                                                                                autoComplete="off"
                                                                                required
                                                                            />
                                                                        </div>

                                                                        {/* @if($product->account_password == 1) */}
                                                                        {(() => {
                                                                            if (product.account_password === '1') {
                                                                                return (
                                                                                    <div className="form-group">
                                                                                        <input
                                                                                            className="form-control"
                                                                                            type="text"
                                                                                            placeholder="Password tài khoản"
                                                                                            id="acc_password"
                                                                                            name="acc_password"
                                                                                            // value=""
                                                                                            autoComplete="off"
                                                                                            required
                                                                                        />
                                                                                    </div>
                                                                                );
                                                                            }
                                                                        })()}
                                                                        {/* @endif */}
                                                                        <hr />
                                                                    </div>
                                                                );
                                                            }
                                                        })()}

                                                        {/* @endif */}

                                                        <div className="d-flex mb-3">
                                                            <div className="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i className="fs-16 zmdi zmdi-minus"></i>
                                                            </div>

                                                            <input
                                                                className="mr-2 border border-info rounded d-none"
                                                                type="text"
                                                                // style="width: 50px;"
                                                                name="num_product"
                                                                // value="1"
                                                                min="1"
                                                            />

                                                            <div className="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                                <i className="fs-16 zmdi zmdi-plus"></i>
                                                            </div>
                                                            {(() => {
                                                                if (product.stock !== '1') {
                                                                    return (
                                                                        <button
                                                                            type="submit"
                                                                            className="btn btn-light border border-info "
                                                                            disabled
                                                                        >
                                                                            <FontAwesomeIcon icon={faShoppingCart} />{' '}
                                                                            Thêm vào Giỏ
                                                                        </button>
                                                                    );
                                                                } else {
                                                                    return (
                                                                        <button
                                                                            type="submit"
                                                                            className="btn btn-light border border-info "
                                                                        >
                                                                            <FontAwesomeIcon icon={faShoppingCart} />{' '}
                                                                            Thêm vào Giỏ
                                                                        </button>
                                                                    );
                                                                }
                                                            })()}
                                                        </div>

                                                        {/* <input type="hidden" name="product_id" value="{{ $product->id }}" /> */}
                                                        {/* @endif
                                    @csrf */}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        {/* <!--  --> */}
                                    </div>
                                </div>
                            </div>

                            <div className="bor10 m-t-50 p-t-43 p-b-40">
                                {/* <!-- Tab01 --> */}
                                <div className="tab01">
                                    {/* <!-- Nav tabs --> */}
                                    <ul className="nav nav-tabs" role="tablist">
                                        <li className="nav-item p-b-10">
                                            <a
                                                className="nav-link active"
                                                data-toggle="tab"
                                                href="#description"
                                                role="tab"
                                            >
                                                Mô Tả
                                            </a>
                                        </li>
                                    </ul>

                                    {/* <!-- Tab panes --> */}
                                    <div className="tab-content p-t-43">
                                        {/* <!-- - --> */}
                                        <div className="tab-pane fade show active" id="description" role="tabpanel">
                                            <div className="how-pos2 p-lr-15-md">
                                                <p
                                                    className="stext-102 cl6"
                                                    dangerouslySetInnerHTML={{ __html: product.content }}
                                                />
                                            </div>
                                        </div>

                                        {/* <!-- - --> */}
                                        <div className="tab-pane fade" id="reviews" role="tabpanel">
                                            <div className="row">
                                                <div className="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                                    <div className="p-b-30 m-lr-15-sm">
                                                        {/* <!-- Review --> */}
                                                        <div className="flex-w flex-t p-b-68">
                                                            <div className="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                                <img src="images/avatar-01.jpg" alt="AVATAR" />
                                                            </div>

                                                            <div className="size-207">
                                                                <div className="flex-w flex-sb-m p-b-17">
                                                                    <span className="mtext-107 cl2 p-r-20">
                                                                        Ariana Grande
                                                                    </span>

                                                                    <span className="fs-18 cl11">
                                                                        <i className="zmdi zmdi-star"></i>
                                                                        <i className="zmdi zmdi-star"></i>
                                                                        <i className="zmdi zmdi-star"></i>
                                                                        <i className="zmdi zmdi-star"></i>
                                                                        <i className="zmdi zmdi-star-half"></i>
                                                                    </span>
                                                                </div>

                                                                <p className="stext-102 cl6">
                                                                    Quod autem in homine praestantissimum atque optimum
                                                                    est, id deseruit. Apud ceteros autem philosophos
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <section className="sec-relate-product bg0 p-t-45 p-b-105">
                                <div className="container">
                                    <div className="p-b-45">
                                        <h4 className="text-dark">Sản phẩm liên quan</h4>
                                    </div>
                                    <div className="row">
                                        {/* @foreach($products as $key => $product)
                        @include('products.list')
                    @endforeach */}
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                );
            })}
        </section>
    );
};

export default Product;
