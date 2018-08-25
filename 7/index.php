<?php 
$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$db 	= "arka";
$conn	= mysqli_connect($host,$user,$pass,$db);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog</title>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>  
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .media-heading{
        margin-top:12px;
        margin-bottom : 6px;
    }

    .media-body{
        padding-left:6px;
    }

    .navbar {
        margin-bottom: 0;
        border-radius: 0;
    }

    .primary-btn {
        padding: 14px 28px;
        border-radius: 4px;
        background-color: #fc4c4e;
        border: none;
        color: white;
        font-size: 16px;
        transition: box-shadow .3s, backgorund-color .3s;
    }

    .primary-btn:hover {
        box-shadow: 0 3px 15px 0 rgba(252, 76, 78, 0.4);
    }

    .ap-post, .ap-post-no {
        margin-top: 60px;
        background-color: white;
        border-radius: 6px;
        border: solid 1px rgba(151, 151, 151, 0.3);
        transition: transform .3s;
        padding : 0px 24px;
    }

    .ap-post-no{
        border: solid 0px #fc4c4e;
        border-top-width:10px !important;
        box-shadow: -4px 25px 34px 0 rgba(123, 122, 122, 0.05);
    }

    .ap-post:hover {
        transform: scale(1.05);
        margin-top: 50px;
        box-shadow: -4px 25px 34px 0 rgba(123, 122, 122, 0.05);
        border: solid 0px #fc4c4e;
        border-top-width: 10px !important;
    }

    .ap-post-share li{
        display:inline;
    }

    .ap-post-share{
        padding-left : 18px !important;
        padding-top : 12px;
    }

    .ap-post-header {
        padding-top : 48px;
    }

    .ap-post-header:after {
        display: block;
        height: 0;
        clear: both;
    }

    .ap-post-title {
        color: #555555;
        font-size: 28px;
    }

    .ap-post-desc {
        padding-top: 12px;
    }

    .ap-post-more {
        padding-top: 12px;
        padding-bottom: 60px;
        
    }

    .ap-post-desc p {
        font-size: 16px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.5;
        letter-spacing: normal;
        text-align: left;
        color: #555555;
    }
  </style>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>                        
	      </button>
	      <a class="navbar-brand" href="#">DTechnolgy</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="index.php">Home</a></li>
	        <li><a href="https://www.linkedin.com/in/djakatechnology">About</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	  
	<div class="container">    
	<?php 
		if(isset($_GET['id'])) {
            $sql = "SELECT posts.id, title, username, content FROM posts LEFT JOIN users ON createdBy = users.id WHERE posts.id = '".$_GET['id']."'";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) > 0) {?>
				    <div class="row content">

				<?php while($row = mysqli_fetch_assoc($result)) {
				       ?>
					    <div class="col-xs-12 col-md-12 ap-post-no" style="margin:64px 0px 32px 0px">
                            <div class="ap-post-header">
                                <div class="ap-post-title">
                                    <?php echo strtoupper($row['title']); ?>
                                </div>
                            </div>
                            <div class="ap-post-share">
                                <ul style="list-style: none;">
                                    <a href="">
                                        <li>
                                            <img src="img/fb.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/twitter.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/in.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/link.png"> </li>
                                    </a>
                                </ul>
                            </div>
                            <div class="ap-post-desc" style="padding-bottom : 24px">
                                <p>
                                    <?php echo $row['content']; ?>
                                </p>
                            </div>
                        </div>
                <?php } ?>
                <br>
				    <div class="col-sm-12 text-left">
				    	<div class="form-group">
						  <form method="POST">
							  <label for="comment">Komentar :</label>
							  <textarea class="form-control" name="komentar" rows="5" id="comment"></textarea>
							  <br>
							  <input type="submit" name="komentari" value="Komentari" class="btn primary-btn">
							  <?php 
							  	if (isset($_POST['komentari'])){
							  		$query = "INSERT INTO comments(`comment`, `postId`) VALUES('".$_POST['komentar']."', '".$_GET['id']."')";
								    $result = mysqli_query($conn, $query);
								    if (!$result)
								    	echo "<script>alert('Gagal Mengomentari')</script>";
							  	}
							  ?>
                          </form>
                        <br><br>
						  <div class="well" style="background: #ffffff">
							  	<div class="media">
								    <?php 
								    $query = "SELECT * FROM `comments` WHERE `postId`='".$_GET['id']."' ";
                                    $result = mysqli_query($conn, $query);
                                    echo "<h4>".$result->num_rows. " Komentar</h4><br>";
								    if (mysqli_num_rows($result) > 0) {
								    	while($row0 = mysqli_fetch_assoc($result)){
								    	?>
								    		<div class="media-left media-top">
										      <img src="img/avatar.png" class="media-object" style="width:80px">
										    </div>
										    <div class="media-body">
										      <h4 class="media-heading">Anonymous</h4>
										      <p><?php echo $row0['comment']; ?></p>   
										    </div>
										    <hr>
								    	<?php	
								    	}
								    }else{
								    	echo "Belum ada komentar.";
								    }
								    ?>
							  </div>
							 </div>
						</div>
				    </div>
				  </div>				
			<?php
			} else {
			    echo "<h1>404 Not Found!! </h1>";
			}
		}else{
                ?>
                <div class="row">
                <?php
				$sql = "SELECT `posts`.`id`, `posts`.`title`, `posts`.`content`, `posts`.`createdBy`, `users`.`id` AS user_id, `users`.`username` FROM `posts` LEFT JOIN `users` ON `posts`.`createdBy`=`users`.`id`";
				$query = mysqli_query($conn, $sql);
				if (mysqli_num_rows($query) > 0) {
				    while($row = mysqli_fetch_assoc($query)) {
                       ?>
                        <div class="col-xs-12 col-md-12 ap-post">
                            <div class="ap-post-header">
                                <div class="ap-post-title">
                                    <?php echo strtoupper($row['title']); ?>
                                </div>
                            </div>
                            <div class="ap-post-share">
                                <ul style="list-style: none;">
                                    <a href="">
                                        <li>
                                            <img src="img/fb.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/twitter.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/in.png"> </li>
                                    </a>
                                    <a href="">
                                        <li style="padding-left: 15px;">
                                            <img src="img/link.png"> </li>
                                    </a>
                                </ul>
                            </div>
                            <div class="ap-post-desc">
                                <p>
                                    <?php echo substr($row['content'],0,320)."..."; ?>
                                </p>
                            </div>
                            <div class="ap-post-more">
                                <a href="article-detail-belitung.html">
                                    <a class="btn-link" href="index.php?id=<?php echo $row['id']; ?>">
                                        <button class="primary-btn">Lanjutkan Membaca</button>
                                    </a>
                                </a>
                            </div>
                        </div>
				       
				       <?php 
                    }
                    
                    ?>
                    </div>
                    <?php
				} else {
				    echo "0 results";
				}	
		}
    ?>
</div>
</body>
</html>