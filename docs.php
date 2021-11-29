<!DOCTYPE html>
<?php
require_once("connect.php");
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
if (isset($_GET['add']))
{
    $dd = $_GET['del'];
    mysqli_query($link, "DELETE FROM hospitals WHERE  ID='$dd'") or die(mysqli_error($link));
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
    <meta name="generator" content="Nicepage 3.30.2, nicepage.com">
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
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Поликлиники.html" style="padding: 10px 20px;">Поликлиники</a>
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
	                $query = "SELECT * FROM hospitals WHERE ID > 0";
	                $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	                for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
	                $name = $elem['Name'] ;
	                $desc = $elem['description'] ;
                    $loc= $elem['location'] ;
                    $ID = $elem['ID'] ;
                    ?>
                    <div class="u-container-style u-list-item u-repeater-item">
                        <div class="u-container-layout u-similar-container u-container-layout-1">
                            <div class="u-container-style u-group u-palette-1-light-1 u-shape-rectangle u-group-1">
                                <div class="u-container-layout u-container-layout-2">
                                    <h2 class="u-text u-text-1">Александр Невский</h2>
                                    <a href="https://nicepage.com/css-templates" class="u-btn u-button-style u-hover-palette-3-base u-palette-2-base u-btn-1">
                                        <span class="u-icon u-icon-1">
                                            <svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;">
                                                <g>
                                                    <g>
                                                        <path d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216    v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"></path>
                                                    </g>
                                                </g>
                                            </svg><img>
                                        </span>
                                    </a>
                                    <h4 class="u-text u-text-2">Терапевт</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--конец блока-->
                </div>
            </div>
            <a href="https://nicepage.com/c/art-design-html-templates" class="u-btn u-button-style u-hover-palette-1-dark-1 u-palette-1-base u-btn-5">Добавить</a>
        </div>
    </section>




    <section class="u-backlink u-clearfix u-grey-80">
        <a class="u-link" href="https://nicepage.com/landing-page" target="_blank">
            <span>Free Landing Page</span>
        </a>
        <p class="u-text">
            <span>created with</span>
        </p>
        <a class="u-link" href="" target="_blank">
            <span>WYSIWYG Web Builder</span>
        </a>.
    </section>
</body>
</html>