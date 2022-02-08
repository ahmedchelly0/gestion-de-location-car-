
<?php
include_once("config.php");
class rented extends Modele{
private $id ,$customer_username,$car_id ,$driver_id,$booking_date,$rent_start_date,$rent_end_date,$car_return_date,$fare,$charge_type,$distance,$no_of_days,$total_amount,$return_status;
function __construct() {
parent::__construct();
}

/*function delete($idClient) {
$query = "delete from client where idClient=?";
$res=$this->pdo->prepare($query);
return $res->execute(array($idClient));
}*/


function liste($user_check){
// //$sql = "SELECT * FROM driver d WHERE d.client_username='$user_check' ORDER BY driver_name";
//$id = $_GET["id"];
$query = "SELECT c.car_name, c.car_nameplate, rc.rent_start_date, rc.rent_end_date, rc.fare, rc.charge_type, d.driver_name, d.driver_phone FROM rentedcars rc, cars c, driver d WHERE  c.car_id=rc.car_id AND d.driver_id = rc.driver_id";
//$query = "SELECT * FROM driver WHERE car_id IN (SELECT driver_id FROM driver WHERE driver_name='$user_check');";
//$query = "select * from client";
$res=$this->pdo->prepare($query);
$res->execute();
return $res;
}
}?>

