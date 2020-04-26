import React from 'react';
import '../../styles/shop/item-style.css';
import {Link} from "react-router-dom";

function ShopItem(props) {
    const redirectUrl = `/item/${props.item.id}`;

    return <div className={'shop-item-container col-sm-6 col-md-4'}>
        <img src={props.item.photoUrl} alt={props.item.name} className={'shadow'}/>
        <Link className="info-container row no-gutters" to={{
            pathname: redirectUrl,
            state: {
                item: props.item
            },
        }}>
            <div className={'name'}>{props.item.name}</div>
            <div className={'price'}>CENA: {props.item.price}</div>
        </Link>
    </div>;
}

export default ShopItem;
