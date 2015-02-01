<?php

use framework\Migration;

class migration_1422806987_create_interest_table extends Migration
{
    public function up()
    {
        $this->createTable('interest',array(
            'id' => 'int(10) unsigned not null auto_increment',
            'name' => 'varchar(255) not null'
        ),array(
            'pk' => 'id'
        ));
        return true;
    }

    public function down()
    {
        $this->deleteTable('interest');
        return true;
    }
}