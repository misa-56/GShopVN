import React, { Component } from 'react';
import swal from 'sweetalert';

export const CartContext = React.createContext();

export class CartProvider extends Component {
    constructor(props) {
        super(props);
        this.state = { cartCount: [], carts: [JSON.parse(localStorage.getItem('cart'))] };
        this.handleAddProduct = this.handleAddProduct.bind(this);
        this.handleDelete = this.handleDelete.bind(this);
    }

    // cartCount() {
    //     const cartCount = JSON.parse(localStorage.getItem('cart')).length;
    //     console.log(cartCount);
    // }

    handleAddProduct(product) {
        console.log(JSON.parse(localStorage.getItem('cart')).length);
        let cart = localStorage.getItem('cart');
        if (cart) {
            let arr = JSON.parse(cart);
            arr.push(product);
            localStorage.setItem('cart', JSON.stringify(arr));
        } else {
            localStorage.setItem('cart', JSON.stringify([product]));
        }

        swal({
            title: 'Thêm sản phẩm thành công!',
            text: 'Hãy kiểm tra giỏ hàng!',
            icon: 'success',
        });

        this.setState({
            cartCount: this.state.cartCount.concat(JSON.parse(localStorage.getItem('cart'))),
        });
    }

    handleDelete(id) {
        let newCarts = this.state.carts.filter((product) => product.id !== id);
        this.setState(newCarts);
        localStorage.setItem('cart', JSON.stringify(newCarts) || []);
    }

    render() {
        return (
            <CartContext.Provider
                value={{
                    cartCount: this.state.cartCount,
                    handleAddProduct: this.handleAddProduct,
                    handleDelete: this.handleDelete,
                }}
            >
                {this.props.children}
            </CartContext.Provider>
        );
    }
}
