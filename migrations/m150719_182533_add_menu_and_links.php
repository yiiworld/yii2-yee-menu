<?php

use yii\db\Schema;
use yii\db\Migration;

class m150719_182533_add_menu_and_links extends Migration
{

    public function up()
    {
        $this->insert('menu',
            ['id' => 'admin-main-menu', 'title' => 'Main Admin Panel Menu']);

        $this->insert('menu_link',
            ['id' => 'dashboard', 'menu_id' => 'admin-main-menu', 'link' => '/',
            'label' => 'Dashboard', 'image' => 'th-large', 'order' => 1]);

        $this->insert('menu_link',
            ['id' => 'menu', 'menu_id' => 'admin-main-menu', 'label' => 'Menus',
            'image' => 'align-justify', 'order' => 10]);

        $this->insert('menu_link',
            ['id' => 'menu-link', 'menu_id' => 'admin-main-menu', 'link' => '/menu/link',
            'label' => 'Links', 'parent_id' => 'menu', 'order' => 2]);

        $this->insert('menu_link',
            ['id' => 'menu-menu', 'menu_id' => 'admin-main-menu', 'link' => '/menu',
            'label' => 'Menus', 'parent_id' => 'menu', 'order' => 1]);
    }

    public function down()
    {
        $this->delete('menu', ['like', 'id', 'admin-main-menu']);
        $this->delete('menu_link', ['like', 'id', 'menu-menu']);
        $this->delete('menu_link', ['like', 'id', 'menu-link']);
        $this->delete('menu_link', ['like', 'id', 'menu']);
    }
}