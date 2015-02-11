<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/31/15
 * Time: 12:13 AM
 */

use jf\Migration;

class migration_1422705666_create_auth_table extends Migration
{
    public function up()
    {
        $this->createTable('auth',array(
            'id' => 'int(10) unsigned  not null auto_increment',
            'login' => 'char(255) not null',
            'password' => 'char(32) not null',
            'salt' => 'char(4) not null',
        ), array(
            'pk' => 'id'
        ));
        return true;
    }

    public function down()
    {
        $this->deleteTable('auth');
        return true;
    }
}