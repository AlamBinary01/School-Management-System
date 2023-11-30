<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>School Managment system| Home</title>
        <link rel="stylesheet" href="/home/style.css">
        <link href="https://fonts.googleapis.com.css2? family=Poppins:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
}

.navbar{
    display: flex;
    align-items: center;
    padding: 20px;
}
nav{
    flex: 1;
    text-align: right;
}
nav ul{
    display: inline-block;
    list-style-type: none;
}
nav ul li{
    display: inline-block;
    margin-right: 20px;
}
a{
    text-decoration: none;
    color: #555;
}
p{
    color: #555;
}
.container{
    max-width: 1400px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;
}
.col-2{
    flex-basis: 50%;
    min-width: 300px;
}
.col-2 img{
    max-width: 100%;
    padding: 50px 0;
}
.col-2 h1{
    font-size: 50px;
    line-height: 60px;
    margin: 25px 0;
}
.btn{
    display: inline-block;
    background: #002FF2;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
}

.btn:hover{
    background: #563434;
}


.header{
    background: radial-gradient(#CAF9F9, #00FFFF);
}
.header .row{
    margin-top: 70px;
}
.categories{
    margin: 70px 0;
}
.col-3{
    flex-basis: 30%;
    min-width: 250px;
    margin-bottom: 30px;
}
.col-3 img{
    width: 100%;
}
.small-container{
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.col-4{
    flex-basis: 25%;
    padding: 10px;
    min-width: 200px;
    margin-bottom: 50px;
    transition: transform 0.5s;
}
.col-4 img{
    width: 100%;
}

.title{
    text-align: center;
    margin: 0 auto 80px;
    position: relative;
    line-height: 60px;
    color: #555;
}
.title::after{
    content: '';
    background: #ff523b;
    width: 80px;
    height: 5px;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

h4{
    color: #555;
    font-weight: normal;
}
.col-4 p{
    font-size: 14px;
}
.rating .fa{
    color: #ff523b;
}

.col-4:hover{
    transform: translateY(-5px);
}


    </style>
    <body>
        <div class="header">
            <div class="container">
            <div class="navbar">
            <div class="logo">
                <img src="/home/images/1.png" width="160px">
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="Signup.php">Sign Up</a></li>
                    <li><a href="signin.php">Sign in</a></li>
                </ul>
            </nav>
        </div>
            <div class="row">
                <div class="col-2">
                    <h1>Let's Build the future with FAST School of Computing</h1>
                    <p>Hurry Up to join our community now!
                    </p>
                    <a href="" class="btn">Explore Now &#8594</a>
                </div>
                <div class="col-2">
                    <img src="home\images\1.png">
                </div>
            </div>
        </div>


    </body>
</html>