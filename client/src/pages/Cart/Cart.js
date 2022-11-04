import { Component } from 'react';
import { Link } from 'react-router-dom';

class Cart extends Component {
    constructor(props) {
        super(props);
    }
    state = {};
    render() {
        return (
            <div class="container my-md-5 ">
                <div class="text-center m-5 pb-5">
                    <h6 class="p-3">Không có sản phẩm nào trong giỏ hàng</h6>
                    <Link class="" to="/san-pham">
                        <button class="btn btn-info " type="button">
                            TỚI CỬA HÀNG
                        </button>
                    </Link>
                </div>
            </div>
        );
    }
}

export default Cart;
