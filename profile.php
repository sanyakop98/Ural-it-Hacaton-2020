<?php
echo '<!doctype html>
<html lang="ru">
  <head>';
include ('config/meta.php');
echo "<style>
        .form-width {max-width: 25rem;}
        .has-float-label {
            position: relative;
        }
        .has-float-label label {
            position: absolute;
            left: 0;
            top: 0;
            cursor: text;
            font-size: 75%;
            opacity: 1;
            top: -.5em;
            left: 0.75rem;
            z-index: 3;
            line-height: 1;
            padding: 0 1px; }
        .has-float-label label::after {
            content: \" \";
            display: block;
            position: absolute;
            background: white;
            height: 2px;
            top: 50%;
            left: -.2em;
            right: -.2em;
            z-index: -1; }
        .has-float-label .form-control::-webkit-input-placeholder{
            opacity: 1;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -o-transition: all .2s;
            -ms-transition: all .2s;
            transition: all .2s;
        }
        .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
            opacity: 0; }

        .input-group .has-float-label {
            display: table-cell; }
        .input-group .has-float-label .form-control {
            border-radius: 0.25rem; }
        .input-group .has-float-label:not(:last-child) .form-control {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0; }
        .input-group .has-float-label:not(:first-child) .form-control {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            margin-left: -1px; }
    </style>";
echo '<script src="https://code.jquery.com/jquery-latest.js"></script>
    <script>
        var countTags=0;
        var added = [];
        added[0]=-1;
        function changeFind(){
            var obj = document.getElementById("findTags");
            var str = obj.value;     
           
            $.ajax({
                type: "POST",
                url: "findTagsForAddPostHelp.php",
                data: {str:str,added:added}
            }).done(function( result )
            {

                $("#tagsFind").html( result );
            });
        }
        function addTag(obj){
            obj.disabled=true;
            
            var tags = document.getElementById("tags");
            var span = document.createElement("span");
            span.className="badge badge-pill badge-primary";
            span.innerText=obj.value;
            tags.appendChild(span);
            var input=document.createElement("input");
            input.type="hidden";
            input.name="tags["+countTags+"]";
            input.value=obj.id;
            tags.appendChild(input);
            added[countTags]=obj.id;
            countTags++;
            obj.innerText="Добавлено";
            
            
        }
        
    </script>';
echo '</head>
<body>';
include ("config/header.php");
/*
$mysqli = ConnectDB();
if (!$res=$mysqli->query("Call GetPostHelpFromId('$_GET[id]')")) {
    echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
}
$row = $res->fetch_assoc();
*/

function insert_base64_encoded_image($img, $echo = false){
    $imageSize = getimagesize($img);
    $imageData = base64_encode(file_get_contents($img));
    $imageHTML = "<img src='data:{$imageSize['mime']};base64,{$imageData}' {$imageSize[3]} />";
    if($echo == true){
        echo $imageHTML;
    } else {
        return $imageHTML;
    }
}


function insert_base64_encoded_image_src($img, $echo = false){
    $imageSize = getimagesize($img);
    $imageData = base64_encode(file_get_contents($img));
    $imageSrc = "data:{$imageSize['mime']};base64,{$imageData}";
    if($echo == true){
        echo $imageSrc;
    } else {
        return $imageSrc;
    }
}
if(isset($_POST['changeImg'])){
    $img=insert_base64_encoded_image_src($_FILES['file']['tmp_name']);
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Update user set img_user='$img' Where user.id=$_SESSION[id]")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    updateInf();
}

if(isset($_POST['changeStatus'])){

    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Update user set id_status_user='$_POST[status]' Where user.id=$_SESSION[id]")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    updateInf();
}

