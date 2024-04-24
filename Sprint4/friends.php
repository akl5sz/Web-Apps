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

            <div class="col-md-3">
              <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="search">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form> -->
            </div>
          </header>
        </div>

      <div class="padding"></div>

      <!-- <div class="container">
        <div class="row justify-content-center py-4" style="display: flex; flex-direction: row;">
          <div class="col-auto">
            <button style="display: none;" class="btn btn-light rounded-pill px-4" type="button">Create Playlist</button>
          </div>
          <div class="col-auto ms-auto">
            <button style="display: none;" class="btn btn-light rounded-pill px-4" type="button">Mine</button>
            <a href="?command=json" class="btn btn-light rounded-pill px-4" type="button">Friends JSON File</a>
          </div>
        </div>
      </div>   -->
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
      function createFriendList(friendList){
        for(let i = 0; i < friendList.length; i++){
          $("#card-container").append("<div class=\"py-3 m-5\" style=\"display: flex; flex-direction: column; align-items: center; background-color: #0d0d13; color: #d9d9d9; border-radius: 50px;\"><img src=" + friendList[i][1] + " class=\"p-3\" style=\"height: 150px; width: 150px; border-radius: 50px;\" alt=\"duck taking a selfie\"><div class=\"m-1\"></div><p>@" + friendList[i][0] + "</p></div>");
        }
      }
      $(document).ready(function() {
            $.ajax({
            url: '?command=json',
            dataType: 'json',
            success: function(output) {
                createFriendList(output[output["username"]]);
            }});
        });
    </script>
</html>