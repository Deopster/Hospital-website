<!DOCTYPE html>
<?php
session_start();
require_once("connect.php");
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
if (isset($_GET['add']))
{
    $dd = $_GET['del'];
    mysqli_query($link, "DELETE FROM hospitals WHERE  ID='$dd'") or die(mysqli_error($link));
}
if (isset($_GET['data']))
{
    $ID = $_GET['data'];
}

if (isset($_REQUEST['FIO']))
{
    $FIO=$_REQUEST['FIO'];
    $spec=$_REQUEST['spec'];
    mysqli_query($link, "INSERT INTO doctors SET Name='$FIO', Prof='$spec', hospital='$ID'") or die(mysqli_error($link));
}
if (isset($_REQUEST['D_name']))
{
     $ls=true;
     $query = "SELECT * FROM hospitals WHERE ID = '$ID'";
	                $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
	                $HOSname = $elem['Name'] ;
                    }
    $D_FIO=$_REQUEST['D_name'];
    $D_spec=$_REQUEST['D_prof'];
    $Username=$_SESSION["login"];
    $USER_ID =$_SESSION["ID"];
    $query = "SELECT * FROM records WHERE USER_ID = '$USER_ID'";
	                $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
                    if ($D_FIO==$elem['D_name']){
                         mysqli_query($link, "DELETE FROM records WHERE USER_ID = '$USER_ID' AND D_name='$D_FIO'") or die(mysqli_error($link)); 
                         $ls=false;
                    }
                    }
    if($ls==true){            
        mysqli_query($link, "INSERT INTO records SET Name='$Username',hospital='$HOSname', D_prof='$D_spec',D_name='$D_FIO',USER_ID='$USER_ID' ") or die(mysqli_error($link));
    }
}
?>
<html style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Александр Невский">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Страница 1</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
    <link rel="stylesheet" href="Страница-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Доктора">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">



    <script type="application/ld+json">        {
                "@context": "http://schema.org",
                "@type": "Organization",
                "name": "",
                "logo": "images/Untitled-11.png"
        }</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Страница 1">
    <meta property="og:type" content="website">

    <script type="text/javascript">
    function DoPost() {
        document.getElementById("ff").submit();
    }
    function DoPost2(ns) {
        document.getElementById(ns).submit();
    }   
    </script>
</head>
<body class="u-body">
    <header class="u-clearfix u-header u-header" id="sec-5d90">
        <div class="u-clearfix u-sheet u-sheet-1">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="u-image u-logo u-image-1" data-image-width="1366" data-image-height="768" title="go">
                <img src="images/Untitled-11.png" class="u-logo-image u-logo-image-1">
            </a>
            <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
                    <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs>
                                <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                                    <rect y="1" width="16" height="2"></rect>
                                    <rect y="7" width="16" height="2"></rect>
                                    <rect y="13" width="16" height="2"></rect>
                                </symbol>
                            </defs>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-unstyled u-nav-1">
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Поликлиники</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="404.html" style="padding: 10px 20px;">Пациенты</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="lk.html" style="padding: 10px 20px;">ЛК</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="Поликлиники.html" style="padding: 10px 20px;">Поликлиники</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="404.html" style="padding: 10px 20px;">Пациенты</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="lk.html" style="padding: 10px 20px;">ЛК</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
        </div>
    </header>
    <section class="u-clearfix u-gradient u-section-1" id="sec-54ea">
        <div class="u-align-left u-clearfix u-sheet u-sheet-1">
            <div class="u-expanded-width u-list u-list-1">
                <div class="u-repeater u-repeater-1">
                    <!--Начало блока-->
                    <?php
	                $quer = "SELECT * FROM doctors WHERE hospital = '$ID'";
	                $resul = mysqli_query($GLOBALS['link'], $quer) or die(mysqli_error($link));
	                for ($dat = []; $ro = mysqli_fetch_assoc($resul); $dat[] = $ro); $resul = ''; foreach ($dat as $ele) { 
	                $name = $ele['Name'] ;
	                $prof = $ele['Prof'] ;
                    $ID_d = $ele['ID'] ;
                    $USER_ID =$_SESSION["ID"];
                    $svg='<svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><g><g><path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216    v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"></path></g></g></svg><img>';
                    $col='#db545a';
                    $query = "SELECT * FROM records WHERE USER_ID = '$USER_ID'";
	                $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
                    if ($name==$elem['D_name']){
                         $svg='<svg class="u-svg-content" viewBox="0 0 18 15" style="width: 1em; height: 1em;"><desc></desc><defs></defs><g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1"><g fill="currentColor" id="Core" transform="translate(-423.000000, -47.000000)"><g id="check" transform="translate(423.000000, 47.500000)"><path d="M6,10.2 L1.8,6 L0.4,7.4 L6,13 L18,1 L16.6,-0.4 L6,10.2 Z" id="Shape"></path></g></g></g></svg><img>';
                         $col='#32CD32';
                    }
                    }
                    ?>
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                            <div class="u-container-style u-group u-palette-1-light-1 u-shape-rectangle u-group-1">
                                <div class="u-container-layout u-container-layout-2">
                                <form action="#" method="POST" id="<?php echo $name;?>" >
                                    <h2 class="u-text u-text-1"><?php echo $name;?></h2>
                                    <a href="#" onclick="echojavascript:DoPost2('<?php echo $name;?>')" class="u-btn u-button-style u-hover-palette-3-base u-palette-2-base u-btn-1" style="background-color: <?php echo $col;?> !important;">
                                        <span class="u-icon u-icon-1">
                                        <?php echo $svg;?>
                                        </span>
                                    </a>
                                    <h4 class="u-text u-text-2"><?php echo $prof;?></h4>
                                    <input form="<?php echo $name;?>" type="hidden" name="data" value="<?php echo $ID;?>">
                                    <input form="<?php echo $name;?>" type="hidden" name="D_prof" value="<?php echo $prof;?>">
                                    <input form="<?php echo $name;?>" type="hidden"  name="D_name" value="<?php echo $name;?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
	                }
                    if($_SESSION['level']==2 or $_SESSION['level']==3){
                    ?>
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                            <div class="u-container-style u-group u-palette-1-light-1 u-shape-rectangle u-group-1">
                                <div class="u-container-layout u-container-layout-2">
                                <form action="#" method="POST" id="ff" name="add">
                                    <input style="width: 20em;margin-top: 1em;" type="text" placeholder="ФИО" id="hsdescription" name="FIO" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"  required="">
                                    <a onclick="echojavascript:DoPost()" href="#" name="add" class="u-btn u-button-style u-hover-palette-3-base u-palette-2-base u-btn-1">Добавить
                                        <span class="u-icon u-icon-1">
                                            <svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 0.1em; height: 1em;">
                                                
                                            </svg><img>
                                        </span>
                                    </a>
                                    <div class="u-align-right u-form-group u-form-submit">
                                  </div>
                                  <input type="text" placeholder="Специальность" style="width: 10em;height: 1.2em;" id="hsdescription" name="spec" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"  required="">
                                  <input type="hidden" name="data" value="<?php echo $ID;?>">
                                 </form>
                                 </div>
                            </div>
                        </div>
                    </div>
                     <?php
	                }
                    ?>
                    <!--конец блока-->
                </div>
            </div>
        </div>
    </section>
</body>
</html>