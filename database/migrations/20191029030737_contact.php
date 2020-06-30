<?php

use think\migration\Migrator;
use think\migration\db\Column;

class Contact extends Migrator
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
        $table = $this->table('contact');
        $table->addColumn('address', 'string', ['null' => true])
        ->addColumn('phone', 'string', ['null' => true])
        ->addColumn('fax', 'string', ['null' => true])
        ->addColumn('post_code', 'string', ['null' => true])
        ->addColumn('web_site', 'string', ['null' => true])
        ->addColumn('code_picture', 'string', ['null' => true])
        //->addColumn('map_code', 'text', ['null' => true, 'comment' => '地图代码'])
        ->addColumn('longitude', 'string', ['null' => true])
        ->addColumn('latitude', 'string', ['null' => true])
        ->create();
    }
}
