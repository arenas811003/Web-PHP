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
						  
						<button class="btn btn-outline-dark btn-block"onclick="location.href='/search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1'">搜尋/修改工作</button>
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
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel'">PDF/Excel新增</button>
                		</a>
             	 </li>
				
				 <li class="nav-item">
                		<a class="nav-link" href="#">
                  		<span data-feather="shopping-cart"></span>
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_export'">Excel匯出資料</button>
                		</a>
             	 </li>
				


			    </div>
			   </nav> 
        		<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-3">
				<canvas class="my-3 w-100" id="myChart" width="800" height="0"></canvas>
				<div id="footer"> 
				<html>
					<head>
                            <!-- <script type="text/javascript"src="static\client.js"></script> -->
							<script type="text/javascript"src="static\update.js"></script>
                            
                            
							
					</head>
					
					<h1>修改工作項目</h1>
						<form method="POST" id="form" name="form" action="update2.php" enctype="multipart/form-data">
							<th>類別:<th>
							<select id="select" name="select" >
                            <?php 

                                    include 'mysql.php';
                                    $select = "select F_TYPE from TYPE";
                                    $db = new db;
                                    $row = $db->select_array($select);
                                    $lengh=count($row);
                                    print_r($lengh);
                                    $F_TYPE=$_GET['F_TYPE'];
                                    echo "<option>".$F_TYPE."</option>";
                                    
                                    for($i=0;$i<=$lengh-1;$i++){
                                        if($row[$i][0]!= $F_TYPE){
                                            echo "<option>".$row[$i][0]."</option>";
                                        }
                                    }
                               
                                 
                            ?>		
							</select>
							
                            <th>工程:<th>
                            <?php
                                
                                $F_NAME = $_GET['F_NAME'];
                                $FID = $_GET['FID'];
                                echo "<input type = 'text' id='add2' name='add2' value='$F_NAME'>";
                                echo "<input type = 'hidden' name='FID' value='$FID'>";
                                echo "<input type = 'hidden' name='ex-ftype' value='$F_TYPE'>";
                                echo "<input type = 'hidden' name='ex-fname' value='$F_NAME'>";   
                            ?>
                            
							<th>圖片:<th><input name = "file[]" type = "file" multiple='multiple'accept = "image/jpeg">	
								
                            <input type = "submit"class="btn btn-outline-dark"  value="修改" ><br><br>
                                    
                            <html>
                            <?php
                               
                               $dir ="./upload/$F_TYPE-$F_NAME";

                               if(is_dir($dir)){
                                   //scandir回傳值的第一項是「.」，就是目前資料夾的意思，第二項是「..」也就是上一個資料夾
                                   $files = array_diff(scandir($dir), array('.','..'));//array_diff回傳不相同陣列值,(取得檔案名稱)
                                   foreach ($files as $file) {
                                    echo "<img src='/upload/$F_TYPE-$F_NAME/$file' width=500  height=333> ";
                                    
                                    }
                                }
                                    //echo "<img src='/upload/$F_TYPE-$F_NAME/1234.jpg' width=1000> ";

                            ?>
                            </html>
						</form>


				</html>
				
            </div>	
		</main>	
	</body>	
</html>	



   
