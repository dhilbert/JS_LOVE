<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_JS_LOVE.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');





?>










			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					<?php
					$array = array(
						array('#','건출물대장')
					);
					breadcrumb($array);
					?>
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">중랑구 건축물 대장
					</div>

					<div class="panel-body">








					
		



<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
	<thead>
		<tr>
			<?php	
				$num=0;
				$name="#";hd_thead_th($num,$name);$num+=1;
								
				$name="대지위치";hd_thead_th($num,$name);$num+=1;
				$name="번";hd_thead_th($num,$name);$num+=1;
				$name="지";hd_thead_th($num,$name);$num+=1;
				$name="주용도코드명";hd_thead_th($num,$name);$num+=1;
				$name="기타용도";hd_thead_th($num,$name);$num+=1;
				
			?>
		


		</tr>
	</thead>
<tbody>
<?php

		$total_num =0;
		$sql	 = "select * from api_test_gun_1 ;";
		$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
		while($info	 = mysqli_fetch_array($res)){
			$total_num +=1;
			$num=0;
			echo "<tr>";
				$name = $total_num ;	hd_tbody_td($num,$name);$num+=1;
				$name = "<a href='/JS_LOVE/00_api_test/00_detail.php?idx=".$info['idx']."'>".$info['platPlc']."</a>" ;	hd_tbody_td($num,$name);$num+=1;
				$name = $info['bun'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $info['ji'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $info['mainPurpsCdNm'] ;	hd_tbody_td($num,$name);$num+=1;
				$name = $info['etcPurps'] ;	hd_tbody_td($num,$name);$num+=1;
			echo "</tr>";


		};



			

?>

</tbody>
</table>
























					</div>
				</div>
			</div>



		 
  

	
	</div>
</div>	<!--/.main-->

	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>


