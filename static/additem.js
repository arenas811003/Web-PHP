function text(){
	
	if(document.getElementById("radio1").checked){

	 	document.getElementById("1").style.display= "none";
	 	document.getElementById("2").style.display = "inline-block";

	}else if(document.getElementById("radio2").checked){
	 	document.getElementById("2").style.display= "none";
	 	document.getElementById("1").style.display = "inline-block";
	}

}

function FtypeCheck(url){
    var add=document.getElementById('add').value;   
	if(add != ""){
        data="add="+add;
		$.ajax({
				type:'GET',
				url:url,
				data : data,
                dataType:'text',  
				success:function(data){ 
                    if(data == true){
                        alert("新增成功");
                        location.href="add.php";
                    }else{

                        alert("資料已存在");
                    }
				    
				}
		});			
	}else{
	
		if(add == ""){
			
			alert("請輸入類別");
		}
    }
}

function Del_Type(url){
    var select=document.getElementById('select2').value;
	data="delete="+select;
	if(select != ""){
		if(confirm("確實要刪除這筆資料？")){

			$.ajax({
			type:'GET',
			url:url,
			data : data,
			dataType:'text',
				success:function(data){
					if(data == true){
                        alert("已刪除");
                        location.href="add.php";
                    }
				}
            });	
            
		}else{
			alert("已取消動作");
		}
	}else{
			alert("請選擇類別名稱");
	
	}
}
