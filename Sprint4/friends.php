<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
    <head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jacqueline Lainhart and Angie Loayza">
    <meta name="description" content="Social media website surrounding movies, tv shows, and music.">  
    <meta name="keywords" content="movies, tv shows, tv series, music, social media, forums">  

    <title>Mediac</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
    <link rel="stylesheet" href="styles/main.css"> 
      
    </head>

    <body class="d-flex flex-column min-vh-100">
      <!-- Navbar -->
      <div class="container-fluid fixed-top">
          <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">

          <div class="col-md-3 d-flex align-items-center">
            <span id="username" class="text-white" style="margin-right: 20px;">Welcome, <?php echo $_SESSION["username"]; ?></span>
            <ul class="nav nav-pills" style="margin-left: 20px;">
                <li class="nav-item"><a href="?command=logout" class="nav-link active" aria-current="page">Logout</a></li>
            </ul>
          </div>

            <ul class="nav nav-pills mr-auto">
              <li class="nav-item"><a href="?command=feed" class="nav-link" aria-current="page">Feed</a></li>
              <li class="nav-item"><a href="?command=playlists" class="nav-link">Playlists</a></li>
              <li class="nav-item"><a href="?command=discover" class="nav-link">Discover</a></li>
              <li class="nav-item"><a href="?command=friends" class="nav-link active">Friends</a></li>
            </ul>

            <div class="col-md-3" style="display: flex; flex-direction:row;">
              <form name="friendSearchForm" action="?command=search-friend" method="POST" onsubmit="validateForm(event);" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="search">
                <input type="text" name="friend_search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
              </form>
              <div id="invalid" style="color: white"></div>
            </div>
          </header>
        </div>

      <div class="padding"></div>
<!-- 
      <div id="alreadyFriendsDiv" style=""><?php echo $alreadyFriend ?></div>
      <div id="friendExistsDiv"></div> -->
      <!-- List of Friends -->
      <div id="card-container" class="wrapper" style="display: grid; grid-auto-columns: minmax(5rem, auto); grid-template-columns: repeat(auto-fill, minmax(20rem, 1fr)); ">
    </div>

      <!-- Footer -->
      <footer class="mt-auto">
          <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="?command=feed" class="nav-link px-2 text-body-secondary">Feed</a></li>
            <li class="nav-item"><a href="?command=playlists" class="nav-link px-2 text-body-secondary">Playlists</a></li>
            <li class="nav-item"><a href="?command=discover" class="nav-link px-2 text-body-secondary">Discover</a></li>
            <li class="nav-item"><a href="?command=friends" class="nav-link px-2 text-body-secondary">Friends</a></li>
          </ul>
          <p class="text-center text-body-secondary">© 2024 Mediac, Inc</p>
        </footer>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
      </script>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      //form validation
      function validateForm(event) {
        event.preventDefault();
        let username = document.forms["friendSearchForm"]["friend_search"].value;

        //https://www.geeksforgeeks.org/form-validation-using-javascript/
        if (username === "") {
          var invalid = document.getElementById("invalid");
          //DOM manipulation
          invalid.innerHTML = "<p style=\"margin-top: 7px; margin-bottom: 5px;\">Enter a username.</p>"; 
        } else {
          document.forms["friendSearchForm"].submit();
        }
      }

      function createFriendList(friendList){
        for(let i = 0; i < friendList.length; i++){
          $("#card-container").append("<div class=\"m-5\" style=\"display: flex; flex-direction: column; align-items: center; background-color: #0d0d13; color: #d9d9d9; border-radius: 50px;\"><form action=\"?command=delete-friend\" method=\"post\"><input type=\"hidden\" name=\"friend_username\" value=\""+ friendList[i][0] +"\"><button class=\"btn\" style=\"padding-top: 15px; padding-bottom: 0px; padding-right: 0px;  padding-left: 200px; background-color: transparent\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"30\" fill=\"currentColor\" class=\"bi bi-dash\" viewBox=\"0 0 16 16\"><path d=\"M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8\"/></svg></button></form><img src=" + friendList[i][1] + " style=\"height: 170px; width: 170px; border-radius: 50px;\" alt=\"" + friendList[i][0] + "'s profile picture\"><div class=\"m-1\"></div><p>@" + friendList[i][0] + "</p></div>");
        }
      }
      $(document).ready(function() {
            $.ajax({
            url: '?command=json',
            dataType: 'json',
            //anonymous function below
            success: function(output) {
                createFriendList(output[output["username"]]);
            }});

            // var alreadyFriends = document.getElementById("alreadyFriendsDiv").innerHTML;
            // if(alreadyFriends == 1){
            //   document.getElementById("friendExistsDiv").innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">Already your friend!</div>";
            //   document.getElementById("alreadyFriendsDiv").innerHTML = "";
            // } else if(alreadyFriends == 0){
            //   document.getElementById("friendExistsDiv").innerHTML = "<div class=\"alert alert-warning\" role=\"alert\">Friend successfully added!</div>";
            //   document.getElementById("alreadyFriendsDiv").innerHTML = "";
            // }
            });
    </script>
</html>