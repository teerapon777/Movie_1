
<?php
session_start();
if (!isset($_SESSION["ssUserfname"]))
{?>
<ul class="nav navbar-nav navbar-right">
            <li data-toggle="modal" data-target="#myModal"><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;เข้าสู่ระบบ</a></li>
            
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                  </div>
                  <div class="modal-body">
                      <form action="/action_page.php">
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="pwd">Password:</label>
                          <input type="password" class="form-control" id="password">
                        </div>
                      </form>
                </form>
                <!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
เข้าสู่ระบบด้วย Facebook : 
<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>


                  </div>
                  <div class="modal-footer">
                      <button id="btn_login" type="button" data-dismiss="modal" class="btn btn-default" >เข้าสู่ระบบ</button>
                      
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                  </div>
                </div>
                
              </div>
            </div>
          </ul>
          
<script type="text/javascript">
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '364210914088982',
      cookie     : true,  // enable cookies to allow the server to access 
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }


$(function(){
  $('#btn_login').click(function(){
    $.post('systems/login_chk.php',{
      user : $('#email').val(),
      pass : $('#password').val()
    },function(msg){
      if (msg=='ok') {
        
        alert('เข้าสู่ระบบเรียบร้อย')
        window.location.reload(); 
      } else {
        alert(msg + "| " + "Username หรือ Password ไม่ถูกต้อง");
      }
    });
  });
});
</script>
<?php } 
else{
    ?>
    <ul class="nav navbar-nav">
    <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img class="img-circle"  src="<?php echo "images/".$_SESSION["ssUsersimg"]; ?>" width="30" height="25"  title="<?php echo $_SESSION["ssUsersimg"]; ?>">&nbsp;&nbsp;<?php echo $_SESSION["ssUserfname"]." ".$_SESSION["ssUserlname"]." "; ?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;ข้อมูลผู้ใช้งาน</a></li>
                <li id="oklogout" ><a href=""><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;ออกจากระบบ </a></li>
              </ul>
            </li>
    
    </ul>
<script>
$(function(){
  $('#oklogout').click(function(){
    $.post('systems/login_chk.php',{
      user : $(null).val(),
      pass : $(null).val()
    },function(data){
      $("#showmain").load("systems/movie_show.php") 
        alert('ออกจากระบบเรียบร้อย');
    });
  });
});
</script>

<?php
}
?>
