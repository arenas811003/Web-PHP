function StopDel(){
	alert("最高權限無法操作");
}


function Delete(id,url){

	data="ID="+id;
	console.log(data);
	if(confirm("確實要刪除這筆資料？")){
		$.ajax({
		type:'POST',
		url:url,
		data : data,
		dataType:'text',

			success:function(data){
				alert(data);
				location.href="/user.php";
				
			}
		});	
	}else{
		alert("已取消動作");
	}
	
}

function newuser(url){
	var name=document.getElementById('name').value;
	var account=document.getElementById('account').value;
	var password=document.getElementById('password').value;
	var email=document.getElementById('email').value;
   	var select=document.getElementById('select').selectedIndex -1;
	//console.log(typeof(select));	
	var Regxp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]){2,4}$/; 
	// console.log(name);
	// console.log(account);
	// console.log(password);
	// console.log(email);
    // console.log(select);
    console.log(typeof(select)); 
    select = select.toString();
    
	if(name != "" &&  account!= "" && password !="" && email !="" && select!= "-1"){	
		if(Regxp.test(email) == true){
			data="name="+name+"&account="+account+"&password="+password+"&email="+email+"&select="+select;
			//Bar(50);
            console.log(data);
            // console.log(url);
            //data="name="+name;
			$.ajax({
                    type:'POST',
                    url:url,
                    data : data,
                    dataType:'text',
                        success:function(data){
                            //alert(data);
                            if(data == true){
                                alert("新增成功");
                                    location.href="/user.php";
                            }else{
                                if(data==false){
                                    alert("此帳號已存在");
                                    
                                }
                            }
                        
                        }
            });	
            		
		}else{
			alert("電子信箱格式錯誤");
		}
		
	}else{
			alert("尚有空白未填取/選取");
	}
}
function userupdate(url){
	var name=document.getElementById('name').value;
	var account=document.getElementById('account').value;
	var password=document.getElementById('password').value;
	var email=document.getElementById('email').value;
    var select=document.getElementById('select').value;
	var Regxp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]){2,4}$/; 
	console.log(name);
	console.log(account);
	console.log(password);
	console.log(email);
	console.log(select);
	if(name != "" &&  account!= "" && password !="" && email !="" && select!=""){	
		if(Regxp.test(email) == true){
			data="up-name="+name+"&up-account="+account+"&up-password="+password+"&up-email="+email+"&up-select="+select;
			//Bar(50);
			console.log(data);
			$.ajax({
				type:'POST',
				url:url,
				data : data,
				dataType:'text',

				success:function(data){
                  //  alert(data);
                    if(data == true){
                        alert("修改成功");
                            location.href="/user.php";
                    }else{
                        if(data==false){
                            alert("此名稱已存在");
                            
                        }
                    }
				}
			});			
		}else{
			alert("電子信箱格式錯誤");
		}
		
	}else{
			alert("尚有空白未填取/選取");
	}
}
