<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <style>
        body{
            padding: 0;
            margin: 0;
        }
        .container{
            position: absolute;
            margin-left: 40em;
            margin-top: 10em;
            padding: 0 2rem;
        }
        .webpage{
            position: fixed;
	        height: 100%;
            width: 100%;
	        z-index: -1;
            margin: 0px;
        }
        .avatar{
	        display: flex;
	        justify-content: flex-end;
	        align-items: center;
            height: 150px;
            width: 150px;
            display: block;
            margin: auto;
        }
        .login{
	        display: flex;
	        justify-content: flex-start;
	        align-items: center;
	        text-align: center;
        }
        .login h2{
	        margin: 15px 0;
	        text-transform: uppercase;
	        font-size: 2rem;
            color: #999;
        }
        .login .input{
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d9d9d9;
        }
        .i{
	        color: #d9d9d9;
	        display: flex;
	        justify-content: center;
	        align-items: center;
        }
        .input > div{
            position: relative;
            height: 45px;
        }
        .input > div > h5{
	        position: absolute;
	        left: 20px;
            top: -30px;
	        transform: translateY(-50%);
	        color: #999;
	        font-size: 20px;
	        transition: .3s;
        }
        .input > div > input{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #999;
            font-family: 'poppins', sans-serif;
        }
        .input .password{
	        margin-bottom: 4px;
        }
        .btn{
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #00beff, #00beff);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }
    </style>
</head>
<body>
    <img src="bg.jpg" class="webpage">
    <div class="container">
        <div class="login">
            <form action="Home.php">
                <img src="avatar.png" class="avatar">
                <h2 class="title">Login</h2>
                <div class="input username">
                    <div class="i"> 
           		    	<i class="fas fa-user"></i>
           		   </div>
                    <div class="in">
                        <h5>Username</h5>
                        <input type="text" class="u_input">
                    </div>
                </div>
                <div class="input password">
                    <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                    <div class="in">
                        <h5>Password</h5>
                        <input type="password" class="passs">
                    </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>

</body>
</html>