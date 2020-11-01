<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

if(isset($_POST['like'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddLike('$_POST[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
if(isset($_POST['dislike'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddDislike('$_POST[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
if(isset($_POST['helping'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddHelping('$_POST[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}
if(isset($_POST['finish'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call AddFinish('$_POST[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }

}

echo '
<br><br>


<div class="container">
<div class="row">
    <div class="col-md-4 offset-md-4">
    <h4>Помощь нуждающимся</h4>
    </div>
</div>        
   <br>';

if(isset($_GET['id'])){
    if(isset($_POST['addAnswer'])){
        $mysqli = ConnectDB();

        if (!$res=$mysqli->query("Call AddAnswerPostHelp('$_GET[id]','$_SESSION[id]','$_POST[answer]')")) {
            echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
        }

    }

    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call GetPostHelpFromId('$_GET[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $row = $res->fetch_assoc();



}
echo "
<div class='form-control'>
<div class=\"row \" style=\"min-height: 200px; \"> 
      <div class='col-md-5'>
        <br>
   
  
    <div>
        <img width=\"400\" height=\"250\" src=\"$row[img]\" class=\"img-fluid img-thumbnail\" alt=\"...\">
    </div>
      <br>
      </div>

      <div class='col-md-7'>
        <div class='row'>
            <div class='col-md-7'>
            <br>
            <a class=\"nav-link link text-black display-4\" href=\"$domain\"><h4>$row[name_post]</h4></a>
             <hr class=\"my-0\" />       
            </div>
            <div class='col-md-5'>
            <br>
            <p>Дата публикации:<br> $row[data_create]</p>     
            </div>
        </div>
        <div class='row'>
            <div class='col'>";
$mysqli2 = ConnectDB();

if (!$res2=$mysqli2->query("Call GetTagsFromPostHelp('$row[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
}
while($row2 = $res2->fetch_assoc()) {
    echo "<span class=\"badge badge-pill badge-primary\">$row2[name]</span>";
}


echo "
            </div>
        </div>
        
        
        <div class='row' style='min-height: 150px;'>
            <div class='col-md-6'>
                <br>
                <h5>Обо мне:</h5>  
                $row[last_name]<br>              
                $row[first_name]<br>
                $row[middle_name]<br>
                Дата рождения: $row[data]<br>
                Статус $row[id_status_user] <br>
                
                
            </div>
            
            <div class='col-md-5'>
                <br>
                
               <a href='$domain/profile.php?id=$row[id_user]'> <img src=\"$row[img_user]\"  alt=\"...\" class=\"rounded-circle\"></a>
                
            </div>
        </div>
      </div>  
</div>
      
        <div class='row' style='margin-left: 2px; margin-right: 2px; align=\"right\"; min-height: 150px;'>
            <div class='col-md-12 text-justify'>
            <h3>История:</h3>
            <br>
               $row[long_text]
            </div>   
        </div>
        <hr class=\"my-4\" />  
        ";
         if(isset($_SESSION['id'])) echo "<div class='row'>
            <div class='col-md-2 offset-md-10'>
         <button type=\"button\" class=\"btn btn-outline-secondary \" data-toggle=\"modal\" data-target=\"#divAnswer\">Ответить</button>
         </div>";
       echo "</div>
       
       </div><br>";

if(isset($_SESSION['id'])) echo "
    <div  class=\"modal fade\" style=\"max-height: 450px;\" id=\"divAnswer\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"divTagsLabel\" aria-hidden=\"true\">';
<form method='post'>
<div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"staticBackdropLabel\">Ответ</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\" style=\"max-height: 250px;\">
        <div class=\"form-group\">

             <textarea name='answer' ' class=\"form-control\" name=\"email\" rows='8' required></textarea>
             <input type='hidden' name='id_user' value='$_SESSION[id]'>

       </div>
       </div>
      <div class=\"modal-footer\">
     
        <input type=\"submit\" class=\"btn btn-primary\"  name=\"addAnswer\" value=\"Добавить ответ\"> &nbsp
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Отмена</button>
      </div>
    </div>
  </div>
  </form>
</div>
<br>
";
$mysqli3=ConnectDB();
if (!$res3=$mysqli3->query("Call GetAnswerForPostHelp('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli2->errno . ") " . $mysqli2->error;
}
while($row3 = $res3->fetch_assoc()) {



echo "





<div class=\"row border border-secondary rounded bg-light \" style=\"min-height: 200px; \"> 
    <div class='col-md-2 my-auto mx-auto'>
        <a href='$domain/profile.php?id=$row3[id_user]'><img src=\"$row3[img_user]\" alt=\"...\" class=\"rounded-circle\"></a>
    </div>
    <div class='col-md-10'>
        <div class='row'>
            <div class='col-md-5 align-self-center'>
                $row3[data_answer] $row3[last_name] $row3[first_name] $row3[middle_name] $row3[id_status_user]
            </div>
            <div class='col-md-7 '><br>
            <form method='post'>
            <input type='hidden' name='id' value='$row3[id_answer]'>
            <div class='row'>
            
            
                <div class='col'> <input type='submit' class='form-control form-control-sm  ' value='Лайк $row3[likes]' name='like'>  </div>
              <div class='col'> <input type='submit' class='form-control form-control-sm' value='Дизлайк $row3[dislikes]' name='dislike'>    </div>
              <div class='col'> <input type='submit' class='form-control form-control-sm' value='Помогло  $row3[helping]' name='helping'>   </div>
               <div class='col'><input type='submit' class='form-control form-control-sm' value='Решило  $row3[finish]' name='finish'>   </div>
               
               </div>
             </form>  
               
            </div>
        </div><br>
        <div class='row border border-secondary rounded bg-light ' style='min-height: 100px;'>
            <div class='col-md align-self-center'>
                <div style=''>
                $row3[text_answer]
                </div>
            </div>
        </div>
    </div>
</div>
<br>

";
}



echo "</div></div>";
include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
echo '

</body>
</html>';


