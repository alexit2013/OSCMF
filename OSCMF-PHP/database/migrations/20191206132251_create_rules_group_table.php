<?php

use think\migration\Migrator;
use think\migration\db\Column;

class CreateRulesGroupTable extends Migrator
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
        $table = $this->table('rules_group', ['comment'=>'用户权限角色表','engine' => 'InnoDB', 'encoding' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']);
        $table
            ->addColumn('name', 'string', ['limit' => 150,'null'=>true, 'comment' => '角色组名称'])
            ->addColumn('describe', 'string', ['limit' => 150,'null'=>true, 'default' => '', 'comment' => '描述'])
            ->addColumn('create_time', 'integer', ['limit' => 11,'null'=>true,'default' => 0, 'comment' => '创建时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11,'null'=>true,'default' => 0, 'comment' => '更新时间'])
            ->create();
    }
}
