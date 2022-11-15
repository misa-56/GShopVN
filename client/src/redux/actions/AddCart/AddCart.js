export const ADD_CART = 'ADD_CART';

export function AddCart(payload) {
    return {
        type: 'ADD_CART',
        payload,
    };
}