if(isset($_GET['id'])){
    $mysqli = ConnectDB();

    if (!$res=$mysqli->query("Call GetUserFromId('$_GET[id]')")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    $row=$res->fetch_assoc();

    echo "
    <div class=\"container\">
    <div class=\"form-control\">
    <div class='row'>
    <div class='col-md-12'>
        <div class=\"page-header\">
            <h1 class=\"page-title\">Профиль</h1>
            <small> <i class=\"fa fa-clock-o\"></i> Последний раз был в сети: <time>Sunday, October 05, 2014</time></small>
        </div>
    </div>    
    </div>    
    <br>
        <div class=\"row\">
                                <div class=\"col-md-2\">
                                    <figure>
                                        <img class=\"img-circle img-responsive\" alt=\"\" src=\"$row[img_user]\">
                                    </figure>
                                </div>

                                <div class=\"col-md-4\">
                                    <ul class=\"list-group\">
                                        <li class=\"list-group-item\">$row[last_name] $row[first_name] $row[middle_name]</li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-phone\"></i> $row[number] </li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-envelope\"></i> $row[email]</li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-envelope\"></i> $_SESSION[id_status_user]</li>
                                    </ul>
                                </div> 
                                <div class='col-md-4'>
                                <iframe src='https://promo-money.ru/quickpay/shop-widget?writer=seller&targets=%D0%94%D0%BE%D0%B1%D1%80%D0%BE%D0%B2%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5%20%D0%BF%D0%BE%D0%B6%D0%B5%D1%80%D1%82%D0%B2%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5&targets-hint=&default-sum=&button-text=14&payment-type-choice=on&mobile-payment-type-choice=on&hint=&successURL=&quickpay=shop&account=410014374670062' width='100%' height='223' frameborder='0' allowtransparency='true' scrolling='no'></iframe>
                                </div>
                                    
                                </div>
        </div>
        

 </div>
</div>
    ";
}
else {
    $mysqli4 = ConnectDB();

    if (!$res4=$mysqli4->query("Select * From status_user")) {
        echo "Не удалось вызвать хранимую процедуру: (" . $mysqli4->errno . ") " . $mysqli4->error;
    }


    echo "

<br>
<div>
<div class=\"container\">
    <div class=\"form-control\">
    <div class='row'>
    <div class='col-md-12'>
        <div class=\"page-header\">
            <h1 class=\"page-title\">Профиль</h1>
            <small> <i class=\"fa fa-clock-o\"></i> Последний раз был в сети: <time>Sunday, October 05, 2014</time></small>
        </div>
    </div>    
    </div>    
    <br>
        <div class=\"row\">
                                <div class=\"col-md-2\">
                                    <figure>
                                        <img class=\"img-circle img-responsive\" alt=\"\" src=\"$_SESSION[img_user]\">
                                    </figure>
                                </div>

                                <div class=\"col-md-4\">
                                    <ul class=\"list-group\">
                                        <li class=\"list-group-item\">$_SESSION[last_name] $_SESSION[first_name] $_SESSION[middle_name]</li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-phone\"></i> $_SESSION[number] </li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-envelope\"></i> $_SESSION[email]</li>
                                        <li class=\"list-group-item\"><i class=\"fa fa-envelope\"></i> $_SESSION[id_status_user]</li>
                                    </ul>
                                </div> 
                                
                                <div class='col-md-3 '>
                                    <form class='form-control'  enctype=\"multipart/form-data\" method='post' action='profile.php'>
                                    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"300000\" />
                                    
                                    <div class=\"form-group has-float-label\">
                                                 <input class=\"form-control\" accept='image/*' id=\"img\" type=\"file\" required=\"\" placeholder=\"Изображение\" name='file'/>
                                        <label for=\"img\">Изменить аватар</label>
                                        
                                    </div>
                                    <input class='btn btn-block btn-primary' type='submit' name='changeImg' value='Изменить аватар'>    
                                    
                                    </form>
                                    
                                    <form class='form-control'   method='post' action='profile.php'>
                                    
                                    
                                    <div class=\"form-group has-float-label\">
                                                 <select class='form-control' id='status' name='status'>";
                                                echo "<option disabled selected value>--</option>";
                                                 while ($row4=$res4->fetch_assoc()){
                                                     echo "<option name='status_id' value='$row4[name]'>$row4[name]</option>";
                                                 }
                                                 echo "</select>
                                                 
                                        <label for=\"status\">Изменить статус</label>
                                        
                                    </div>
                                    <input class='btn btn-block btn-primary' type='submit' name='changeStatus' value='Изменить статус'>    
                                    
                                    </form>
                                    
                                </div>
                                
                                <div class='col-md-3 '>
                                    <div class=\"form-group has-float-label\">
                                         <button class=\"form-control\"  required=\"\" data-toggle=\"modal\" data-target=\"#divTags\">Добавить тег</button>
                                     <br>
                                                <div id='tags'>

                                                        </div>
                                                                    <br>
                                      <label for=\"tags\">Теги</label>
                                    </div>
                                    
                                </div>
        </div>
        

 </div>
</div>
<div  class=\"modal fade\"  id=\"divTags\" data-backdrop=\"static\" data-keyboard=\"false\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"divTagsLabel\" aria-hidden=\"true\">';
<div class=\"modal-dialog\">
    <div class=\"modal-content\" style=\"max-height: 700px;\">
      <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"divTagsLabel\">Добавить тег</h5>
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
      </div>
      <div class=\"modal-body\" style=\"\">
        <div class=\"form-group\">
             <label for=\"exampleInputEmail1\">Поиск тегов </label>
             <input type=\"text\" class=\"form-control\" id='findTags' oninput='changeFind();'>
             <small id=\"emailHelp\" class=\"form-text text-muted\"> </small>
        <div id='tagsFind' style=\"max-height: 400px; 
  height: 400px;
  overflow: auto;\">
  
        </div>

       </div>
       </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Завершить</button>
      </div>
    </div>
  </div>
</div>
</div>

";
}
/*echo "<div class=\"container1\">
        <div class=\"form-control\">
            <div class=\"row\" style=\"min-height: 100px; \">
            <div class='col-md-1' style='text-align: center;' ></div>
                <div class='col-md-2' >
                    <br>
                    <figure style=\" marign: 0 auto; center; width: 100px; height: 100px\">
                         <img class=\"img-circle img-responsive\" alt=\"\" src=\"assets/images/1.png\">
                    </figure>

                    <br>
                </div>


                <div class='col-md-4'>
                    <div class='row'>
                        <div class='col'>
                            <br>
                            <h4>Сгорел дом</h4>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='col'>
                            <br>
                            <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                            <span class=\"badge badge-pill badge-primary\">Жилищная</span>
                        </div>
                    </div>
                </div>

                <div class='col-md-5'>
                     <div class='row' style='min-height: 150px;'>
                        <div class='col-md-12 text-justify'>
                            <br><br>
                            <h3>Описание:</h3>
                            <br>
                            У меня сгорел дом. Негде жить
                        </div>
                    </div>

                    <div class='row justify-content-end'>
                        <div class='col-5 '>
                            <a href='' type=\"button\" class=\"btn btn-outline-secondary\" >Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";*/
  include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
  include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
?>
</body>
</html>