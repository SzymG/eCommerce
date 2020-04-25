import React from 'react';
import '../../styles/shop/item-page-style.css';


function ItemPage(props) {
    console.log(props)
    const item = props.location.state.item;
    let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

    function addToCart() {
        localStorage.setItem('cart', JSON.stringify([...cart, item]));
        cart = [...cart, item];
    }

    return <div className={'row pt-5 item-page-container'}>
        <div className="col-md-7 pb-4">
            <img src={item.photoUrl} alt={item.name} className={'shadow'}/>
        </div>
        <div className="col-md-5 content-container">
            <div className="info-container">
                <div className={'title'}>{item.name}</div>
                <div className="border-top my-3"></div>
                <div className="description">{item.description}</div>
            </div>
            <div className="price-container">
                <div>CENA: {item.price}</div>
            </div>
        </div>
        <div className="col-12 my-4" onClick={addToCart}>
            <button type="button" className="btn btn-primary btn-block btn-lg">DODAJ DO KOSZYKA</button>
        </div>
    </div>
}

export default ItemPage;
