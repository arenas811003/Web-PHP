function text(){
	
	if(document.getElementById("radio1").checked){

	 	document.getElementById("1").style.display= "none";
	 	document.getElementById("2").style.display = "inline-block";

	}else if(document.getElementById("radio2").checked){
	 	document.getElementById("2").style.display= "none";
	 	document.getElementById("1").style.display = "inline-block";
	}

}
// $('form').on('submit', function(){
//     $.ajax({
//         url: 'test.php',              // 要傳送的頁面
//         method: 'POST',               // 使用 POST 方法傳送請求
//         dataType: 'json',             // 回傳資料會是 json 格式
//         data: $('form').serialize(),  // 將表單資料用打包起來送出去
//         success: function(data){
			
// 			if(data == true){
// 				alert("新增成功");
// 			}
//             // 成功以後會執行這個方法
//         }
//     });
// 	return false;  // 阻止瀏覽器跳轉
	
// });


// function check(url){
//     var select=document.getElementById('select').value;
// 	var add2=document.getElementById('add2').value; 
    
// 	if(select != "" && add2 != ""){	
		
// 		data="select="+select+"&add2="+add2;
//         console.log(url);
// 		$.ajax({
// 			type:'POST',
// 			url:url,
// 			data : data,
// 			dataType:'text',

// 			success:function(data){
// 				console.log(data);
//                 if(data == true){
						
// 					document.getElementById("form").submit();
// 					alert("新增成功");
// 					location.href="add.php";
					
							
//                 }else{

// 					alert('資料已存在');
// 				}
// 			}
// 		});			
	
// 	}else{
	
// 		if(select== "" || add2 == ""){
			
// 			alert("請輸入類別與工程");
// 		}
// 	}
// }
    

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
