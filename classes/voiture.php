<?php
include_once("config.php");
class Voiture extends Modele{
private $car_id ,$car_name,$car_nameplate ,$car_img,$ac_price,$non_ac_price,$ac_price_per_day,$non_ac_price_per_day,$car_availability;
function __construct() {
parent::__construct();
}
function insert($car_name,$car_nameplate ,$car_img,$ac_price,$non_ac_price,$ac_price_per_day,$non_ac_price_per_day,$car_availability){
//$query="insert into client(ncin,nom,prenom,telephone)values (?, ?, ?, ?)";
//INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `ac_price`, `non_ac_price`, `ac_price_per_day`, `non_ac_price_per_day`, `car_availability`) VALUES (NULL, 'audi', 'audi1', 'NA', '12546', '12345', '123', '1254', 'yes');
$query = "INSERT into cars(car_name,car_nameplate,car_img,ac_price,non_ac_price,ac_price_per_day,non_ac_price_per_day,car_availability) VALUES(?,?,?,?,?,?,?,?)";
$res=$this->pdo->prepare($query);
return $res->execute(array($car_name,$car_nameplate ,$car_img,$ac_price,$non_ac_price,$ac_price_per_day,$non_ac_price_per_day,$car_availability));
}
/*function delete($idClient) {
$query = "delete from client where idClient=?";
$res=$this->pdo->prepare($query);
return $res->execute(array($idClient));
}*/


function liste($user_check){
$query = "SELECT * FROM cars WHERE car_id IN (SELECT car_id FROM clientcars WHERE client_username='$user_check');";
//$query = "select * from client";
$res=$this->pdo->prepare($query);
$res->execute();
return $res;
}
}?>


