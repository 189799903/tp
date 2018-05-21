  window.onload=function(){
   function adsorption(){
    var headerWrap=document.getElementById('navbar');
	var headertop=document.getElementById('top');
    var scrollTop=0;
    window.onscroll=function(){
     scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
     if(scrollTop>100){
      headerWrap.className='fixed';
	  headertop.className='toped';
     }else{
      headerWrap.className='navbar';
	  headertop.className='top';
	  
     }
    }
   }
   adsorption();
  }
  

window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"207"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=86835285.js?cdnversion='+~(-new Date()/36e5)];
