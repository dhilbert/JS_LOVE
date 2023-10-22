<?php
	include_once('../lib/session.php');
	include_once('../lib/dbcon_JS_LOVE.php');
	include_once('../contents_header.php');
	include_once('../contents_profile.php');
	include_once('../contents_sidebar.php');


	
	$idx = isset($_GET['idx']) ? $_GET['idx'] : 3;



	$main_sql	 = "select * from api_test_gun_1 where idx ='".$idx."';";
	$main_res	=  mysqli_query($real_sock,$main_sql) or die(mysqli_error($real_sock));
	$main_info	 = mysqli_fetch_array($main_res);

 
	              
	$serviceKey = "ZRsZF%2FzuUlEALtEeik3hz8Pa14i1Ow3j1SegtsGoqdAGbSbA7PYNa%2Bx3Xse1Iy2DemohfDRE2pwOb6OT0P%2Fiow%3D%3D";


	function hd_urls($api,$temps,$serviceKey ){
		// 0 api 주소 
		// 1 sigunguCd
		// 2 bjdongCd
		// 3 platGbCd
		// 4 bun
		// 5 ji
		$temp_array = array($api,$temps[0],$temps[1],$temps[2],$temps[3],$temps[4] );
		$url ="http://apis.data.go.kr/1613000/BldRgstService_v2/".$temp_array[0]."?numOfRows=1&sigunguCd=".$temp_array[1]."&bjdongCd=".$temp_array[2]."&platGbCd=".$temp_array[3]."&bun=".$temp_array[4]."&ji=".$temp_array[5]."&ServiceKey=".$serviceKey;
		return $url;
	}

	$temp_api = array(
		'getBrBasisOulnInfo','getBrRecapTitleInfo','getBrTitleInfo','getBrFlrOulnInfo','getBrAtchJibunInfo','getBrExposPubuseAreaInfo','getBrWclfInfo','getBrHsprcInfo','getBrExposInfo','getBrJijiguInfo'
	);
	
	$sigunguCd= $main_info['sigunguCd'];
	$bjdongCd = $main_info['bjdongCd'];
	$platGbCd =	$main_info['platGbCd'];
	$bun 	  = $main_info['bun'];
	$ji		  = $main_info['ji'];
	$temps_stard = array($sigunguCd,$bjdongCd,$platGbCd,$bun,$ji);

	
	


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
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 기본개요		</div>

					<div class="panel-body">
					<?php

						$url = hd_urls($temp_api[0],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						for($i =0 ; $i < count($data_arr) ;$i++ ){
	
							$temps_array = $data_arr->item[$i];

							$platPlc = $temps_array->platPlc;
							$sigunguCd = $temps_array->sigunguCd;
							$bjdongCd = $temps_array->bjdongCd;
							$platGbCd = $temps_array->platGbCd;
							$bun = $temps_array->bun;
							$ji = $temps_array->ji;
							$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
							$mgmUpBldrgstPk = $temps_array->mgmUpBldrgstPk;
							$regstrGbCd = $temps_array->regstrGbCd;
							$regstrGbCdNm = $temps_array->regstrGbCdNm;
							$regstrKindCd = $temps_array->regstrKindCd;
							$regstrKindCdNm = $temps_array->regstrKindCdNm;
							$newPlatPlc = $temps_array->newPlatPlc;
							$bldNm = $temps_array->bldNm;
							$splotNm = $temps_array->splotNm;
							$block = $temps_array->block;
							$lot = $temps_array->lot;
							$bylotCnt = $temps_array->bylotCnt;
							$naRoadCd = $temps_array->naRoadCd;
							$naBjdongCd = $temps_array->naBjdongCd;
							$naUgrndCd = $temps_array->naUgrndCd;
							$naMainBun = $temps_array->naMainBun;
							$naSubBun = $temps_array->naSubBun;
							$jiyukCd = $temps_array->jiyukCd;
							$jiguCd = $temps_array->jiguCd;
							$guyukCd = $temps_array->guyukCd;
							$jiyukCdNm = $temps_array->jiyukCdNm;
							$jiguCdNm = $temps_array->jiguCdNm;
							$guyukCdNm = $temps_array->guyukCdNm;
							$crtnDay = $temps_array->crtnDay;
							

							echo '대지위치 : '.$platPlc.'<br>';
							echo '시군구코드 : '.$sigunguCd.'<br>';
							echo '법정동코드 : '.$bjdongCd.'<br>';
							echo '대지구분코드 : '.$platGbCd.'<br>';
							echo '번 : '.$bun.'<br>';
							echo '지 : '.$ji.'<br>';
							echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
							echo '관리상위건축물대장PK : '.$mgmUpBldrgstPk.'<br>';
							echo '대장구분코드 : '.$regstrGbCd.'<br>';
							echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
							echo '대장종류코드 : '.$regstrKindCd.'<br>';
							echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
							echo '도로명대지위치 : '.$newPlatPlc.'<br>';
							echo '건물명 : '.$bldNm.'<br>';
							echo '특수지명 : '.$splotNm.'<br>';
							echo '블록 : '.$block.'<br>';
							echo '로트 : '.$lot.'<br>';
							echo '외필지수 : '.$bylotCnt.'<br>';
							echo '새주소도로코드 : '.$naRoadCd.'<br>';
							echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
						}
					
					?>		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				</div>
				</div>
			</div>

			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	총괄표제부		</div>

					<div class="panel-body">		
						<?php 
						$url = hd_urls($temp_api[1],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						for($i =0 ; $i < count($data_arr) ;$i++ ){
	
							$temps_array = $data_arr->item[$i];
						
						
						
		$platPlc = $temps_array->platPlc;
		$sigunguCd = $temps_array->sigunguCd;
		$bjdongCd = $temps_array->bjdongCd;
		$platGbCd = $temps_array->platGbCd;
		$bun = $temps_array->bun;
		$ji = $temps_array->ji;
		$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
		$regstrGbCd = $temps_array->regstrGbCd;
		$regstrGbCdNm = $temps_array->regstrGbCdNm;
		$regstrKindCd = $temps_array->regstrKindCd;
		$regstrKindCdNm = $temps_array->regstrKindCdNm;
		$newOldRegstrGbCd = $temps_array->newOldRegstrGbCd;
		$newOldRegstrGbCdNm = $temps_array->newOldRegstrGbCdNm;
		$newPlatPlc = $temps_array->newPlatPlc;
		$bldNm = $temps_array->bldNm;
		$splotNm = $temps_array->splotNm;
		$block = $temps_array->block;
		$lot = $temps_array->lot;
		$bylotCnt = $temps_array->bylotCnt;
		$naRoadCd = $temps_array->naRoadCd;
		$naBjdongCd = $temps_array->naBjdongCd;
		$naUgrndCd = $temps_array->naUgrndCd;
		$naMainBun = $temps_array->naMainBun;
		$naSubBun = $temps_array->naSubBun;
		$platArea = $temps_array->platArea;
		$archArea = $temps_array->archArea;
		$bcRat = $temps_array->bcRat;
		$totArea = $temps_array->totArea;
		$vlRatEstmTotArea = $temps_array->vlRatEstmTotArea;
		$vlRat = $temps_array->vlRat;
		$mainPurpsCd = $temps_array->mainPurpsCd;
		$mainPurpsCdNm = $temps_array->mainPurpsCdNm;
		$etcPurps = $temps_array->etcPurps;
		$hhldCnt = $temps_array->hhldCnt;
		$fmlyCnt = $temps_array->fmlyCnt;
		$mainBldCnt = $temps_array->mainBldCnt;
		$atchBldCnt = $temps_array->atchBldCnt;
		$atchBldArea = $temps_array->atchBldArea;
		$totPkngCnt = $temps_array->totPkngCnt;
		$indrMechUtcnt = $temps_array->indrMechUtcnt;
		$indrMechArea = $temps_array->indrMechArea;
		$oudrMechUtcnt = $temps_array->oudrMechUtcnt;
		$oudrMechArea = $temps_array->oudrMechArea;
		$indrAutoUtcnt = $temps_array->indrAutoUtcnt;
		$indrAutoArea = $temps_array->indrAutoArea;
		$oudrAutoUtcnt = $temps_array->oudrAutoUtcnt;
		$oudrAutoArea = $temps_array->oudrAutoArea;
		$pmsDay = $temps_array->pmsDay;
		$stcnsDay = $temps_array->stcnsDay;
		$useAprDay = $temps_array->useAprDay;
		$pmsnoYear = $temps_array->pmsnoYear;
		$pmsnoKikCd = $temps_array->pmsnoKikCd;
		$pmsnoKikCdNm = $temps_array->pmsnoKikCdNm;
		$pmsnoGbCd = $temps_array->pmsnoGbCd;
		$pmsnoGbCdNm = $temps_array->pmsnoGbCdNm;
		$hoCnt = $temps_array->hoCnt;
		$engrGrade = $temps_array->engrGrade;
		$engrRat = $temps_array->engrRat;
		$engrEpi = $temps_array->engrEpi;
		$gnBldGrade = $temps_array->gnBldGrade;
		$gnBldCert = $temps_array->gnBldCert;
		$itgBldGrade = $temps_array->itgBldGrade;
		$itgBldCert = $temps_array->itgBldCert;
		$crtnDay = $temps_array->crtnDay;
		echo '대지위치 : '.$platPlc.'<br>';
		echo '시군구코드 : '.$sigunguCd.'<br>';
		echo '법정동코드 : '.$bjdongCd.'<br>';
		echo '대지구분코드 : '.$platGbCd.'<br>';
		echo '번 : '.$bun.'<br>';
		echo '지 : '.$ji.'<br>';
		echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
		echo '대장구분코드 : '.$regstrGbCd.'<br>';
		echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
		echo '대장종류코드 : '.$regstrKindCd.'<br>';
		echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
		echo '신구대장구분코드 : '.$newOldRegstrGbCd.'<br>';
		echo '신구대장구분코드명 : '.$newOldRegstrGbCdNm.'<br>';
		echo '도로명대지위치 : '.$newPlatPlc.'<br>';
		echo '건물명 : '.$bldNm.'<br>';
		echo '특수지명 : '.$splotNm.'<br>';
		echo '블록 : '.$block.'<br>';
		echo '로트 : '.$lot.'<br>';
		echo '외필지수 : '.$bylotCnt.'<br>';
		echo '새주소도로코드 : '.$naRoadCd.'<br>';
		echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
		echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
		echo '새주소본번 : '.$naMainBun.'<br>';
		echo '새주소부번 : '.$naSubBun.'<br>';
		echo '대지면적(㎡) : '.$platArea.'<br>';
		echo '건축면적(㎡) : '.$archArea.'<br>';
		echo '건폐율(%) : '.$bcRat.'<br>';
		echo '연면적(㎡) : '.$totArea.'<br>';
		echo '용적률산정연면적(㎡) : '.$vlRatEstmTotArea.'<br>';
		echo '용적률(%) : '.$vlRat.'<br>';
		echo '주용도코드 : '.$mainPurpsCd.'<br>';
		echo '주용도코드명 : '.$mainPurpsCdNm.'<br>';
		echo '기타용도 : '.$etcPurps.'<br>';
		echo '세대수(세대) : '.$hhldCnt.'<br>';
		echo '가구수(가구) : '.$fmlyCnt.'<br>';
		echo '주건축물수 : '.$mainBldCnt.'<br>';
		echo '부속건축물수 : '.$atchBldCnt.'<br>';
		echo '부속건축물면적(㎡) : '.$atchBldArea.'<br>';
		echo '총주차수 : '.$totPkngCnt.'<br>';
		echo '옥내기계식대수(대) : '.$indrMechUtcnt.'<br>';
		echo '옥내기계식면적(㎡) : '.$indrMechArea.'<br>';
		echo '옥외기계식대수(대) : '.$oudrMechUtcnt.'<br>';
		echo '옥외기계식면적(㎡) : '.$oudrMechArea.'<br>';
		echo '옥내자주식대수(대) : '.$indrAutoUtcnt.'<br>';
		echo '옥내자주식면적(㎡) : '.$indrAutoArea.'<br>';
		echo '옥외자주식대수(대) : '.$oudrAutoUtcnt.'<br>';
		echo '옥외자주식면적(㎡) : '.$oudrAutoArea.'<br>';
		echo '허가일 : '.$pmsDay.'<br>';
		echo '착공일 : '.$stcnsDay.'<br>';
		echo '사용승인일 : '.$useAprDay.'<br>';
		echo '허가번호년 : '.$pmsnoYear.'<br>';
		echo '허가번호기관코드 : '.$pmsnoKikCd.'<br>';
		echo '허가번호기관코드명 : '.$pmsnoKikCdNm.'<br>';
		echo '허가번호구분코드 : '.$pmsnoGbCd.'<br>';
		echo '허가번호구분코드명 : '.$pmsnoGbCdNm.'<br>';
		echo '호수(호) : '.$hoCnt.'<br>';
		echo '에너지효율등급 : '.$engrGrade.'<br>';
		echo '에너지절감율 : '.$engrRat.'<br>';
		echo 'EPI점수 : '.$engrEpi.'<br>';
		echo '친환경건축물등급 : '.$gnBldGrade.'<br>';
		echo '친환경건축물인증점수 : '.$gnBldCert.'<br>';
		echo '지능형건축물등급 : '.$itgBldGrade.'<br>';
		echo '지능형건축물인증점수 : '.$itgBldCert.'<br>';
		echo '생성일자 : '.$crtnDay.'<br>';
						}		
						
						
						
						?>
				
				
				
				
					</div>
				</div>
			</div>

			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 표제부		</div>

					<div class="panel-body">		
				<?php
				
				
				
				$url = hd_urls($temp_api[2],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						for($i =0 ; $i < count($data_arr) ;$i++ ){
	
							$temps_array = $data_arr->item[$i];
							$platPlc = $temps_array->platPlc;
							$sigunguCd = $temps_array->sigunguCd;
							$bjdongCd = $temps_array->bjdongCd;
							$platGbCd = $temps_array->platGbCd;
							$bun = $temps_array->bun;
							$ji = $temps_array->ji;
							$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
							$regstrGbCd = $temps_array->regstrGbCd;
							$regstrGbCdNm = $temps_array->regstrGbCdNm;
							$regstrKindCd = $temps_array->regstrKindCd;
							$regstrKindCdNm = $temps_array->regstrKindCdNm;
							$newPlatPlc = $temps_array->newPlatPlc;
							$bldNm = $temps_array->bldNm;
							$splotNm = $temps_array->splotNm;
							$block = $temps_array->block;
							$lot = $temps_array->lot;
							$bylotCnt = $temps_array->bylotCnt;
							$naRoadCd = $temps_array->naRoadCd;
							$naBjdongCd = $temps_array->naBjdongCd;
							$naUgrndCd = $temps_array->naUgrndCd;
							$naMainBun = $temps_array->naMainBun;
							$naSubBun = $temps_array->naSubBun;
							$dongNm = $temps_array->dongNm;
							$mainAtchGbCd = $temps_array->mainAtchGbCd;
							$mainAtchGbCdNm = $temps_array->mainAtchGbCdNm;
							$platArea = $temps_array->platArea;
							$archArea = $temps_array->archArea;
							$bcRat = $temps_array->bcRat;
							$totArea = $temps_array->totArea;
							$vlRatEstmTotArea = $temps_array->vlRatEstmTotArea;
							$vlRat = $temps_array->vlRat;
							$strctCd = $temps_array->strctCd;
							$strctCdNm = $temps_array->strctCdNm;
							$etcStrct = $temps_array->etcStrct;
							$mainPurpsCd = $temps_array->mainPurpsCd;
							$mainPurpsCdNm = $temps_array->mainPurpsCdNm;
							$etcPurps = $temps_array->etcPurps;
							$roofCd = $temps_array->roofCd;
							$roofCdNm = $temps_array->roofCdNm;
							$etcRoof = $temps_array->etcRoof;
							$hhldCnt = $temps_array->hhldCnt;
							$fmlyCnt = $temps_array->fmlyCnt;
							$heit = $temps_array->heit;
							$grndFlrCnt = $temps_array->grndFlrCnt;
							$ugrndFlrCnt = $temps_array->ugrndFlrCnt;
							$rideUseElvtCnt = $temps_array->rideUseElvtCnt;
							$emgenUseElvtCnt = $temps_array->emgenUseElvtCnt;
							$atchBldCnt = $temps_array->atchBldCnt;
							$atchBldArea = $temps_array->atchBldArea;
							$totDongTotArea = $temps_array->totDongTotArea;
							$indrMechUtcnt = $temps_array->indrMechUtcnt;
							$indrMechArea = $temps_array->indrMechArea;
							$oudrMechUtcnt = $temps_array->oudrMechUtcnt;
							$oudrMechArea = $temps_array->oudrMechArea;
							$indrAutoUtcnt = $temps_array->indrAutoUtcnt;
							$indrAutoArea = $temps_array->indrAutoArea;
							$oudrAutoUtcnt = $temps_array->oudrAutoUtcnt;
							$oudrAutoArea = $temps_array->oudrAutoArea;
							$pmsDay = $temps_array->pmsDay;
							$stcnsDay = $temps_array->stcnsDay;
							$useAprDay = $temps_array->useAprDay;
							$pmsnoYear = $temps_array->pmsnoYear;
							$pmsnoKikCd = $temps_array->pmsnoKikCd;
							$pmsnoKikCdNm = $temps_array->pmsnoKikCdNm;
							$pmsnoGbCd = $temps_array->pmsnoGbCd;
							$pmsnoGbCdNm = $temps_array->pmsnoGbCdNm;
							$hoCnt = $temps_array->hoCnt;
							$engrGrade = $temps_array->engrGrade;
							$engrRat = $temps_array->engrRat;
							$engrEpi = $temps_array->engrEpi;
							$gnBldGrade = $temps_array->gnBldGrade;
							$gnBldCert = $temps_array->gnBldCert;
							$itgBldGrade = $temps_array->itgBldGrade;
							$itgBldCert = $temps_array->itgBldCert;
							$crtnDay = $temps_array->crtnDay;
							$rserthqkDsgnApplyYn = $temps_array->rserthqkDsgnApplyYn;
							$rserthqkAblty = $temps_array->rserthqkAblty;
									
							echo '대지위치 : '.$platPlc.'<br>';
							echo '시군구코드 : '.$sigunguCd.'<br>';
							echo '법정동코드 : '.$bjdongCd.'<br>';
							echo '대지구분코드 : '.$platGbCd.'<br>';
							echo '번 : '.$bun.'<br>';
							echo '지 : '.$ji.'<br>';
							echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
							echo '대장구분코드 : '.$regstrGbCd.'<br>';
							echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
							echo '대장종류코드 : '.$regstrKindCd.'<br>';
							echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
							echo '도로명대지위치 : '.$newPlatPlc.'<br>';
							echo '건물명 : '.$bldNm.'<br>';
							echo '특수지명 : '.$splotNm.'<br>';
							echo '블록 : '.$block.'<br>';
							echo '로트 : '.$lot.'<br>';
							echo '외필지수 : '.$bylotCnt.'<br>';
							echo '새주소도로코드 : '.$naRoadCd.'<br>';
							echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
							echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
							echo '새주소본번 : '.$naMainBun.'<br>';
							echo '새주소부번 : '.$naSubBun.'<br>';
							echo '동명칭 : '.$dongNm.'<br>';
							echo '주부속구분코드 : '.$mainAtchGbCd.'<br>';
							echo '주부속구분코드명 : '.$mainAtchGbCdNm.'<br>';
							echo '대지면적(㎡) : '.$platArea.'<br>';
							echo '건축면적(㎡) : '.$archArea.'<br>';
							echo '건폐율(%) : '.$bcRat.'<br>';
							echo '연면적(㎡) : '.$totArea.'<br>';
							echo '용적률산정연면적(㎡) : '.$vlRatEstmTotArea.'<br>';
							echo '용적률(%) : '.$vlRat.'<br>';
							echo '구조코드 : '.$strctCd.'<br>';
							echo '구조코드명 : '.$strctCdNm.'<br>';
							echo '기타구조 : '.$etcStrct.'<br>';
							echo '주용도코드 : '.$mainPurpsCd.'<br>';
							echo '주용도코드명 : '.$mainPurpsCdNm.'<br>';
							echo '기타용도 : '.$etcPurps.'<br>';
							echo '지붕코드 : '.$roofCd.'<br>';
							echo '지붕코드명 : '.$roofCdNm.'<br>';
							echo '기타지붕 : '.$etcRoof.'<br>';
							echo '세대수(세대) : '.$hhldCnt.'<br>';
							echo '가구수(가구) : '.$fmlyCnt.'<br>';
							echo '높이(m) : '.$heit.'<br>';
							echo '지상층수 : '.$grndFlrCnt.'<br>';
							echo '지하층수 : '.$ugrndFlrCnt.'<br>';
							echo '승용승강기수 : '.$rideUseElvtCnt.'<br>';
							echo '비상용승강기수 : '.$emgenUseElvtCnt.'<br>';
							echo '부속건축물수 : '.$atchBldCnt.'<br>';
							echo '부속건축물면적(㎡) : '.$atchBldArea.'<br>';
							echo '총동연면적(㎡) : '.$totDongTotArea.'<br>';
							echo '옥내기계식대수(대) : '.$indrMechUtcnt.'<br>';
							echo '옥내기계식면적(㎡) : '.$indrMechArea.'<br>';
							echo '옥외기계식대수(대) : '.$oudrMechUtcnt.'<br>';
							echo '옥외기계식면적(㎡) : '.$oudrMechArea.'<br>';
							echo '옥내자주식대수(대) : '.$indrAutoUtcnt.'<br>';
							echo '옥내자주식면적(㎡) : '.$indrAutoArea.'<br>';
							echo '옥외자주식대수(대) : '.$oudrAutoUtcnt.'<br>';
							echo '옥외자주식면적(㎡) : '.$oudrAutoArea.'<br>';
							echo '허가일 : '.$pmsDay.'<br>';
							echo '착공일 : '.$stcnsDay.'<br>';
							echo '사용승인일 : '.$useAprDay.'<br>';
							echo '허가번호년 : '.$pmsnoYear.'<br>';
							echo '허가번호기관코드 : '.$pmsnoKikCd.'<br>';
							echo '허가번호기관코드명 : '.$pmsnoKikCdNm.'<br>';
							echo '허가번호구분코드 : '.$pmsnoGbCd.'<br>';
							echo '허가번호구분코드명 : '.$pmsnoGbCdNm.'<br>';
							echo '호수(호) : '.$hoCnt.'<br>';
							echo '에너지효율등급 : '.$engrGrade.'<br>';
							echo '에너지절감율 : '.$engrRat.'<br>';
							echo 'EPI점수 : '.$engrEpi.'<br>';
							echo '친환경건축물등급 : '.$gnBldGrade.'<br>';
							echo '친환경건축물인증점수 : '.$gnBldCert.'<br>';
							echo '지능형건축물등급 : '.$itgBldGrade.'<br>';
							echo '지능형건축물인증점수 : '.$itgBldCert.'<br>';
							echo '생성일자 : '.$crtnDay.'<br>';
							echo '내진 설계 적용 여부 : '.$rserthqkDsgnApplyYn.'<br>';
							echo '내진 능력 : '.$rserthqkAblty.'<br>';
						}							
				
				
				
				
				
				
				
				?>		
				
				
				
				
				
				
				
				
				
				
				
				</div>
				</div>
			</div>

			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 층별개요	</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[3],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];

						
		$platPlc = $temps_array->platPlc;
		$sigunguCd = $temps_array->sigunguCd;
		$bjdongCd = $temps_array->bjdongCd;
		$platGbCd = $temps_array->platGbCd;
		$bun = $temps_array->bun;
		$ji = $temps_array->ji;
		$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
		$newPlatPlc = $temps_array->newPlatPlc;
		$bldNm = $temps_array->bldNm;
		$splotNm = $temps_array->splotNm;
		$block = $temps_array->block;
		$lot = $temps_array->lot;
		$naRoadCd = $temps_array->naRoadCd;
		$naBjdongCd = $temps_array->naBjdongCd;
		$naUgrndCd = $temps_array->naUgrndCd;
		$naMainBun = $temps_array->naMainBun;
		$naSubBun = $temps_array->naSubBun;
		$dongNm = $temps_array->dongNm;
		$flrGbCd = $temps_array->flrGbCd;
		$flrGbCdNm = $temps_array->flrGbCdNm;
		$flrNo = $temps_array->flrNo;
		$flrNoNm = $temps_array->flrNoNm;
		$strctCd = $temps_array->strctCd;
		$strctCdNm = $temps_array->strctCdNm;
		$etcStrct = $temps_array->etcStrct;
		$mainPurpsCd = $temps_array->mainPurpsCd;
		$mainPurpsCdNm = $temps_array->mainPurpsCdNm;
		$etcPurps = $temps_array->etcPurps;
		$mainAtchGbCd = $temps_array->mainAtchGbCd;
		$mainAtchGbCdNm = $temps_array->mainAtchGbCdNm;
		$area = $temps_array->area;
		$areaExctYn = $temps_array->areaExctYn;
		$crtnDay = $temps_array->crtnDay;

		
		echo '대지위치 : '.$platPlc.'<br>';
		echo '시군구코드 : '.$sigunguCd.'<br>';
		echo '법정동코드 : '.$bjdongCd.'<br>';
		echo '대지구분코드 : '.$platGbCd.'<br>';
		echo '번 : '.$bun.'<br>';
		echo '지 : '.$ji.'<br>';
		echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
		echo '도로명대지위치 : '.$newPlatPlc.'<br>';
		echo '건물명 : '.$bldNm.'<br>';
		echo '특수지명 : '.$splotNm.'<br>';
		echo '블록 : '.$block.'<br>';
		echo '로트 : '.$lot.'<br>';
		echo '새주소도로코드 : '.$naRoadCd.'<br>';
		echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
		echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
		echo '새주소본번 : '.$naMainBun.'<br>';
		echo '새주소부번 : '.$naSubBun.'<br>';
		echo '동명칭 : '.$dongNm.'<br>';
		echo '층구분코드 : '.$flrGbCd.'<br>';
		echo '층구분코드명 : '.$flrGbCdNm.'<br>';
		echo '층번호 : '.$flrNo.'<br>';
		echo '층번호명 : '.$flrNoNm.'<br>';
		echo '구조코드 : '.$strctCd.'<br>';
		echo '구조코드명 : '.$strctCdNm.'<br>';
		echo '기타구조 : '.$etcStrct.'<br>';
		echo '주용도코드 : '.$mainPurpsCd.'<br>';
		echo '주용도코드명 : '.$mainPurpsCdNm.'<br>';
		echo '기타용도 : '.$etcPurps.'<br>';
		echo '주부속구분코드 : '.$mainAtchGbCd.'<br>';
		echo '주부속구분코드명 : '.$mainAtchGbCdNm.'<br>';
		echo '면적(㎡) : '.$area.'<br>';
		echo '면적제외여부 : '.$areaExctYn.'<br>';
		echo '생성일자 : '.$crtnDay.'<br>';
								
						
						
						?>
				
				
				
					</div>
				</div>
			</div>







			








			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 부속지번		</div>
					<div class="panel-body">	
						
						<?php
							
							$url = hd_urls($temp_api[4],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];
						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$regstrGbCd = $temps_array->regstrGbCd;
						$regstrGbCdNm = $temps_array->regstrGbCdNm;
						$regstrKindCd = $temps_array->regstrKindCd;
						$regstrKindCdNm = $temps_array->regstrKindCdNm;
						$newPlatPlc = $temps_array->newPlatPlc;
						$bldNm = $temps_array->bldNm;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$naRoadCd = $temps_array->naRoadCd;
						$naBjdongCd = $temps_array->naBjdongCd;
						$naUgrndCd = $temps_array->naUgrndCd;
						$naMainBun = $temps_array->naMainBun;
						$naSubBun = $temps_array->naSubBun;
						$atchRegstrGbCd = $temps_array->atchRegstrGbCd;
						$atchRegstrGbCdNm = $temps_array->atchRegstrGbCdNm;
						$atchSigunguCd = $temps_array->atchSigunguCd;
						$atchBjdongCd = $temps_array->atchBjdongCd;
						$atchPlatGbCd = $temps_array->atchPlatGbCd;
						$atchBun = $temps_array->atchBun;
						$atchJi = $temps_array->atchJi;
						$atchSplotNm = $temps_array->atchSplotNm;
						$atchBlock = $temps_array->atchBlock;
						$atchLot = $temps_array->atchLot;
						$atchEtcJibunNm = $temps_array->atchEtcJibunNm;
						$crtnDay = $temps_array->crtnDay;

						
						echo '대지위치 : '.$platPlc.'<br>';
						echo '시군구코드 : '.$sigunguCd.'<br>';
						echo '법정동코드 : '.$bjdongCd.'<br>';
						echo '대지구분코드 : '.$platGbCd.'<br>';
						echo '번 : '.$bun.'<br>';
						echo '지 : '.$ji.'<br>';
						echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
						echo '대장구분코드 : '.$regstrGbCd.'<br>';
						echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
						echo '대장종류코드 : '.$regstrKindCd.'<br>';
						echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
						echo '도로명대지위치 : '.$newPlatPlc.'<br>';
						echo '건물명 : '.$bldNm.'<br>';
						echo '특수지명 : '.$splotNm.'<br>';
						echo '블록 : '.$block.'<br>';
						echo '로트 : '.$lot.'<br>';
						echo '새주소도로코드 : '.$naRoadCd.'<br>';
						echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
						echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
						echo '새주소본번 : '.$naMainBun.'<br>';
						echo '새주소부번 : '.$naSubBun.'<br>';
						echo '부속대장구분코드 : '.$atchRegstrGbCd.'<br>';
						echo '부속대장구분코드명 : '.$atchRegstrGbCdNm.'<br>';
						echo '부속시군구코드 : '.$atchSigunguCd.'<br>';
						echo '부속법정동코드 : '.$atchBjdongCd.'<br>';
						echo '부속대지구분코드 : '.$atchPlatGbCd.'<br>';
						echo '부속번 : '.$atchBun.'<br>';
						echo '부속지 : '.$atchJi.'<br>';
						echo '부속특수지명 : '.$atchSplotNm.'<br>';
						echo '부속블록 : '.$atchBlock.'<br>';
						echo '부속로트 : '.$atchLot.'<br>';
						echo '부속기타지번명 : '.$atchEtcJibunNm.'<br>';
						echo '생성일자 : '.$crtnDay.'<br>';

						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			







			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 전유공용면적		</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[5],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];



						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$regstrGbCd = $temps_array->regstrGbCd;
						$regstrGbCdNm = $temps_array->regstrGbCdNm;
						$regstrKindCd = $temps_array->regstrKindCd;
						$regstrKindCdNm = $temps_array->regstrKindCdNm;
						$newPlatPlc = $temps_array->newPlatPlc;
						$bldNm = $temps_array->bldNm;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$naRoadCd = $temps_array->naRoadCd;
						$naBjdongCd = $temps_array->naBjdongCd;
						$naUgrndCd = $temps_array->naUgrndCd;
						$naMainBun = $temps_array->naMainBun;
						$naSubBun = $temps_array->naSubBun;
						$dongNm = $temps_array->dongNm;
						$hoNm = $temps_array->hoNm;
						$flrGbCd = $temps_array->flrGbCd;
						$flrGbCdNm = $temps_array->flrGbCdNm;
						$flrNo = $temps_array->flrNo;
						$flrNoNm = $temps_array->flrNoNm;
						$exposPubuseGbCd = $temps_array->exposPubuseGbCd;
						$exposPubuseGbCdNm = $temps_array->exposPubuseGbCdNm;
						$mainAtchGbCd = $temps_array->mainAtchGbCd;
						$mainAtchGbCdNm = $temps_array->mainAtchGbCdNm;
						$strctCd = $temps_array->strctCd;
						$strctCdNm = $temps_array->strctCdNm;
						$etcStrct = $temps_array->etcStrct;
						$mainPurpsCd = $temps_array->mainPurpsCd;
						$mainPurpsCdNm = $temps_array->mainPurpsCdNm;
						$etcPurps = $temps_array->etcPurps;
						$area = $temps_array->area;
						
						
echo '대지위치 : '.$platPlc.'<br>';
echo '시군구코드 : '.$sigunguCd.'<br>';
echo '법정동코드 : '.$bjdongCd.'<br>';
echo '대지구분코드 : '.$platGbCd.'<br>';
echo '번 : '.$bun.'<br>';
echo '지 : '.$ji.'<br>';
echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
echo '대장구분코드 : '.$regstrGbCd.'<br>';
echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
echo '대장종류코드 : '.$regstrKindCd.'<br>';
echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
echo '도로명대지위치 : '.$newPlatPlc.'<br>';
echo '건물명 : '.$bldNm.'<br>';
echo '특수지명 : '.$splotNm.'<br>';
echo '블록 : '.$block.'<br>';
echo '로트 : '.$lot.'<br>';
echo '새주소도로코드 : '.$naRoadCd.'<br>';
echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
echo '새주소본번 : '.$naMainBun.'<br>';
echo '새주소부번 : '.$naSubBun.'<br>';
echo '동명칭 : '.$dongNm.'<br>';
echo '호명칭 : '.$hoNm.'<br>';
echo '층구분코드 : '.$flrGbCd.'<br>';
echo '층구분코드명 : '.$flrGbCdNm.'<br>';
echo '층번호 : '.$flrNo.'<br>';
echo '층번호명 : '.$flrNoNm.'<br>';
echo '전유공용구분코드 : '.$exposPubuseGbCd.'<br>';
echo '전유공용구분코드명 : '.$exposPubuseGbCdNm.'<br>';
echo '주부속구분코드 : '.$mainAtchGbCd.'<br>';
echo '주부속구분코드명 : '.$mainAtchGbCdNm.'<br>';
echo '구조코드 : '.$strctCd.'<br>';
echo '구조코드명 : '.$strctCdNm.'<br>';
echo '기타구조 : '.$etcStrct.'<br>';
echo '주용도코드 : '.$mainPurpsCd.'<br>';
echo '주용도코드명 : '.$mainPurpsCdNm.'<br>';
echo '기타용도 : '.$etcPurps.'<br>';
echo '면적(㎡) : '.$area.'<br>';
echo '생성일자 : '.$crtnDay.'<br>';

						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			







			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 오수정화시설		</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[6],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];

						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$regstrGbCd = $temps_array->regstrGbCd;
						$regstrGbCdNm = $temps_array->regstrGbCdNm;
						$regstrKindCd = $temps_array->regstrKindCd;
						$regstrKindCdNm = $temps_array->regstrKindCdNm;
						$newPlatPlc = $temps_array->newPlatPlc;
						$bldNm = $temps_array->bldNm;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$naRoadCd = $temps_array->naRoadCd;
						$naBjdongCd = $temps_array->naBjdongCd;
						$naUgrndCd = $temps_array->naUgrndCd;
						$naMainBun = $temps_array->naMainBun;
						$naSubBun = $temps_array->naSubBun;
						$modeCd = $temps_array->modeCd;
						$modeCdNm = $temps_array->modeCdNm;
						$etcMode = $temps_array->etcMode;
						$unitGbCd = $temps_array->unitGbCd;
						$unitGbCdNm = $temps_array->unitGbCdNm;
						$capaPsper = $temps_array->capaPsper;
						$capaLube = $temps_array->capaLube;
						$crtnDay = $temps_array->crtnDay;
						
						echo '대지위치 : '.$platPlc.'<br>';
