<?php
//header("Content-Type: text/html;charset=tis-620");
header("Content-Type: text/html;charset=tis-620");
global $errormessage;
$Spliter = '-';
$Spliter_num = ('6|7|8');
$EndofWak ='\t';
$Wak_num = 2;
$EndofBat = '\n';
$Bat_num = 2;
$EndofBot = '\EoB';
$EndofKlon = '\Eof';
$Vw	= ('+a|+a;|+i|+i;|+v|+v;|+u|+u;|+e|+e;|+x|+x;|+o|+o;|+@|+@;|+#|+#;|+ia|+ia;|+va|+v;a|+ua|+u;a|+am|+ai|+aj|+aw'); 
$Cs	= ('k|kh|ng|c|ch|s|j|d|t|th|n|b|p|ph|f|m|r|l|w|h|?');
$Cc	= ('pr|pl|tr|kr|kl|kw|phr|phl|khr|khl|khw');
$Cf	= ('=k=|=ng=|=j=|=d=|=n=|=b=|=m=|=w=');
$Tn1 = '^1';
$Tn2 = '^2';
$Tn3 = '^3';
$Tn4 = '^4';
$Tn5 = '^5';

$kl0n 	= 'Bot\Eof|(Bot*)\Eof';
$Bot	= 'Ba;t1\n Ba;t2\n\EoB';
$Bat1	= 'WakFrA\t WakFrB\t';
$Bat2	= 'WakFrB\t WaFrC\t';
$WakFrA	= 'Payang(1-7)ErA|Payang(1-8)ErA|Payang(1-6)ErA';
$WakFrB	= 'Payang(1-7)ErB|Payang(1-8)ErB|Payang(1-6)ErB';
$WakFrC	= 'Payang(1-7)ErC|Payang(1-8)ErC|Payang(1-6)ErC';
$Payang	= 'CsVwTnCf|CsVwTnCfCr|CsVwTn|CsVwTnCR|CcVwTnCf|CcVwTnCfCr|CcVwTn|CcVwTnCR';
$ERB	= 'ERB1|ERB2';
$ErA	= 'PayangTn2|PayangTn3|PayangTn4|PayangTn5';
$ErB1	= 'PayangTn2|PayangTn3|PayangTn5';
$ErB2	= 'PayangTn1|PayangTn4';
$ErC	= 'PayangTn1|PayangTn4';
$Tn		= 'Tn1|Tn2|Tn3|Tn4|Tn5';





Function CheckKlon($EndofKlon,$All)
{
	//print $All."<br>";
	$klon_data = explode($EndofKlon,$All);
	return $klon_data; 
}


function InputSound($payang,$cType,$vType,$sType)
{

//$VCh = "/\+i+/";
$VCh = "(a;|i;|v;|u;|e;|x;|aj|o;|@;|u;a|aw|#;|i;a|v;a|u;a|am)";
//preg_match("a;|i;|v;|u;|e;|x;|aj|o;|@;|u;a|aw|#;|i;a|v;a|u;a|am",$payang,$tt);
//print_r($tt);
	switch($cType){
	  case "Mid" : {  if($vType == 'VnR') { $Npayang = $payang."^".$sType; } 
	  						else {
								 if($sType == '1') { $Npayang = $payang."^2"; }
								 else { $Npayang = $payang."^".$sType; }
							 }
						return $Npayang;
	  			break;
	  			}
	  case "Hi" : { 
	  						if($vType == 'VnR') {   
	  									if($sType == '1') { $Npayang = $payang."^5"; }
								 			else { $Npayang = $payang."^".$sType; }
									}
							else
							{
										if($sType == '1') { $Npayang = $payang."^2"; }
								 			else { $Npayang = $payang."^".$sType; }
							}	  
						return $Npayang;
	  			break;
	  		}
	  case "Low" : {
	  						//print $vType;
	    					if($vType == 'VnR') {   
	  									if($sType == '1') { $Npayang = $payang."^1"; }
										else if($sType == '2') { $Npayang = $payang."^3"; }
										else if($sType == '3') { $Npayang = $payang."^4"; }
							} else
							{
								//print iconv("tis-620","utf-8",$payang)."<br>";
								 if(!preg_match($VCh,$payang))
								 {
								// print "sh";
								 	  if($sType == '2') { $Npayang = $payang."^3"; }
										else if($sType == '1') { $Npayang = $payang."^4"; }
								 }
								 else {
								 	//print "ln";
								 		if($sType == '1') { $Npayang = $payang."^3"; }
										else if($sType == '3') { $Npayang = $payang."^4"; }
								 }
							}
			return $Npayang;
	  break; }
	 }
}

