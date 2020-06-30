<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Swiper extends Migrator
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
        $table = $this->table('swiper');
        $table->addColumn('path', 'string', ['comment' => '图片地址'])
        ->addColumn('order', 'integer', ['default' => 0, 'comment' => '显示顺序'])
        ->addColumn('is_show', 'boolean', ['comment' => '是否启用', 'default' => 1])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
