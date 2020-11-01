<?php

echo '<!doctype html>
<html lang="ru">
  <head>';
    include ('config/meta.php');
echo ' </head>
  <body>';
include ("config/header.php"); //На каждой стр прописывать, так здесь подключаются конфиги с константами и функциями, запуск сессии

echo "
<section class=\"header6 cid-seWf9PxM3l mbr-fullscreen mbr-parallax-background\" id=\"header6-7\">

    

    <div class=\"mbr-overlay\" style=\"opacity: 0.2; background-color: rgb(68, 121, 217);\"></div>

    <div class=\"align-center container\">
        <div class=\"row justify-content-center\">
            <div class=\"col-12 col-lg-10\">
                <h1 class=\"mbr-section-title mbr-fonts-style mbr-white mb-3 display-1\"><strong>ВМЕСТЕ ПРОЩЕ</strong></h1>
                
                <p class=\"mbr-text mbr-white mbr-fonts-style display-7\">
                    Данный портал создан в помощь людям с ОВЗ, которые в любую минуту могут оказаться в сложной жизненной ситуации и нуждаться в помощи. Данный портал готов оказать услуги разного плана и обеспечить достойную коммуникационную сеть с другими людьми.</p>
                <div class=\"mbr-section-btn mt-3\"><a class=\"btn btn-danger display-4\" href=\"$domain/register.php\">Регистрация</a></div>
            </div>
        </div>
    </div>
</section>

<section class=\"features4 cid-seWekEiNnn\" id=\"features4-6\">
    
    <div class=\"mbr-overlay\"></div>
    <div class=\"container\">
        <div class=\"mbr-section-head\">
            <h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>Разделы</strong></h4>
            
        </div>
        <div class=\"row mt-4\">
            <div class=\"item features-image сol-12 col-md-6 col-lg-4\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"assets/images/mbr.jpg\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Помощь</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Сделай добро</h6>
                        <p class=\"mbr-text mbr-fonts-style mt-3 display-7\">Люди с ОВЗ могут нуждаться в твоей помощи. Прочти их историю и помоги сделать их жизнь светлее.</p>
                    </div>
                    <div class=\"mbr-section-btn item-footer mt-2\"><a href=\"post_help.php\" class=\"btn item-btn btn-black display-7\" target=\"_blank\">Подробнее &gt;</a></div>
                </div>
            </div>
            <div class=\"item features-image сol-12 col-md-6 col-lg-4\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"assets/images/Rabochiy_stol/usl.jpg\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Услуги</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Обо всём</h6>
                        <p class=\"mbr-text mbr-fonts-style mt-3 display-7\">Предоставление услуг в разных сферах жизни.</p>
                    </div>
                    <div class=\"mbr-section-btn item-footer mt-2\"><a href=\"services.php\" class=\"btn item-btn btn-black display-7\" target=\"_blank\">Подробнее &gt;</a></div>
                </div>
            </div>
            <div class=\"item features-image сol-12 col-md-6 col-lg-4\">
                <div class=\"item-wrapper\">
                    <div class=\"item-img\">
                        <img src=\"assets/images/Rabochiy_stol/ob.jpg\" alt=\"\" title=\"\">
                    </div>
                    <div class=\"item-content\">
                        <h5 class=\"item-title mbr-fonts-style display-5\"><strong>Развлечения</strong></h5>
                        <h6 class=\"item-subtitle mbr-fonts-style mt-1 display-7\">Вырази свои эмоции</h6>
                        <p class=\"mbr-text mbr-fonts-style mt-3 display-7\">Общайся, делись новостями, творчеством и чувствами с другими.&nbsp;<br></p>
                    </div>
                    <div class=\"mbr-section-btn item-footer mt-2\"><a href=\"funny.php\" class=\"btn item-btn btn-black display-7\" target=\"_blank\">Подробнее &gt;</a></div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class=\"clients1 cid-seWdRIN3yW\" id=\"clients1-4\">
    
    <div class=\"images-container container\">
        <div class=\"mbr-section-head\">
            
            <h4 class=\"mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-2 display-5\">Наши Партнёры</h4>
            
        </div>
        <div class=\"row justify-content-center mt-4\">
            <div class=\"col-md-3 card\">
                <a href='https://rsv.ru/'><img src=\"assets/images/Partnery/1.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='http://shgpi.edu.ru/'><img src=\"assets/images/Partnery/2.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.sberbank.ru/ru/person/'><img src=\"assets/images/Partnery/3.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.pochta.ru/'><img src=\"assets/images/Partnery/4.png\" alt=\"\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://moscow.rt.ru/'><img src=\"assets/images/Partnery/5.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://www.rosatom.ru/'><img src=\"assets/images/Partnery/6.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='http://samag.ru/'><img src=\"assets/images/Partnery/7.png\"></a>
            </div>
            <div class=\"col-md-3 card\">
                <a href='https://itcluster71.ru/'><img src=\"assets/images/Partnery/8.png\"></a>
            </div>
        </div>
    </div>
</section>";//Тело страницы





include ("config/footer.php"); //Подлючение подвала на каждой стр прописывать
include ("config/bootstrap.php"); // Подключение bootstap на каждой стр такая штука в конце прописывать на каждой стр
  echo '

</body>
</html>';
