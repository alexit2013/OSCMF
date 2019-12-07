<?php

use think\migration\Migrator;
use think\migration\db\Column;
class CreateAdminTable extends Migrator
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
            ->addColumn('user_name', 'string', ['limit' => 150,'null'=>true, 'comment' => '用户名称'])
            ->addColumn('password', 'char', ['limit' => 32,'null'=>true, 'default' => '', 'comment' => '用户密码'])
            ->addColumn('mobile', 'char', ['limit' => 11,'null'=>true, 'default' => '', 'comment' => '手机号码'])
            ->addColumn('avatar', 'string', ['limit' => 255,'null'=>true, 'default' => '', 'comment' => '头像'])
            ->addColumn('lastLoginTime', 'integer', ['limit' => 11,'null'=>true, 'default' => 0, 'comment' => '最后登陆时间'])
            ->addColumn('rule_id', 'integer', ['limit' => 4,'null'=>true, 'default' => 0, 'comment' => '所属用户权限'])
            ->addColumn('create_time', 'integer', ['limit' => 11,'null'=>true,'default' => 0, 'comment' => '创建时间'])
            ->addColumn('update_time', 'integer', ['limit' => 11,'null'=>true,'default' => 0, 'comment' => '更新时间'])
            ->create();
    }
}
