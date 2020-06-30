<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Category extends Migrator
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
        $table = $this->table('category');
        $table->addColumn('name', 'string')
        ->addColumn('parent_id', 'integer', ['default' => 0])
        ->addColumn('order', 'integer', ['comment' => '排序', 'default' => 0])
        ->addColumn('icon', 'string', ['null' => true, 'comment' => '图标'])
        ->addColumn('bg_image', 'string', ['null' => true])
        ->addColumn('type', 'string', ['null' => true])
        ->addColumn('url', 'string', ['null' => true])
        ->addColumn('create_time','datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
