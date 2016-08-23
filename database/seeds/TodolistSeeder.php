<?php

use App\User;
use App\Todolist;

use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Sample user
        $user1 = User::create(['name'=>'Lampura', 'email'=>'lampura@gmail.com', 'password'=>bcrypt('lampura')]);
       
        // Sample list
        $list1 = Todolist::create(['name'=>'List 1','description'=>'This is list 1', 'user_id'=>$user1->id]);
        $list2 = Todolist::create(['name'=>'List 2','description'=>'This is list 2', 'user_id'=>$user1->id]);
        $list3 = Todolist::create(['name'=>'List 3','description'=>'This is list 3', 'user_id'=>$user1->id]);

        
    }
}
