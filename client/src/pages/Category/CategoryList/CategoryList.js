import React from 'react';
import { Link } from 'react-router-dom';
// import RemoveVietnamese from '../../../../scripts/RemoveVietnamese/RemoveVietnamese';
import images from '../../../assets/images';

function CategoryList(props) {
    return (
        <div className="col-6 col-md-6 col-lg-3 p-2" key={props.id}>
            <div className="border rounded text-center p-3 bg-white h-100">
                <Link
                    to={
                        // '/san-pham/' + RemoveVietnamese(props.name)
                        '/product/' + props.id
                    }
                >
                    <img className="w-100 rounded mb-3" src={images.urlImg + props.thumb} alt={props.name} />
                </Link>

                <h6>
                    <Link
                        className="text-decoration-none"
                        to="/san-pham/{props.name }-{{ Str::slug($props->name, '-') }}.html"
                    >
                        {props.name}
                    </Link>
                </h6>
                <p className="text-danger">
                    {(() => {
                        if (props.price_sale != null) {
                            return (
                                <span>
                                    {props.price_sale}
                                    <sup>đ </sup>
                                    <small className="text-muted">
                                        <del>
                                            {props.price}
                                            <sup>đ</sup>
                                        </del>
                                    </small>
                                </span>
                            );
                        } else {
                            return (
                                <span>
                                    {props.price}
                                    <sup>đ</sup>
                                </span>
                            );
                        }
                    })()}
                </p>
            </div>
            {/* {{-- ------------------------- --}} */}
        </div>
    );
}

export default CategoryList;
