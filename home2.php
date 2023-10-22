<?php
include_once('lib/dbcon_JS_LOVE.php');
include_once('contents_header.php');
include_once('contents_profile.php');
include_once('contents_sidebar.php');

?>





	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/JS_LOVE/home.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a> home				
				</li>

			</ol>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">암호표
					</div>

					<div class="panel-body">



						<table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
							<thead>
								<tr>
									<?php	
										$num=0;
										
														
										$name="기기갯수";hd_thead_th($num,$name);$num+=1;
										$name="해쉬태크";hd_thead_th($num,$name);$num+=1;
										
										
									?>
								


								</tr>
							</thead>
						<tbody>
						<?php

								$total_num =0;
								$sql	 = "select * from main_cryptology ;";
								$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
								while($info	 = mysqli_fetch_array($res)){
									
									$num=0;
									echo "<tr>";
									
										$name = $info['count'] ;	hd_tbody_td($num,$name);$num+=1;
										$name = $info['count_cryptology'] ;	hd_tbody_td($num,$name);$num+=1;
									
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