import React from 'react';
import '../../styles/cart/item-style.css';
import {Link} from "react-router-dom";

function CartItem(props) {
    const redirectUrl = `/item/${props.item.id}`;

    return <div className={'cart-item-container pt-4 row'}>
        <div className="col-1">
            <img src={props.item.photoUrl} alt={props.item.name}/>
        </div>
        <div className="col-9">
            <Link className="info-container row no-gutters" to={{
                pathname: redirectUrl,
                state: {
                    item: props.item
                }
            }}>
                <div className={'name'}>{props.item.name}</div>
                <div className={'price'}>CENA: {props.item.price}</div>
            </Link>
        </div>
        <div className="col-2 text-right">USUN</div>
        <!-- TODO dodaj usuwanie -->
        <div className="col-12 border-top shadow-sm"></div>
    </div>;
}

export default CartItem;
