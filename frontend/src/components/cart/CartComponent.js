import React from 'react';
import '../../styles/cart/style.css';
import CartItem from "./CartItemComponent";


class Cart extends React.Component {

    constructor(props) {
        super(props);
        this.state= {
            cart: JSON.parse(localStorage.getItem('cart')),
        };
        this.deleteHandler = this.deleteHandler.bind(this);
    }

    buy() {
        console.log("BUYED")
    }

    sumPrices() {
        let price = 0;

        this.state.cart.forEach((item) => {
            price += item.price;
        });

        return price;
    }

    deleteHandler(item) {
        const cartItems = this.state.cart;

        for (let i = 0; i < cartItems.length; i++) {
            if(cartItems[i].cartId === item.cartId) {
                cartItems.splice(i,1);
            }
        }
        localStorage.setItem('cart', JSON.stringify(cartItems));
        this.setState(() => ({
            cart: cartItems
        }));
        this.props.handleCartUpdate();
    }
    render() {
        return this.state.cart && this.state.cart.length ?
            <div className={'cart-container col-12'}>
                <div className="row">
                    {this.state.cart ? this.state.cart.map((item) => {
                        return <CartItem item={item} key={item.cartId} deleteHandler={this.deleteHandler}/>
                    }) : ''}
                    <div className="col-12 my-4 price-container">SUMA: {this.sumPrices()}</div>
                    <div className="col-12 mb-4" onClick={this.buy}>
                        <button type="button" className="btn btn-primary btn-block btn-lg">ZAKOŃCZ ZAKUPY</button>
                    </div>
                </div>
            </div> : <div className={'empty-cart pt-4'}>TWÓJ KOSZYK JEST PUSTY</div>;
    }

}

export default Cart;
