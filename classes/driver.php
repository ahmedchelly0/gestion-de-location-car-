<?php
include_once("config.php");
class driver1 extends Modele{
private $driver_id ,$driver_name,$dl_number ,$driver_phone,$driver_address,$driver_gender,$client_username,$driver_availability;
function __construct() {
parent::__construct();
}
function insert($driver_name,$dl_number ,$driver_phone,$driver_address,$driver_gender,$client_username,$driver_availability){
//$query="insert into client(ncin,nom,prenom,telephone)values (?, ?, ?, ?)";
//INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `ac_price`, `non_ac_price`, `ac_price_per_day`, `non_ac_price_per_day`, `car_availability`) VALUES (NULL, 'audi', 'audi1', 'NA', '12546', '12345', '123', '1254', 'yes');
$query = "INSERT into driver(driver_name,dl_number,driver_phone,driver_address,driver_gender,client_username,driver_availability) VALUES(?,?,?,?,?,?,?,?)";
$res=$this->pdo->prepare($query);
return $res->execute(array($driver_availability,$dl_number ,$driver_phone,$driver_address,$driver_gender,$client_username,$driver_availability));
}
/*function delete($idClient) {
$query = "delete from client where idClient=?";
$res=$this->pdo->prepare($query);
return $res->execute(array($idClient));
}*/


function liste($user_check){
// //$sql = "SELECT * FROM driver d WHERE d.client_username='$user_check' ORDER BY driver_name";
$query = "SELECT * FROM driver WHERE car_id IN (SELECT driver_id FROM driver WHERE driver_name='$user_check');";
//$query = "select * from client";
$res=$this->pdo->prepare($query);
$res->execute();
return $res;
}
}?>

