var img=null; 
function showtype(){ 
if(document.up.title.value=="")
	{alert("请输入照片说明！");
	document.up.title.focus();
	return false;
	}
var fsize=0;
if(img)img.removeNode(true); 
img=document.createElement("img"); 
img.style.position="absolute"; 
img.style.visibility="hidden"; 
document.body.insertAdjacentElement("beforeend",img); 
img.src=up.inp.value; 
var ftype=img.src.substring(img.src.length-4,img.src.length) 
ftype=ftype.toUpperCase();
fsize=img.fileSize;
if((ftype.indexOf('JPG',0)==-1) && (ftype.indexOf('GIF', 0)==-1))
	{ alert("Sorry!上传失败！\n\n①请选择您要上传的照片\n\n②且只能是.JPG或.GIF图片类型。");
	return false;
	}
alert("您确定要上传此文件吗？");
return true;
} 