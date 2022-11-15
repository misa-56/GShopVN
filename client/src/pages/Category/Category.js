import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import request from '../../utils/request';
import ProductList from './ProductList/ProductList';
import SideBar from './SideBar/SideBar';

const Category = () => {
    let { id } = useParams();
    const [category, setCategory] = useState([]);

    useEffect(() => {
        request
            .get(`/category/${id}`)
            .then((res) => {
                let category = res.data.products.data;
                setCategory(category);
            })
            .catch((error) => console.log(error));
    }, [id]);

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
                            {category.map((product) => {
                                return (
                                    <ProductList
                                        key={product.id}
                                        thumb={product.thumb}
                                        name={product.name}
                                        price_sale={product.price_sale}
                                        price={product.price}
                                        id={product.id}
                                    />
                                );
                            })}
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
};

export default Category;
