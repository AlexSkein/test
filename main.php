<?
ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
include('db.php');
$sql = "SELECT `Name`, `id` FROM `currency_d`";
$sth = $db->prepare($sql);
$sth->execute();
$currency = $sth->fetchAll(PDO::FETCH_ASSOC);

$today = date("Y-m-d"); // дата сегодня
?>
<div class="container">

    <div class="border text-white m-1 p-1 radius-2">
        
        <form class="form-inline" id="filter" >
            <div class="form-group  mb-2">
                <p>Фильтр</p>
                <label for="date">Дата</label>
                <input class="form-control" type="date" name="date" id="date">
                <label for="currency">Валюта</label>
                <select class="form-control" name="currency" id="currency">
                    <? foreach($currency as $row){?>
                        <option value="<?=$row['id']?>"><?=$row['Name']?></option>
                        <?}?> 
                    </select>
                    <input type="submit" class="btn btn-primary mb-2" value="Применить">
            </div>
        </form>
    </div>
    <div class="" id="currate"></div>
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                
            </ul>
        </nav>
        
    </div>
</div>
<script>

    $("#filter").submit(function (e){
        e.preventDefault();
        $.post('getcurrencyrate.php', $('#filter').serialize(), function(data){
            $('#currate').html(data);
        });
    })
</script>