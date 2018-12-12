<html>
	<head>
        <meta charset="utf-8">
        
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/site/docs/4.1/examples/dashboard/dashboard.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/dist/css/bootstrap.min.css">
		<script type="text/javascript"src="dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
   		
	</head>
	<body>
			
   		    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
				
			
      		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/model.php";>&nbsp;&emsp;PHP-SERVER</a>
			
			
			<ul class="navbar-nav px-3">
		         <li class="nav-item text-nowrap">
			  
			  <button class="btn btn-outline-success"onclick="window.location.replace('/logout')">登出</button>
		         </li>
      			</ul>
    		    </nav>

			 	<div class="container-fluid">
     			  <div class="row">
        		   <nav class="col-md-2 d-none d-md-block bg-light sidebar">
			    	<div class="sidebar-sticky">
			     	<ul class="nav flex-column">
			     
			
     			<li class="nav-item">
                		<a class="nav-link" href="#">
                  			<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block" onclick="location.href='/user'">使用者管理</button>
                		</a>
             	</li>
				
		        <li class="nav-item">
			     		 <a class="nav-link active" href="#">
			        		<span data-feather="home"></span>
				 			 <button class="btn btn-outline-dark btn-block"onclick="location.href='/piwork'">指派工作項目</button>
                 			<span class="sr-only">(current)</span>
                		</a>
              		      </li>
			    <li class="nav-item">
                	<a class="nav-link" href="#">
						<span data-feather="file"></span>
						  
						<button class="btn btn-outline-dark btn-block"onclick="location.href='/index?startRow=0&endRow=7&start=1'">搜尋/修改工作</button>
                		</a>
             		     </li>
              		     <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
						<button class="btn btn-outline-dark btn-block"onclick="location.href='/add.php'">新增工作項目</button>
                		</a>
              		     </li>
			     <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_import.php'">JPEG/Excel新增</button>
                		</a>
             	 </li>
				
				 <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_export.php?F_TYPE=&F_NAME='">Excel匯出資料</button>
                		</a>
             	 </li>
				


			    </div>
			   </nav> 
        		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-3">
				<canvas class="my-3 w-100" id="myChart" width="800" height="0"></canvas>
				<div id="footer"> 
                <html>
                        <head>
                            <script type="text/javascript"src="static\additem.js"></script>
                            <script type="text/javascript"src="dist\js\jquery.min.js"></script>
                        </head>

                        <h1>新增工作項目</h1>
                        <!-- <form method="GET" id="form" name="form" action="additem.php" enctype="multipart/form-data"> -->
                        <input type="radio" name="radio"id="radio1" onclick="text()">
                        <span>新增類別 </span>
                        <input type="radio" name="radio"id="radio2" onclick="text()" checked>
                        <span>新增工程 </span><br>
                        
                        <div id="1" style="display:inline-block">
                        <form method="POST" id="form" name="form" action="additem.php"  enctype="multipart/form-data">
                        <span>類別: </span>
                            <select id="select" name="select">
                                    <option></option>
                                
                                 <?php 
                                    include 'mysql.php';
                                    $select = "select F_TYPE from TYPE";
                                    $db = new db;
                                    $row = $db->select_array($select);
                                    $lengh=count($row);
                                    print_r($lengh);
                                    for($i=0;$i<=$lengh-1;$i++){
                                        echo "<option>".$row[$i][0]."</option>";
                                    }
                                 
                                 ?>
                                
                            </select>
                            <th>工程:<th><input type = "text" name="add2" id="add2">
                            <th>圖片:<th><input name = "file" type = "file" multiple="multiple"enctype="multiple/form-data" accept = "image/gif,image/jpeg,image/png">
                            <input type = "submit"class="btn btn-outline-dark" value="新增"   >
 							<!-- <input type = "submit"class="btn btn-outline-dark" value="新增"  onclick="check('add.php')" > -->

                        </form>
						

                        </div>	
                        <div id="2" style="display:none">
                            <form method="GET" id="form2" name="form2" action="additem.php">
                                <th>新增類別:<th><input type = "text" name="select" id="add">
                                <input type = "button"class="btn btn-outline-dark" value="新增" onclick="FtypeCheck('additem.php')">
                            </form>
                            
                            <span>所有類別: </span>
                            <select id="select2" name="select2">
                                    <option></option>

                                    <?php 
    
                                        for($i=0;$i<=$lengh-1;$i++){
                                            echo "<option>".$row[$i][0]."</option>";
                                        }
                                
                                    ?> 
                            
                            
                                    <input type = "button"class="btn btn-outline-dark" value="刪除" onclick="Del_Type('additem.php');">
                            </select>

                        </div>
                </html>
                </div>
				
				</main>	
	</body>	
</html>	
<?php

// if(!empty($_POST['select'] && $_POST['add2'])){    //新增類別、工程、圖片
//     $F_NAME = $_POST['select'];
// 	$F_TYPE = $_POST['add2'];
	 
//     $check = "select * from Manual where F_NAME ='$F_NAME' and F_TYPE ='$F_TYPE'" ;
//     //$db = new db;
//     $row=$db->select($check);
// 	//print($row['F_NAME']);
//     if($row['F_NAME'] != null){
// 		echo "<script type='text/javascript'>";
// 		echo "alert('資料已存在');";
//         echo "</script>";  
//     }else{
//         $insert = "insert into Manual(F_NAME,F_TYPE)VALUE('$F_NAME','$F_TYPE')";//新增資料
//         $db->insert($insert);
//         echo "<script type='text/javascript'>";
// 		echo "alert('新增成功');";
//         echo "</script>";        
//     }   
//     if (!empty($_FILES['file']['name'])){ //新增圖片
//         move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);
//     }  
   
// }else{
// 		echo "<script type='text/javascript'>";
// 		echo "alert('請輸入類別與工程');";
// 		echo "</script>";  
// }
    

?>



   
