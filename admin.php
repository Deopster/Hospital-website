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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
 var i;
 var j;
 var tb;


//тут остальное
//val содержит то,что хранится в ячейке
$(function () {
	$('td').click(function (e) {
		var t = e.target || e.srcElement;
		let cell = e.target;
	    if (cell.tagName.toLowerCase() != 'td')
		return;
	    i = cell.parentNode.rowIndex;
	    j = cell.cellIndex-1;
	    console.log(i, j);
		var elm_name = t.tagName.toLowerCase();

		var elm_name_class = t.id;
        tb=elm_name_class;
		if ((elm_name == 'input') || (elm_name_class == 'trig')) { return false; }
        console.log(elm_name_class);
		var val = $(this).html()	
		var code = '<input type="char" onfocus="this.setSelectionRange(this.value.length,this.value.length);" textAlign="right" class="editthis" id="edit" value="' + val + '" />';
		
		$(this).empty().append(code);
		$('#edit').focus();
		$('#edit').blur(function () {
		var val = $(this).val();
		$(this).parent().empty().html(val);
		send(val,elm_name_class);
		});
	});
});
</script>
<script>
function send(val,p){
    var rno =p;
	alert(rno+ " "+ val);
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {fn:val, fr:rno}
    }).done(function( result )
        {
            $("#msg").html( " Address of Roll no " +rno +" is "+result );
        });
}
</script>
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
    <section class="u-align-center u-clearfix u-gradient u-section-2">
      <div class="u-clearfix u-sheet u-sheet-1">
          <div class="u-expanded-width u-table u-table-responsive u-table-1">
           <table class="u-table-entity u-table-entity-1">
              <?php
              $query = "SELECT * FROM users WHERE ID >0";
	            $result = mysqli_query($GLOBALS['link'], $query) or die(mysqli_error($link));
	            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row); $result = ''; foreach ($data as $elem) { 
	            $result .= '<tr>'; 
                $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id=" trig">' . $elem['ID'] . '</td>';
                $id=$elem['ID'];
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id="'.$id.' Name"">' . $elem['Name'] . '</td>';
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id="'.$id.' Password"">' . $elem['Password'] . '</td>';
	            $result .= '<td class="u-border-1 u-border-grey-30 u-table-cell" id="'.$id.'  Allowment"">' . $elem['Allowment'] . '</td>'; 
              } 
              echo $result;
              ?>
             </table>
          </div>
      </div>
    </section>
  </body>
</html>