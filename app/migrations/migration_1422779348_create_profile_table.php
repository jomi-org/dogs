<?php

use framework\Migration;

class migration_1422779348_create_profile_table extends Migration
{
    public function up()
    {
        $this->createTable('profile',array(
            'user_id' => 'int(10) unsigned not null',
            'email' => 'varchar(255) not null default ""',
            'name' => 'varchar(255) not null',
            'city' => 'varchar(255) not null default ""',
            'about' => 'varchar(5000)'
        ),array(
            'fk' => array(
                'col' => 'user_id',
                'rs' => array('table'=> 'auth','col' => 'id'),
                'on' => array(
                    'update' => 'cascade',
                    'delete' => 'cascade'
                )
            )
        ));
        return true;
    }

    public function down()
    {
        $this->deleteTable('profile');
        return true;
    }
}