echo '시군구코드 : '.$sigunguCd.'<br>';
echo '법정동코드 : '.$bjdongCd.'<br>';
echo '대지구분코드 : '.$platGbCd.'<br>';
echo '번 : '.$bun.'<br>';
echo '지 : '.$ji.'<br>';
echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
echo '대장구분코드 : '.$regstrGbCd.'<br>';
echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
echo '대장종류코드 : '.$regstrKindCd.'<br>';
echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
echo '도로명대지위치 : '.$newPlatPlc.'<br>';
echo '건물명 : '.$bldNm.'<br>';
echo '특수지명 : '.$splotNm.'<br>';
echo '블록 : '.$block.'<br>';
echo '로트 : '.$lot.'<br>';
echo '새주소도로코드 : '.$naRoadCd.'<br>';
echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
echo '새주소본번 : '.$naMainBun.'<br>';
echo '새주소부번 : '.$naSubBun.'<br>';
echo '형식코드 : '.$modeCd.'<br>';
echo '형식코드명 : '.$modeCdNm.'<br>';
echo '기타형식 : '.$etcMode.'<br>';
echo '단위구분코드 : '.$unitGbCd.'<br>';
echo '단위구분코드명 : '.$unitGbCdNm.'<br>';
echo '용량(인용) : '.$capaPsper.'<br>';
echo '용량(루베) : '.$capaLube.'<br>';
echo '생성일자 : '.$crtnDay.'<br>';

						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			







			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 주택가격		</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[7],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];
						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$regstrGbCd = $temps_array->regstrGbCd;
						$regstrGbCdNm = $temps_array->regstrGbCdNm;
						$regstrKindCd = $temps_array->regstrKindCd;
						$regstrKindCdNm = $temps_array->regstrKindCdNm;
						$newPlatPlc = $temps_array->newPlatPlc;
						$bldNm = $temps_array->bldNm;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$bylotCnt = $temps_array->bylotCnt;
						$naRoadCd = $temps_array->naRoadCd;
						$naBjdongCd = $temps_array->naBjdongCd;
						$naUgrndCd = $temps_array->naUgrndCd;
						$naMainBun = $temps_array->naMainBun;
						$naSubBun = $temps_array->naSubBun;
						$hsprc = $temps_array->hsprc;
						$crtnDay = $temps_array->crtnDay;
						$stdDay = $temps_array->stdDay;
						
						echo '대지위치 : '.$platPlc.'<br>';
