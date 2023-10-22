<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_JS_LOVE.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');

?>







<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
					
			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">연령 / 월별 거래량
					</div>

					<div class="panel-body">









<div id="chart_div1" style="width: 100%; height: 900px;"></div>


</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', '30대이하', '30대', '40대', '50대', '60대이상', '평균'],

		<?php 
			$want_text = '';
			$sql	 = "select * from api_test_age_cnt where DEAL_OBJ = '06'
			
			and RESEARCH_DATE > 202100
			order by RESEARCH_DATE ASC;";
			$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
			while($info	 = mysqli_fetch_array($res)){
				
				$temp0 = $info['AGE01_AREA']+$info['AGE02_AREA'];
				$temp1 = $info['AGE06_AREA']+$info['AGE07_AREA'];

				$cnt_average =round(($info['AGE01_AREA']+$info['AGE02_AREA']+$info['AGE03_AREA']+$info['AGE04_AREA']+$info['AGE05_AREA']+$info['AGE06_AREA']+$info['AGE07_AREA'])/7,2);
				$want_text = $want_text."['".$info['RESEARCH_DATE']."',".$temp0.",".$info['AGE03_AREA'].",".$info['AGE04_AREA'].",".$info['AGE05_AREA'].",".$temp1.",".$cnt_average."],";

			}
			echo $want_text;
		?>		

          
          


		  
        ]);

        var options = {
          title : '중구 연령&월별 거래량',
          vAxis: {title: '거래량'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
  
    <div id="chart_div" style="width: 100%; height: 900px;"></div>
  





	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', '30대이하', '30대', '40대', '50대', '60대이상', '평균'],

		<?php 
			$want_text = '';
			$sql	 = "select * from api_test_age_agea where DEAL_OBJ = '06'
			
			and RESEARCH_DATE > 202100
			order by RESEARCH_DATE ASC;";
			$res	=  mysqli_query($real_sock,$sql) or die(mysqli_error($real_sock));
			while($info	 = mysqli_fetch_array($res)){
				
				$temp0 = $info['AGE01_AREA']+$info['AGE02_AREA'];
				$temp1 = $info['AGE06_AREA']+$info['AGE07_AREA'];

				$cnt_average =round(($info['AGE01_AREA']+$info['AGE02_AREA']+$info['AGE03_AREA']+$info['AGE04_AREA']+$info['AGE05_AREA']+$info['AGE06_AREA']+$info['AGE07_AREA'])/7,2);
				$want_text = $want_text."['".$info['RESEARCH_DATE']."',".$temp0.",".$info['AGE03_AREA'].",".$info['AGE04_AREA'].",".$info['AGE05_AREA'].",".$temp1.",".$cnt_average."],";

			}
			echo $want_text;
		?>		

          
          


		  
        ]);

        var options = {
          title : '중구 연령&월별 거래량',
          vAxis: {title: '거래량'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>
  
  
    
  
























<?php
	/*

	$serviceKey = "ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D";
	

	$api_url = 'http://api.odcloud.kr/api/RealEstateTradingBuyerAge/v1/getRealEstateTradingCountAge'; //거래수
	$api_url = 'http://api.odcloud.kr/api/RealEstateTradingBuyerAge/v1/getRealEstateTradingAreaAge';  //면적
	
	//$url =$api_url."?serviceKey=".$serviceKey."&page=1&perPage=10&cond%5BREGION_CD%3A%3AEQ%5D=1126000000&cond%5BRESEARCH_DATE%3A%3ALT%5D=200101&cond%5BRESEARCH_DATE%3A%3ALTE%5D=202209";
	$url =$api_url."?serviceKey=".$serviceKey."&cond%5BREGION_CD%3A%3AEQ%5D=28110&page=1&perPage=1000";
	$response = file_get_contents($url);
	$object = json_decode($response);

	$data_arr =	json_decode(json_encode($object), true);
	$data_arr =	$data_arr['data'];
	
	
	for($i =0 ; $i < count($data_arr) ;$i++ ){

		$temp_list = $data_arr[$i];
		
		$sql="
			insert api_test_age_agea set 
			AGE01_AREA		= '".$temp_list['AGE01_AREA']."',
			AGE02_AREA 		= '".$temp_list['AGE02_AREA']."',
			AGE03_AREA 		= '".$temp_list['AGE03_AREA']."',
			AGE04_AREA 		= '".$temp_list['AGE04_AREA']."',
			AGE05_AREA	 	= '".$temp_list['AGE05_AREA']."',
			AGE06_AREA 		= '".$temp_list['AGE06_AREA']."',
			AGE07_AREA 		= '".$temp_list['AGE07_AREA']."',
			RESEARCH_DATE	= '".$temp_list['RESEARCH_DATE']."',		
			REGION_CD 		= '".$temp_list['REGION_CD']."',		
			REGION_NM 		= '".$temp_list['REGION_NM']."',
			DEAL_OBJ 		= '".$temp_list['DEAL_OBJ']."'
			
			
		";

		$res = mysqli_query($real_sock,$sql);

	}



	$api_url = 'http://api.odcloud.kr/api/RealEstateTradingBuyerAge/v1/getRealEstateTradingCountAge'; //거래수

	
	//$url =$api_url."?serviceKey=".$serviceKey."&page=1&perPage=10&cond%5BREGION_CD%3A%3AEQ%5D=1126000000&cond%5BRESEARCH_DATE%3A%3ALT%5D=200101&cond%5BRESEARCH_DATE%3A%3ALTE%5D=202209";
	$url =$api_url."?serviceKey=".$serviceKey."&cond%5BREGION_CD%3A%3AEQ%5D=28110&page=1&perPage=1000";
	$response = file_get_contents($url);
	$object = json_decode($response);

	$data_arr =	json_decode(json_encode($object), true);
	$data_arr =	$data_arr['data'];
	
	
	for($i =0 ; $i < count($data_arr) ;$i++ ){

		$temp_list = $data_arr[$i];
		
		$sql="
			insert api_test_age_cnt set 
			AGE01_AREA		= '".$temp_list['AGE01_CNT']."',
			AGE02_AREA 		= '".$temp_list['AGE02_CNT']."',
			AGE03_AREA 		= '".$temp_list['AGE03_CNT']."',
			AGE04_AREA 		= '".$temp_list['AGE04_CNT']."',
			AGE05_AREA	 	= '".$temp_list['AGE05_CNT']."',
			AGE06_AREA 		= '".$temp_list['AGE06_CNT']."',
			AGE07_AREA 		= '".$temp_list['AGE07_CNT']."',
			RESEARCH_DATE	= '".$temp_list['RESEARCH_DATE']."',		
			REGION_CD 		= '".$temp_list['REGION_CD']."',		
			REGION_NM 		= '".$temp_list['REGION_NM']."',
			DEAL_OBJ 		= '".$temp_list['DEAL_OBJ']."'
			
			
		";

		$res = mysqli_query($real_sock,$sql);

	}









	/*
	$response = file_get_contents($url);
	$object = simplexml_load_string($response);



/*

$url = "https://mz-dev.atlassian.net/rest/api/latest/search?jql=updated>=".$info['jirasync_update_date']."&fields=key&maxResults=10000";


$ress=cute_jy_curl($username,$password,$url);









$curl = curl_init();
curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$ress=json_decode(curl_exec($curl),true);
*/











				/*

$serviceKey = "ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D";
$api_url = 'http://api.odcloud.kr/api/RealEstateTradingBuyerAge/v1/getRealEstateTradingAreaAge';
$url =$api_url."?serviceKey=".$serviceKey;

echo $url ;
$response = file_get_contents($url);
$object = simplexml_load_string($response);
$data_arr = $object->body[0]->items[0]; 

print_r($data_arr);

				$sql = "INSERT INTO rawdata_charter_apt (BuildYear,AreaforExclusiveUse,DealYear,Courtbuilding,deposit,DealMonth,Monthlyrent,Dealday,AreaCode,buildingName,buildingNumber,buildingfloor,UpdateDate)VALUES ";
				$temp_sql = $sql;
				$n = 0;
*/
				









//국토부 불러오는 API 





///// 전세 거래 		
		
			//아파트 전세 거래
			/*
				$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcAptRent';
				$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
				$response = file_get_contents($url);
				$object = simplexml_load_string($response);
				$data_arr = $object->body[0]->items[0]; 
				$sql = "INSERT INTO rawdata_charter_apt (BuildYear,AreaforExclusiveUse,DealYear,Courtbuilding,deposit,DealMonth,Monthlyrent,Dealday,AreaCode,buildingName,buildingNumber,buildingfloor,UpdateDate)VALUES ";
				$temp_sql = $sql;
				$n = 0;
				for($i =0 ; $i < count($data_arr) ;$i++ ){
					$n += 1;
					$temps_array = $data_arr->item[$i];
					$BuildYear = $temps_array->건축년도;
					$AreaforExclusiveUse = $temps_array->전용면적;
					$DealYear = $temps_array->년;
					$Courtbuilding = $temps_array->법정동;
					$deposit = $temps_array->보증금액;
					$DealMonth = $temps_array->월;
					$Monthlyrent = $temps_array->월세금액;
					$Dealday = $temps_array->일;
					$AreaCode = $temps_array->지역코드;
					$buildingName = $temps_array->아파트;
					$buildingNumber = $temps_array->지번;
					$buildingfloor = $temps_array->층;
				


					$deposit = hd_text_to_int($deposit);
					$Monthlyrent= hd_text_to_int($Monthlyrent);

					$sql = $sql."('".$BuildYear."',
								'".$AreaforExclusiveUse."',
								'".$DealYear."',
								'".trim($Courtbuilding)."',
								'".$deposit."',
								'".$DealMonth."',
								'".$Monthlyrent."',
								'".$Dealday."',
								'".$AreaCode."',
								'".$buildingName."',
								'".$buildingNumber."',
								'".$buildingfloor."',
								'".$today_time."'
								),";
					if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}

				}
				$cnt_1 = count($data_arr);
				$sql=substr($sql, 0, -1);
				$res = mysqli_query($real_sock,$sql);
			//아파트 전세 거래 끝

			


			/*
			// 다가구 전세 거래
			$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcSHRent';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_charter_multifamilyhouse (
							BuildYear,
							Contractarea,
							DealYear,
							Courtbuilding,
							deposit,
							DealMonth,
							Monthlyrent,
							Dealday,
							AreaCode,UpdateDate
			)VALUES ";
			$temp_sql = $sql;
			$n=0;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n += 1;
				$temps_array = $data_arr->item[$i];
				$BuildYear = $temps_array->건축년도;
				$Contractarea = $temps_array->계약면적;
				$DealYear = $temps_array->년;
				$Courtbuilding = $temps_array->법정동;
				$deposit = $temps_array->보증금액;
				$DealMonth = $temps_array->월;
				$Monthlyrent = $temps_array->월세금액;
				$Dealday = $temps_array->일;
				$AreaCode = $temps_array->지역코드;	
					$deposit = hd_text_to_int($deposit);
					$Monthlyrent= hd_text_to_int($Monthlyrent);



				$sql = $sql."(
						'".$BuildYear."',
						'".$Contractarea."',
						'".$DealYear."',
						'".trim($Courtbuilding)."',
						'".$deposit."',
						'".$DealMonth."',
						'".$Monthlyrent."',
						'".$Dealday."',
						'".$AreaCode."',
						'".$today_time."'),";
				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);
				$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}
			$sql=substr($sql, 0, -1);
			$res = mysqli_query($real_sock,$sql);
			

			// 오피 전세 거래

			$api_url = 'http://openapi.molit.go.kr/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcOffiRent';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_charter_op (
							BuildYear,
							DealYear,
							buildingName,
							Courtbuilding,
							deposit,
							DealMonth ,
							Monthlyrent,
							Dealday,
							AreaforExclusiveUse,
							buildingNumber,
							AreaCode,
							buildingfloor,UpdateDate)VALUES ";

			$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;
				$temps_array = $data_arr->item[$i];
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$buildingName = $temps_array->단지;
				$Courtbuilding = $temps_array->법정동;
				$deposit = $temps_array->보증금;
				$DealMonth = $temps_array->월;
				$Monthlyrent = $temps_array->월세;
				$Dealday = $temps_array->일;
				$AreaforExclusiveUse = $temps_array->전용면적;
				$buildingNumber = $temps_array->지번;
				$AreaCode = $temps_array->지역코드;			
				$buildingfloor = $temps_array->층;

				$deposit = hd_text_to_int($deposit);
				$Monthlyrent= hd_text_to_int($Monthlyrent);

				$sql = $sql."('".$BuildYear."',
					'".$DealYear."',
					'".$buildingName."',
					'".trim($Courtbuilding)."',
					'".$deposit."',
					'".$DealMonth."',
					'".$Monthlyrent."',
					'".$Dealday."',
					'".$AreaforExclusiveUse."',
					'".$buildingNumber."',
					'".$AreaCode."',
					'".$buildingfloor."',	
					'".$today_time."'),";

				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}

			$sql=substr($sql, 0, -1);

			$res = mysqli_query($real_sock,$sql);



			//연립 전세 거래  rawdata_charter_tenementhouse
			$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcRHRent';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_charter_tenementhouse (
							BuildYear,
							DealYear,
							Courtbuilding,
							deposit,
							buildingName,
							DealMonth,
							Monthlyrent,
							Dealday,
							AreaforExclusiveUse,
							buildingNumber,
							AreaCode,
							buildingfloor,UpdateDate
							)VALUES ";
						$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;

				$temps_array = $data_arr->item[$i];
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$Courtbuilding = $temps_array->법정동;
				$deposit = $temps_array->보증금액;
				$buildingName = $temps_array->연립다세대;
				$DealMonth = $temps_array->월;
				$Monthlyrent = $temps_array->월세금액;
				$Dealday = $temps_array->일;
				$AreaforExclusiveUse = $temps_array->전용면적;
				$buildingNumber = $temps_array->지번;
				$AreaCode = $temps_array->지역코드;			
				$buildingfloor = $temps_array->층;

				$deposit = hd_text_to_int($deposit);
				$Monthlyrent= hd_text_to_int($Monthlyrent);

				$sql = $sql."
					('".$BuildYear."',
					'".$DealYear."',
					'".trim($Courtbuilding)."',
					'".$deposit."',
					'".$buildingName."',
					'".$DealMonth."',
					'".$Monthlyrent."',
					'".$Dealday."',
					'".$AreaforExclusiveUse."',
					'".$buildingNumber."',
					'".$AreaCode."',
					'".$buildingfloor."',
					'".$today_time."'),";
				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}

			}

			$sql=substr($sql, 0, -1);

			$res = mysqli_query($real_sock,$sql);







	
	///// 전세 거래 끝
	/// 매매 거래 불러 오기 
			//아파트 매매 거래  rawdata_trade_apt
			$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcAptTrade';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
			$sql = "INSERT INTO rawdata_trade_apt (
							TransactionAmount,
							BuildYear,
							DealYear,
							Courtbuilding,
							buildingName,
							DealMonth,
							Dealday,
							AreaforExclusiveUse,
							buildingNumber,
							AreaCode,
							buildingfloor,UpdateDate
			)VALUES ";		
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
					$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;


				$temps_array = $data_arr->item[$i];

				$TransactionAmount = $temps_array->거래금액;
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$Courtbuilding = $temps_array->법정동;
				$buildingName = $temps_array->아파트;			
				$DealMonth = $temps_array->월;
				$Dealday = $temps_array->일;	
				$AreaforExclusiveUse = $temps_array->전용면적;
				$buildingNumber = $temps_array->지번;
				$AreaCode = $temps_array->지역코드;
				$buildingfloor = $temps_array->층;


				$TransactionAmount = hd_text_to_int($TransactionAmount);
				$sql = $sql."(
						'".$TransactionAmount."',
						'".$BuildYear."',
						'".$DealYear."',
						'".trim($Courtbuilding)."',
						'".$buildingName."',
						'".$DealMonth."',
						'".$Dealday."',
						'".$AreaforExclusiveUse."',
						'".$buildingNumber."',
						'".$AreaCode."',
						'".$buildingfloor."',
								'".$today_time."'),";
				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}


			$sql=substr($sql, 0, -1);
			$res = mysqli_query($real_sock,$sql);

	/*
			//단독/다세대 매매  rawdata_trade_apt rawdata_trade_multifamilyhouse
			$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcSHTrade';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_trade_multifamilyhouse (TransactionAmount, BuildYear, DealYear,landArea,Courtbuilding,AreaforExclusiveUse,DealMonth,Dealday,houseType,AreaCode,UpdateDate)VALUES ";
			$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;


				$temps_array = $data_arr->item[$i];

				$TransactionAmount = $temps_array->거래금액;
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$landArea = $temps_array->대지면적;
				$Courtbuilding = $temps_array->법정동;
				$AreaforExclusiveUse = $temps_array->연면적;
				$DealMonth = $temps_array->월;
				$Dealday = $temps_array->일;	
				$houseType = $temps_array->주택유형;	
				$AreaCode = $temps_array->지역코드;


				$TransactionAmount = hd_text_to_int($TransactionAmount);
				$sql = $sql."
						('".$TransactionAmount."',
						 '".$BuildYear."',
						 '".$DealYear."',
						 '".$landArea."',
						 '".trim($Courtbuilding)."',
						 '".$AreaforExclusiveUse."',
						'".$DealMonth."',
						'".$Dealday."',
						 '".$houseType."',
						 '".$AreaCode."',
								'".$today_time."'),";
				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}				

			$sql=substr($sql, 0, -1);
			$res = mysqli_query($real_sock,$sql);



			//rawdata_trade_op 오피 매매
			$api_url = 'http://openapi.molit.go.kr/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcOffiTrade';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";		
			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_trade_op (TransactionAmount, BuildYear, DealYear,buildingName,Courtbuilding,DealMonth,Dealday,AreaforExclusiveUse,buildingNumber,AreaCode,buildingfloor,UpdateDate)VALUES ";				
						$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;

				$temps_array = $data_arr->item[$i];

				$TransactionAmount = $temps_array->거래금액;
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$buildingName = $temps_array->단지;						
				$Courtbuilding = $temps_array->법정동;			
				$DealMonth = $temps_array->월;
				$Dealday = $temps_array->일;	
				$AreaforExclusiveUse = $temps_array->전용면적;
				$buildingNumber = $temps_array->지번;
				$AreaCode = $temps_array->지역코드;
				$buildingfloor = $temps_array->층;	
				

				$TransactionAmount = hd_text_to_int($TransactionAmount);
				$sql = $sql."(
						'".$TransactionAmount."',
						'".$BuildYear."',
						'".$DealYear."',
						'".$buildingName."',
						'".$Courtbuilding."',
						'".$DealMonth."',
						'".$Dealday."',
						'".$AreaforExclusiveUse."',
						'".$buildingNumber."',
						'".$AreaCode."',
						'".$buildingfloor."',
								'".$today_time."'),";
				if($n==500){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}

			$sql=substr($sql, 0, -1);
			$res = mysqli_query($real_sock,$sql);






			//rawdata_trade_tenementhouse 연립 매매
			$api_url = 'http://openapi.molit.go.kr:8081/OpenAPI_ToolInstallPackage/service/rest/RTMSOBJSvc/getRTMSDataSvcRHTrade';
			$url =$api_url."?serviceKey=".$serviceKey."&LAWD_CD=".$LAWD_CD."&DEAL_YMD=".$DEAL_YMD."";

			$response = file_get_contents($url);
			$object = simplexml_load_string($response);
			$data_arr = $object->body[0]->items[0]; 
			$sql = "INSERT INTO rawdata_trade_tenementhouse (TransactionAmount, BuildYear, DealYear,landArea,Courtbuilding,
			buildingName,DealMonth,Dealday,AreaforExclusiveUse,buildingNumber,AreaCode,buildingfloor,UpdateDate)VALUES ";
						$n=0;
			$temp_sql = $sql;
			for($i =0 ; $i < count($data_arr) ;$i++ ){
				$n+=1;

				$temps_array = $data_arr->item[$i];
				$TransactionAmount = $temps_array->거래금액;
				$BuildYear = $temps_array->건축년도;
				$DealYear = $temps_array->년;
				$landArea = $temps_array->대지권면적;
				$Courtbuilding = $temps_array->법정동;			
				$buildingName = $temps_array->연립다세대;						
				$DealMonth = $temps_array->월;
				$Dealday = $temps_array->일;	
				$AreaforExclusiveUse = $temps_array->전용면적;
				$buildingNumber = $temps_array->지번;
				$AreaCode = $temps_array->지역코드;
				$buildingfloor = $temps_array->층;

				$TransactionAmount = hd_text_to_int($TransactionAmount);

				$sql = $sql."(
						'".$TransactionAmount."',
						'".$BuildYear."',
						'".$DealYear."',
						'".$landArea."',
						'".$Courtbuilding."',
						
						'".$buildingName."',
						'".$DealMonth."',
						'".$Dealday."',
						'".$AreaforExclusiveUse."',
						'".$buildingNumber."',
						'".$AreaCode."',
						'".$buildingfloor."',
								'".$today_time."'),";
				
				if($n==$value_count){$n=0;$sql=substr($sql, 0, -1);$res = mysqli_query($real_sock,$sql);$sql = $temp_sql;}
			}
			
			$sql	= substr($sql, 0, -1);
			$res	= mysqli_query($real_sock,$sql);
		

	/// 매매 거래 넣기 끝
	*/
?>