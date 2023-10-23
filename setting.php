<?php
include_once('lib/dbcon_JS_LOVE.php');
include_once('contents_header.php');
include_once('contents_profile.php');
include_once('contents_sidebar.php');


	$sql	 = "select sum(count) as cnt from save_crypotology ;";
	$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
	$info	 = mysqli_fetch_array($res);
	$total =  $info["cnt"];
	$temp_1 = rand(0,floor($total/5));
	$temp_2 = $total -$temp_1;


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
				<h1 class="page-header">기기등록</h1>
				
			</div>
		</div>
		

		
		
		<div class="row">



			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
















					
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php
								
								echo $temp_2 ;
							
							?></div>
							<div class="text-muted">등록된 센서</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php
								
								echo $temp_1 ;
							
							?></div>
							<div class="text-muted">등록가능  Sensor</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-xs-12 col-md-6 col-lg-4">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php
								
								echo $total ;
							
							?></div>
							<div class="text-muted">총 구매 Sensor</div>
						</div>
					</div>
				</div>
			</div>






		</div>





		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
					<table border=0 style="width:100%">
						<tr>
							<td align = 'left'>Sensor 등록 이력	</td>
							<td align = 'right'><a href="#" data-toggle="modal" data-target="#myModal2" class="btn btn-success">기기 등록</a>		</td>
						</tr>
					</table>						
					
						
				
				</div>

					<div class="panel-body">



						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<?php	
										$num=0;
										$name="#";hd_thead_th($num,$name);$num+=1;
														
										$name="등록 갯수";hd_thead_th($num,$name);$num+=1;
										$name="등록 시간 ";hd_thead_th($num,$name);$num+=1;
										$name="등록 ip";hd_thead_th($num,$name);$num+=1;
										$name="삭제";hd_thead_th($num,$name);$num+=1;
										
									?>
								


								</tr>
							</thead>
						<tbody>
						<?php

								$total_num =0;
								$sql	 = "select * from save_crypotology order by idx Desc;";
								$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
								while($info	 = mysqli_fetch_array($res)){
									$total_num +=1;
									$num=0;
									echo "<tr>";
										$name = $total_num ;	hd_tbody_td($num,$name);$num+=1;
										
										$name = $info['count'] ;	hd_tbody_td($num,$name);$num+=1;
										$name = $info['reg_date'] ;	hd_tbody_td($num,$name);$num+=1;
										$name = $info['reg_ip'] ;	hd_tbody_td($num,$name);$num+=1;
										echo "<td><a href='index_del.php?idx=".$info['idx']."'  class='btn btn-danger'>등록 정보 삭제</a></td>";

										
									echo "</tr>";


								};



									

						?>

						</tbody>
						</table>
























					</div>
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