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
            <span class="text-white" style="margin-right: 20px;">Welcome, <?php echo $_SESSION["username"]; ?></span>
            <ul class="nav nav-pills" style="margin-left: 20px;">
                <li class="nav-item"><a href="?command=logout" class="nav-link active" aria-current="page">Logout</a></li>
            </ul>
          </div>

            <ul class="nav nav-pills mr-auto">
              <li class="nav-item"><a href="?command=feed" class="nav-link active" aria-current="page">Feed</a></li>
              <li class="nav-item"><a href="?command=playlists" class="nav-link">Playlists</a></li>
              <li class="nav-item"><a href="?command=discover" class="nav-link">Discover</a></li>
              <li class="nav-item"><a href="?command=friends" class="nav-link">Friends</a></li>
            </ul>

            <div class="col-md-3">
              <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="search">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
            </div>
          </header>
        </div>
        <div class="padding"></div>

        <br>
        <div class="container">
        <div class="row justify-content-center py-4" style="display: flex; flex-direction: row;">
          <div class="col-auto text-center">
            <button onclick="displayText()" class="btn btn-light rounded-pill px-4" type="button">Add Comment</button>
            <div id="textField" style="display: none;">
            <form action="?command=add-comment" method="post" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="search">
                <input type="search" class="form-control form-control-dark" name="title" placeholder="Enter movie title..." aria-label="Search" style="width: 300px; margin: 10px;">
                <input type="search" class="form-control form-control-dark" name="year" placeholder="Enter movie year..." aria-label="Search" style="width: 300px; margin: 10px;">
                <input type="search" class="form-control form-control-dark" name="comment" placeholder="Enter comment here..." aria-label="Search" style="width: 300px; margin: 10px;"> 
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
          </div>
          </div>
          <script>
            function displayText() {
              var text = document.getElementById("textField");
              text.style.display = "block";
            }
          </script>
        </div>
      </div>  

        <!-- Media Cards -->
        <?php
          for ($i = 0; $i < count($comments); $i++) {
              echo "<div class=\"card mb-3 mx-auto bordered\" style=\"max-width: 540px;margin-top: 10px;\">
                  <div class=\"row g-0\">
                    <div class=\"col-md-8\">
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">{$comments[$i]['title']} ({$comments[$i]['year']})</h5>
                        <p class=\"card-text\">{$comments[$i]['comment']}</p>
                        <p class=\"card-text\"><small>-@{$comments[$i]['username']}</small></p>
                        <form action=\"?command=delete\" method=\"post\">
                          <input type=\"hidden\" name=\"title\" value=\"{$comments[$i]['title']}\">
                          <input type=\"hidden\" name=\"username\" value=\"{$comments[$i]['username']}\">
                          <input type=\"hidden\" name=\"year\" value=\"{$comments[$i]['year']}\">
                          <input type=\"hidden\" name=\"comment\" value=\"{$comments[$i]['comment']}\">
                          <button type=\"submit\" class=\"btn btn-primary\">Delete</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>";
          }
        ?>

        <?php print_r($retArray);?>
        <br>
<!-- 
        <div class="card mb-3 mx-auto bordered" style="max-width: 540px;margin-top: 10px;">
          <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
              <img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/89/RuPauls-Drag-Race-S9.jpg/220px-RuPauls-Drag-Race-S9.jpg" class="img-fluid rounded-start playlist-card" alt="The Muppet Show album cover featuring Kermit the Frog holding a microphone with the cast behind him.">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small>Last updated 3 mins ago</small></p>
                <button class="btn btn-primary" type="submit"><i>Show Anyways</i></button>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Media Filtering Buttons -->
        <div class="position-fixed p-5 bottom-0 end-0 mb-3 me-3" style="width: 170px; height: 170px;">
          <button type="button" class="position-absolute top-0 end-0 p-3 m-5 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://static.vecteezy.com/system/resources/thumbnails/009/346/118/small/musical-note-flat-icon-png.png" width="25" height="25" alt="musical note"></button>
          <button type="button" class="position-absolute bottom-0 start-0 p-3 m-2 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/movie-icon.png" width="25" height="25" alt="movie icon"></button>
          <button type="button" class="position-absolute bottom-0 end-0 p-3 m-1 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://static.vecteezy.com/system/resources/thumbnails/009/351/700/small/tv-show-icon-sign-design-free-png.png" width="26" height="26" alt="tv-show screen"></button> 
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
  </html>