import React, {useState} from 'react';
import '../../styles/cart/success-style.css';
import successImage from '../../assets/img/success.png';
import {Redirect} from "react-router-dom";

function Success(props) {
    const [redirect, setRedirect] = useState(false);
    const [cartCleared, setCartCleared] = useState(false);

    if(!cartCleared) {
        localStorage.removeItem('cart')
        props.handleCartUpdate();
        setCartCleared(true);
    }

    function goHome() {
        setRedirect(true);
    }

    return redirect ? <Redirect to='/' /> :
    <div className={'success-container'}>
        <div className="row">
            <img src={successImage} alt="success" className={'p-5'}/>
            <h1 className={'pb-5'}>DZIĘKUJEMY ZA ZAKUPY!</h1>
            <div className="col-12 mb-4" onClick={goHome}>
                <button type="button" className="btn btn-primary btn-block btn-lg">WRÓĆ DO SKLEPU</button>
            </div>
        </div>
    </div>
}

export default Success;
