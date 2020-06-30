<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Product extends Migrator
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
        $table = $this->table('product');
        $table->addColumn('name', 'string', ['comment' => '产品名称'])
        ->addColumn('cover', 'string', ['comment' => '产品封面图', 'null' => true])
        ->addColumn('category_id', 'integer', ['comment' => '产品分类'])
        ->addColumn('content', 'text', ['comment' => '产品描述', 'null' => true])
        ->addColumn('is_recommend', 'boolean', ['default' => 0, 'comment' => '是否推荐'])
        ->addColumn('is_show', 'boolean', ['default' => 1, 'comment' => '是否显示'])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
