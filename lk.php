<!DOCTYPE html>
<?php
require_once("connect.php");
session_start();
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
$pieces = explode(" ", $_SESSION["login"]);
$name=$pieces[0];
if (empty($pieces[1])){
$pieces[1]='Отсутствует';
}
$FIO=$pieces[1];
$USER_ID =$_SESSION["ID"];
if (isset($_GET['exe']))
{
   $_SESSION["ID"]=null;
   $_SESSION["login"]=null;
   $_SESSION["level"] = null; 
   echo "<script>window.location.href='./index.php'</script>";
}
?>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Имя, Фамилия">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>lk</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="lk.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="личный кабинет">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled-11.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="lk">
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
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Поликлиники</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="lk.php" style="padding: 10px 20px;">ЛК</a>
</li></ul>
        <?php
        if(!empty($_SESSION['level']))
        if($_SESSION['level']==3){
        ?>
        </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="admin.php" style="padding: 10px 20px;">Админ панель</a>
        <?php
        }
        ?>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php" style="padding: 10px 20px;">Поликлиники</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="lk.php" style="padding: 10px 20px;">ЛК</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-gradient u-section-1" id="sec-1a55">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-expanded-width u-layout-wrap u-palette-1-light-2 u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-26 u-layout-cell-1">
                <div class="u-container-layout u-valign-bottom u-container-layout-1">
                  <div class="u-image u-image-circle u-preserve-proportions u-image-1" alt="" data-image-width="800" data-image-height="800"></div>
                  <a href="lk.php?exe=t" class="u-btn u-btn-round u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-radius-50 u-btn-1">выйти</a>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-34 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-text u-text-1"><?php echo $name;?></h1>
                  <h1 class="u-text u-text-2"><?php echo $FIO;?></h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-center u-clearfix u-gradient u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-expanded-width u-table u-table-responsive u-table-1">
           <table class="u-table-entity u-table-entity-1">
              <?php
              $query = "SELECT * FROM records WHERE USER_ID ='$USER_ID'";
	            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
	            $result .= '<tr>'; 
                $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell">' . $elem['Name'] . '</td>';
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell">' . $elem['hospital'] . '</td>';
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell">' . $elem['D_name'] . '</td>';
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell">' . $elem['D_prof'] . '</td>'; 
              } 
              echo $result;
              ?>
             </table>
          </div>
      </div>
    </section>
  </body>
</html>