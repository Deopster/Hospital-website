<!DOCTYPE html>
<?php
session_start();
require_once("connect.php");
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

//Добавить больницу
if (isset($_POST['add'])){ 
 $hsname = $_POST['hsname'];
 $hsdescription = $_POST['hsdescription'];
 $hsloc = $_POST['hsloc'];
 if (empty($hsloc)){
     $hsloc="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d577336.7622095797!2d36.825155571355864!3d55.58074819686746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54afc73d4b0c9%3A0x3d44d6cc5757cf4c!2z0JzQvtGB0LrQstCw!5e0!3m2!1sru!2sru!4v1638123126361!5m2!1sru!2sru";
 }
 $hsname = htmlspecialchars($hsname);
 $hsdescription = htmlspecialchars($hsdescription);
 $hsloc = htmlspecialchars($hsloc);
mysqli_query($link, "INSERT INTO hospitals SET Name='$hsname', description='$hsdescription', location='$hsloc'") or die(mysqli_error($link)); 
echo "<script>alert(\"Больница добавлена.\");</script>"; 
echo "<script>window.location.href='./index.php'</script>";
}

//регистрация
if (isset($_POST['Reg'])){ 
$ch=false;
 $password = $_POST['password'];
 $password1 = $_POST['password1'];
 $login = $_POST['username'];
 if (empty($login)) {
    echo "<script>alert(\"Введите пароль для авторизации\");</script>";
	$ch=true;
	}
	if($ch==false)
if (empty($password) or empty($password1) ){
    echo "<script>alert(\"введите пароль дважды\");</script>";
	$ch=true;
	}

	if($ch==false)
 if(strlen($password) > 18 or strlen($password) <4){
    echo "<script>alert(\"Пароль должен содеражить от 4 до 18 символов\");</script>"; 
	$ch=true;
	}
 $password = htmlspecialchars($password);
 $password1 = htmlspecialchars($password1);
if($ch==false)
if($password != $password1){
    echo "<script>alert(\"Пароли не совпадают\");</script>";
	$ch=true;
}
else{
if($ch==false){
mysqli_query($link, "INSERT INTO users SET Name='$login', Password='$password', Allowment='0'") or die(mysqli_error($link)); 
echo "<script>alert(\"Регистрация прошла успешно.\",$password);</script>"; 
}
}
}

//удаление
if (isset($_GET['del']))
{
    $dd = $_GET['del'];
    mysqli_query($link, "DELETE FROM hospitals WHERE  ID='$dd'") or die(mysqli_error($link)); 
}

//Авторизация 

if (isset($_POST['log'])){ 
$ch=false;
$login = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT Password,Allowment FROM users WHERE Name='$login'";
$result = mysqli_query ($link , $query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
 $try =  $elem['Password'] ; 
 $level = $elem['Allowment'] ; 
} 
if(empty($try)){
 echo "<script>alert(\"Не найдено пользователя с заданным логином.\");</script>"; 
 $ch=true;
}
if ($ch==false)
if($try != $password){
echo "<script>alert(\"Неверный пароль\");</script>"; 
$ch=true;
}

if($ch==false ){
 $_SESSION['user_id'] = "some id";
 $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
 $_SESSION["level"] = $level; 
 echo "<script>alert(\"авторизация выполнена успешно.\");</script>"; 
}
}
?>
<script type="text/javascript">
var psr =0;
function edit(ID){
    alert("ddd")
    psr = ID;
}

function DoPost(ns) {
    document.getElementById(ns).submit();
}   
</script>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Ты думал тут что-то будет?">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Поликлиники</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="hospitals.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled-11.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Поликлиники">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-5d90"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="u-image u-logo u-image-1" data-image-width="1366" data-image-height="768" title="go">
          <img src="images/Untitled-11.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Поликлиники.html" style="padding: 10px 20px;">Поликлиники</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="404.html" style="padding: 10px 20px;">Пациенты</a>