echo '시군구코드 : '.$sigunguCd.'<br>';
echo '법정동코드 : '.$bjdongCd.'<br>';
echo '대지구분코드 : '.$platGbCd.'<br>';
echo '번 : '.$bun.'<br>';
echo '지 : '.$ji.'<br>';
echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
echo '대장구분코드 : '.$regstrGbCd.'<br>';
echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
echo '대장종류코드 : '.$regstrKindCd.'<br>';
echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
echo '도로명대지위치 : '.$newPlatPlc.'<br>';
echo '건물명 : '.$bldNm.'<br>';
echo '특수지명 : '.$splotNm.'<br>';
echo '블록 : '.$block.'<br>';
echo '로트 : '.$lot.'<br>';
echo '외필지수 : '.$bylotCnt.'<br>';
echo '새주소도로코드 : '.$naRoadCd.'<br>';
echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
echo '새주소본번 : '.$naMainBun.'<br>';
echo '새주소부번 : '.$naSubBun.'<br>';
echo '주택가격 : '.$hsprc.'<br>';
echo '생성일자 : '.$crtnDay.'<br>';
echo '기준일자 : '.$stdDay.'<br>';

						
						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			







			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 전유부		</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[8],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];

						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$regstrGbCd = $temps_array->regstrGbCd;
						$regstrGbCdNm = $temps_array->regstrGbCdNm;
						$regstrKindCd = $temps_array->regstrKindCd;
						$regstrKindCdNm = $temps_array->regstrKindCdNm;
						$newPlatPlc = $temps_array->newPlatPlc;
						$bldNm = $temps_array->bldNm;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$naRoadCd = $temps_array->naRoadCd;
						$naBjdongCd = $temps_array->naBjdongCd;
						$naUgrndCd = $temps_array->naUgrndCd;
						$naMainBun = $temps_array->naMainBun;
						$naSubBun = $temps_array->naSubBun;
						$dongNm = $temps_array->dongNm;
						$hoNm = $temps_array->hoNm;
						$flrGbCd = $temps_array->flrGbCd;
						$flrGbCdNm = $temps_array->flrGbCdNm;
						$flrNo = $temps_array->flrNo;
						$crtnDay = $temps_array->crtnDay;
						
						
