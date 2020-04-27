import React, {useState} from 'react';
import '../../styles/shop/style.css';
import ShopItem from "./ShopItemComponent";
import {fetchData} from "../../helpers/RequestHelper";

function Shop(props) {
    const [data, setData] = useState({
        isFetched: false,
        items: [],
    });

    if(!data.isFetched) {
        fetchData('GET', 'product/index').then((response) => {
            setData({
                isFetched: true,
                items: response.data,
            });
        });
    }

    return <div className={'shop-container row'}>
        {data.items.map((item) => {
            return <ShopItem item={item} key={item.id}/>
        })}
    </div>;
}

export default Shop;
