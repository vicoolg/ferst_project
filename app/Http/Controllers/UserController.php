<?php

namespace App\Http\Controllers;

use App\Jobs\VerifyUserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
    }

//    public function user(UserRepository $userRepository, $id){
//        $user=$this->userRepository->getbyId($id);
//      return $user ? $user['username'] : 'User not found';
//        return $user->name;
//
//    }

    public function list(){
//      User::all();
      return view('user.list', ['users' => User::all()]);
    }

    public function profile($id)
    {
        if (!$user = User::find($id)) {
            abort(404);
        }
        return view('user.profile', ['user' => User::find($id)]);
    }

    public function create (){
        $user=new User();
        $user->name='test';
        $user->email=time().'@gmail.com';
        $user->password='trtrtrt';
        $user->last_name='tetstst';
        $user->email_verified_at = null;
        $user->save();
        VerifyUserEmail::dispatch($user);
//        return view('user.create', ['user' => User::all()]);
    }



}
