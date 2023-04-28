<?php 
    require('connection.php');

    //echo typing
    echo "<script>
setTimeout(typeWriterError, 1000)
var i = 0;
var bitrobo_message1 = 'Hey👋,;I am Bit-Robo.🎲;How can I help you ?;Now you are going to login your Safe Story accont.;Thanks for using Safe Story.'
var speed = 50;
document.getElementsByClassName('bitrobo-message')[0].innerHTML = ''
function typeWriterError(statement) {
  statement = 'create-account-name'
  if(statement === 'create-account-name'){
    if (i < bitrobo_message1.length) {
      if(bitrobo_message1.charAt(i).match(/;/gi)){
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += '<br>'
      }else{
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += bitrobo_message1.charAt(i)
      }
      i++
      setTimeout(typeWriterError, speed)
    }
  }else{i = 0}
}</script>";
    
$error_unpw = "
setTimeout(typeWriterError, 1000)
var i = 0;
var bitrobo_message1 = 'Ooops!;There is an error in your entered username or password.;Are you a thief ?;If you are a thief, I will f*ck you.'
var speed = 50;
document.getElementsByClassName('bitrobo-message')[0].innerHTML = ''
function typeWriterError(statement) {
  document.getElementsByClassName('bitrobo-message')[0].style.color = 'red'
  statement = 'create-account-name'
  if(statement === 'create-account-name'){
    if (i < bitrobo_message1.length) {
      if(bitrobo_message1.charAt(i).match(/;/gi)){
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += '<br>'
      }else{
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += bitrobo_message1.charAt(i)
      }
      i++
      setTimeout(typeWriterError, speed)
    }
  }else{i = 0}
}";
$error_server = "
setTimeout(typeWriterError, 1000)
var i = 0;
var bitrobo_message1 = 'Error!;There was a problem.;Can\'t connect to XCodeJet server.;'
var speed = 50;
document.getElementsByClassName('bitrobo-message')[0].innerHTML = ''
function typeWriterError(statement) {
  document.getElementsByClassName('bitrobo-message')[0].style.color = 'red'
  statement = 'create-account-name'
  if(statement === 'create-account-name'){
    if (i < bitrobo_message1.length) {
      if(bitrobo_message1.charAt(i).match(/;/gi)){
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += '<br>'
      }else{
        document.getElementsByClassName('bitrobo-message')[0].innerHTML += bitrobo_message1.charAt(i)
      }
      i++
      setTimeout(typeWriterError, speed)
    }
  }else{i = 0}
}";

    $errors = array();
    //on submit
    if(isset($_POST["login"])){
        //echo "<script>alert('sub')</script>";
        //check data avalability
        if(!isset($_POST["username"]) || strlen(trim($_POST["username"]) < 1)){
            $errors[0] = $error_unpw;
            //echo "<script>alert('err')</script>";
        }
        if(!isset($_POST["password"]) || strlen(trim($_POST["password"]) < 1)){
            $errors[0] = $error_unpw;
        }
        //check errors
        if(empty($errors)){
            $username = mysqli_real_escape_string($connection, $_POST["username"]);
            $passwd = mysqli_real_escape_string($connection, $_POST["password"]);
            $password = sha1($passwd);
            $query = "SELECT * FROM `accounts`
                        WHERE username = '{$username}' 
                        AND password = '{$password}'
                        LIMIT 1";
            $result_xcodejet = mysqli_query($connection, $query);
            //check users
            if($result_xcodejet){
                //check user
                if(mysqli_num_rows($result_xcodejet) == 1){
                    echo "<script>alert('solved')</script>";
                    header('Location: dashboard.php');
                }else{
                    $errors[0] = $error_unpw;
                    echo "<script>{$errors[0]}</script>";
                }

            }else{
                $errors[0] = $error_server;
                echo "<script>{$errors[0]}</script>";
            }
        }else{
            echo "<script>{$errors[0]}</script>";
        }
        //done
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./login-style-1.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./footer.css">
    <title>SafeStory | Login</title>
</head>
<body>
    <div class="xcodejet-header">
        <div class="header-items">
            <img draggable="false" class="xcodejet-header-img" src="./media/header-image.png">
            <div class="desktop-view-topic"><h1><!--Log in to your account--></h1></div>

            <div class="header-text">
                <h2></h2><br>
                <h3><a style="color: rgb(251, 255, 0)"></a></h3>
            </div>
        </div>
        <div class="header-back">
            <a >
                <img onclick="menuTabOpen()" draggable="false" src="./media/avatar-boy.svg">
            </a>
        </div>
    </div>
    <!--<div class="header">
        <img src="./media/mrcm-logo.png" alt="XCODEJET">
        <a href="register.html"><button>Register</button></a>
        <a href="http://xcodejet.epizy.com"><button>About</button></a>  
    </div>
    <br>
    Kumuthu Prabhasha [xcodejet.epizy.com]-->
    <div class="body-xcodejet">
        <div class="box-1">
            <!--<div class="box-header">
                <a></a>
            </div>-->
            <form action="index.php" method="post" class="box-body">
                <div class="box-body-img">
                    <img src="./media/blog-best-EU-apps_01.png">
                </div>
                <br>
                <div class="box-body-div">
                    <div class="mobile-view-topic"><h1><b>Login </b> <a style="text-shadow: 00 1px 15px rgb(226, 255, 213);"><b style="color: red;">S</b><b style="color: rgb(255, 217, 0);">afe</b><b style="color: aqua;">Story</b></a> <b>account</b></h1></div>
                    <br><br>
                    <div class="box-body-input">
                        <div class="box-bitrobo">
                            <div class="bitrobo-dp"><img src="./media/accont-tag-bot.png" alt=""></div>
                            <div class="bitrobo-message-box">
                                <div class="bitrobo-message"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body-input">
                        <div style="display: flex; flex-direction: row; align-items: center;"><b style="margin-top: -20px;"><svg style="margin-top: 15px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon><path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path></g></svg></b><li style="list-style: none;" id="username-tag"> Username:</li></div>

                        <div class="name-input-field">
                            <input class="data-input" name="username" style="text-transform: lowercase;" id="username" type="text" placeholder="Enter your username">
                        </div>
                        <br><br>
                        <div style="display: flex; flex-direction: row; align-items: center;"><b style="margin-top: -10px;"><svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4" d="M11.9991 17.3501C12.8994 17.3501 13.6291 16.6203 13.6291 15.7201C13.6291 14.8199 12.8994 14.0901 11.9991 14.0901C11.0989 14.0901 10.3691 14.8199 10.3691 15.7201C10.3691 16.6203 11.0989 17.3501 11.9991 17.3501Z" fill="#292D32"/>
                            <path d="M16.65 9.43994H7.35C3.25 9.43994 2 10.6899 2 14.7899V16.6499C2 20.7499 3.25 21.9999 7.35 21.9999H16.65C20.75 21.9999 22 20.7499 22 16.6499V14.7899C22 10.6899 20.75 9.43994 16.65 9.43994ZM12 18.7399C10.33 18.7399 8.98 17.3799 8.98 15.7199C8.98 14.0599 10.33 12.6999 12 12.6999C13.67 12.6999 15.02 14.0599 15.02 15.7199C15.02 17.3799 13.67 18.7399 12 18.7399Z" fill="#292D32"/>
                            <path opacity="0.4" d="M7.1207 9.45V8.28C7.1207 5.35 7.9507 3.4 12.0007 3.4C16.0507 3.4 16.8807 5.35 16.8807 8.28V9.45C17.3907 9.46 17.8507 9.48 18.2807 9.54V8.28C18.2807 5.58 17.6307 2 12.0007 2C6.3707 2 5.7207 5.58 5.7207 8.28V9.53C6.1407 9.48 6.6107 9.45 7.1207 9.45Z" fill="#292D32"/>
                            </svg></b><li style="list-style: none;" id="password-tag"> Password:</li></div>
                        <div class="name-input-field">
                            <input class="data-input" name="password" id="password" type="password" placeholder="enter your password">
                        </div>
                        <br><br>
                        <br>
                    </div>
                </div>
                <div class="box-body-footer">
                    <div class="box-body-footer-back">
                        <div class="box-body-footer-back-btn"><i class='fa fa-arrow-left'></i>&nbsp;Back</div>
                    </div>
                    <div class="box-body-footer-next">
                    <button type="submit" class="box-body-footer-next-btn" name="login" style="visibility: visible;">Login&nbsp;<i class='fa fa-arrow-right'></i></button>
                    </div>
                </div>
            </form>
        </div><br>        
        <div align="center" class="footer-contact">
            <a href="http:\/\/xcodejet.epizy.com">
              <img class="contact-img" style="background-color: rgba(255, 255, 255, 0.904);" src="https://cdn-icons-png.flaticon.com/512/6928/6928929.png">
            </a>&nbsp;&nbsp;&nbsp;
            <a  href="https:\/\/github.com/prabhasha2006">
              <img class="contact-img" style="background-color: rgba(255, 255, 255, 0.904);" src="https://cdn2.iconfinder.com/data/icons/social-icons-33/128/Github-256.png">
            </a>&nbsp;&nbsp;&nbsp;
            <a href="https:\/\/www.facebook.com/profile.php?id=100080792106732&mibextid=ZbWKwL">
              <img class="contact-img" src="https://cdn-icons-png.flaticon.com/512/4494/4494475.png">
            </a>&nbsp;&nbsp;&nbsp;
            <!--<a href="https:\/\/wa.me/94776115376?text=Hi,%20Kumuthu%20Prabhasha👋">
              <img class="contact-img" src="https://cdn-icons-png.flaticon.com/512/3670/3670051.png" alt="MRCM">
            </a>
            </a>&nbsp;&nbsp;&nbsp;
            <a href="https:\/\/t.me/kumuthu">
              <img class="contact-img" src="https://cdn-icons-png.flaticon.com/512/2111/2111646.png" alt="MRCM">-->
        </div>
        <div class="footer-copyright">
            <h3>Copyright © 2023 - XCodeJet team</h3>
        </div>
</body>
</html>