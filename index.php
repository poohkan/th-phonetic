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

$fv = "[�,�,�,�,�]";
$CcV = "(��|��|��|��|��|��|˧|˭|˹|��|��|��)";
//$MidP = "(�|��|��|��|�|��|�|�|��|�|�|�|�|��|��|�)";
//$HiP = "(�|��|��|��|�|�|�|�|�|��|��|�|�|��|�|�|��|�)";
//$Low1P = "(�|��|��|�|�|�|�|�|��|�|�|��|��|��|�|�|�|�|�|�|�)";
//$Low2P = "(�|˧|�|˭|˹|�|�|��|��|�|�|��|�|��|�|��|�|�|��)";
$CctC = "(��|��|��|��|��|˧|˭|��|��|��|��|��|��)";
$CctV = "(��|��|��|��)";
//$CctV = "[��,��,��,��]";


$Ctc = array('��' => 'k+e;=n', '��' => 'k+x;=n', '��' => 'k+o;=n', 
'��' => 'k+e;=w', '��' => 'k+x;=w', '��' => 'k+o;=w',
'��' => 'c+e;=n', '��' => 'c+x;=n', '��' => 'c+o;=n',
'��' => 'kh+e;=n', '��' => 'kh+x;=n', '��' => 'kh+o;=n',
'��' => 'ph+e;=n', '��' => 'ph+x;=n', '��' => 'ph+o;=n',
'�˧' => 'h+e;=ng', '�˧' => 'h+x;=ng', '�˧' => 'h+o;=ng',
'�˭' => 'h+e;=n', '�˭' => 'h+x;=n', '�˭' => 'h+o;=n',
'�˹' => 'h+e;=n', '�˹' => 'h+x;=n', '�˹' => 'h+o;=n',
'���' => 'h+#;=j', '���' => 'j+x;+', '���' => 'h+o;+',
'���' => '?+#;=j', '���' => 'j+x;+', '���' => '?+o;+',
'���' => 'h+e;=w', '���' => 'h+x;=w', '���' => 'h+o;=w',
'��' => 'kh+e;=n', '��' => 'kh+x;=n', '��' => 'kh+o;=n',
'���' => 'h+e;=m', '���' => 'h+x;=m', '���' => 'h+o;=m',
'���' => 'h+e;=n', '���' => 'h+x;=n', '���' => 'h+o;=n');



