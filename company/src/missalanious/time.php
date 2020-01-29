<?
function welcome(){
 
   if(date("H") < 12){
 
     return "good morning";
 
   }elseif(date("H") > 11 && date("H") < 18){
 
     return "good afternoon";
 
   }elseif(date("H") > 17){
 
     return "good evening";
 
   }
 
} 

?>