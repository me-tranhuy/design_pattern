<?php

 interface InterfaceUserRepository{
     
    public function getListUser();
    public function getUserById();
 }

 
 class UserMysql implements InterfaceUserRepository{

    public function getListUser(){
        echo "<h3>Get List User via Mysql</h3>";
    }

    public function getUserById(){
        echo "<h3>Get User By Id via Mysql</h3>";
    }
 }

 class UserMongo implements InterfaceUserRepository{

    public function getListUser(){
        echo "<h3>Get List User via Mongo</h3>";
    }

    public function getUserById(){
        echo "<h3>Get User By Id via Mongo</h3>";
    }
 }

 /*********************************************** class Context ***************************************/
 class initRepository {
    public $UserRepository;
    public function __construct(InterfaceUserRepository $Repository){
        $this->UserRepository = $Repository;
    }
    
 }


 /************************************************ Model ***********************************************/
 class UserModel extends initRepository
 {
    public function getAllUser(){
        return $this->UserRepository->getListUser();
    }

    public function getUserById(){
        return $this->UserRepository->getUserById();
    }
 }

 /************************************************ Controller ***********************************************/
 class UserController {

    private $userRepo;
    public function __construct($db){
        $this->userRepo = new UserModel(new $db);
    }

    public function showlistUser(){
        $this->userRepo->getAllUser();
    }

    public function getUserWithId(){
        $this->userRepo->getUserById();
    }
 }

/************************************************ Config ***********************************************/
$config = [
    'DB' => UserMysql::class
];


/*********************************************** init UserController***********************/
$user = new UserController($config['DB']);
$user->showlistUser();
echo "<br>";
$user->getUserWithId();



