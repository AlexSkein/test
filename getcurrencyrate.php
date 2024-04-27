<?php
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
include('db.php');
$page = 1;
$limit = 12;
$start = $page*$limit;
$filter['currency'] = $_POST['currency'];
$filter['dateF'] = $_POST['date'];
// $filter['start'] = $start;
// $filter['limit'] = $limit;

$sql = "SELECT Vid, date_r, t2.ISO_Char_Code, t2.Name, VunitRate, VunitRate - (
    SELECT  VunitRate
    FROM `currency_rate`   
    WHERE Vid = t.Vid AND date_r < t.date_r
    ORDER BY date_r DESC
    LIMIT 1 
  ) AS rate_delta
FROM `currency_rate` AS t JOIN `currency_d` AS t2 ON t.Vid = t2.id 
WHERE (date_r = :dateF and Vid = :currency)
ORDER BY date_r DESC 
";


$sth = $db->prepare($sql);


try {
    
    $sth->execute($filter);                            
    $currency = $sth->fetchAll(PDO::FETCH_ASSOC); 
}catch (Exception $e){
   throw $e;
}?>

<div class="container"> 
    
<table class="table table-striped table-dark">
  <thead>
    <tr>      
      <th scope="col">Наименование</th>
      <th scope="col">Курс ЦБ РФ</th>
      <th scope="col">Изменение</th>
      <th scope="col">Код</th>
    </tr>
  </thead>
  <tbody>
    <?foreach($currency as $row){?>
    <tr>      
      <td><?=$row['Name']?></td>
      <td><?=$row['VunitRate']?></td>
      <td><?=$row['rate_delta']?></td>
      <td><?=$row['ISO_Char_Code']?></td>
    </tr>
<?}?>
</tbody>
</table>

