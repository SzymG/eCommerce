import React, {useState} from 'react';
import './App.css';
import {
    BrowserRouter as Router,
    Route, Switch,
} from 'react-router-dom';
import Shop from './components/shop/ShopComponent';
import homeImage from './assets/img/home.png';
import cartImage from './assets/img/cart.png';
import ItemPage from "./components/shop/ItemPage";
import Cart from "./components/cart/CartComponent";
import Success from "./components/cart/SuccessComponent";

function App() {
    const [cartItems, setCartItems] = useState(JSON.parse(localStorage.getItem('cart')));

    function handleCartUpdate() {
        setCartItems(JSON.parse(localStorage.getItem('cart')));
    }

    return (
        <Router>
            <Route>
                <nav className="navbar navbar-dark bg-dark">
                    <a className="navbar-brand" href="/">
                        <img src={homeImage} alt="home" height={50} width={50}/>
                    </a>
                    <a className="navbar-brand" href="/cart">
                        <img src={cartImage} alt="home" height={50} width={50}/>
                        {cartItems && cartItems.length ? <div className={'cart-length'}>{cartItems && cartItems.length}</div> : null}
                    </a>
                </nav>
            </Route>
            <div className="container">
                <Switch>
                    <Route exact path='/'>
                        <Shop/>
                    </Route>
                    <Route exact path='/cart' render={(props) => <Cart {...props} handleCartUpdate={handleCartUpdate} />}/>
                    <Route exact path='/success' render={(props) => <Success {...props} handleCartUpdate={handleCartUpdate} />}/>
                    <Route exact path='/item/:id' render={(props) => <ItemPage {...props} handleCartUpdate={handleCartUpdate} />}/>
                </Switch>
            </div>
        </Router>
    );
}

export default App;
