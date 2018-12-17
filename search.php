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
                </html>
                    <head>
                        <meta charset="utf-8">
                        
                        <script type="text/javascript"src="static\excel_export.js"></script> 
                        <script type="text/javascript"src="static\search.js"></script>
                        <script type="text/javascript"src="static\pagination.js"></script>

                        <script type="text/javascript"src="dist\js\jquery.min.js"></script>
                    </head>
                        <h1>搜尋/修改工作</h1>
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <div class="input-group">
                                <form id="form" class="form-inline" >
                                    <span>類別: </span>
                                    <span> &nbsp;</span>
                                    <select id="select" class="custom-select" onclick="getType(this)">
                                    <option> </option>
                                    <?php
                                        include 'mysql.php';
                                        $select = "select distinct F_TYPE from Manual";
                                        $db = new db;
                                        $row = $db->select_array($select);
                                        $lengh=count($row);
                                        print_r($lengh);
                                        for($i=0;$i<=$lengh-1;$i++){
                                         
                                            echo "<option>".$row[$i][0]."</option>";
                                        } 
                                       
                                    ?>
                                
                                    </select>
                                    <span> &nbsp;</span>
                                    
                                    <span>工作項目: </span>
                                    <span> &nbsp;</span>
                                    <select id="select_type" class="custom-select">

                                        
                                        <option> </option>
     

                                    </select>
                                    <span> &nbsp;</span>
                                    <span> 關鍵字搜尋: </span>
                                    <span> &nbsp;</span>   
                                    <input type="text" id="keyword" onclick="keywords()"onkeypress="if (event.keyCode == 13){search('/search.php?'); return false;}">
                                    <span> &nbsp;</span>
                                    <span> &nbsp;</span>
                                    <input class="btn btn-outline-dark my-0 my-sm-10" type="button" value="搜尋" onclick="search('/search.php?')">
                                </form>
                        

                            </div>
                        </nav>
                        <table id="datatable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>類別</th>
                                    <th>工程</th> 
                                    <th>名稱/圖片</th> 
		                            <th>刪除資料</th> 
                                </tr>
                            </thead>
                        
                       

                            <tbody>
                                <?php
                                    $F_TYPE = $_GET['F_TYPE'];
                                    $F_NAME = $_GET['F_NAME'];
                                    $start = $_GET['start'];
                                    $line = 7 ;//每頁顯示項目數量
                                    $startRow = ($start-1)*$line; //每一頁開始的資料序號
                                    $endRow = $_GET['endRow'];//資料庫撈 n 筆資料
                                    

                                    if(!empty($_GET['F_TYPE']) && empty($_GET['F_NAME'])){//搜尋所有類別
                                        $total="select * from Manual where F_TYPE = '$F_TYPE'";                             
                                        $showline = "select * from Manual where F_TYPE = '$F_TYPE' limit $startRow,$endRow";
                                        $Value=$db->select_array($total);
                                        $lengh=count($Value);//總筆數
                                        $pages = ceil($lengh/$line); //總頁面
                                        $show=$db->select_array($showline);//顯示行數
                                    }

                                    if(empty($_GET['F_TYPE']) && !empty($_GET['F_NAME'])){//工程關鍵字搜尋
                                       
                                        $total= "select * from Manual where F_NAME like '%$F_NAME%'";
                                        $showline = "select * from Manual where F_NAME like '%$F_NAME%' limit $startRow,$endRow";
                                        $Value=$db->select_array($total);
                                        $lengh=count($Value);//總筆數
                                        $pages = ceil($lengh/$line); //總頁面
                                        $show=$db->select_array($showline);//顯示行數
                                    }
                                   
                                    if(empty($_GET['F_TYPE']) && empty($_GET['F_NAME'])){//搜尋所有類別、工程
                                        
                                        $total = "select * from Manual";
                                        $showline = "select * from Manual limit $startRow,$endRow";
                                        $Value=$db->select_array($total);
                                        $lengh=count($Value);//總筆數
                                        $pages = ceil($lengh/$line); //總頁面
                                        $show=$db->select_array($showline);//顯示行數
                                        
                                    }

                                    if(!empty($_GET['F_TYPE']) && !empty($_GET['F_NAME'])){//搜尋類別、工程
                                        
                                        $showline = "select * from Manual where F_TYPE = '$F_TYPE' and F_NAME = '$F_NAME' ";
                                        $lengh=1;//總筆數
                                        $pages =1; //總頁面
                                        $show=$db->select_array($showline);//顯示行數
                                      
                                    }
                                    
                                                         
                                    if(count($show) != 0 ){
                                            for($i=0;$i<=count($show)-1;$i++){
                                                $FID=$show[$i][0];
                                                $FTYPE=$show[$i][1];
                                                $FNAME=$show[$i][2];
                                                echo "<tr><td>".$show[$i][1]."</td>"."<td>".$show[$i][2]."</td>";
                                                echo "<td><button class='btn btn-outline-dark' id='$FID' onclick=location.href='/update.php?FID=$FID&F_TYPE=$FTYPE&F_NAME=$FNAME'>修改</button></td>";
                                                echo "<td><button class='btn btn-outline-dark' id='$FID' onclick=\"Delete(this.id,'search2.php')\">刪除</button></td></tr>";
                                                
                                            } 
                                    }else{
                                            echo   "<tr><td>搜尋 '$F_NAME' 無此筆資料</td></td>";
                                    

                                    }
                                                                           
                                ?>
                                 
                            </tbody>
                        </table>

                      
                        <div class="row">
                            <div class="col-sm"></div>			
                                <div class="col-sm">			
                                    <div id="pagination" name="pagination">
                                        <input type = "hidden" id="totalline"value="">
                                        <nav aria-label="...">
                                            <ul class="pagination pagination-sm">
                                            
                                            <?php
                                               
                                                if($startRow!=0 ){
                                    	
                                                
                                                    echo" <li class='page-item'> 
                                                            <li class='page-item'><a class='page-link' aria-label='Previous'href='#' onclick=previous('search.php?F_TYPE=$F_TYPE&F_NAME=$F_NAME&')>
                                                                <span aria-hidden='true'>&laquo;</span>
                                                                <span class='sr-only'>Previous</span>
                                                            </a></li>";
                                                }else{

                                                    if($start < $pages){
                                                    echo" <li class='page-item'> 
                                                        <a class='page-link' aria-label='Previous' href='#' '>
                                                            <span aria-hidden='true'>&laquo;</span>
                                                            <span class='sr-only'>Previous</span>
                                                        </a></li>"; 
                                                    } 
                                                }


                                                    $end=$start; 

                                                    if($start+2<$pages){

                                                        if($start < 3){
                                                            $start=1;
                                                            $end=5;

                                                        }else{
                                                            $start-=2;
                                                            $end+=2;
                                                        }

                                                    }else{

                                                        $start=$pages-4;
                                                        $end=$pages;

                                                    }

                                                    if($pages > 5){
                                                        for($i=$start;$i<=$end;$i++){
                                                   
                                                        echo   "<a class='page-link' href='#'onclick=gopage('/search.php?F_TYPE=$F_TYPE&F_NAME=$F_NAME&','$i') >$i<span class='sr-only'>(current)</span></a>";
                                                    
                                                        }
                                                    }

                                                    if($pages < 6 && $pages > 1){

                                                        for($i=1;$i<=$pages;$i++){
                                                       
                                                         echo   "<a class='page-link' href='#'onclick=gopage('/search.php?F_TYPE=$F_TYPE&F_NAME=$F_NAME&','$i') >$i<span class='sr-only'>(current)</span></a>";
                                                       	
                                                        }
                                                    }
                                                                                                   
                                            
                                                   if($pages >1){
                                                    echo"<li class='page-item'><a class='page-link' aria-label='Next'href='#' onclick=next($lengh,'search.php?F_TYPE=$F_TYPE&F_NAME=$F_NAME&')>
                                                            <span aria-hidden='true'>&raquo;</span>
                                                            <span class='sr-only'>Next</span>
                                                        </a>
                                                    </li>";	
                                                   }
                                                    
                                                
                                            ?>
                                        
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        <div class="col-sm"></div>			
                    </div>               

                </html>
                </div>
				
			</main>	
	</body>	
</html>	




   
