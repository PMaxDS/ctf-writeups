<?php

    #$_GET['kaaris'] = "{\"Jte_laisse_tirer_sur_ma_chicha\":\"2018a\",\"et_tu_veux_plus_me_rendre_le_tuyau\":[[],\"Diarabi, diarabi, diarabi, ma chéri\",3,4,5,6,7], \"a2\":[\"Diarabi, diarabi, diarabi, ma chérie\"]}";
    #$_GET['meufs'] = array(1, "2");
    #$_GET['seufs'] = 0x2;

    show_source(__FILE__);
    $i01=0;$i02=0;$i03=0;
    $a=(array)json_decode(@$_GET['kaaris']);
    if(is_array($a)){
       is_numeric(@$a["Jte_laisse_tirer_sur_ma_chicha"])?die("brrrrah"):NULL;
       if(@$a["Jte_laisse_tirer_sur_ma_chicha"]){
           ($a["Jte_laisse_tirer_sur_ma_chicha"]>2017)?$i01=1:NULL;
       }
       if(is_array(@$a["et_tu_veux_plus_me_rendre_le_tuyau"])){
           if(count($a["et_tu_veux_plus_me_rendre_le_tuyau"])!==7 OR !is_array($a["et_tu_veux_plus_me_rendre_le_tuyau"][0])) die("brrrrah");
           $pos = array_search("Diarabi, diarabi, diarabi, ma chérie", $a["a2"]);
           $pos===false?die("brrrrah"):NULL;
           foreach($a["et_tu_veux_plus_me_rendre_le_tuyau"] as $key=>$val){
               $val==="Diarabi, diarabi, diarabi, ma chérie"?die("brrrrah"):NULL;
           }
           $i02=1;
       }
    }
    $c=@$_GET['meufs'];
    $d=@$_GET['seufs'];
    if(@$c[1]){
       if(!strcmp($c[1],$d) && $c[1]!==$d){
           preg_match("3|1|c",$d.$c[0])?die("brrrrah"):NULL;
           strpos(($c[0].$d), "Diarabi, diarabi, faut qu'on fasse du wari")?$i03=1:NULL;
       }
    }
    if($i01 && $i02 && $i03){
       include "flag.php";
       echo $FL4G;
    }

?>