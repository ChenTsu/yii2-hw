<?php

use yii\db\Migration;

class m161008_094026_tweets extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tweets}}', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string(100),
            'text' => $this->string(1500),
            'like_id' => $this->integer()->unsigned()->notNull(),
            'retweet' => $this->integer()->unsigned()->defaultValue(0),
            'owner_id' => $this->integer()->unsigned()->notNull()
        ], $tableOptions);

        $this->createTable('{{%like}}', [
            'id' => $this->primaryKey()->unsigned(),
            'tweet_id' =>$this->integer()->unsigned()->notNull(),
            'user_id' =>$this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createIndex('tweet_user_idx', "{{%tweets}}" , 'owner_id');
        $this->addForeignKey('FK_tweet_user_id', '{{%tweets}}', 'owner_id', '{{%user}}', 'id');
        $this->createIndex('tweet_like_idx', '{{%tweets}}', 'like_id');
        $this->addForeignKey('FK_tweet_like_id', '{{%tweets}}', 'like_id', '{{%like}}', 'id');


        $this->createIndex('like_tweet_idx', '{{%like}}', 'tweet_id');
        $this->addForeignKey('FK_like_tweet_id','{{%like}}','id', '{{%tweets}}','id' );
        $this->createIndex('like_user_idx', '{{%like}}', 'user_id');
        $this->addForeignKey('FK_like_user_id', '{{%like}}','user_id', '{{%user}}', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('FK_like_user_id', '{{%like}}');
        $this->dropForeignKey('FK_like_tweet_id','{{%like}}');
        $this->dropForeignKey('FK_tweet_like_id', '{{%tweets}}');
        $this->dropForeignKey('FK_tweet_user_id', '{{%tweets}}');
        $this->dropTable('{{%like}}');
        $this->dropTable('{{%tweets}}');
    }
}