echo '대지위치 : '.$platPlc.'<br>';
echo '시군구코드 : '.$sigunguCd.'<br>';
echo '법정동코드 : '.$bjdongCd.'<br>';
echo '대지구분코드 : '.$platGbCd.'<br>';
echo '번 : '.$bun.'<br>';
echo '지 : '.$ji.'<br>';
echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
echo '대장구분코드 : '.$regstrGbCd.'<br>';
echo '대장구분코드명 : '.$regstrGbCdNm.'<br>';
echo '대장종류코드 : '.$regstrKindCd.'<br>';
echo '대장종류코드명 : '.$regstrKindCdNm.'<br>';
echo '도로명대지위치 : '.$newPlatPlc.'<br>';
echo '건물명 : '.$bldNm.'<br>';
echo '특수지명 : '.$splotNm.'<br>';
echo '블록 : '.$block.'<br>';
echo '로트 : '.$lot.'<br>';
echo '새주소도로코드 : '.$naRoadCd.'<br>';
echo '새주소법정동코드 : '.$naBjdongCd.'<br>';
echo '새주소지상지하코드 : '.$naUgrndCd.'<br>';
echo '새주소본번 : '.$naMainBun.'<br>';
echo '새주소부번 : '.$naSubBun.'<br>';
echo '동명칭 : '.$dongNm.'<br>';
echo '호명칭 : '.$hoNm.'<br>';
echo '층구분코드 : '.$flrGbCd.'<br>';
echo '층구분코드명 : '.$flrGbCdNm.'<br>';
echo '층번호 : '.$flrNo.'<br>';
echo '생성일자 : '.$crtnDay.'<br>';

						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			







			
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">	<font color='yellow'>	<?php echo $main_info['platPlc']?></font>	건축물대장 지역지구구역		</div>
					<div class="panel-body">	
						
						<?php
							
						$url = hd_urls($temp_api[9],$temps_stard,$serviceKey);
					
						$response = file_get_contents($url);
						$object = simplexml_load_string($response);
						$data_arr = $object->body[0]->items[0]; 
						$temps_array = $data_arr->item[0];
						$platPlc = $temps_array->platPlc;
						$sigunguCd = $temps_array->sigunguCd;
						$bjdongCd = $temps_array->bjdongCd;
						$platGbCd = $temps_array->platGbCd;
						$bun = $temps_array->bun;
						$ji = $temps_array->ji;
						$mgmBldrgstPk = $temps_array->mgmBldrgstPk;
						$newPlatPlc = $temps_array->newPlatPlc;
						$splotNm = $temps_array->splotNm;
						$block = $temps_array->block;
						$lot = $temps_array->lot;
						$jijiguGbCd = $temps_array->jijiguGbCd;
						$jijiguGbCdNm = $temps_array->jijiguGbCdNm;
						$jijiguCd = $temps_array->jijiguCd;
						$jijiguCdNm = $temps_array->jijiguCdNm;
						$reprYn = $temps_array->reprYn;
						$etcJijigu = $temps_array->etcJijigu;
						$crtnDay = $temps_array->crtnDay;
						
						echo '대지위치 : '.$platPlc.'<br>';
