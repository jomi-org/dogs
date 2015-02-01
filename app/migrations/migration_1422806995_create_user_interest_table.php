<?php

use framework\Migration;

class migration_1422806995_create_user_interest_table extends Migration
{
    public function up()
    {
        $this->createTable('user_interest',array(
            'user_id' => 'int(10) unsigned not null',
            'interest_id' => 'int(10) unsigned not null'
        ),array(
            'pk' => 'user_id,interest_id',
            'fk' => array(
                'col' => 'user_id',
                'rs' => array(
                        'table' => 'auth',
                        'col' => 'id'
                    ),
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
        $this->deleteTable('user_interest');
        return true;
    }
}