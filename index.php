<?php
include_once('lib/dbcon_JS_LOVE.php');
include_once('contents_header.php');
include_once('contents_profile.php');
include_once('contents_sidebar.php');


	$sql	 = "select sum(count) as cnt from save_crypotology ;";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
	$info	 = mysqli_fetch_array($res);
	$total = $info["cnt"];
	$temp_1 = rand(0,floor($total/5)); //감지
	$temp_total = $total - $temp_1;
	$temp_2 = rand(0,floor($temp_total/5)); //오류
	$temp_total = $total - $temp_1;
	$temp_3 = $total - $temp_1 -$temp_2; 
	

	function hd_noraml($name){
?>
	<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading"><div align = 'center'><?php echo $name?></div></div>
					<div class="panel-body" >
						<table border=0 style="width:70%" align = 'center'>
						<tr>
							<td align = 'left'><button type="reset" class="btn btn-default">&nbsp &nbsp 설&nbsp 정&nbsp &nbsp </button></td>
							<td align = 'right'><button type="reset" class="btn btn-default">&nbsp &nbsp 수&nbsp 정&nbsp &nbsp </button>		</td>
						</tr>
					</table>						
					</div>
				</div>
			</div>
<?php
	}
	function hd_error($name){
?>			

			<div class="col-md-3">
				<div class="panel panel-orange">
					<div class="panel-heading dark-overlay"><?php echo $name?></div>
					<div class="panel-body" >
					<table border=0 style="width:70%" align = 'center'>
						<tr>
							<td align = 'left'><button type="reset" class="btn btn-default">&nbsp &nbsp 설&nbsp 정&nbsp &nbsp </button></td>
							<td align = 'right'><button type="reset" class="btn btn-default">&nbsp &nbsp 수&nbsp 정&nbsp &nbsp </button>		</td>
						</tr>
					</table>						
					</div>
				</div>
			</div><!--/.col-->

<?php
	}
	function hd_check($name){
?>			



			<div class="col-md-3">
				<div class="panel panel-red">
					<div class="panel-heading dark-overlay" ><?php echo $name?></div>
					<div class="panel-body" >
					<table border=0 style="width:70%" align = 'center'>
						<tr>
							<td align = 'left'><button type="reset" class="btn btn-default">&nbsp &nbsp 설&nbsp 정&nbsp &nbsp </button></td>
							<td align = 'right'><button type="reset" class="btn btn-default">&nbsp &nbsp 수&nbsp 정&nbsp &nbsp </button>		</td>
						</tr>
					</table>						
					</div>
				</div>
			</div><!--/.col-->

<?php
	}

?>			


	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/JS_LOVE/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a> home				
				</li>

			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">수호 네트웍크</h1>
				＠ Copyright©2022 SH 네트웍크 대표자 : 박종식, 윤희동 <p><br><p>
			</div>
		</div>







		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $total ?></div>
							<div class="text-muted">총 Sensor갯수 </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $temp_3 ?></div>
							<div class="text-muted">정상</div>
						</div>
					</div>
				</div>
			</div>


		


			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $temp_2 ?></div>
							<div class="text-muted">감지</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large"><?php echo $temp_1 ?></div>
							<div class="text-muted">오류</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
				
					Sensor 등록 현황
						
						
				
					</div>

					<div class="panel-body">
					</div>
				</div>
			</div>
		</div>




		<div class="row">
			
		
<?php
$temp_array = array();
for($i=1 ; $i < $total-1 ;$i++){
	array_push($temp_array,$i)	;

}
shuffle($temp_array);


$error_array = array();
$check_array = array();
for($i=0 ; $i < $temp_1  ;$i++){
	array_push($error_array,$temp_array[$i])	;
}

for($i=0 ; $i < $temp_2  ;$i++){
	array_push($check_array,$temp_array[count($temp_array)-$i-1])	;
}

for($total_i=1 ; $total_i < $total+1  ;$total_i++){
	if($total_i<10){
		$name = "Sensor_A_0".$total_i;
	}else{
		$name = "Sensor_A_".$total_i;
	}


	if(in_array($total_i,$check_array)){
		hd_check($name);

	}elseif(in_array($total_i,$error_array)){
		hd_error($name);

	}else{
		hd_noraml($name);

	}
	
	
	
}



?>

			




		
		</div>

		
			
			
		</div>




								
	</div>	<!--/.main-->
<?php include_once('contents_footer.php');?>








<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
								 기기등록
			</div>
			<div class="modal-body">

				<form name="frm" role="form" method="get" action="index_proc.php">
					<div class="form-group">
								<label>기기 해쉬태크 입력</label>
								<input class="form-control" placeholder="Placeholder" name='count_cryptology'>
					</div>
					<p>테스트용 해쉬 태그 예시 <br>
					1 : c4ca4238a0b923820dcc509a6f75849b<br>
					5 : e4da3b7fbbce2345d7772b0674a318d5<br>
					7 : 8f14e45fceea167a5a36dedd4bea2543<br>
					10 : d3d9446802a44259755d38e6d163e820<br>
						


			</div>
			<div class="modal-footer">
				<input  type='submit' class="btn btn-success login-btn" type="submit" value="기기등록">
				</form>

				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>