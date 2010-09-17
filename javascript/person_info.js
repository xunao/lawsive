/**
 * @author robbin
 */
$(function(){
	$("#sub").click(function(){
		if($("#email").val()!="")
		{
			if(!isEmail($("#email").val()))
			{
				alert('请输入正确的EMAIL地址');
				$("#email").focus();
				return false;
			}
		}
		if($("#email2").val()!="")
		{
			if(!isEmail($("#email2").val()))
			{
				alert('请输入正确的EMAIL地址');
				$("#email2").focus();
				return false;
			}
		}
		if($("#zip").val()!="")
		{
			if(!IsNum($("#zip").val()))
			{
				alert('请输入正确的邮政编码！');
				$("#zip").focus();
				return false;
			}
		}
		if($("#zip2").val()!="")
		{
			if(!IsNum($("#zip2").val()))
			{
				alert('请输入正确的邮政编码！');
				$("#zip2").focus();
				return false;
			}
		}
		if($("#mobile").val()!="")
		{
			if(!IsNum($("#mobile").val()))
			{
				alert('请输入正确的移动电话！');
				$("#mobile").focus();
				return false;
			}
		}
		if($("#mobile2").val()!="")
		{
			if(!IsNum($("#mobile2").val()))
			{
				alert('请输入正确的移动电话');
				$("#mobile2").focus();
				return false;
			}
		}
		
	});
});

function isEmail( str ){ 
	var myReg = /^[-_.A-Za-z0-9]+@([-_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/; 
	if(myReg.test(str)) return true; 
	return false; 
}

function IsNum(s)
{
    if(s!=null){
        var r,re;
        re = /\d*/i; //\d表示数字,*表示匹配多个数字
        r = s.match(re);
        return (r==s)?true:false;
    }
    return false;
}