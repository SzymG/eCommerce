import React from 'react';
import '../../styles/cart/style.css';
import CartItem from "./CartItemComponent";


function Cart(props) {
    const cartItems = JSON.parse(localStorage.getItem('cart'));

    function buy() {
        console.log("BUYED")
    }

    function sumPrices() {
        let price = 0;

        cartItems.forEach((item) => {
            price += item.price;
        });

        return price;
    }

    return <div className={'cart-container col-12'}>
        <div className="row">
            {cartItems ? cartItems.map((item) => {
                return <CartItem item={item} key={item.id}/>
            }) : ''}
            <div className="col-12 my-4 price-container">SUMA: {sumPrices()}</div>
            <div className="col-12" onClick={buy}>
                <button type="button" className="btn btn-primary btn-block btn-lg">ZAKOŃCZ ZAKUPY</button>
            </div>
        </div>
    </div>;
}

export default Cart;
