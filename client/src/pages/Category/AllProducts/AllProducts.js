import React, { Component } from 'react';
import request from '../../../utils/request';
import ProductList from '../ProductList/ProductList';
import SideBar from '../SideBar/SideBar';

class AllProducts extends Component {
    constructor(props) {
        super(props);
        this.state = { allProducts: [] };
    }

    componentDidMount() {
        request
            .get('/all-product')
            .then((res) => {
                const allProducts = res.data.data;
                this.setState({ allProducts });
            })
            .catch((err) => console.log(err));
    }

    render() {
        return (
            <div className="container">
                <div className="row">
                    <div className=" col-12 my-3 my-md-5">
                        <h2>Tất cả sản phẩm</h2>
                        <a href="/" className="text-secondary">
                            Trang chủ
                        </a>
                        <span> / Tất cả sản phẩm</span>
                    </div>
                    <div className="col-md-8 order-md-2 col-lg-9">
                        <div className="container-fluid">
                            {/* {{-- sort --}} */}
                            {/* @include('products.sort') */}
                            {/* {{-- middle --}} */}
                            <div className="row">
                                {/* @foreach($products as $key => $product) */}

                                {this.state.allProducts.map((product) => (
                                    <ProductList
                                        key={product.id}
                                        thumb={product.thumb}
                                        name={product.name}
                                        price_sale={product.price_sale}
                                        price={product.price}
                                        id={product.id}
                                    />
                                ))}
                                {/* @endforeach */}
                            </div>
                            {/* {{-- bottom --}} */}
                            {/* @include('products.bottom') */}
                        </div>
                    </div>
                    <SideBar />
                    {/* @include('products.sidebar') */}
                </div>
            </div>

            // @endsection
        );
    }
}

export default AllProducts;
