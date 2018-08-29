DayName = ["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"];


function UhrAnzeigen()
{
 var SysDatumJetzt = new Date();
 var SysTag = SysDatumJetzt.getDate();
 var SysMonat = SysDatumJetzt.getMonth() + 1;
 var SysJahr = SysDatumJetzt.getFullYear();
 var SysStunden = SysDatumJetzt.getHours();
 var SysMinuten = SysDatumJetzt.getMinutes();
 var SysSekunden = SysDatumJetzt.getSeconds();
 var WochentagNr = SysDatumJetzt.getDay();
 var JetztWochentag = DayName[WochentagNr];

 var JetztTag  = ((SysTag < 10) ? "0" : "") + SysTag ;
 var JetztMonat  = ((SysMonat < 10) ? ".0" : ".") + SysMonat;
 var JetztStd  = ((SysStunden < 10) ? "0" : "") + SysStunden;
 var JetztMin  = ((SysMinuten < 10) ? ":0" : ":") + SysMinuten;
 var JetztSec  = ((SysSekunden < 10) ? ":0" : ":") + SysSekunden;


 var JetztDatum = JetztTag + JetztMonat + "." + SysJahr;

 var JetztZeit = JetztStd + JetztMin + JetztSec + " Uhr";


   var DispString1 = JetztZeit;
   var DispString2 = JetztDatum + "  " + JetztZeit;
   var DispString3 = JetztWochentag + "  " + JetztZeit;
   var DispString4 = JetztWochentag + " " + JetztDatum + "  " + JetztZeit;


Uhr01.innerHTML = DispString2;
setTimeout("UhrAnzeigen()", 1000);

}

window.setTimeout('UhrAnzeigen()',1000);

  
  
buttonarchiv1=new Image;
buttonarchiv1.src="archiv.png";

buttonarchiv2=new Image;
buttonarchiv2.src="aarchiv.png";
