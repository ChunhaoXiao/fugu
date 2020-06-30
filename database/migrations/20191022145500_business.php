<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Business extends Migrator
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
        $table = $this->table('business');
        $table->addColumn('category_id', 'integer')
        ->addColumn('sub_category', 'string', ['null' => true, 'comment' => '子分类'])
        ->addColumn('title', 'string', ['null' => true])
        ->addColumn('order', 'integer', ['default' => 0])
        ->addColumn('content', 'text')
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();

    }
}
