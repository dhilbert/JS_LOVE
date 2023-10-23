<?php
function hd_active($input){
	$uri=explode('/',$_SERVER['REQUEST_URI']);
		if($uri[2]==$input){
		echo "class='active'";}
}
function hd_drop($num,$grobal,$sub_name,$sub_url){
?>

<li class="parent ">
		<a href="#">
		<span data-toggle="collapse" href="#sub-item-<?php echo $num;?>"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg> <?php echo $grobal?> </span>
		</a>
		<ul class="children collapse" id="sub-item-<?php echo $num;?>">
		<?php
		for($i = 0 ; $i <count($sub_name);$i++){
		?>
			<li>
				<a class="" href="<?php echo $sub_url[$i];?>">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> <?php echo $sub_name[$i];?>
				</a>
			</li>
		<?php
		}?>
		</ul>
	</li>
<?php
}
?>


	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				
				
			</div>

		</form>






		<ul class="nav menu" >
			<li <?php hd_active("index.php");?>><a href="/JS_LOVE/index.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Home</a></li>
			<li <?php hd_active("setting.php");?>><a href="/JS_LOVE/setting.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>기기등록</a></li>
			<li <?php hd_active("home2.php");?>><a href="/JS_LOVE/home2.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>암호표</a></li>

		
		
		

		</ul>
</div>