<?php
if(!empty($_SESSION['login'])){
?>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="lk.html" style="padding: 10px 20px;">ЛК</a>
<?php
}
?>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Страница-1.html" style="padding: 10px 20px;">Страница 1</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Поликлиники.html" style="padding: 10px 20px;">Поликлиники</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="404.html" style="padding: 10px 20px;">Пациенты</a>
<?php
if(!empty($_SESSION['login'])){
?>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="lk.html" style="padding: 10px 20px;">ЛК</a>
<?php
}
?>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="docs.php" style="padding: 10px 20px;">Страница 1</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-align-center u-clearfix u-gradient u-section-1" id="sec-16f1">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-accordion u-collapsed-by-default u-spacing-5 u-accordion-1">

         <!--Тут начинается акордеон-->
            <?php
	        $query = "SELECT * FROM hospitals WHERE ID > 0";
	        $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
	        $name = $elem['Name'] ;
	        $desc = $elem['description'] ;
            $loc= $elem['location'] ;
            $ID = $elem['ID'] ;
            ?>
            <div class="u-accordion-item">
            <a class="u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-light-1 u-palette-1-base u-text-active-white u-text-body-alt-color u-text-hover-white u-accordion-link-1" id="link-accordion-0781" aria-controls="accordion-0781" aria-selected="false">
              <span class="u-accordion-link-text"><?php echo $name;?></span><span class="u-accordion-link-icon u-icon u-text-white u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 612 612" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c3f2"></use></svg><svg class="u-svg-content" viewBox="0 0 612 612" x="0px" y="0px" id="svg-c3f2" style="enable-background:new 0 0 612 612;"><g><g id="_x31_0_34_"><g><path d="M604.501,134.782c-9.999-10.05-26.222-10.05-36.221,0L306.014,422.558L43.721,134.782     c-9.999-10.05-26.223-10.05-36.222,0s-9.999,26.35,0,36.399l279.103,306.241c5.331,5.357,12.422,7.652,19.386,7.296     c6.988,0.356,14.055-1.939,19.386-7.296l279.128-306.268C614.5,161.106,614.5,144.832,604.501,134.782z"></path>
