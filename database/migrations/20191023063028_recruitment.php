<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Recruitment extends Migrator
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
        $table = $this->table('recruitment');
        $table->addColumn('name', 'string')
        ->addColumn('quantity', 'integer', ['null' => true])
        //->addColumn('responsibility', 'text', ['null' = >true])
        ->addColumn('content', 'text', ['null' => true])
        ->addColumn('salary', 'string', ['null' => true])
        ->addColumn('location', 'string', ['null' => true])
        ->addColumn('create_time', 'datetime')
        ->addColumn('update_time', 'datetime')
        ->create();
    }
}
