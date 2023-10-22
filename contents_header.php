
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- 메타 데이터 -->
<title>JS_LOVE</title>
<meta name="description" content="" />
<meta name="author" content="YoonHD" />


<link href="/JS_LOVE/css/bootstrap.min.css" rel="stylesheet">

<link href="/JS_LOVE/css/datepicker3.css" rel="stylesheet">
<link href="/JS_LOVE/css/styles.css" rel="stylesheet">


<link href="/JS_LOVE/css/bootstrap-table.css" rel="stylesheet">
<link href="/JS_LOVE/css/bootstrap-table.css" rel="stylesheet">

<script src="/JS_LOVE/js/lumino.glyphs.js"></script>

<script type="text/javascript" src="/JS_LOVE/js/loader.js"></script>


<meta property="og:type" content="website">
<meta property="og:url" content="http://3.36.83.6/JS_LOVE/">
<meta property="og:title" content="임사장님!!!!">
<meta property="og:image" content="https://dispatch.cdnser.be/cms-content/uploads/2019/12/01/7e488e45-364e-4a4b-bb68-fa4a7f430af2.jpg">
<meta property="og:description" content="프로토타입확인부탁드립니다.">













</head>



<?php
function breadcrumb($array){
?>
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/JS_LOVE/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				

				<?php
				for($i = 0 ; $i < count($array)-1 ; $i++ ){
					echo "<li><a href='".$array[$i][0]."'>".$array[$i][1]."</a></li>";
				}
				echo "<li class='active'>".$array[count($array)-1][1]."</a></li>";
				?>
			</ol>
		</div><!--/.row-->
<?php
}





?>