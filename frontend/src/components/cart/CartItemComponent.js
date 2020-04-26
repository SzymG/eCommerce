import React from 'react';
import '../../styles/cart/item-style.css';
import {Link} from "react-router-dom";
import trashBinImage from '../../assets/img/trash-bin.png';

function CartItem(props) {
    const redirectUrl = `/item/${props.item.id}`;

    function deleteItem() {
        props.deleteHandler(props.item);
    }

    return <div className={'cart-item-container pt-4 row justify-content-center'}>
        <div className="col-1 icon">
            <img src={props.item.photoUrl} alt={props.item.name}/>
        </div>
        <div className="col-9 content-container">
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
        <div className="col-1 text-right trash-container" onClick={deleteItem}><img src={trashBinImage} alt={'USUN'} width={40} height={40}/></div>
        <div className="col-12 mt-2 border-top shadow-sm"></div>
    </div>;
}

export default CartItem;