</g>
</g>
</g></svg></span>
            </a>
            <div class="u-accordion-pane u-align-left u-container-style u-white u-accordion-pane-1" id="accordion-0781" aria-labelledby="link-accordion-0781">
              <div class="u-container-layout u-valign-top u-container-layout-1">
                <div class="u-clearfix u-expanded-width u-layout-wrap u-layout-wrap-1">
                  <div class="u-layout">
                    <div class="u-layout-row">
                      <div class="u-size-30">
                        <div class="u-layout-col">
                          <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-1">
                            <div class="u-container-layout u-container-layout-2">
                            <?php
                            if(!empty($_SESSION['level']))
                            if($_SESSION['level']==1 or $_SESSION['level']==2 or $_SESSION['level']==3){
                            ?>
                            <a href="index.php?del=<?php echo $ID;?>" name="nazvanie_knopki"  class="u-border-none u-btn u-button-style u-hover-palette-2-dark-1 u-palette-2-base u-btn-1"><span class="u-icon u-text-palette-3-light-3 u-icon-2"><svg class="u-svg-content" viewBox="0 0 32 32"><path d="M10,11.06q6.36.19,12.71.26a1.25,1.25,0,0,0,0-2.5l-5.32-.08a4,4,0,0,1-.19-1,1.25,1.25,0,0,0-2.5,0,6.25,6.25,0,0,0,.1,1L10,8.56C8.39,8.51,8.39,11,10,11.06Z"></path><path d="M23.4,13.21a1.24,1.24,0,0,0-1.2-.91q-5.94-.3-11.89-.25a1.18,1.18,0,0,0-1.18,1,1.25,1.25,0,0,0-.27,1.09A49.2,49.2,0,0,1,10,24.47a1.26,1.26,0,0,0,.92,1.21A52,52,0,0,0,22.65,26a1.29,1.29,0,0,0,1.25-1.25A58.26,58.26,0,0,0,23.4,13.21Zm-2,10.4a48.33,48.33,0,0,1-9-.25,54.22,54.22,0,0,0-1-8.8c3.2,0,6.41,0,9.61.2A54.52,54.52,0,0,1,21.44,23.61Z"></path><path d="M16.3,17.26c.05-1.61-2.45-1.61-2.5,0a14.91,14.91,0,0,0,.3,3.33,1.25,1.25,0,0,0,2.41-.66A11.42,11.42,0,0,1,16.3,17.26Z"></path><path d="M20,17a1.25,1.25,0,0,0-2.5,0,21.24,21.24,0,0,0,.41,3.64,1.26,1.26,0,0,0,1.54.87,1.28,1.28,0,0,0,.87-1.54A16.46,16.46,0,0,1,20,17Z"></path></svg><img></span> &nbsp; </a>
                            </a>
                            <?php
                            }
                            ?>
                              <!--<a href='javascript:edit(<?php echo $ID;?>)' name="nazvanie_knopki"  class="u-border-none u-btn u-button-style u-hover-palette-2-dark-1 u-palette-2-base u-btn-2"><span class="u-icon u-text-palette-3-light-3 u-icon-3"><svg class="u-svg-content" viewBox="0 0 64 64" style="width: 1em; height: 1em;"><g><path d="M55.736,13.636l-4.368-4.362c-0.451-0.451-1.044-0.677-1.636-0.677c-0.592,0-1.184,0.225-1.635,0.676l-3.494,3.484   l7.639,7.626l3.494-3.483C56.639,15.998,56.639,14.535,55.736,13.636z"></path><polygon points="21.922,35.396 29.562,43.023 50.607,22.017 42.967,14.39  "></polygon><polygon points="20.273,37.028 18.642,46.28 27.913,44.654  "></polygon><path d="M41.393,50.403H12.587V21.597h20.329l5.01-5H10.82c-1.779,0-3.234,1.455-3.234,3.234v32.339   c0,1.779,1.455,3.234,3.234,3.234h32.339c1.779,0,3.234-1.455,3.234-3.234V29.049l-5,4.991V50.403z"></path></g></svg><img></span> &nbsp; </a>-->
                              <div class="fr-view u-clearfix u-rich-text u-text u-text-1">
                                <p><?php echo $desc;?></p>
                              </div>
                              <?php
                              if(empty($_SESSION['login'])){
                              ?>
                              <a href="#sec-784b" class="u-btn u-btn-round u-button-style u-dialog-link u-hover-feature u-hover-palette-1-light-2 u-palette-1-base u-radius-2 u-btn-3">Выбрать врача<span class="u-icon"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg><img></span></a>
                              <?php
                              }else{
                              ?>
                              <a href="#" onclick="echojavascript:DoPost('<?php echo $ID;?>')" type="button" class="u-btn u-btn-round u-button-style u-dialog-link u-hover-feature u-hover-palette-1-light-2 u-palette-1-base u-radius-2 u-btn-3">Выбрать врача<span class="u-icon"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M506.134,241.843c-0.006-0.006-0.011-0.013-0.018-0.019l-104.504-104c-7.829-7.791-20.492-7.762-28.285,0.068 c-7.792,7.829-7.762,20.492,0.067,28.284L443.558,236H20c-11.046,0-20,8.954-20,20c0,11.046,8.954,20,20,20h423.557 l-70.162,69.824c-7.829,7.792-7.859,20.455-0.067,28.284c7.793,7.831,20.457,7.858,28.285,0.068l104.504-104 c0.006-.006,0.011-.013,0.018-.019C513.968,262.339,513.943,249.635,506.134,241.843z"></path></svg><img></span></a>
                              <form action="docs.php" name="hos" id="<?php echo $ID;?>" method="GET">
                              <input type="hidden" name="data" value="<?php echo $ID;?>">
                              </form>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="u-size-30">
                        <div class="u-layout-col">
                          <div class="u-container-style u-layout-cell u-size-60 u-layout-cell-2">
                            <div class="u-container-layout u-container-layout-3">
                              <div class="u-grey-light-2 u-hidden-xs u-map u-map-1">
                                <div class="embed-responsive">
                                  <iframe class="embed-responsive-item" src="<?php echo $loc;?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
            <!--Тут кончается-->
        </div>


        <?php
        if(!empty($_SESSION['level']))
        if($_SESSION['level']==2 or $_SESSION['level']==3){
        ?>
        <a href="#sec-784" class="u-btn u-button-style u-dialog-link u-hover-palette-1-dark-1 u-palette-1-base u-btn-4" title="Добавить больницу"><span class="u-icon"></span>&nbsp;Добавить
        </a>
        <?php
        }
        ?>
      </div>
      
    </section>

    <!--Добавить больницу-->
    <section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-5" id="sec-784">
      <div class="u-align-left u-container-style u-dialog u-shape-rectangle u-white u-dialog-1">
          <div class="u-container-layout u-valign-top u-container-layout-1">
              <div class="u-container-layout u-container-layout-2">
                  <div class="u-form u-login-control u-form-1">
                      <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                          <div class="u-form-group u-form-name">
                              <label for="hsname" class="u-label">Название больницы</label>
                              <input type="text" placeholder="Введите Название больницы" id="hsname" name="hsname" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                          </div>
                          <div class="u-form-group u-form-password">
                              <label for="hsdescription" class="u-label">Описание больницы</label>
                              <input type="text" placeholder="Введите описание больницы" id="hsdescription" name="hsdescription" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                          </div>
                          <div class="u-form-group u-form-password">
                              <label for="hsloc" class="u-label">Местоположение</label>
                              <input type="text" placeholder="Введите местоположение" id="hsloc" name="hsloc" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
                          </div>
                          <div class="u-align-right u-form-group u-form-submit">
                              <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-dark-1 u-btn-1">
                                  Добавить<br>
                              </a>
                              <input type="submit" value="submit" name="add" class="u-form-control-hidden">
                          </div>
                          <input type="hidden" value="" name="recaptchaResponse">
                      </form>
                  </div>
              </div>
          </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4f81"></use></svg><svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-4f81"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section>
    <!--Авторизация - регистрация-->
  <section class="u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-5" id="sec-784b">
      <div class="u-align-left u-container-style u-dialog u-shape-rectangle u-white u-dialog-1">
        <div class="u-container-layout u-valign-top u-container-layout-1">
          <div class="u-expanded-width u-tabs u-tabs-1">
            <ul class="u-border-2 u-border-grey-75 u-tab-list u-unstyled" role="tablist">
              <li class="u-tab-item" role="presentation">
                <a class="active u-active-white u-button-style u-hover-palette-5-base u-tab-link u-text-active-palette-1-dark-1" id="link-tab-6bea" href="#tab-6bea" role="tab" aria-controls="tab-6bea" aria-selected="true">Войти</a>
              </li>
              <li class="u-tab-item" role="presentation">
                <a class="u-active-white u-button-style u-hover-palette-5-base u-tab-link u-text-active-palette-1-dark-1" id="link-tab-58cb" href="#tab-58cb" role="tab" aria-controls="tab-58cb" aria-selected="false">Зарегистрироваться</a>
              </li>
            </ul>
            <div class="u-tab-content">
              <div class="u-container-style u-shape-rectangle u-tab-active u-tab-pane" id="tab-6bea" role="tabpanel" aria-labelledby="link-tab-6bea">
                <div class="u-container-layout u-container-layout-2">
                  <div class="u-form u-login-control u-form-1">
                    <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="username-2025" class="u-label">Имя пользователя *</label>
                        <input type="text" placeholder="Введите имя пользователя" id="username-2025" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                        <label for="password-2025" class="u-label">Пароль *</label>
                        <input type="text" placeholder="Введите пароль" id="password-2025" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-checkbox u-form-group">
                        <input type="checkbox" id="checkbox-2025" name="remember" value="On">
                        <label for="checkbox-2025" class="u-label">Запомнить</label>
                      </div>
                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-dark-1 u-btn-1">Войти<br>
                        </a>
                        <input type="submit" value="submit" name="log" class="u-form-control-hidden">
                      </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                </div>
              </div>
              <div class="u-align-left u-container-style u-shape-rectangle u-tab-pane" id="tab-58cb" role="tabpanel" aria-labelledby="link-tab-58cb">
                <div class="u-container-layout u-container-layout-3">
                  <div class="u-form u-login-control u-form-2">
                    <form action="#" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-0 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;">
                      <div class="u-form-group u-form-name">
                        <label for="username-2025" class="u-label">Имя пользователя *</label>
                        <input type="text" placeholder="Введите имя пользователя" id="username-2025" name="username" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                        <label for="password-2025" class="u-label">Пароль *</label>
                        <input type="text" placeholder="Введите пароль" id="password-2025" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>
                      <div class="u-form-group u-form-password">
                          <label for="password-2026" class="u-label">Повторите пароль *</label>
                          <input type="text" placeholder="Введите пароль" id="password-2026" name="password1" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
                      </div>                
                      <div class="u-align-right u-form-group u-form-submit">
                        <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-palette-1-dark-1 u-btn-2">Зарегистрироваться<br>
                        </a>
                        <input type="submit" value="submit" name="Reg" class="u-form-control-hidden">
                      </div>
                      <input type="hidden" value="" name="recaptchaResponse">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><button class="u-dialog-close-button u-icon u-text-grey-40 u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-4f81"></use></svg><svg class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-4f81"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section><style> .u-section-5 {
  min-height: 938px;
}

