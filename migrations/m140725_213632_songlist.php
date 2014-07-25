<?php

use yii\db\Schema;
use yii\db\Migration;

class m140725_213632_songlist extends Migration
{
    public function up()
    {
    	switch (Yii::$app->db->driverName) {
	      case 'mysql':
	        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
	        break;
	      case 'pgsql':
	        $tableOptions = null;
	        break;
	      default:
	        throw new RuntimeException('Your database is not supported!');
	    }

	    $this->createTable('{{%songs}}',array(
			'id'              => Schema::TYPE_PK,
			'title'           => Schema::TYPE_TEXT,
			'artist'          => Schema::TYPE_TEXT,
			'lyrics'          => Schema::TYPE_TEXT,
			'year'			  => Schema::TYPE_STRING,
			'duo'       	  => Schema::TYPE_INTEGER . ' DEFAULT 0',
			'tags'            => Schema::TYPE_STRING,
			'status'          => Schema::TYPE_STRING .'(255) NOT NULL DEFAULT "created"',
	      	// timestamps
	      	'created_at'      => Schema::TYPE_INTEGER . ' NOT NULL',
	      	'updated_at'      => Schema::TYPE_INTEGER . ' NOT NULL',
	      	'deleted_at'      => Schema::TYPE_INTEGER . ' DEFAULT NULL'
		),$tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%songs}}');
    }
}