echo '시군구코드 : '.$sigunguCd.'<br>';
echo '법정동코드 : '.$bjdongCd.'<br>';
echo '대지구분코드 : '.$platGbCd.'<br>';
echo '번 : '.$bun.'<br>';
echo '지 : '.$ji.'<br>';
echo '관리건축물대장PK : '.$mgmBldrgstPk.'<br>';
echo '도로명대지위치 : '.$newPlatPlc.'<br>';
echo '특수지명 : '.$splotNm.'<br>';
echo '블록 : '.$block.'<br>';
echo '로트 : '.$lot.'<br>';
echo '지역지구구역구분코드 : '.$jijiguGbCd.'<br>';
echo '지역지구구역구분코드명 : '.$jijiguGbCdNm.'<br>';
echo '지역지구구역코드 : '.$jijiguCd.'<br>';
echo '지역지구구역코드명 : '.$jijiguCdNm.'<br>';
echo '대표여부 : '.$reprYn.'<br>';
echo '기타지역지구구역 : '.$etcJijigu.'<br>';
echo '생성일자 : '.$crtnDay.'<br>';

						
						
						?>
				
				
				
					</div>
				</div>
			</div>

			


		 
  

	
	</div>
</div>	<!--/.main-->















































	
<!--Modal-->
<?php include_once('../contents_footer.php');


?>


