<!DOCTYPE html>


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> HR Management System</title>
  


<?php include('./header.php'); ?>




</head>
<style>
	body{
		/* width: 100%;
	    height: calc(100%); */
	    /* background: #007bff; */
		width:100%;
		min-height: 100svh;
		background: url(assets/img/Main.png);
		background-size: cover;
		background-repeat: no-repeat;
		/* background: #900000; */
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		
	}
	/* main#main{
		width:100%;
		min-height: 100svh;
		background: url(assets/img/Background.png);
		background-size: cover;
		background-repeat: no-repeat;
		background: #900000;
		display: flex; 	
		justify-content: center;
		align-items: center;
		
	} */
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		
		/* opacity: 0.7; */
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		font-size: 110px;
		color: white;
		padding-left: 75px;
		left:0;
		width:100%;
		height: calc(100%);
		background: #59b6ec61;
		display: flex;
		/* justify-content: center; */
		/* margin-left: 50px; */
		/* align-items: center;
		background: url(assets/img/AdminSide.jpg);
		background-color: rgba(100,100,100,0.90);
		background-blend-mode: lighten;
	    background-repeat: no-repeat;
	    background-size: cover; */
	}
	#login-right .card{
		margin: auto;
		z-index: 1
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
    z-index: 10;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
   
}
li{
	display: flex;
	justify-content: center;
	gap: 2.5rem;
	margin-top: 200px;
	
}
li a{
	width: 350px;
	/* border: 1px solid yellow; */
}
#main li a img{
	width: 100%;
	height: 100%;
	transition: 1s ease;
}

#main li a:hover img {
-webkit-transform: scale(1.05);
-ms-transform: scale(1.05);
transform: scale(1.05); 
transition: 1s ease;
} 

.font{      
	font-weight: bold;
	font-size: 90px;
	color: black;
	-webkit-text-stroke-width: 1.5px;
	-webkit-text-fill-color: white;
	font-family: sans-serif;
	/* position: absolute; */

	
}

</style>

<body>
	<div id="main">
		<h1 class="font">HR Payroll Management System</h1>
		
		



<!-- <main id="main"> -->

	
		<li>
			
			<a href="./employee_login.php">
				<img src="./assets/img/employee1.png" alt="">
			</a>
			
			<a href="./admin_login.php">
				<img src="./assets/img/admin1.png" alt="">
			</a>
		</li>
<!-- </main> -->
</div>


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>
