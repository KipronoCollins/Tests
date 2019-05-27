<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Newuser;

class JsonController extends Controller
{
    //
    public function json()
    {
        $users = User::all();

        return $users;
        // $trial = json_decode($users, true);

        // Session::put('json', $trial);
        
        // return $trial;
    }

    public function insert()
    {
        //$value = session('json');

        $true = json_decode('[{"id":1,"name":"Kip","email":"kip@kip.com","address":"KIP","created_at":"2018-09-06 09:49:18","updated_at":"2018-09-06 09:49:18"},{"id":2,"name":"dang!","email":"dang@deng.deng","address":"DENg","created_at":"2018-09-06 09:49:39","updated_at":"2018-09-06 09:49:39"}]',true);

        foreach($true as $row)
        {

            $newuser = new Newuser;

            $newuser->name=$row['name'];

            $newuser->email=$row['email'];

            $newuser->address= $row['address'];

            $newuser->save();

            return "saved";
        }
    }

    public function insert2()
    {
        //$value = session('json');

        $true = json_decode('[{"id":1,"name":"Kip","email":"kip@kip.com","address":"KIP","created_at":"2018-09-06 09:49:18","updated_at":"2018-09-06 09:49:18"},{"id":2,"name":"dang!","email":"dang@deng.deng","address":"DENg","created_at":"2018-09-06 09:49:39","updated_at":"2018-09-06 09:49:39"}]',true);

        foreach($true as $row)
        {

            $newuser = new Newuser;

            $newuser->name=$row['name'];

            $newuser->email=$row['email'];

            $newuser->address= $row['address'];

            $newuser->save();

            return "saved";
        }
    }
}
