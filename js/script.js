

function updateCurrency(){
    $.post('/upd.php', {text: ''}, function(data){
        alert(data);
    });
}