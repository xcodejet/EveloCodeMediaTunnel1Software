<?php require_once('Database/mysql/connect_check.php'); ?>
<?php
    $first_name = "Kumuthu";
    $last_name  = "Prabhasha";
    $query = "INSERT INTO mytable (first_name, last_name) VALUES ('{$first_name}', '{$last_name}')";
    $query = "SELECT * FROM mytable";
    $result = mysqli_query($connection, $query);
    if($result){
        echo '<script>console.log("Connected.")</script>';
        echo mysqli_num_rows($result);
        
        echo ' - testing...';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./footer.css">
    <link rel="stylesheet" href="./design.css">
    <link rel="stylesheet" href="./settings.css">
    <link rel="stylesheet" href="./scroll-bar.css">
    <title>Artist | XCodeJet</title>
</head>
<body>
    <?php
        $user_name = "@sanju";
        $first_name = "Sanjuni";
        $last_name = "Prabuddhika";
        $about = "Education";
        $head_logo = "./System/header0.png";
        $profile_photo = "./profile-photo/sanjuni.jpeg"
    ?>
    <div class="xcodejet-header">
        <div class="header-items">
            <img draggable="false" class="xcodejet-header-img" src="<?php echo $head_logo ?>">
            <div class="header-text">
                <h2>gallery</h2><br>
                <h3><a style="color: rgb(251, 255, 0)">My </a>Art XCodeJet</h3>
            </div>
        </div>
        <div class="header-back">
            <a >
                <img onclick="menuTabOpen()" draggable="false" src="<?php echo $profile_photo ?>">
            </a>
        </div>
    </div>
    <div id="gallery">
        <div class="settings-box-border">
            <div class="settings-box">
                <div class="settings">
                    <img src="<?php echo $profile_photo ?>" alt="" class="settings-dp">
                    <div class="settings-name">
                        <h2><?php echo $first_name . " " . $last_name ?></h2>
                        <h3><?php echo $about ?></h3>
                        <h4><?php echo $user_name ?></h4>
                    </div>
                </div>
                <h3></h3>
            </div>
        </div>
        <div class="settings-box-border">
            <div class="settings-box">
                <div class="settings">
                    <div class="settings-list">
                        <div class="setting-list-item">
                            <img src="./System/upload-image.png" alt="">
                            <a>Upload</a>
                        </div>
                        <div class="setting-list-item">
                            <img src="./System/diary.png" alt="">
                            <a>My Story</a>
                        </div>
                        <div class="setting-list-item">
                            <img src="./System/user.png" alt="">
                            <a>Account</a>
                        </div>
                        <div class="setting-list-item">
                            <img src="./System/setting.png" alt="">
                            <a>Settings</a>
                        </div>
                        <div class="setting-list-item">
                            <img src="./System/caution.png" alt="">
                            <a>Report</a>
                        </div>
                        <div class="setting-list-item">
                            <img src="./System/sign-out.png" alt="">
                            <a>Log Out</a>
                        </div>
                    </div>
                </div>
                <h3></h3>
            </div>
        </div>
    </div>
    <div class="footer">
            <div class="box-footer">
                <a href="#">Copyright © 2023 - XCodeJet team</a>
            </div>
    </div>
    <script src="./Kumuthu.js"></script>
    <script src="./boxes.js"></script>
</body>
</html>
<?php mysqli_close($connection); ?>