<?
// ini_set("error_reporting", E_ALL);
// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
include ('db.php');
$data = simplexml_load_file('https://www.cbr.ru/scripts/XML_valFull.asp');

$cnt1 = 0;
$cnt2 = 0;

foreach ($data->Item as $row) {

    $m = [];
    $m['id'] = strval($row->attributes()->ID);
    $m['qName'] = strval($row->Name);
    $m['EngName'] = strval($row->EngName);
    $m['Nominal'] = strval($row->Nominal);
    $m['ParentCode'] = strval($row->ParentCode);
    $m['ISO_Num_Code'] = strval($row->ISO_Num_Code);
    $m['ISO_Char_Code'] = strval($row->ISO_Char_Code);
   
    // Поиск валюты в БД по айди.

	$sth = $db->prepare("SELECT * FROM `currency_d` WHERE id = ?");
	$sth->execute([$m['id']]);
    $currency = $sth->fetch(PDO::FETCH_ASSOC);
   

       
   
	//Обновление валюты.
	if ($currency) {
       $cnt1++;
		$sth = $db->prepare("UPDATE `currency_d` SET `Name` = :qName, `EngName` = :EngName, `Nominal` = :Nominal, `ParrentCode` = :ParrentCode, `ISO_Num_Code` = :ISO_Num_Code, `ISO_Char_Code` = :ISO_Char_Code  WHERE `id` = :id");
	} else {
    // Добавление валюты.    
    $cnt2++;
        //$sta = $db->prepare("INSERT INTO `currency_d` (`id`,`Name`, `EngName`, `Nominal`, `ParrentCode`, `ISO_Num_Code`, `ISO_Char_Code`) VALUES (:id, :qName, :EngName, :Nominal, :ParrentCode, :ISO_Num_Code, :ISO_Char_Code )");
        $sth = $db->prepare("INSERT INTO `currency_d` (`id`,`Name`, `EngName`, `Nominal`, `ParentCode`, `ISO_Num_Code`, `ISO_Char_Code`) VALUES (:id, :qName, :EngName, :Nominal, :ParentCode, :ISO_Num_Code, :ISO_Char_Code )");
    }
    
    try {
            $db->beginTransaction();
            $sth->execute($m);                            
            $db->commit();
        }catch (Exception $e){
            $db->rollback();
            throw $e;
        }
    
}
echo "Обновлено $cnt1 записей, добавлено $cnt2 записей.";