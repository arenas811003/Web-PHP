
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
							<script type="text/javascript"src="static\user.js"></script>
							
					</head>
					
					    <h1>使用者管理
	                    <button class="btn btn-outline-dark" onclick="location.href='/newuser.php';">新增使用者</button>
                        </h1>
                        <table class="table table-hover">
                            <tr>
                                <th>名稱</th>
                                <th>帳號</th>
                                <th>信箱</th>
                                <th>使用者權限</th> 
                                <th>修改名稱/密碼/權限</th> 
                                <th>刪除使用者</th> 
                            </tr>
                                
                            <?php
                                    

                                    include 'mysql.php';
                                    $select = "select * from User";
                                    $db = new db;
                                    $row = $db->select_array($select);
                                    $lengh=count($row);
                                    //print_r($lengh);
                                    for($i=0;$i<=$lengh-1;$i++){
                                       // echo "<option>".$row[$i][0]."</option>";
                                        $ID=$row[$i][0];
                                        $username=$row[$i][1];
                                        $account = $row[$i][2];
                                        $email=$row[$i][4];
										$permission=$row[$i][5];
										


                                    echo"<tr>
                                            <td>$username</td>
                                            <td>$account</td>
                                            <td>$email</td>";
                                            if($permission == 0){
                                                echo "<td>主控端</td>";
                                            }
                                            if($permission == 1){
                                                echo "<td>主管端</td>";
                                            }
                                            if($permission == 2){
                                                echo "<td>客戶端</td>";
											}
											
                                            //echo"<td><button id='$ID'class='btn btn-outline-dark'  onclick=post('test.php','id=$ID&name=$username&account=$account&email=$email&permission=$permission')>修改</button></td>";
											echo"<td><button id='$ID'class='btn btn-outline-dark' onclick=location.href='/userupdate.php?id=$ID&name=$username&account=$account&email=$email&permission=$permission'>修改</button></td>";
											if($account != "Admin"){
												echo "<td><button id='$ID'class='btn btn-outline-dark' onclick=\"Delete(this.id,'user2.php')\">刪除</button></td>";
											}else{
												echo "<td><button id='$ID'class='btn btn-outline-dark' onclick=\"StopDel()\">刪除</button></td>";
											}
											
											
									echo "</tr>";
											
                                    }

                                 
                            
                                    
                            
                            
                            ?>
                        </table>
				</html>
							
            </div>
				
		</main>	
	</body>	
</html>	


