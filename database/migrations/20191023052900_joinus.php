<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Joinus extends Migrator
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
        $table = $this->table('join_us');
        $table->addColumn('name', 'string')
        ->addColumn('phone', 'string', ['null' => true])
        ->addColumn('email', 'string', ['null' => true])
        ->addColumn('wechat', 'string', ['null' => true])
        ->addColumn('message', 'text', ['null' => true])
        ->addColumn('ip_address', 'string', ['null' => true])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
