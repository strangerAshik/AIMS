<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;
class User extends Eloquent implements UserInterface, RemindableInterface {
	use HasRole; // login system 
	use UserTrait, RemindableTrait;

	protected $table = 'users';	
	
    protected $softDelete = true;

    protected $dates = ['deleted_at'];
	//Rules 
	protected $hidden = array('password', 'remember_token');
	public static $auth_rules=['email'=>'required|email',
								'password'=>'required|min:3'
								];
	public static $rules_user_registration= array(
    'name'=>'required|min:2',
    'emp_id'=>'required|min:2|unique:users',
    'email'=>'required|email|unique:users',
    'designation'=>'required',
    'password'=>'required|alpha_num|between:5,30|confirmed',
    'password_confirmation'=>'required|alpha_num|between:5,30'
    );
	public static $rules_user_update= array(
    'name'=>'required|min:2',
    'emp_id'=>'required|min:2',
    'email'=>'required|email',
    'designation'=>'required',
    'password'=>'alpha_num|between:5,30|confirmed',
    'password_confirmation'=>'alpha_num|between:5,30'
    );
	public static $rule_changePass=array(
	'password'=>'required|alpha_num|between:5,30|confirmed',
    'password_confirmation'=>'required|alpha_num|between:5,30'
	);
	//end rules
	
	//function 
	public function getId()	{ return $this->id;	}
	public static function getUserId(){ return DB::table('users')->where('name','employee1')->pluck('emp_id');}
	public function getName(){return $this->name;}
	public function emp_id(){return $this->emp_id;}
	public function photo(){return $this->photo;}
	
	//end functions
	
	//
    public function Role() {return $this->role;}
   
    public function Organization() {return $this->organization;}


    public function PassChange() {return $this->pass_change;}
	
}
