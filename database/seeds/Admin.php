<?php

use think\migration\Seeder;

class Admin extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            "username" => 'admin132',
            'password' => md5('admin')
        ];
        $this->table('admin')->insert($data)->save();
    }
}