.u-section-5 .u-dialog-1 {
  width: 626px;
  min-height: 330px;
  margin: 297px auto 60px;
}

.u-section-5 .u-container-layout-1 {
  padding: 0 10px;
}

.u-section-5 .u-tabs-1 {
  min-height: 316px;
  margin-top: 0;
  margin-bottom: 0;
  height: auto;
}

.u-section-5 .u-container-layout-2 {
  padding: 13px 8px 0;
}

.u-section-5 .u-form-1 {
  height: 285px;
  width: 570px;
  margin: 1px auto 0;
}

.u-section-5 .u-btn-1 {
  background-image: none;
  border-style: none;
}

.u-section-5 .u-container-layout-3 {
  padding: 0 18px;
}

.u-section-5 .u-form-2 {
  height: 255px;
  width: 570px;
  margin: 14px 0 -22px;
}

.u-section-5 .u-btn-2 {
  background-image: none;
  border-style: none;
}

.u-section-5 .u-icon-1 {
  width: 20px;
  height: 20px;
  left: auto;
  top: 12px;
  right: 18px;
  position: absolute;
}

@media (max-width: 1199px) {
  .u-section-5 .u-dialog-1 {
    height: auto;
  }
}

@media (max-width: 767px) {
  .u-section-5 .u-dialog-1 {
    width: 540px;
  }

  .u-section-5 .u-form-1 {
    width: 504px;
  }

  .u-section-5 .u-container-layout-3 {
    padding-left: 10px;
    padding-right: 10px;
  }

  .u-section-5 .u-form-2 {
    width: 500px;
  }
}

@media (max-width: 575px) {
  .u-section-5 .u-dialog-1 {
    width: 340px;
    margin-top: 348px;
  }

  .u-section-5 .u-form-1 {
    width: 304px;
  }

  .u-section-5 .u-form-2 {
    width: 300px;
  }

  .u-section-5 .u-icon-1 {
    top: 13px;
  }
}</style></body>
</html>