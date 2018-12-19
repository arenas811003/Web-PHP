<html>
	<?php
       include 'session.php';

    ?>
	<head>
        <meta charset="utf-8">
        
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/site/docs/4.1/examples/dashboard/dashboard.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.1.3/dist/css/bootstrap.min.css">
		<script type="text/javascript"src="dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
   		
	</head>
	<body>
			
   		    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-1 shadow">
				
			
      		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/search.php?F_TYPE=&F_NAME=&startRow=0&endRow=7&start=1";>&nbsp;&emsp;PHP-SERVER</a>
			
			
			<ul class="navbar-nav px-3">
		         <li class="nav-item text-nowrap">
			  
			  <button class="btn btn-outline-success"onclick="window.location.replace('/logout.php')">登出</button>
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
							  <?php
                                if($_SESSION['permission'] == 0){  
                                    echo "<button class='btn btn-outline-dark btn-block' onclick=location.href='/user.php'>使用者管理</button>";
                                }
                            ?>
                		</a>
             	</li>
				
		        <li class="nav-item">
			     		 <a class="nav-link active" href="#">
			        		<span data-feather="home"></span>
				 			 <button class="btn btn-outline-dark btn-block"onclick="location.href='/piwork.php'">指派工作項目</button>
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
							<button class="btn btn-outline-dark btn-block"onclick="location.href='/excel_import.php'">PDF/Excel新增</button>
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
							<script type="text/javascript"src="static\user.js"></script>
							
					</head>
					
                    <h1>修改名稱/密碼/權限</h1>
                    <form method="POST" id="form" name="form" action="" class="form-inline">
                    
                    <?php

                        include 'mysql.php';
                            $name=$_GET['name'];
                            $account=$_GET['account'];
                            $email=$_GET['email'];
                            $permission=$_GET['permission'];
                            $db= new db;
                            
                            $psw_sql="select password from user where account = '$account'";
                            $password=$db->select($psw_sql);
                            $password=$password['password'];
                                echo"<th>名稱:<th><input type = 'text' id='name' name='name' value='$name'>
                                    <input type = 'hidden' id='account'value='$account'>
                                    <th>密碼:<th><input type = 'password' id='password'name='password' value='$password'>
                                    <th>Email:<th><input type = 'text' id='email'name='email' value='$email'>
                                    <th>權限:<th>
									<select class='custom-select mr-sm-3'id='select' name='select' >";
							if($account == "Admin"){

								echo "<option>主控端</option>";
							}
							if($permission==0 && $account != "Admin"){
								echo "<option>主控端</option>
									 <option>主管端</option>
                                     <option>客戶端</option>";
                            }
                            if($permission==1){
								echo "<option>主管端</option>
									 <option>主控端</option>
                                     <option>客戶端</option>";
                            }
                            if($permission==2){
								echo "<option>客戶端</option>
									 <option>主控端</option>
                                     <option>主管端</option>";
                            }
						
						
							 echo "</select>";
                                     
                    ?>
							<input type = "button"class="btn btn-outline-dark"  value="修改" onclick="userupdate('/user2.php');"><br><br>
						</form>

				</html>
							
				
                </div>
				
			</main>	
	</body>	
</html>	
<?php



   
