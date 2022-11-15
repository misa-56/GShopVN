import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import images from '../../assets/images';
import InformationForm from './InformationForm';

function Cart() {
    const [carts, setCarts] = useState(JSON.parse(localStorage.getItem('cart')));
    const handleDelete = (id) => {
        let newCarts = carts.filter((product) => product.id !== id);
        setCarts(newCarts);
        localStorage.setItem('cart', JSON.stringify(newCarts) || []);
    };

    let total = 0;
    return carts.length > 0 ? (
        <div>
            <div className="">
                <div className="row shadow">
                    <div className="col-md-8 bg-white  rounded-left p-3">
                        <div className="title">
                            <div className="row">
                                <div className="col">
                                    <h4>
                                        <b>Giỏ Hàng</b>
                                    </h4>
                                </div>
                                <div className="col align-self-center text-right text-muted">{carts.length} items</div>
                            </div>
                        </div>
                        {/* @php $total = 0; @endphp

                                @foreach($products as $key => $product)
                                    @php
                                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        $priceEnd = (int)$price * (int)$carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp */}

                        {carts.map((product) => {
                            let price = product.price_sale !== 0 ? product.price_sale : product.price;
                            total += price;

                            return (
                                <div key={product.id} className="row m-0 border-top">
                                    <div className="row m-0  align-items-center py-3 w-100">
                                        <div className="col-md-2 col-4 px-1">
                                            <img
                                                className="img-fluid"
                                                style={{ width: '8rem' }}
                                                alt={product.name}
                                                src={images.urlImg + product.thumb}
                                            />
                                        </div>
                                        <div className="col-md col-8 px-1">
                                            <div className="row m-0 ">{product.product_code}</div>
                                            <div className="row m-0">
                                                <p className="font-weight-bold">{product.name}</p>
                                            </div>

                                            {/* @foreach(session('account') as $product_id => $details)
                                                @if($details['id'] == $product->id)
                                                    @if($details['account_email'] !== "")
                                                        <small>Email/User: {{$details['account_email']}}</small>
                                                        @if($details['account_password'] !== "")
                                                        <small><br>Password: {{$details['account_password']}}</small>
                                                        @endif
                                                    @endif
                                                
                                                @endif
                                                @endforeach */}
                                        </div>
                                        <div className="col-md col-12 px-1 my-2 mx-3">
                                            {/* <div className="handle-counter" id="handleCounter">
                                                <input
                                                    className="font-weight-bold"
                                                    type="number"
                                                    min="1"
                                                    name="num_product[{{ $product->id }}]"
                                                    // value="{{ $carts[$product->id] }}"
                                                />
                                            </div> */}
                                        </div>
                                        <div className="col px-1 text-danger my-2 mx-3">
                                            <sup>₫</sup>
                                            {price}
                                            <span
                                                className="close text-decoration-none text-dark"
                                                onClick={() => handleDelete(product.id)}
                                                style={{ cursor: 'pointer' }}
                                            >
                                                &#10005;
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                        {/* @endforeach */}

                        <div className="d-flex justify-content-between border-top pt-4">
                            <div className="back-to-shop mt-4">
                                <Link className="text-decoration-none text-secondary" to="/san-pham">
                                    &larr;Trở lại shop
                                </Link>
                            </div>

                            {/* @csrf */}
                        </div>
                    </div>

                    <InformationForm total={total} />
                </div>
            </div>
        </div>
    ) : (
        <div className="text-center m-5 pb-5">
            <h6 className="p-3">Không có sản phẩm nào trong giỏ hàng</h6>
            <Link className="" to="/san-pham">
                <button className="btn btn-info " type="button">
                    TỚI CỬA HÀNG
                </button>
            </Link>
        </div>
    );
}

export default Cart;
