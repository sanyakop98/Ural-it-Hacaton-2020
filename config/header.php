<?php
include ("includes.php");

    echo "<section class=\"menu menu1 cid-seWd3j89WE\" once=\"menu\" id=\"menu1-0\">
    

    <nav class=\"navbar navbar-dropdown navbar-fixed-top navbar-expand-lg\">
        <div class=\"container\">
            <div class=\"navbar-brand\">
                
                <span class=\"navbar-caption-wrap\"><a class=\"navbar-caption text-black display-7\" href=\"$domain\">ВМЕСТЕПРОЩЕ.РФ</a></span>
            </div>
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarNavAltMarkup\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <div class=\"hamburger\">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                <ul class=\"navbar-nav nav-dropdown nav-right\" data-app-modern-menu=\"true\">
                    <li class=\"nav-item\"><a class=\"nav-link link text-black display-4\" href=\"$domain/post_help.php\">Помощь</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link link text-black display-4\" href=\"services.php\">Услуги</a></li>
                    <li class=\"nav-item\"><a class=\"nav-link link text-black display-4\" href=\"funny.php\">Развлечения</a></li>
                    
                    ";

if (!isset($_SESSION['email'])) {

    echo "
<li class=\"nav-item\">
<a class=\"nav-link link text-black display-4\" href=\"#\" data-toggle=\"modal\" data-target=\"#staticBackdrop\"\">Вход<span class=\"sr-only\">(current)</span></a>
</li>
";
} else
    echo "
                
                </ul>
                <div class=\"dropdown show\">
  <a class=\"nav-link link text-black display-4 \" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    Приветсвуем! $_SESSION[first_name]<span class=\"sr-only\">(current)</span>
  </a>

  <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">
    <a class=\"dropdown-item\" href=\"$domain/profile.php\">Личный кабинет</a>
    <a class=\"dropdown-item\" href=\"#\">Сообщения</a>
    <a class=\"dropdown-item\" href=\"$domain/add_post_help.php\">Добавить просьбу о помощи</a>
    <a class=\"dropdown-item\" href=\"$domain/config/exit.php\">Выход</a>
  </div>
</div>
            
              ";

    echo "
            </div>
        </div>
    </nav>
    
</section>
";


echo '
<form method="post" action="index.php"  >
<div class="modal fade" style="max-height: 400px;" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">';
if((isset($_SESSION['badlogin']))&&($_SESSION['badlogin'])){  echo "onload='alert(1);' "; };
echo '>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Вход</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: 220px;">
        <div class="form-group">
             <label for="exampleInputEmail1">Логин или Email </label>
             <input type="text" class="form-control" name="email" required>
             <small id="emailHelp" class="form-text text-muted"> </small>
        
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" name="pass" required>
       </div>';
if((isset($_SESSION['badlogin']))&&($_SESSION['badlogin'])) {
    echo '<div class="form-group">
           Неверный Логин или пароль
       </div>';

}
    echo '</div>
      <div class="modal-footer">
     
        <input type="submit" class="btn btn-primary"  name="login" value="Войти"> &nbsp
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
      </div>
    </div>
  </div>
</div>
</form>';


if((isset($_SESSION['badlogin']))&&($_SESSION['badlogin'])) {
    $_SESSION['badlogin']=false;
    echo '<script type="text/javascript">
    window.onload = function(){
     $("#staticBackdrop").modal("show");
    }
</script>';
}
?>