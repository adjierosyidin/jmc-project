<?php

use App\UserTree;
use Illuminate\Database\Seeder;

class UserTreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tree = [
            [
                'ancestor' => '1', 
                'descendant'  => '1',
                'depth' => '0'
            ],
        ];
        UserTree::insert($tree);
    }
}
