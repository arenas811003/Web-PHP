function check(url){
	var account=document.getElementById('form')[0].value;
	var password=document.getElementById('form')[1].value;
	if(account !="" && password !="" ){	
		data=$('#form').serialize();
		$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',
			success:function(data){
				//alert(data);
				if(data==true){

					location.href="/search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1";
				}else{
					alert("帳號密碼錯誤");
				}
			}
		});			

	}else{

		if(account == "" || password == ""){
			alert("請輸入帳號與密碼");
		
		}
	}
	
}



