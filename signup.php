<?php
    define('TITLE',"Signup");
    include 'includes/header.php';
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
?>

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("dp").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>

<div id="contact">
    
    <hr>
    <h1>Signup</h1>
    <?php
    
        $userName = '';
        $email = '';
    
        if(isset($_GET['error']))
        {
            if($_GET['error'] == 'emptyfields')
            {
                echo '<p class="closed">*Fill In All The Fields</p>';
                $userName = $_GET['uid'];
                $email = $_GET['mail'];
            }
            else if ($_GET['error'] == 'invalidmailuid')
            {
                echo '<p class="closed">*Please enter a valid email and user name</p>';
            }
            else if ($_GET['error'] == 'invalidmail')
            {
                echo '<p class="closed">*Please enter a valid email</p>';
            }
            else if ($_GET['error'] == 'invaliduid')
            {
                echo '<p class="closed">*Please enter a valid user name</p>';
            }
            else if ($_GET['error'] == 'passwordcheck')
            {
                echo '<p class="closed">*Passwords donot match</p>';
            }
            else if ($_GET['error'] == 'usertaken')
            {
                echo '<p class="closed">*This User name is already taken</p>';
            }
            else if ($_GET['error'] == 'invalidimagetype')
            {
                echo '<p class="closed">*Invalid image type. Profile image must be a .jpg or .png file</p>';
            }
            else if ($_GET['error'] == 'imguploaderror')
            {
                echo '<p class="closed">*Image upload error</p>';
            }
            else if ($_GET['error'] == 'imgsizeexceeded')
            {
                echo '<p class="closed">*Image too large</p>';
            }
            else if ($_GET['error'] == 'sqlerror')
            {
                echo '<p class="closed">*Website Error: Contact admin to have the issue fixed</p>';
            }
        }
        else if (isset($_GET['signup']) == 'success')
        {
            echo '<p class="open">*Signup Successful. Please login from the Login menu on the right</p>';
        }
    ?>
    <form action="includes/signup.inc.php" method='post' id="contact-form" enctype="multipart/form-data">

        <input type="text" id="name" name="uid" placeholder="Username" value=<?php echo $userName; ?>>
        <input type="email" id="email" name="mail" placeholder="email" value=<?php echo $email; ?>>
        <input type="password" id="pwd" name="pwd" placeholder="password">
        <input type="password" id="pwd-repeat" name="pwd-repeat" placeholder="repeat password">
        
        <h5>Profile Picture</h5>
        <div class="upload-btn-wrapper">
            <button class="btn">Upload a file</button>
            <img id="uploadPreview" src="dummy/avatar.png" class="avatar"/><br>
            <input type="file" name='dp' id='dp' accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
        </div>
        <!-- <img id="userDp" src="" >-->
        
        <h5>Role</h5>
        <label class="container" for="role-admin">Admin
          <input type="radio" checked="checked" name="role" value="admin" id="role-admin">
          <span class="checkmark"></span>
        </label>
        <label class="container" for="role-ceo">Ceo
          <input type="radio" name="role" value="ceo" id="role-ceo">
          <span class="checkmark"></span>
        </label>

        <h5>Optional</h5>
        <input type="text" id="f-name" name="f-name" placeholder="First Name" >
        <input type="text" id="l-name" name="l-name" placeholder="Last Name" >
        <input type="text" id="headline" name="headline" placeholder="Your Profile Headline">
        <textarea id="bio" name="bio" placeholder="What you want to tell people about yourself"></textarea>
        
        <input type="submit" class="button next" name="signup-submit" value="signup">
        
    </form>
    <hr>
</div>

<?php include 'includes/footer.php'; ?> 
