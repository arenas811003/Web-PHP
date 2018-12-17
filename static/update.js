function update_check(url){
    var select=document.getElementById('select').value;
	var add2=document.getElementById('add2').value;
	
	console.log(select);
	console.log(add2);
	if(select != "" && add2 != ""){	
		//data=$('#form').serialize();
		data="select="+select+"&add2="+add2;
		//Bar(50);
		console.log(data);
		$.ajax({
			type:'POST',
			url:url,
			data : data,
			dataType:'text',

			success:function(data){
				
			
				if(data==true){
				
					//update_post_bar();

				}else{

					alert('資料名稱已存在');
				}
			
			}
		});			

		
	}else{
	
		if(select=="" || add2 == ""){
			
			alert("請輸入類別與工程");
		}
	}
}