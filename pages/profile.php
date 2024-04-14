<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musico - User Profile</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        
    }
    .box{
        height: 70vh;
        display:flex;
        flex-direction:row;
        justify-content: centr;
    align-items: center;
    }
    img{
        border-radius: 50%;
    width: 50%;
    height: 50%;
    }
    .name{
        color: white;
    font-size: 40px;
    }
    .email{
        color: white;
    font-size: 40px;
    }
    .profile{
        display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border: 2px solid grey;
    border-radius: 10px;
    padding: 50px;
    margin-left: 150px;
    margin-top: 100px;
    }
    .options{
        display: flex;
    justify-content: center;
    flex-direction: column;
    font-size: 30px;
    align-items: center;
    padding: 50px;
    margin-left: 150px;
    margin-top: 100px;

    }
    .options div{
        background: ;
        width:300px;
    margin: 15px;
    
 
    }
    a{
        text-decoration:none;
        color:black;  
    }
    @media (max-width:600px) {


    .box{
        height: 60vh;
        display:flex;
        flex-direction:column;
    }

    img{
        border-radius: 50%;
    width: 30%;
    height: 30%;
    }
    .name{
        color: white;
    font-size: 20px;
    }
    .email{
        color: white;
    font-size: 20px;
    }
    .profile{
        display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
    border: 2px solid grey;
    border-radius: 10px;
    padding: 0px;
    
    
   
    }
    .options{
        display: flex;
    justify-content: center;
    flex-direction: column;
    font-size: 20px;
    align-items: center;
    padding: 10px;
    margin-top: 20px;

    }

    }
    </style>
</head>

<body>
    <?php include  '../pages/includes/navbar.php'; ?>
    <div class="box">
        <div class="profile">
            <img src="../Assests/OIP.jpeg" alt="">
            <div class="name">$username</div>
            <div class="email">example@gmail.com</div>

        </div>
        <div class="options">
            <div><a href="upload music.php">Upload Music</a></div>
            <div><a href="../Trim Songs/index.php">Ringtones maker</a></div>
            <div><a href="">Playlists</a></div>
            <div><a href="">Invite friends</a></div>
            <div><a href="">Contact Us</a></div>
            <div><a href="">About Us</a></div>
            <div><a href="">Settings</a></div>
            
            </div>
    </div>
</body>
<?php include  '../pages/includes/sticky footer.php'; ?>

</html>