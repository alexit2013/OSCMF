<?php

use think\migration\Migrator;
use think\migration\db\Column;
class CreateAdmin extends Migrator
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

        $table = $this->table('admin', ['comment'=>'用户表','engine' => 'InnoDB', 'encoding' => 'utf8mb4', 'collation' => 'utf8mb4_unicode_ci']);
        $table
            ->addColumn('admin_user_id', 'integer', ['limit' => 10, 'comment' => '用户'])
            ->addColumn('name', 'string', ['limit' => 30, 'default' => '', 'comment' => '操作'])
            ->addColumn('url', 'string', ['limit' => 100, 'default' => '', 'comment' => 'URL'])
            ->addColumn('log_method', 'string', ['limit' => 8, 'default' => '不记录', 'comment' => '记录日志方法'])
            ->addColumn('log_ip', 'string', ['limit' => 20, 'default' => '', 'comment' => '操作IP'])
            ->addColumn('create_time', 'integer', ['limit' => 10, 'comment' => '操作时间'])
            ->create();
    }
}
