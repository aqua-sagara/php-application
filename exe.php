<?php
// ホスト名
$host = " localhost" ;
$link = pg_connect("host=$host port=5444 dbname=spot user=test password= test");
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');

//	$sql="select wk_tanpin.ten_cd, date_ymd, wk_tanpin.plu_cd, uri_kin, uri_su, bumonid, bumonname, lineid, linename, classid, classname 
//	from ma_category left outer join wk_tanpin on wk_tanpin.plu_cd = ma_category.plu_cd where date_ymd like '%201603%' and lineid='16006'
//	";
//	$sum_result=pg_query($sql);
//	$sum_rows=pg_numrows($sum_result);
//	echo "全体$sum_rows";
for($day1=0;$day1<=3;$day1++){
		for($day2=0;$day2<10;$day2++){
			if($day1==3&&$day2==2)return;
			//else if($day1==0&&$day2==0)return;
			$sql2="select sum(uri_kin)
			from wk_tanpin left outer join ma_category on wk_tanpin.plu_cd = ma_category.plu_cd where date_ymd like '%201506$day1$day2%' and lineid='17024'
			";
			//	echo $sql2;
				$sum_result2=pg_query($sql2);	
				$sum_rows2=pg_numrows($sum_result2);
				$uriage=0;
			$uriage=pg_fetch_array($sum_result2);
    					if($uriage[0]==null) $uriage[0]=0;
			(float)$answer;
			$answer=(float)$sum_rows2/(float)$sum_rows*100;
				//echo round($answer,1);
				
				//echo $uriage[0];
				echo '<p>';
				$rows2=0;

		}

}