function Translate2Phonetic($thword)
{

$fv = "[ไ,ใ,เ,แ,โ]";
$CcV = "(กว|จร|ขว|คว|คล|พล|หง|หญ|หน|หย|อย|หว)";
//$MidP = "(ก|กร|กล|กว|จ|จร|ด|ต|ตร|ฎ|ฏ|บ|ป|ปร|ปล|อ)";
//$HiP = "(ข|ขร|ขล|ขว|ฃ|ฉ|ฐ|ถ|ผ|ผล|ผร|ฝ|ศ|ศร|ษ|ส|สร|ห)";
//$Low1P = "(พ|พร|พล|ภ|ฟ|ฑ|ฒ|ท|ทร|ธ|ค|คร|คล|คว|ฅ|ฆ|ซ|ช|ฮ|ช|ฌ)";
//$Low2P = "(ง|หง|ญ|หญ|หน|น|ย|หย|อย|ณ|ร|หร|ว|หว|ม|หม|ฬ|ล|หล)";
$CctC = "(กล|กว|จร|คล|พล|หง|หญ|หย|อย|หว|ขล|หม|หร)";
$CctV = "(กว|ขว|คว|หว)";
//$CctV = "[กว,ขว,คว,หว]";


$Ctc = array('เกล' => 'k+e;=n', 'แกล' => 'k+x;=n', 'โกล' => 'k+o;=n', 
'เกว' => 'k+e;=w', 'แกว' => 'k+x;=w', 'โกว' => 'k+o;=w',
'เจร' => 'c+e;=n', 'แจร' => 'c+x;=n', 'โจร' => 'c+o;=n',
'เคล' => 'kh+e;=n', 'แคล' => 'kh+x;=n', 'โคล' => 'kh+o;=n',
'เพล' => 'ph+e;=n', 'แพล' => 'ph+x;=n', 'โพล' => 'ph+o;=n',
'เหง' => 'h+e;=ng', 'แหง' => 'h+x;=ng', 'โหง' => 'h+o;=ng',
'เหญ' => 'h+e;=n', 'แหญ' => 'h+x;=n', 'โหญ' => 'h+o;=n',
'เหน' => 'h+e;=n', 'แหน' => 'h+x;=n', 'โหน' => 'h+o;=n',
'เหย' => 'h+#;=j', 'แหย' => 'j+x;+', 'โหย' => 'h+o;+',
'เอย' => '?+#;=j', 'แอย' => 'j+x;+', 'โอย' => '?+o;+',
'เหว' => 'h+e;=w', 'แหว' => 'h+x;=w', 'โหว' => 'h+o;=w',
'เขล' => 'kh+e;=n', 'แขล' => 'kh+x;=n', 'โขล' => 'kh+o;=n',
'เหม' => 'h+e;=m', 'แหม' => 'h+x;=m', 'โหม' => 'h+o;=m',
'เหร' => 'h+e;=n', 'แหร' => 'h+x;=n', 'โหร' => 'h+o;=n');



// อักษร 3 หมู่
$Triyang = array("ก"=>"Mid","จ"=>"Mid","จร"=>"Mid","ด"=>"Mid","ต"=>"Mid","ฎ"=>"Mid","ฏ"=>"Mid","บ"=>"Mid","ป"=>"Mid","อ"=>"Mid","ข"=>"Hi","ฃ"=>"Hi","ฉ"=>"Hi","ฐ"=>"Hi","ถ"=>"Hi","ผ"=>"Hi","ฝ"=>"Hi","ศ"=>"Hi","ษ"=>"Hi","ส"=>"Hi","ห"=>"Hi","พ"=>"Low","ภ"=>"Low","ฟ"=>"Low","ฑ"=>"Low","ฒ"=>"Low","ท"=>"Low","ธ"=>"Low","ค"=>"Low","ฅ"=>"Low","ฆ"=>"Low","ซ"=>"Low","ช"=>"Low","ฮ"=>"Low","ช"=>"Low","ฌ"=>"Low","ง"=>"Low","ญ"=>"Low","น"=>"Low","ย"=>"Low","ณ"=>"Low","ร"=>"Low","ว"=>"Low","ม"=>"Low","ฬ"=>"Low","ล"=>"Low");

// ไตรยางค์ Cc
$TriyangC= array("กร"=>"Mid","กล"=>"Mid","กว"=>"Mid","จร"=>"Mid","ตร"=>"Mid","ปร"=>"Mid","ปล"=>"Mid","ขร"=>"Hi","ขล"=>"Hi","ขว"=>"Hi","ผล"=>"Hi","ผร"=>"Hi","ศร"=>"Hi","สร"=>"Hi","พร"=>"Low","พล"=>"Low","ทร"=>"Low","คร"=>"Low","คล"=>"Low","คว"=>"Low","หง"=>"Hi","หญ"=>"Hi","หน"=>"Hi","หย"=>"Hi","อย"=>"Mid","หร"=>"Hi","ว"=>"Low","หว"=>"Hi","หม"=>"Hi","หล"=>"Hi");


//พยัญชนะต้น
$Cs = array("ก"=>"k","จ"=>"c","ด"=>"d","ต"=>"t","ฎ"=>"d","ฏ"=>"t","บ"=>"b","ป"=>"p","อ"=>"?","ข"=>"kh","ฃ"=>"kh","ฉ"=>"ch","ฐ"=>"th","ถ"=>"th","ผ"=>"ph","ฝ"=>"f","ศ"=>"s","ษ"=>"s","ส"=>"s","ห"=>"h","พ"=>"ph","ภ"=>"ph","ฟ"=>"f","ฑ"=>"th","ฒ"=>"th","ท"=>"th","ธ"=>"th","ค"=>"kh","ฅ"=>"kh","ฆ"=>"kh","ซ"=>"s","ช"=>"ch","ฮ"=>"h","ช"=>"ch","ฌ"=>"ch","ง"=>"ng","ญ"=>"j","น"=>"n","ย"=>"j","ณ"=>"n","ร"=>"r","ว"=>"w","ม"=>"m","ฬ"=>"l","ล"=>"l");

$Cc = array("กร"=>"kr","กล"=>"kl","กว"=>"kw","จร"=>"c","ตร"=>"tr","ปร"=>"pr","ปล"=>"pl","ขร"=>"khr","ขล"=>"khl","ขว"=>"khw","ผล"=>"phl","ผร"=>"phr","ศร"=>"sr","สร"=>"sr","พร"=>"phr","พล"=>"phl","ทร"=>"thr","คร"=>"khr","คล"=>"khl","คว"=>"khw","หง"=>"ng","หญ"=>"j","หน"=>"n","หย"=>"j","อย"=>"j","หร"=>"r","หว"=>"w","หม"=>"m","หล"=>"l");

//สระเดี่ยว
$Vw = array('ั'=>'+a','ะ'=>'+a','า'=>'+a;','ิ'=>'+i','ี'=>'+i;','ึ'=>'+v','ื'=>'+v;','ุ'=>'+u','ู'=>'+u;','เ'=>'+e;','แ'=>'+x;','ไ'=>'+aj','ใ'=>'+aj','โ'=>'+o;', 'อ'=>'+@;','ัว'=>'+u;a','เา'=>'+aw','เะ'=>'+e','แะ'=>'+x','เอ'=>'+#;','โะ'=>'+o','เาะ'=>'+@','เอะ'=>'+#','เีีย'=>'+i;a','เียะ'=>'+ia','เือะ'=>'+va','เือ'=>'+v;a','ัวะ'=>'+ua','ว'=>'+u;a','ัย'=>'+aj','ัม'=>'+am','ำ'=>'+am','ิ'=>'+#;');

$Vw2 = array('ัว'=>'+u;a','เา'=>'+aw','เะ'=>'+e','แะ'=>'+x','เอ'=>'+#;','โะ'=>'+o','เาะ'=>'+@','เอะ'=>'+#','เีย'=>'+i;a','เียะ'=>'+ia','เือะ'=>'+va','เือ'=>'+v;a','ัวะ'=>'+ua','เิ'=>'+#;','เ็'=>'+e','แ็'=>'+x','็'=>'+@','ัม' => '+am');

//คำเป็น คำตาย
$VnT= array('ะ'=>'VnD','า'=>'VnR','ิ'=>'VnD','ี'=>'VnR','ึ'=>'VnD','ื'=>'VnR','ุ'=>'VnD','ู'=>'VnR','เ'=>'VnR','แ'=>'VnR','ไ'=>'VnR','ใ'=>'VnR','โ'=>'VnR', 'อ'=>'VnR','ัว'=>'VnR','เา'=>'VnR','เือ'=>'VnR', 'เีย'=>'VnR', 'เือ'=>'VnR','ก'=>'VnD','ข'=>'VnD','ฃ'=>'VnD','ค'=>'VnD','ฅ'=>'VnD','ฆ'=>'VnD','ช'=>'VnD','ฌ'=>'VnD','ซ'=>'VnD','ศ'=>'VnD','ษ'=>'VnD','ส' =>'VnD', 'ฎ' =>'VnD', 'ด' =>'VnD', 'ฏ' =>'VnD', 'ต' =>'VnD','ฐ' =>'VnD', 'ฑ' =>'VnD', 'ฒ' =>'VnD','ถ' =>'VnD','ท' =>'VnD', 'ธ' =>'VnD', 'บ' =>'VnD', 'ป' =>'VnD','พ' =>'VnD','ฟ' =>'VnD','ง'=>'VnR','ญ'=>'VnR','ย'=>'VnR','น'=>'VnR','ณ'=>'VnR','ม'=>'VnR','ร'=>'VnR','ล'=>'VnR','ฬ'=>'VnR','ว'=>'VnR','อ'=>'VnR','แะ'=>'VnD','เะ'=>'VnD', 'โะ'=>'VnD','ัวะ'=>'VnD','เาะ'=>'VnD','เยะ'=>'VnD','เอะ'=>'VnD', 'เียะ'=>'VnD','เือะ'=>'VnD','็'=>'VnD','ำ' => 'VnR');


//สระเดี่ยว + ตัวสะกด
$VnCf= array('ะ'=>'+a','า'=>'+a;','ิ'=>'+i','ี'=>'+i;','ึ'=>'+v','ื'=>'+v;','ุ'=>'+u','ู'=>'+u;','เ'=>'+e;','แ'=>'+x;','ไ'=>'+aj','ใ'=>'+aj','โ'=>'+o;','ก'=>'+o=k','ข'=>'+o=k','ฃ'=>'+o=k','ค'=>'+o=k','ฅ'=>'+o=k','ฆ'=>'+o=k','ช'=>'+o=d','ฌ'=>'+o=d','ซ'=>'+o=d','ศ'=>'+o=d','ษ'=>'+o=d','ส' =>'+o=d', 'ฎ' =>'+o=d', 'ด' =>'+o=d', 'ฏ' =>'+o=d', 'ต' =>'+o=d','ฐ' =>'+o=d', 'ฑ' =>'+o=d', 'ฒ' =>'+o=d','ถ' =>'+o=d','ท' =>'+o=d', 'ธ' =>'+o=d', 'บ' =>'+o=b', 'ป' =>'+o=b','พ' =>'+o=b','ฟ' =>'+o=b','ง'=>'+o=ng','ญ' =>'+o=n', 'ย'  =>'+o=j','น' =>'+o=n', 'ณ' =>'+o=n', 'ม' =>'+o=m', 'ร' =>'+@;=n' ,'ล' =>'+o=n', 'ฬ' =>'+o=n', 'ว' =>'+o=w', 'อ'=>'+@;','ำ' => '+am','จ'=>'=d');

//เฉพาะ ตัวสะกด
$Cf= array('ก'=>'=k','ข' =>'=k', 'ฃ'  =>'=k','ค' =>'=k', 'ฅ' =>'=k', 'ฆ' =>'=k', 'ช' =>'=d' ,'ฌ' =>'=d', 'ซ' =>'=d', 'ศ' =>'=d', 'ษ'=>'=d','ส' =>'=d', 'ฎ' =>'=d', 'ด' =>'=d', 'ฏ' =>'=d', 'ต' =>'=d','ฐ' =>'=d', 'ฑ' =>'=d', 'ฒ' =>'=d','ถ' =>'=d','ท' =>'=d', 'ธ' =>'=d', 'บ' =>'=b', 'ป' =>'=b','พ' =>'=b','ฟ' =>'=b','ภ' =>'=b','ง'=>'=ng','ญ' =>'=n', 'ย'  =>'=j','น' =>'=n', 'ณ' =>'=n', 'ม' =>'=m', 'ร' =>'=n' ,'ล' =>'=n', 'ฬ' =>'=n', 'ว' =>'=w','จ'=>'=d','อ'=>'=#');

//
$Tn = array('่'=>'2','้'=>'3','๊'=>'4','๋'=>'5');

$run = array('ก์','ข์','ค์','จ์','ฉ์','ช์','ซ์','ฆ์','ง์','ฌ์','ญ์','ฎ์','ฏ์','ฐ์','ฒ์','ฑ์','ณ์','ด์','ต์','ถ์','ท์','ธ์','บ์','ป์','ผ์','ฝ์','พ์','ฟ์','ภ์','ม์','ย์','น์','ร์','ล์','ว์','ส์','ศ์','ษ์','ฬ์','อ์','ทร์','ธิ์','ดิ์','ธิุ์');

$thword = str_replace($run,"",$thword);

$thword = str_replace("ฤา","รือ",$thword);
$thword = str_replace("ฤ","รึ",$thword);
//$thword = str_replace("ธิ์","",$thword);
//$thword = str_replace("ย์","",$thword);
//print $thword."<br>";
$thword = str_replace("รรม","ัม",$thword);
$thword = str_replace("รรณ","ัน",$thword);
$thword = str_replace("รร","ัน",$thword);


 
//print $thword."===<br>";
   //$sWord = strlen($thword);
  //print $sWord;

if(preg_match("/^_/",$thword))
{
   $sWord = strlen($thword);
   //print $sWord;
   $str_hint = explode("_",$thword);
   $sHint = strlen($str_hint[0]);
   $CsHint =  $str_hint[0][$sHint-2].$str_hint[0][$sHint-1];
   //print $CsHint;
   if(($thword[0]=='เ')||($thword[0]=='แ')||($thword[0]=='โ'))
	 {
	    $payang= strtr($CsHint,$Cc).strtr($thword[0],$Vw);
		$cType = strtr($CsHint,$TriyangC);
		$vType = "VnR";
		$sType = "1";
					//   print $payang."<br>";
					  // print $cType."<br>";
					 //  print $vType."<br>";
					  // print $sType."<br>";
	 }
	 else
	 {
	    $payang= strtr($CsHint,$Cc).strtr($thword[3],$VnCf);
		$cType = strtr($CsHint,$TriyangC);
		$vType = strtr($thword[3],$VnT);
		$sType = "1";
					  // print $payang."<br>";
					   //print $cType."<br>";
					  // print $vType."<br>";
					  // print $sType."<br>";
	 }
	 //print $pho_word;
	  $pho_word = InputSound($payang,$cType,$vType,$sType);
	  return $pho_word ;
}

else
{
//print $thword[0].""; //print $thword[1]."<br>"; //print $thword[2]."<br>"; 
$CountP = strlen($thword);
////print $CountP; ////print $thword;
	switch($CountP) {
	 case 2: {    //print $thword[0]; 
	 				if(($thword[0]=='ไ')||($thword[0]=='ใ')||($thword[0]=='เ')||($thword[0]=='แ')||($thword[0]=='โ'))
					{
					  //print "2.1<br>";
					  $cType = strtr($thword[1],$Triyang);
					  $vType = "VnR";
					  $sType = "1";
					  $payang = strtr($thword[1],$Cs).strtr($thword[0],$Vw);
					   //print $payang."<br>";
					   //print $cType."<br>";
					   //print $vType."<br>";
					}
					else  {  
					
						if($thword[1] == '็')
						{
						//print "2.2.1<br>";
						$cType = strtr($thword[0],$Triyang);
						$vType = "VnR";
						//$sType = "3";
						$payang = strtr($thword[0],$Cs).strtr($thword[1],$Vw2);
						}
						else
						{
						//print "2.2.2<br>";
						$cType = strtr($thword[0],$Triyang);
						$vType = strtr($thword[1],$VnT);
						$sType = "1";
						$payang = strtr($thword[0],$Cs).strtr($thword[1],$VnCf);
						}
					  	 //print $payang."<br>";
						 //print $cType."<br>";
						 //print $vType."<br>";
						 //print $sType."<br>";
						}
				 $pho_word = InputSound($payang,$cType,$vType,$sType);
	 			break;
				}
	 case 3: { 
				 $vType = strtr($thword[2],$VnT);
				 //print "<br>==".$vType;
				 if(isset($Ctc[$thword]))
					{   
					$payang = strtr($thword,$Ctc);
					 $cType = strtr($thword[1],$Triyang);
					$vType = "VnR";
					// $vType = strtr($thword[2],$VnT);
					 $sType = "1";
					}
	 				else
	 				if(($thword[0]=='ไ')||($thword[0]=='ใ')||($thword[0]=='เ')||($thword[0]=='แ')||($thword[0]=='โ'))
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadTn = $thword[1];
					  $ReadTn2 = $thword[2];
					  $ReadVw = $thword[0].$thword[2];
					 	 if(isset($Cc[$ReadCc]))
						 	{   
								if(preg_match($CctC,$ReadCc))
								{
									if(($thword[0]=='ไ')||($thword[0]=='ใ'))
									{
									 //print "3.1.1<br>";
									 $payang= strtr($ReadCc,$Cc).strtr($thword[0],$Vw);
									 $cType = strtr($ReadCc,$TriyangC);
									 $vType = "VnR";
									 $sType = "1";
									}
									else
									{
									 	if(($thword[2] == 'ย')&&($thword[0] == 'เ'))
										{
											 //print "3.1.2.1<br>";
											 $payang= strtr($thword[1],$Cs)."+#;+".strtr($thword[2],$Cf);
											 $cType = strtr($thword[1],$Triyang);
											 $vType = strtr($thword[2],$VnT);
											 $sType = "1";
										}
										else
										{
											 //print "3.1.2.2<br>";
											 $payang= strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[2],$Cf);
											 $cType = strtr($thword[1],$Triyang);
											 $vType = strtr($thword[2],$VnT);
											 $sType = "1";
											} 
								 	} // จบ ควบกล้ำสระนำ ที่แยกเป็นอ่านออกเสียงควบกล้ำ กับ ออกเสียงตัวสะกด และเป็นคำใน CCV
								} else
								{
							//	print "3.1.3<br>";
									 $payang= strtr($ReadCc,$Cc).strtr($thword[0],$Vw);
									 $cType = strtr($ReadCc,$TriyangC);
									 $vType = "VnR";
									 $sType = "1";
								}
								
							 } else 
							 if(isset($Tn[$ReadTn]))
							 {
							// 	print "3.2<br>";
								 $Stn = strtr($thword[1],$Tn); 
								 $payang= strtr($thword[1],$Cs).strtr($thword[0],$Vw);
								 $cType = strtr($thword[1],$Triyang);
								 $vType = "VnR";
								 $sType = strtr($thword[1],$Tn);
							  } else
							   if(isset($Tn[$ReadTn2]))
							 {
							 //	print "3.2<br>";
								 $Stn = strtr($thword[2],$Tn); 
								 $payang= strtr($thword[1],$Cs).strtr($thword[0],$Vw);
								 $cType = strtr($thword[1],$Triyang);
								 $vType = "VnR";
								 $sType = strtr($thword[2],$Tn);
							  } else
							  if(isset($Vw[$ReadVw]))
							  {
							 // 	 print "3.3<br>";
								 $SVw = strtr($ReadVw,$Vw); 
							  	 $payang= strtr($thword[1],$Cs).$SVw; 
								 $cType = strtr($thword[1],$Triyang);
								 $vType = "VnR";
 								 $sType = "1";
							  }
							  else
							  {
								if(($thword[2] == 'ย')&&($thword[0] == 'ไ')) //เช่นคำว่า ไชย  ไทย
									 {
										 $payang= strtr($thword[1],$Cs).strtr($thword[0],$Vw); 
										 $cType = strtr($thword[1],$Triyang);
										 $vType = "VnR";
 										 $sType = "1";
									 }
								else
								{
							//	 print "3.4<br>";
								 $payang= strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[2],$Cf); 
								 $cType = strtr($thword[1],$Triyang);
								  $vType = strtr($thword[2],$VnT);
 								 $sType = "1";
								 }
							  }
  					
  				   }
					else {  
						$ReadCc = $thword[0].$thword[1];
					  	$ReadTn = $thword[1];
						$ReadTn2 = $thword[2];
						$ReadVwc5 = $thword[1].$thword[2];
					 	 if(isset($Cc[$ReadCc]))
						 	{   
								if(isset($Cf[$thword[2]]))
								{
								
									 if(preg_match($CctV,$ReadCc))
						 				{ 
											 $payang= strtr($thword[0],$Cs).strtr($thword[1],$Vw).strtr($thword[2],$Cf);
											 $cType = strtr($thword[0],$Triyang);
											// print "3.5.1.1<br>";
											 $vType = "VnR";
											 $sType = "1";
											 }
											 else
										 {
											// print "3.5.1.2<br>";
											
 										     $payang= strtr($ReadCc,$Cc).strtr($thword[2],$VnCf);
											 $cType = strtr($ReadCc,$TriyangC);
											 $vType = "VnR";
											 $sType = "1";
										 }
								}
								else
								{
									//print "3.5.2<br>";
									 $payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw);
									 $cType = strtr($ReadCc,$TriyangC);
									// $vType = "VnR";
									 $vType = strtr($thword[2],$VnT);
									 $sType = "1";
									}
							 } else 
						 if(isset($Tn[$ReadTn]))
							 {
							 //	print "3.6<br>";
								$Stn = strtr($thword[1],$Tn); 
								$payang = strtr($thword[0],$Cs).strtr($thword[2],$VnCf);
								$cType = strtr($thword[0],$Triyang);
								$vType = strtr($thword[2],$VnT);
							    $sType = strtr($thword[1],$Tn);
							 }
							 else
							 if(isset($Tn[$ReadTn2]))
							 {
							 	//print "3.62<br>";
								$Stn = strtr($thword[2],$Tn); 
								$payang = strtr($thword[0],$Cs).strtr($thword[1],$Vw);
								$cType = strtr($thword[0],$Triyang);
								$vType = "VnR";
							    $sType = strtr($thword[2],$Tn);
							 }
							 else
							 if(isset($Vw[$ReadVwc5]))   // สระ ัว
								{
									$Vwou = $thword[1].$thword[2];
										if($Vwou == 'ัว')
										{
										//print "3.71<br>";
										$payang = strtr($thword[0],$Cs).strtr($ReadVwc5,$Vw);
										$cType = strtr($thword[0],$Triyang);
										$vType = strtr($ReadVwc5,$VnT);
										$sType = "1";
										}
										else
										{
										//print "3.72<br>";
										$payang = strtr($thword[0],$Cs).strtr($thword[1],$Vw).strtr($thword[2],$Cf);
										$cType = strtr($thword[0],$Triyang);
										$vType = strtr($thword[2],$VnT);
										$sType = "1";
										}
								}
								else
							   {
								//print "3.7<br>";
								$payang = strtr($thword[0],$Cs).strtr($thword[1],$Vw).strtr($thword[2],$Cf);
								$cType = strtr($thword[0],$Triyang);
								$vType = strtr($thword[2],$VnT);
								$sType = "1";
							}

						}
	 				 //print $payang."<br>";
					 //print $cType."<br>";
					 //print $vType."<br>";
					 //print $sType."<br>";
 			    $pho_word = InputSound($payang,$cType,$vType,$sType);
				break;
				}
	 case 4: { 
	 				if(($thword[0]=='ไ')||($thword[0]=='ใ')||($thword[0]=='เ')||($thword[0]=='แ')||($thword[0]=='โ'))
					{ // มีสระหน้า
					//print  $thword[0]."<br>";
					  $ReadCc = $thword[1].$thword[2];
					  $ReadTn1 = $thword[2];  // วรรณยุกต์ในตำแหน่งที่ 2
					  $ReadTn2 = $thword[3]; // วรรณยุกต์ในตำแหน่งที่ 3
					  $ReadCf = $thword[3]; // ตัวสะกดในตำแหน่งที่ 3
					  //$ReadCf2 = $thword[4];
					  $ReadVwc = $thword[0].$thword[3];  // สระหน้า + สระหลัง =  สระเกิน
					  $ReadVwc2 = $thword[0].$thword[2];
					 
					  $ReadVw = $thword[0].$thword[2].$thword[3];
					  //print iconv("tis-620","utf-8",$ReadVw)."<br>";
					 	 if(isset($Cc[$ReadCc]))  //ควบกล้ำ
						 	{   
								if(isset($Tn[$ReadTn1])) //การแปลงเมื่อพบวรรณยุกต์ในตำแหน่งที่ 2
									  {
									  	//print "4.1<br>";
										$payang=strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
								 		$cType = strtr( $thword[1],$Triyang);
								 		$vType = strtr($thword[3],$VnT);
										$sType = strtr($ReadTn1[2],$Tn); 
								 		}
										else
										if(isset($Tn[$ReadTn2])) //การแปลงเมื่อพบวรรณยุกต์ในตำแหน่งที่ 3
									  	{
										//print "4.2<br>";
									  	$payang=strtr($ReadCc,$Cc).strtr($thword[0],$Vw);
								 		$cType = strtr($ReadCc,$TriyangC);
								 		$vType = "VnR";
										$sType = strtr($ReadTn2,$Tn); 
								 		}
										else   //ควบกล้ำ ไม่มีวรรณยุกต์ 
										{
											if(isset($Cf[$ReadCf]))  // ลงท้ายดัวยตวสะกด
											{
												//print "4.3<br>";
												$payang=strtr($ReadCc,$Cc).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
												$cType = strtr($ReadCc,$TriyangC);
								 				$vType = strtr($thword[3],$VnT);
												$sType = "1";
											}
											else  // สระเกิน
											{
												//print "4.4<br>";
												$payang=strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw);
												$cType = strtr($ReadCc,$TriyangC);
								 				$vType = strtr($ReadVwc,$VnT);
												$sType = "1";
											}
										}
							 } else //มีสระ หน้าแต่ไม่ควบกล้ำ  
							 	
								{
									if(isset($Cf[$ReadCf]))  // ลงท้ายดัวยตัวสะกด
											{
												//print "aaaa";
												if($thword[2] == 'อ')
												{
													//print "4.5.1<br>";
													//print "aaaa0";	
													//print iconv("tis-620","utf-8",$Vw[$thword[2]])."<br>";																							
													/*$payang=strtr($thword[1],$Cs).strtr($ReadVwc2,$Vw2).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);*/
								 					$payang=strtr($thword[1],$Cs).'+#;'.strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);
													$sType ="1";
													
													//print iconv("tis-620","utf-8",$payang)."<br>";
												}
												else
												if(isset($Vw[$thword[2]]))
												{
													//print "4.5.1<br>";
													//print "aaaa0";	
													//print iconv("tis-620","utf-8",$Vw[$thword[2]])."<br>";																							
													/*$payang=strtr($thword[1],$Cs).strtr($ReadVwc2,$Vw2).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);*/
								 					$payang=strtr($thword[1],$Cs).strtr($thword[2],$Vw).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);
													$sType ="1";
													
													//print iconv("tis-620","utf-8",$payang)."<br>";
												}
												else
												{
													//print "4.5<br>";
													//print "aaaa1";
													if($thword[2] == '็')
													{
												//	print "4.5x<br>";
													/*strtr($thword[1],$Vw2);
													$payang=strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);
													$sType = strtr($thword[2],$Tn);*/
													
													$payang=strtr($thword[1],$Cs).strtr($ReadVwc2,$Vw2).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);
								 					$sType = "1";
													
													}
													else
													{
													//print "aaaa2";
													$payang=strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($thword[3],$VnT);
													$sType = strtr($thword[2],$Tn);
													}
												}
										   }
											else  // สระเกิน
											{
												//if(isset($Tn[$ReadTn1]))  
												if($ReadTn1=='๊') // ถ้าเป็นลักษณะของสระเกินประเภทสระลดรูป เช่น เอ๊ะ แป๊ะ
												{												
												//print "4.6.1<br>";
												$payang=strtr($thword[1],$Cs).strtr($ReadVwc,$Vw);
												$cType = strtr($thword[1],$Triyang);
								 				$vType = strtr($ReadVwc,$VnT);
												$sType = strtr($thword[2],$Tn);
												}
												else
												if(isset($Tn[$ReadTn1]))  
													{
														 if(($thword[3] == 'ย') ||($thword[3] == 'อ'))
														{
															//print "4.6.2.1<br>";
															$payang=strtr($thword[1],$Cs)."+#;".strtr($thword[3],$Cf);
															$cType = strtr($thword[1],$Triyang);
								 							$vType = strtr($thword[3],$VnT);
															$sType = strtr($thword[2],$Tn);
														 }
														 else
														 if($thword[3] == 'า')
														{
															//print "4.6.2.1<br>";
															$payang=strtr($thword[1],$Cs)."+aw";
															$cType = strtr($thword[1],$Triyang);
								 							$vType = "VnR";
															$sType = strtr($thword[2],$Tn);
														 }
														 else
														 {
															//print "4.6.2.2<br>";
															$payang=strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
															$cType = strtr($thword[1],$Triyang);
								 							$vType = strtr($thword[3],$VnT);
															$sType = strtr($thword[2],$Tn);
														}
													}
												 else   // กรณีที่เป็น อักษรเดี่ยว สระเกิน โดยไม่มี วรรณยุกต์
												{
												 ////print $ReadVw;
												    if(($thword[3] != 'ย') &&($thword[3] != 'อ')&&($thword[3] != 'ะ'))
													{
													//print "4.7.1<br>";
														$payang=strtr($thword[1],$Cs).strtr($ReadVwc2,$Vw2).strtr($thword[3],$Cf);
														$cType = strtr($thword[1],$Triyang);
								 						$vType = strtr($thword[3],$VnT);
														$sType = "1";
													}
													else
								                     {
											    	//print "4.7.2<br>";
													$payang=strtr($thword[1],$Cs).strtr($ReadVw,$Vw2);
													$cType = strtr($thword[1],$Triyang);
								 					$vType = strtr($ReadVw,$VnT);
													$sType = "1";
													}
												}
										 }
									 }
							}
						else
						{			//แบบไม่มีสระหน้า
						 		 $ReadCc = $thword[0].$thword[1];
								 $ReadTn0 = $thword[1];  // วรรณยุกต์ในตำแหน่งที่ 1 เกิดในกรณีที่ไม่ใข่พยัญชนะควบกล้ำ
					  			 $ReadTn1 = $thword[2];  // วรรณยุกต์ในตำแหน่งที่ 2
					 			 $ReadTn2 = $thword[3];  // วรรณยุกต์ในตำแหน่งที่ 3
					 			 $ReadCf = $thword[3];    // ตัวสะกดในตำแหน่งที่ 3
								 $ReadVwc5 = $thword[2].$thword[3];
	 
								if(isset($Cc[$ReadCc]))   // อักษรนำ ควบกล้ำ
								 {
							 		 if(isset($Tn[$ReadTn1]))  // วรรณยุกต์ในตำแหน่งที่ 2
									 {
										 if(isset($VnCf[$ReadCf]))  //ลงท้ายด้วยสระเกิน
											{
											//print "4.8<br>";
											$payang= strtr($ReadCc,$Cc).strtr($thword[3],$VnCf);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[3],$VnT);
											$sType = strtr($ReadTn1,$Tn);
											}
											else
											{
								 			//print "4.9<br>";
											$Stn = strtr($ReadTn1,$Tn); 
								 			$payang= strtr($ReadCc,$Cc).strtr($thword[3],$Vw);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[3],$VnT);
											$sType = strtr($ReadTn1,$Tn);
											}
									 } else
									if(isset($Tn[$ReadTn2]))  // วรรณยุกต์ในตำแหน่งที่ 3
									 {
										 if(isset($VnCf[$ReadCf]))  //ลงท้ายด้วยตัวสะกด
											{
											//print "4.10<br>";
											$payang= strtr($ReadCc,$Cc).strtr($thword[2],$VnCf);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
											else  // ลงท้ายด้วยสระ  
											{
								 			//print "4.11<br>";
											$Stn = strtr($ReadTn2,$Tn); 
								 			$payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
									 } else // อักษรนำ ควบกล้ำ ไม่มีวรรณยุกต์เลย
									 {
										 if(isset($VnCf[$ReadCf]))  //ลงท้ายด้วยตัวสะกด
											{
												if(isset($Vw2[$ReadVwc5]))
												  {
													 $payang= strtr($ReadCc,$Cc).strtr($ReadVwc5,$Vw2);
													$cType = strtr($thword[0],$Triyang);
													$vType = "VnR";
													$sType = "1";
												  }
												  else
												  {
														//print "4.12<br>";
														$payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw).strtr($thword[3],$Cf);
														$cType = strtr($ReadCc,$TriyangC);
														$vType = strtr($thword[3],$VnT);
														$sType = "1";
													}
											}
											else //ลงท้ายด้วยสระ
											{
								 			//$Stn = strtr($ReadTn2,$Tn);   // มีวรรณยุกต์ในตำแหน่ง ที่ 2   
								 			//print "4.13<br>";
											$payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
									 }
								} // จบส่วนของ อักษรที่ไม่มีสระหน้า  และเป็นควบกล้ำ

								else // กรณีที่เป็น อักษรที่ไม่มีสระหน้า  และไม่ควบกล้ำ
								{
								  //print $thword;
								   $ReadTn1 = $thword[1];
								   $ReadTn2 = $thword[2];
								 	if(isset($Tn[$ReadTn1])) //พบสระในตำแหน่งที่ 2
									{
										//print "4.14<br>";
										$payang= strtr($thword[0],$Cs).strtr($thword[2],$Vw).strtr($thword[3],$Cf);
										$cType = strtr($thword[0],$Triyang);
								 		$vType = strtr($thword[3],$VnT);
										$sType = strtr($thword[1],$Tn);
									} else 
									if(isset($Tn[$ReadTn2])) 
									{
									 	$Vwou = $thword[1].$thword[3];
										if($Vwou == 'ัว')
										{
										//print "4.15<br>";
										$payang= strtr($thword[0],$Cs).strtr($Vwou,$Vw2);
										$cType = strtr($thword[0],$Triyang);
								 		$vType = "VnR";
										$sType = strtr($thword[2],$Tn);
										}
										else
										{
										//print "4.152<br>";
										$payang= strtr($thword[0],$Cs).strtr($thword[1],$Vw).strtr($thword[3],$Cf);
										$cType = strtr($thword[0],$Triyang);
								 		$vType = strtr($thword[3],$VnT);
										$sType = strtr($thword[2],$Tn);
										}
									}
								}
					} // ไม่มีสระหน้า
					   //print $payang."<br>";
					   //print $cType."<br>";
					   //print $vType."<br>";
					   //print $sType."<br>";
					  
	   			    $pho_word = InputSound($payang,$cType,$vType,$sType);

	 break;}
	 case 5: {
	 			//print "5";
	 				if(($thword[0]=='ไ')||($thword[0]=='ใ')||($thword[0]=='เ')||($thword[0]=='แ')||($thword[0]=='โ'))   // มีสระหน้า
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadCc2 = $thword[0].$thword[1];
					  $ReadTn1 = $thword[2];  // วรรณยุกต์ในตำแหน่งที่ 2
					  $ReadTn2 = $thword[3];  // วรรณยุกต์ในตำแหน่งที่ 3
					  $ReadCf = $thword[4]; // ตัวสะกดในตำแหน่งที่ 3
					  $ReadVwc = $thword[0].$thword[4];  // สระหน้า + สระหลัง =  สระเกิน
					 // print iconv("tis-620","utf-8",$ReadVwc)."<br>";
					  $ReadVwc2 = $thword[0].$thword[3].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2  
					  //print iconv("tis-620","utf-8",$ReadVwc2)."<br>";
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่3
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[3]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง ไม่มีวรรณยุกต์
					  $ReadVwc5 = $thword[2].$thword[4]; // สระ ัว มีวรรณยุกต์
					  $ReadVwc6 = $thword[2].$thword[3].$thword[4]; // สระ ัวะ  ไม่มีวรรณยุกต์
					  $ReadVwc7 = $thword[0].$thword[3]; 
					  $ReadVwc8 = $thword[0].$thword[2]; 
					     if(isset($Cc[$ReadCc]))
						 {
						 	if(isset($Tn[$ReadTn2]))  // มีวรรณยุกต์
							{
								if(isset($Vw[$ReadVwc]))  // สระเกิน
								{
								 	//print "5.1<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw2);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc,$VnT);
										$sType = strtr($ReadTn2,$Tn);
								}
								else  //ลงท้ายด้วยตัวสะกด
								{
								 	//print "5.2<br>";
										$payang= strtr($ReadCc,$Cc).strtr($thword[0],$Vw).strtr($ReadCf,$Cf);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = strtr($ReadTn2,$Tn);
								}
							}
							else   // ไม่มีวรรณยุกต์
							{
								 if(($thword[4] == 'ย')||($thword[4] == 'อ')||($thword[4] == 'ะ'))
								 {
								 		//print "5.3.1<br>";
								 		//print strtr($ReadVwc2,$Vw2)."<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc2,$Vw2);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc2,$VnT);
										$sType = '1';
								 }
								 else
								 {
								 
								    //print "5.3.2<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc7,$Vw2).strtr($ReadCf,$Cf);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = '1';
								  }
							} // สิ้นสุด กรณีไม่มีวรรณยุกต์
						 }  //สิ้นสุด อักษรควบกล้ำ ที่มีสระหน้า
						 else    // เริ่มอักษรเดี่ยว มีสระนำ
						 {
						      if(isset($Tn[$ReadTn2]))  // มี มีวรรณยุกต์ ที่ ตำแหน่งที่ 3
							{
								 if(($thword[4] != 'ย')&&($thword[4] != 'อ'))
								 {
								 		//print "5.4.1<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc8,$Vw2).strtr($ReadCf,$Cf);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = strtr($ReadTn2,$Tn);
									}
								 else
								 {
									    //print "5.4.2<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc3,$Vw2);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadVwc3,$VnT);
										$sType = strtr($ReadTn2,$Tn);
								 }
							}	
							else  // อักษรเดี่ยว สระหน้า ไม่มีวรรณยุกต์
							{
							 	//print "5.5<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc4,$Vw2).strtr($ReadCf ,$Cf);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = "1";
							}
						 } //สิ้นสุด อักษรเดี่ยว ที่มีสระหน้า
	 				} // สิ้นสุดการตรวจสอบสระหน้า	
					else // ไม่มีสระหน้า
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadCc2 = $thword[0].$thword[1];
					  $ReadTn1 = $thword[2];  // วรรณยุกต์ในตำแหน่งที่ 2
					  $ReadTn2 = $thword[3];  // วรรณยุกต์ในตำแหน่งที่ 3
					  $ReadCf = $thword[4]; // ตัวสะกดในตำแหน่งที่ 3
					  $ReadVwc = $thword[0].$thword[4];  // สระหน้า + สระหลัง =  สระเกิน
					  $ReadVwc2 = $thword[0].$thword[3].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่3
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[3]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง ไม่มีวรรณยุกต์
					  $ReadVwc5 = $thword[2].$thword[4]; // สระ ัว มีวรรณยุกต์
					  $ReadVwc6 = $thword[2].$thword[3].$thword[4]; // สระ ัวะ  ไม่มีวรรณยุกต์
  					  $ReadVwc7 = $thword[1].$thword[3].$thword[4]; // สระ ัวะ  ไม่มีวรรณยุกต์

						
							if(isset($Tn[$ReadTn1]))  // มีวรรณยุกต์ ที่ ตำแหน่งที่ 2
							{
								if(isset($Vw[$ReadVwc7]))   // สระ ัว
								{
									//	print "5.7<br>";
											$payang= strtr($thword[0],$Cs).strtr($ReadVwc7,$Vw2);
											$cType = strtr($thword[0],$Triyang);
											$vType = strtr($ReadVwc7,$VnT);
											$sType = strtr($ReadTn1,$Tn);
								}
								else
								{
								//print "5.6<br>";
										$payang= strtr($ReadCc2,$Cc).strtr($thword[3],$Vw).strtr($thword[4],$Cf);
										$cType = strtr($ReadCc2,$TriyangC);
								 		$vType = strtr($thword[4],$VnT);
										$sType = strtr($ReadTn1,$Tn);
									}
							}	
							else
							if(isset($Tn[$ReadTn2]))  // มีวรรณยุกต์ ที่ ตำแหน่งที่ 3
							{
								if(isset($Vw[$ReadVwc5]))   // สระ ัว
								{
										//print "5.7<br>";
											$payang= strtr($ReadCc2,$Cc).strtr($ReadVwc5,$Vw2);
											$cType = strtr($ReadCc2,$TriyangC);
											$vType = strtr($ReadVwc5,$VnT);
											$sType = strtr($ReadTn2,$Tn);
								}
								else
								{
								 //print "5.8<br>";
										$payang= strtr($ReadCc2,$Cc).strtr($thword[2],$Vw).strtr($thword[4],$Cf);
										$cType = strtr($ReadCc2,$TriyangC);
								 		$vType = strtr($thword[4],$VnT);
										$sType = strtr($ReadTn2,$Tn);
								}
							}
							else  // สระ ัวะ
							{
								//print "5.9<br>";
											$payang= strtr($ReadCc2,$Cc).strtr($ReadVwc6,$Vw2);
											$cType = strtr($ReadCc2,$TriyangC);
											// //print $ReadVwc6;
											$vType = strtr($ReadVwc6,$VnT);
											$sType = "1";
							}
					}
					   //print $payang."<br>";
					   //print $cType."<br>";
					   //print $vType."<br>";
					   //print $sType."<br>";
					  
	   			     $pho_word = InputSound($payang,$cType,$vType,$sType);

	  break;}
	 case 6: { 
	 				 
	 				 // print "6"."<br>";;
	 				  $ReadCc = $thword[1].$thword[2];
					  $ReadTn1 = $thword[3];  // วรรณยุกต์ในตำแหน่งที่ 3
					 // print  iconv( 'TIS-620', 'UTF-8',$ReadTn1)."<br>";
					  $ReadTn2 = $thword[4];  // วรรณยุกต์ในตำแหน่งที่ 4
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadTn2)."<br>";
					  $ReadCf = $thword[5]; // ตัวสะกดในตำแหน่งที่ 5
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadCf)."<br>";
					//  print "Cf = ".$Cf[$ReadCf]."<br>";
					  $ReadVwc = $thword[0].$thword[3].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2
					  $ReadVwc1 = $thword[0].$thword[3]; 		// สระหน้า + สระบน =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2
  					  //print  iconv( 'TIS-620', 'UTF-8',$ReadVwc)."<br>";
  					  $ReadVwc2 = $thword[0].$thword[3].$thword[5]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2
					 //print  iconv( 'TIS-620', 'UTF-8',$ReadVwc2)."<br>";
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่3
  					//  print  iconv( 'TIS-620', 'UTF-8',$ReadVwc3)."<br>";
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[4].$thword[5]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง ไม่มีวรรณยุกต์
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadVwc4)."<br>";
					  if(isset($Cc[$ReadCc]))
					  {
					    
						if(isset($Tn[$ReadTn2]))  // มีวรรณยุกต์ ที่ ตำแหน่งที่ 4  เคลิ้ม เครื้อ
							{ 
								//print "6.1<br>";
								if(($thword[5] == 'ย')||($thword[5] == 'อ')||($thword[5] == 'ะ'))
								 {
									//	print "6.1.1<br>";   // มีสระหลัง
									//	print strtr($ReadVwc2,$Vw2)."<br>";		 		
								 		$payang= strtr($ReadCc,$Cc).strtr($ReadVwc2,$Vw2);
									//	print $payang;
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc2,$VnT);
										$sType = strtr($thword[4],$Tn);
								 }
								else if(isset($Cf[$ReadCf]))
								 {
										//print "6.1.2<br>";   // มีตัวสะกด
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc1,$Vw2).strtr($thword[5],$Cf);
										//print $payang;
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc1,$VnT);
										$sType = strtr($thword[4],$Tn);
								 }

							} else  // ไม่มีวรรณยุกต์
							{
							 	//print "6.2<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw2).strtr($thword[5],$Cf);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($thword[5],$VnT);
										$sType = "1";
							}
					} else
					{ 
						if(isset($Cf[$ReadCf]))
						{
									//print "6.3<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc3,$Vw2).strtr($thword[5],$Cf);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadVwc3,$VnT);
										$sType = strtr($thword[3],$Tn);
						}
						else 
						{
								//print "6.4<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc4,$Vw2);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadVwc4,$VnT);
										$sType = strtr($thword[3],$Tn);
						}
					}
				 //print $payang."<br>";
				 //print $cType."<br>";
				 //print $vType."<br>";
				 //print $sType."<br>";

	  			    $pho_word = InputSound($payang,$cType,$vType,$sType);

	 
	 break;}
	 case 7: {
					  $ReadCc = $thword[1].$thword[2];
					  $ReadCf = $thword[6]; // ตัวสะกดในตำแหน่งที่ 5
					  $ReadVwc = $thword[0].$thword[3].$thword[5]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง สำหรับวรรณยุกต์ตำแหน่งที่2
  					  $ReadVwc2 = $thword[0].$thword[3].$thword[5].$thword[6]; // สระหน้า + สระหลัง =  สระเกิน 3 ตำแหน่ง ไม่มีวรรณยุกต์
			 			if(isset($Cf[$ReadCf]))
						{
						   //print "7.1<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw2).strtr($ReadCf,$Cf);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = strtr($thword[4],$Tn);
						}
						else
						{
						  //print "7.2<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc2,$Vw2);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc2,$VnT);
										$sType = strtr($thword[4],$Tn);
						}
				 //print $payang."<br>";
				 //print $cType."<br>";
				 //print $vType."<br>";
				 //print $sType."<br>";
	 	
		 			    $pho_word = InputSound($payang,$cType,$vType,$sType);
		 break;
		 }
	}
