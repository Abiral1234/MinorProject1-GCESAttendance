<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			background: white;
			font-family: sans-serif;
			font-weight: 350;
		}
		.container{
			width: 80%;
			margin: 0 auto;
			
		}
		header{
			background:#00BEFF;
			}

		header::after{
			content: '';
			display: table;
			clear: both;
		}

		nav ul >li>a{
			color: white;
			text-underline-position: none;
			text-decoration: none;
			text-transform: uppercase;
			font-size: 25px;

		}
		nav ul >li>a:hover{
			color: white;
			
		}
		nav{
			float: right;
		}
		nav ul{
			margin: 0;
			padding: 0;
			list-style: none;
		}
		nav li{
			display: inline-block; 
			margin-left: 70px;
			padding-top: 25px;
			padding-bottom: 25px;
			position: relative;
		}
		
		nav a::before{
			content: '';
			display: block;
			height: 5px;
			width: 100%;
			background-color: white;
			position: absolute;
			top :0 ;
			width: 0% ;
			transition: all ease-in-out 250ms;
			font-style: bold;

		}
		nav a:hover::before{
			width: 100%;

		}


	</style>
</head>
<body>
	<header>
<div class="container">	
	<nav>


		<ul>
			<li><a href="#">Home</a> </li>
			<li><a href="#">View</a> </li>
			<li><a href="#">Result</a> </li>
			<li><a href="#">logout</a> </li>
		</ul>
	</nav>

</div>
</header>
</body>
</html>