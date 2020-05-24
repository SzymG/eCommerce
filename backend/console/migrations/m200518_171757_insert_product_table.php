<?php

use console\components\Migration;

class m200518_171757_insert_product_table extends Migration {

    public function safeUp() {
        $this->insert('product', [
            'name' => 'Długopis',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2020/02/17/07/39/pen-4855775_1280.jpg',
            'price' => 10,
        ]);
        $this->insert('product', [
            'name' => 'Gitara',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2017/11/07/00/18/guitar-2925274_1280.jpg',
            'price' => 250,
        ]);
        $this->insert('product', [
            'name' => 'Lampa',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2017/10/30/23/34/lamp-2903830_1280.jpg',
            'price' => 35,
        ]);
        $this->insert('product', [
            'name' => 'Nożyczki',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2019/03/28/21/45/cord-4088111_1280.jpg',
            'price' => 5,
        ]);
        $this->insert('product', [
            'name' => 'Samochodzik',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2017/08/05/12/47/auto-2583303_1280.jpg',
            'price' => 30,
        ]);
        $this->insert('product', [
            'name' => 'Okulary',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2017/12/06/20/23/glasses-3002608_1280.jpg',
            'price' => 40,
        ]);
        $this->insert('product', [
            'name' => 'Zdjęcie',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2016/11/29/04/54/photographer-1867417_1280.jpg',
            'price' => 15,
        ]);
        $this->insert('product', [
            'name' => 'Żarówka',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2015/11/24/21/12/light-bulb-1060884_1280.jpg',
            'price' => 7,
        ]);
        $this->insert('product', [
            'name' => 'Portfel',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'photo_url' => 'https://cdn.pixabay.com/photo/2016/12/27/14/35/money-1934036_1280.jpg',
            'price' => 50,
        ]);
    }

    public function safeDown() {
        $this->delete('product');
    }
}
