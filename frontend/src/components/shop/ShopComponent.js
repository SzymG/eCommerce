import React from 'react';
import '../../styles/shop/style.css';
import ShopItem from "./ShopItemComponent";

function Shop(props) {
    const items = [
        {
            id: 1,
            name: 'Zdjęcie',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
             photoUrl: 'https://cdn.pixabay.com/photo/2017/10/15/14/14/poster-mockup-2853839_1280.jpg',
            price: 11,
        },
        {
            id: 2,
            name: 'Świeczka',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2017/08/17/13/11/candle-2651278_1280.jpg',
            price: 17,
        },
        {
            id: 3,
            name: 'Zegar',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2015/03/26/10/20/clock-691143_1280.jpg',
            price: 43,
        },
        {
            id: 4,
            name: 'Powerbank',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2020/02/23/20/39/charging-phone-4874592_1280.jpg',
            price: 88,
        },
        {
            id: 5,
            name: 'Skarpety',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2016/12/14/11/34/socks-1906060_1280.jpg',
            price: 8,
        },
        {
            id: 6,
            name: 'Cukierek',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2017/02/21/22/11/candy-2087625_1280.jpg',
            price: 2
        },
        {
            id: 7,
            name: 'Kwiat',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2015/10/09/00/55/lotus-978659_1280.jpg',
            price: 9,
        },
        {
            id: 8,
            name: 'Maskotka',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2016/06/20/15/47/teddy-bear-1469128_1280.jpg',
            price: 15,
        },
        {
            id: 9,
            name: 'Książka',
            description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            photoUrl: 'https://cdn.pixabay.com/photo/2017/05/12/05/58/book-2306181_1280.jpg',
            price: 33,
        },
    ];
    return <div className={'shop-container row'}>
        {items.map((item) => {
            return <ShopItem item={item} key={item.id}/>
        })}
    </div>;
}

export default Shop;
