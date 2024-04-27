<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/style.css"> 
   
    <title>Курсы валют</title>

</head>
<body>
<div class="header">
    <h1 class=" text-white p-5">ИС "Курсы валют"</h1>
    <hr>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" onClick=$("#content").load('main.php')>Главная</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Справочники
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#" onClick=$("#content").load('currency.php')>Валюты</a></li>
            
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div id = "content" class="content">

</div>

<script>$("#content").load('main.php')</script>
<script src="js/jquery.min.js" ></script>
<script src="js/bootstrap.min.js" ></script>
<script src="js/script.js"></script>  
</body>
</html>