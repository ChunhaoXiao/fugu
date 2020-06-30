<?php

use think\migration\Migrator;
use think\migration\db\Column;

class News extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('news');
        $table->addColumn('title', 'string')
        ->addColumn('category_id', 'integer')
        ->addColumn('content', 'text')
        ->addColumn('status', 'boolean', ['comment' => '状态，1:正常，0:前台不显示', 'default' => 1])
        ->addColumn('view_count', 'integer', ['comment' => '浏览次数', 'default' => 0])
        ->addColumn('cover', 'string', ['comment' => '封面'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
