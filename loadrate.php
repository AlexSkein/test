<?
use PDOException;
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
include('db.php');
    $date1 = $_POST['d1'];
    $date2 = $_POST['d2'];
    //$curdate = date("Y-m-d"); 
    $curdate = "2024-04-26"; 
    //$qdate = date("d/m/Y"); 
    $qdate = "26/04/2024"; 
    
    $url = "https://www.cbr.ru/scripts/XML_daily.asp?date_req=".$qdate;
    $data = simplexml_load_file($url);
    //var_dump($data);

    foreach ($data->Valute as $row) {

        $m = [];

        $m['date_r'] = $curdate ; 
        $m['Vid'] = strval($row->attributes()->ID);
        $m['Value'] = str_replace(',', '.', strval($row->Value));
        $m['VunitRate'] = str_replace(',', '.', strval($row->VunitRate));
        $sth = $db->prepare("INSERT INTO `currency_rate` (`date_r`, `Value`, `VunitRate`, `Vid`) VALUES (:date_r, :Value, :VunitRate, :Vid )");
     var_dump($m);
        try {
            $db->beginTransaction();
            $sth->execute($m);                            
            $db->commit();
        }catch (PDOException $e){
            $db->rollback();
            //throw $e;
            echo $e->getMessage(), "\n";
        }

    }


?>