// �ѡ�� 3 ����
$Triyang = array("�"=>"Mid","�"=>"Mid","��"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Mid","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Hi","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low","�"=>"Low");

// ���ҧ�� Cc
$TriyangC= array("��"=>"Mid","��"=>"Mid","��"=>"Mid","��"=>"Mid","��"=>"Mid","��"=>"Mid","��"=>"Mid","��"=>"Hi","��"=>"Hi","��"=>"Hi","��"=>"Hi","��"=>"Hi","��"=>"Hi","��"=>"Hi","��"=>"Low","��"=>"Low","��"=>"Low","��"=>"Low","��"=>"Low","��"=>"Low","˧"=>"Hi","˭"=>"Hi","˹"=>"Hi","��"=>"Hi","��"=>"Mid","��"=>"Hi","�"=>"Low","��"=>"Hi","��"=>"Hi","��"=>"Hi");


//��ѭ��е�
$Cs = array("�"=>"k","�"=>"c","�"=>"d","�"=>"t","�"=>"d","�"=>"t","�"=>"b","�"=>"p","�"=>"?","�"=>"kh","�"=>"kh","�"=>"ch","�"=>"th","�"=>"th","�"=>"ph","�"=>"f","�"=>"s","�"=>"s","�"=>"s","�"=>"h","�"=>"ph","�"=>"ph","�"=>"f","�"=>"th","�"=>"th","�"=>"th","�"=>"th","�"=>"kh","�"=>"kh","�"=>"kh","�"=>"s","�"=>"ch","�"=>"h","�"=>"ch","�"=>"ch","�"=>"ng","�"=>"j","�"=>"n","�"=>"j","�"=>"n","�"=>"r","�"=>"w","�"=>"m","�"=>"l","�"=>"l");

$Cc = array("��"=>"kr","��"=>"kl","��"=>"kw","��"=>"c","��"=>"tr","��"=>"pr","��"=>"pl","��"=>"khr","��"=>"khl","��"=>"khw","��"=>"phl","��"=>"phr","��"=>"sr","��"=>"sr","��"=>"phr","��"=>"phl","��"=>"thr","��"=>"khr","��"=>"khl","��"=>"khw","˧"=>"ng","˭"=>"j","˹"=>"n","��"=>"j","��"=>"j","��"=>"r","��"=>"w","��"=>"m","��"=>"l");

//��������
$Vw = array('�'=>'+a','�'=>'+a','�'=>'+a;','�'=>'+i','�'=>'+i;','�'=>'+v','�'=>'+v;','�'=>'+u','�'=>'+u;','�'=>'+e;','�'=>'+x;','�'=>'+aj','�'=>'+aj','�'=>'+o;', '�'=>'+@;','��'=>'+u;a','��'=>'+aw','��'=>'+e','��'=>'+x','��'=>'+#;','��'=>'+o','���'=>'+@','���'=>'+#','����'=>'+i;a','����'=>'+ia','����'=>'+va','���'=>'+v;a','���'=>'+ua','�'=>'+u;a','��'=>'+aj','��'=>'+am','�'=>'+am','�'=>'+#;');

$Vw2 = array('��'=>'+u;a','��'=>'+aw','��'=>'+e','��'=>'+x','��'=>'+#;','��'=>'+o','���'=>'+@','���'=>'+#','���'=>'+i;a','����'=>'+ia','����'=>'+va','���'=>'+v;a','���'=>'+ua','��'=>'+#;','��'=>'+e','��'=>'+x','�'=>'+@','��' => '+am');

//���� �ӵ��
$VnT= array('�'=>'VnD','�'=>'VnR','�'=>'VnD','�'=>'VnR','�'=>'VnD','�'=>'VnR','�'=>'VnD','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR', '�'=>'VnR','��'=>'VnR','��'=>'VnR','���'=>'VnR', '���'=>'VnR', '���'=>'VnR','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�'=>'VnD','�' =>'VnD', '�' =>'VnD', '�' =>'VnD', '�' =>'VnD', '�' =>'VnD','�' =>'VnD', '�' =>'VnD', '�' =>'VnD','�' =>'VnD','�' =>'VnD', '�' =>'VnD', '�' =>'VnD', '�' =>'VnD','�' =>'VnD','�' =>'VnD','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','�'=>'VnR','��'=>'VnD','��'=>'VnD', '��'=>'VnD','���'=>'VnD','���'=>'VnD','���'=>'VnD','���'=>'VnD', '����'=>'VnD','����'=>'VnD','�'=>'VnD','�' => 'VnR');


//�������� + ����С�
$VnCf= array('�'=>'+a','�'=>'+a;','�'=>'+i','�'=>'+i;','�'=>'+v','�'=>'+v;','�'=>'+u','�'=>'+u;','�'=>'+e;','�'=>'+x;','�'=>'+aj','�'=>'+aj','�'=>'+o;','�'=>'+o=k','�'=>'+o=k','�'=>'+o=k','�'=>'+o=k','�'=>'+o=k','�'=>'+o=k','�'=>'+o=d','�'=>'+o=d','�'=>'+o=d','�'=>'+o=d','�'=>'+o=d','�' =>'+o=d', '�' =>'+o=d', '�' =>'+o=d', '�' =>'+o=d', '�' =>'+o=d','�' =>'+o=d', '�' =>'+o=d', '�' =>'+o=d','�' =>'+o=d','�' =>'+o=d', '�' =>'+o=d', '�' =>'+o=b', '�' =>'+o=b','�' =>'+o=b','�' =>'+o=b','�'=>'+o=ng','�' =>'+o=n', '�'  =>'+o=j','�' =>'+o=n', '�' =>'+o=n', '�' =>'+o=m', '�' =>'+@;=n' ,'�' =>'+o=n', '�' =>'+o=n', '�' =>'+o=w', '�'=>'+@;','�' => '+am','�'=>'=d');

//੾�� ����С�
$Cf= array('�'=>'=k','�' =>'=k', '�'  =>'=k','�' =>'=k', '�' =>'=k', '�' =>'=k', '�' =>'=d' ,'�' =>'=d', '�' =>'=d', '�' =>'=d', '�'=>'=d','�' =>'=d', '�' =>'=d', '�' =>'=d', '�' =>'=d', '�' =>'=d','�' =>'=d', '�' =>'=d', '�' =>'=d','�' =>'=d','�' =>'=d', '�' =>'=d', '�' =>'=b', '�' =>'=b','�' =>'=b','�' =>'=b','�' =>'=b','�'=>'=ng','�' =>'=n', '�'  =>'=j','�' =>'=n', '�' =>'=n', '�' =>'=m', '�' =>'=n' ,'�' =>'=n', '�' =>'=n', '�' =>'=w','�'=>'=d','�'=>'=#');

//
$Tn = array('�'=>'2','�'=>'3','�'=>'4','�'=>'5');

$run = array('��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��','���','���','���','����');

$thword = str_replace($run,"",$thword);

$thword = str_replace("��","���",$thword);
$thword = str_replace("�","��",$thword);
//$thword = str_replace("���","",$thword);
//$thword = str_replace("��","",$thword);
//print $thword."<br>";
$thword = str_replace("���","��",$thword);
$thword = str_replace("�ó","ѹ",$thword);
$thword = str_replace("��","ѹ",$thword);


 
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
   if(($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�'))
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
	 				if(($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�'))
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
					
						if($thword[1] == '�')
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
	 				if(($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�'))
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadTn = $thword[1];
					  $ReadTn2 = $thword[2];
					  $ReadVw = $thword[0].$thword[2];
					 	 if(isset($Cc[$ReadCc]))
						 	{   
								if(preg_match($CctC,$ReadCc))
								{
									if(($thword[0]=='�')||($thword[0]=='�'))
									{
									 //print "3.1.1<br>";
									 $payang= strtr($ReadCc,$Cc).strtr($thword[0],$Vw);
									 $cType = strtr($ReadCc,$TriyangC);
									 $vType = "VnR";
									 $sType = "1";
									}
									else
									{
									 	if(($thword[2] == '�')&&($thword[0] == '�'))
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
								 	} // �� �Ǻ������й� ����¡����ҹ�͡���§�Ǻ���� �Ѻ �͡���§����С� ����繤�� CCV
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
								if(($thword[2] == '�')&&($thword[0] == '�')) //�蹤���� ��  ��
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
							 if(isset($Vw[$ReadVwc5]))   // ��� ��
								{
									$Vwou = $thword[1].$thword[2];
										if($Vwou == '��')
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
	 				if(($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�'))
					{ // �����˹��
					//print  $thword[0]."<br>";
					  $ReadCc = $thword[1].$thword[2];
					  $ReadTn1 = $thword[2];  // ��ó�ء��㹵��˹觷�� 2
					  $ReadTn2 = $thword[3]; // ��ó�ء��㹵��˹觷�� 3
					  $ReadCf = $thword[3]; // ����С�㹵��˹觷�� 3
					  //$ReadCf2 = $thword[4];
					  $ReadVwc = $thword[0].$thword[3];  // ���˹�� + �����ѧ =  ����Թ
					  $ReadVwc2 = $thword[0].$thword[2];
					 
					  $ReadVw = $thword[0].$thword[2].$thword[3];
					  //print iconv("tis-620","utf-8",$ReadVw)."<br>";
					 	 if(isset($Cc[$ReadCc]))  //�Ǻ����
						 	{   
								if(isset($Tn[$ReadTn1])) //����ŧ����;���ó�ء��㹵��˹觷�� 2
									  {
									  	//print "4.1<br>";
										$payang=strtr($thword[1],$Cs).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
								 		$cType = strtr( $thword[1],$Triyang);
								 		$vType = strtr($thword[3],$VnT);
										$sType = strtr($ReadTn1[2],$Tn); 
								 		}
										else
										if(isset($Tn[$ReadTn2])) //����ŧ����;���ó�ء��㹵��˹觷�� 3
									  	{
										//print "4.2<br>";
									  	$payang=strtr($ReadCc,$Cc).strtr($thword[0],$Vw);
								 		$cType = strtr($ReadCc,$TriyangC);
								 		$vType = "VnR";
										$sType = strtr($ReadTn2,$Tn); 
								 		}
										else   //�Ǻ���� �������ó�ء�� 
										{
											if(isset($Cf[$ReadCf]))  // ŧ���´��µ��С�
											{
												//print "4.3<br>";
												$payang=strtr($ReadCc,$Cc).strtr($thword[0],$Vw).strtr($thword[3],$Cf);
												$cType = strtr($ReadCc,$TriyangC);
								 				$vType = strtr($thword[3],$VnT);
												$sType = "1";
											}
											else  // ����Թ
											{
												//print "4.4<br>";
												$payang=strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw);
												$cType = strtr($ReadCc,$TriyangC);
								 				$vType = strtr($ReadVwc,$VnT);
												$sType = "1";
											}
										}
							 } else //����� ˹�������Ǻ����  
							 	
								{
									if(isset($Cf[$ReadCf]))  // ŧ���´��µ���С�
											{
												//print "aaaa";
												if($thword[2] == '�')
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
													if($thword[2] == '�')
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
											else  // ����Թ
											{
												//if(isset($Tn[$ReadTn1]))  
												if($ReadTn1=='�') // ������ѡɳТͧ����Թ���������Ŵ�ٻ �� ���� ���
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
														 if(($thword[3] == '�') ||($thword[3] == '�'))
														{
															//print "4.6.2.1<br>";
															$payang=strtr($thword[1],$Cs)."+#;".strtr($thword[3],$Cf);
															$cType = strtr($thword[1],$Triyang);
								 							$vType = strtr($thword[3],$VnT);
															$sType = strtr($thword[2],$Tn);
														 }
														 else
														 if($thword[3] == '�')
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
												 else   // �óշ���� �ѡ������� ����Թ ������� ��ó�ء��
												{
												 ////print $ReadVw;
												    if(($thword[3] != '�') &&($thword[3] != '�')&&($thword[3] != '�'))
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
						{			//Ẻ��������˹��
						 		 $ReadCc = $thword[0].$thword[1];
								 $ReadTn0 = $thword[1];  // ��ó�ء��㹵��˹觷�� 1 �Դ㹡óշ��������ѭ��ФǺ����
					  			 $ReadTn1 = $thword[2];  // ��ó�ء��㹵��˹觷�� 2
					 			 $ReadTn2 = $thword[3];  // ��ó�ء��㹵��˹觷�� 3
					 			 $ReadCf = $thword[3];    // ����С�㹵��˹觷�� 3
								 $ReadVwc5 = $thword[2].$thword[3];
	 
								if(isset($Cc[$ReadCc]))   // �ѡ�ù� �Ǻ����
								 {
							 		 if(isset($Tn[$ReadTn1]))  // ��ó�ء��㹵��˹觷�� 2
									 {
										 if(isset($VnCf[$ReadCf]))  //ŧ���´�������Թ
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
									if(isset($Tn[$ReadTn2]))  // ��ó�ء��㹵��˹觷�� 3
									 {
										 if(isset($VnCf[$ReadCf]))  //ŧ���´��µ���С�
											{
											//print "4.10<br>";
											$payang= strtr($ReadCc,$Cc).strtr($thword[2],$VnCf);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
											else  // ŧ���´������  
											{
								 			//print "4.11<br>";
											$Stn = strtr($ReadTn2,$Tn); 
								 			$payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
									 } else // �ѡ�ù� �Ǻ���� �������ó�ء�����
									 {
										 if(isset($VnCf[$ReadCf]))  //ŧ���´��µ���С�
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
											else //ŧ���´������
											{
								 			//$Stn = strtr($ReadTn2,$Tn);   // ����ó�ء��㹵��˹� ��� 2   
								 			//print "4.13<br>";
											$payang= strtr($ReadCc,$Cc).strtr($thword[2],$Vw);
								 			$cType = strtr($ReadCc,$TriyangC);
								 			$vType = strtr($thword[2],$VnT);
											$sType = strtr($ReadTn2,$Tn);
											}
									 }
								} // ����ǹ�ͧ �ѡ�÷����������˹��  ����繤Ǻ����

								else // �óշ���� �ѡ�÷����������˹��  ������Ǻ����
								{
								  //print $thword;
								   $ReadTn1 = $thword[1];
								   $ReadTn2 = $thword[2];
								 	if(isset($Tn[$ReadTn1])) //�����㹵��˹觷�� 2
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
										if($Vwou == '��')
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
					} // ��������˹��
					   //print $payang."<br>";
					   //print $cType."<br>";
					   //print $vType."<br>";
					   //print $sType."<br>";
					  
	   			    $pho_word = InputSound($payang,$cType,$vType,$sType);

	 break;}
	 case 5: {
	 			//print "5";
	 				if(($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�')||($thword[0]=='�'))   // �����˹��
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadCc2 = $thword[0].$thword[1];
					  $ReadTn1 = $thword[2];  // ��ó�ء��㹵��˹觷�� 2
					  $ReadTn2 = $thword[3];  // ��ó�ء��㹵��˹觷�� 3
					  $ReadCf = $thword[4]; // ����С�㹵��˹觷�� 3
					  $ReadVwc = $thword[0].$thword[4];  // ���˹�� + �����ѧ =  ����Թ
					 // print iconv("tis-620","utf-8",$ReadVwc)."<br>";
					  $ReadVwc2 = $thword[0].$thword[3].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2  
					  //print iconv("tis-620","utf-8",$ReadVwc2)."<br>";
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��3
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[3]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� �������ó�ء��
					  $ReadVwc5 = $thword[2].$thword[4]; // ��� �� ����ó�ء��
					  $ReadVwc6 = $thword[2].$thword[3].$thword[4]; // ��� ���  �������ó�ء��
					  $ReadVwc7 = $thword[0].$thword[3]; 
					  $ReadVwc8 = $thword[0].$thword[2]; 
					     if(isset($Cc[$ReadCc]))
						 {
						 	if(isset($Tn[$ReadTn2]))  // ����ó�ء��
							{
								if(isset($Vw[$ReadVwc]))  // ����Թ
								{
								 	//print "5.1<br>";
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc,$Vw2);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc,$VnT);
										$sType = strtr($ReadTn2,$Tn);
								}
								else  //ŧ���´��µ���С�
								{
								 	//print "5.2<br>";
										$payang= strtr($ReadCc,$Cc).strtr($thword[0],$Vw).strtr($ReadCf,$Cf);
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = strtr($ReadTn2,$Tn);
								}
							}
							else   // �������ó�ء��
							{
								 if(($thword[4] == '�')||($thword[4] == '�')||($thword[4] == '�'))
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
							} // ����ش �ó��������ó�ء��
						 }  //����ش �ѡ�äǺ���� ��������˹��
						 else    // ������ѡ������� ����й�
						 {
						      if(isset($Tn[$ReadTn2]))  // �� ����ó�ء�� ��� ���˹觷�� 3
							{
								 if(($thword[4] != '�')&&($thword[4] != '�'))
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
							else  // �ѡ������� ���˹�� �������ó�ء��
							{
							 	//print "5.5<br>";
										$payang= strtr($thword[1],$Cs).strtr($ReadVwc4,$Vw2).strtr($ReadCf ,$Cf);
										$cType = strtr($thword[1],$Triyang);
								 		$vType = strtr($ReadCf,$VnT);
										$sType = "1";
							}
						 } //����ش �ѡ������� ��������˹��
	 				} // ����ش��õ�Ǩ�ͺ���˹��	
					else // ��������˹��
					{
					  $ReadCc = $thword[1].$thword[2];
					  $ReadCc2 = $thword[0].$thword[1];
					  $ReadTn1 = $thword[2];  // ��ó�ء��㹵��˹觷�� 2
					  $ReadTn2 = $thword[3];  // ��ó�ء��㹵��˹觷�� 3
					  $ReadCf = $thword[4]; // ����С�㹵��˹觷�� 3
					  $ReadVwc = $thword[0].$thword[4];  // ���˹�� + �����ѧ =  ����Թ
					  $ReadVwc2 = $thword[0].$thword[3].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��3
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[3]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� �������ó�ء��
					  $ReadVwc5 = $thword[2].$thword[4]; // ��� �� ����ó�ء��
					  $ReadVwc6 = $thword[2].$thword[3].$thword[4]; // ��� ���  �������ó�ء��
  					  $ReadVwc7 = $thword[1].$thword[3].$thword[4]; // ��� ���  �������ó�ء��

						
							if(isset($Tn[$ReadTn1]))  // ����ó�ء�� ��� ���˹觷�� 2
							{
								if(isset($Vw[$ReadVwc7]))   // ��� ��
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
							if(isset($Tn[$ReadTn2]))  // ����ó�ء�� ��� ���˹觷�� 3
							{
								if(isset($Vw[$ReadVwc5]))   // ��� ��
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
							else  // ��� ���
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
					  $ReadTn1 = $thword[3];  // ��ó�ء��㹵��˹觷�� 3
					 // print  iconv( 'TIS-620', 'UTF-8',$ReadTn1)."<br>";
					  $ReadTn2 = $thword[4];  // ��ó�ء��㹵��˹觷�� 4
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadTn2)."<br>";
					  $ReadCf = $thword[5]; // ����С�㹵��˹觷�� 5
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadCf)."<br>";
					//  print "Cf = ".$Cf[$ReadCf]."<br>";
					  $ReadVwc = $thword[0].$thword[3].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2
					  $ReadVwc1 = $thword[0].$thword[3]; 		// ���˹�� + ��к� =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2
  					  //print  iconv( 'TIS-620', 'UTF-8',$ReadVwc)."<br>";
  					  $ReadVwc2 = $thword[0].$thword[3].$thword[5]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2
					 //print  iconv( 'TIS-620', 'UTF-8',$ReadVwc2)."<br>";
					  $ReadVwc3 = $thword[0].$thword[2].$thword[4]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��3
  					//  print  iconv( 'TIS-620', 'UTF-8',$ReadVwc3)."<br>";
  					  $ReadVwc4 = $thword[0].$thword[2].$thword[4].$thword[5]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� �������ó�ء��
					//  print  iconv( 'TIS-620', 'UTF-8',$ReadVwc4)."<br>";
					  if(isset($Cc[$ReadCc]))
					  {
					    
						if(isset($Tn[$ReadTn2]))  // ����ó�ء�� ��� ���˹觷�� 4  ����� �����
							{ 
								//print "6.1<br>";
								if(($thword[5] == '�')||($thword[5] == '�')||($thword[5] == '�'))
								 {
									//	print "6.1.1<br>";   // �������ѧ
									//	print strtr($ReadVwc2,$Vw2)."<br>";		 		
								 		$payang= strtr($ReadCc,$Cc).strtr($ReadVwc2,$Vw2);
									//	print $payang;
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc2,$VnT);
										$sType = strtr($thword[4],$Tn);
								 }
								else if(isset($Cf[$ReadCf]))
								 {
										//print "6.1.2<br>";   // �յ���С�
										$payang= strtr($ReadCc,$Cc).strtr($ReadVwc1,$Vw2).strtr($thword[5],$Cf);
										//print $payang;
										$cType = strtr($ReadCc,$TriyangC);
								 		$vType = strtr($ReadVwc1,$VnT);
										$sType = strtr($thword[4],$Tn);
								 }

							} else  // �������ó�ء��
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
					  $ReadCf = $thword[6]; // ����С�㹵��˹觷�� 5
					  $ReadVwc = $thword[0].$thword[3].$thword[5]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� ����Ѻ��ó�ء����˹觷��2
  					  $ReadVwc2 = $thword[0].$thword[3].$thword[5].$thword[6]; // ���˹�� + �����ѧ =  ����Թ 3 ���˹� �������ó�ء��
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