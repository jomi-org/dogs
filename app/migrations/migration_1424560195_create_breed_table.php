<?php

use jf\Migration;

class migration_1424560195_create_breed_table extends Migration
{
    public function up()
    {
        $this->createTable('breed', [
            'id' => 'int(11) unsigned primary key',
            'name' => 'varchar(100) not null',
            'img' => 'varchar(255) not null default ""',
            'price' => 'decimal not null default ""',
            'size' => 'varchar(10) not null default ""',
            'living_place' => 'varchar(10) not null default""',
            'description' => 'varchar(5000) not null default""',
        ]);
        $this->createTable('breed_photo', [
            'id' => 'int(11) unsigned primary key',
            'src' => 'varchar(255) not null default ""',
            'alt' => 'varchar(255) not null default ""',
        ]);
        $this->createTable('breed_video', [
            'id' => 'int(11) unsigned primary key',
            'link' => 'varchar(255) not null default ""',
        ]);
        return true;
    }

    public function down()
    {
        $this->deleteTable('breed');
        $this->deleteTable('breed_photo');
        $this->deleteTable('breed_video');
        return true;
    }
}