//	print $pho_word;
	return  $pho_word ;
	//// print  $pho_word ;
  }  //End Case
}


$Klon = $poemsy = '';
if(!$_GET){ exit(); }
$thword_org = trim(iconv("utf-8","tis-620",$_GET["poemsy"]));
if($thword_org  == '')
{
$out['phonetic'] = "No Syllable";
print json_encode($out);
exit();
 }

$thword_org = nl2br($thword_org);
$thword_expn = explode("<br />", $thword_org);


$wakC = 0;

 foreach($thword_expn as $key => $value) {
//    print "<li>{$key} => {$value}</li>";
    $syllable = explode("-",$value);
    //print_r($syllable);
    $size_sy = sizeof($syllable);
    for($trans=0; $trans<$size_sy; $trans++)
    {
    	//print iconv("tis-620","utf-8",$syllable[$trans]);
    	//print "<br>";
    	$syllabled = Translate2Phonetic(trim($syllable[$trans]));
    	//print $syllabled;
    	$finalsyllabled = str_replace("+","~",$syllabled);
    	$finalsyllabled = str_replace("=","+",$finalsyllabled);
    	$finalsyllabled = str_replace("a+j","aj",$finalsyllabled);
    	$finalsyllabled = str_replace("a+m","am",$finalsyllabled);
    	$finalsyllabled = str_replace("e;+#","#;",$finalsyllabled);
    	$finalsyllabled = str_replace("e;+j","#;+j",$finalsyllabled);
    	$json['phonetic'][] = $finalsyllabled;
   //  print "$finalsyllabled";
     }
 }
header('Content-type: text/html; charset=utf-8');
echo json_encode($json);
?>
</body>