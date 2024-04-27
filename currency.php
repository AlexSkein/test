<?
    include('db.php');
    $sth = $db->prepare("SELECT * FROM `currency_d`");
	$sth->execute();
    $currency = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container"> 
    <div class="d-flex justify-content-end">
        <a class="btn btn-warning m-3" onclick="updateCurrency()"> Обновить</a>
    </div>
<table class="table table-striped table-dark">
  <thead>
    <tr>      
      <th scope="col">Наименование</th>
      <th scope="col">Наименование(En)</th>
      <th scope="col">Номинал</th>
      <th scope="col">Код</th>
    </tr>
  </thead>
  <tbody>
    <?foreach($currency as $row){?>
    <tr>      
      <td><?=$row['Name']?></td>
      <td><?=$row['EngName']?></td>
      <td><?=$row['Nominal']?></td>
      <td><?=$row['ISO_Char_Code']?></td>
    </tr>
<?}?>
</tbody>
</table>
</div>