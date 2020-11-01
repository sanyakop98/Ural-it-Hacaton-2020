<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "<section>
    <br><br><br>
    <div class=\"align-center container\" style='min-height: 200px;'>
            <h1 class=\"mbr-section-title mbr-fonts-style mbr-black mb-3 display-1\"><strong>В разработке</strong></h1>
    </div>
</section>
";



include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';
