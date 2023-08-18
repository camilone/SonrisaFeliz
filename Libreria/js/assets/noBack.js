function nobackbutton(){
   window.location.hash="zyx";
   window.location.hash="zyxc" //chrome
   window.onhashchange=function(){window.location.hash="zyx";}
}