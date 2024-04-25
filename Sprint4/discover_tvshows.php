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
            <li class="nav-item"><a href="?command=feed" class="nav-link" aria-current="page">Feed</a></li>
            <li class="nav-item"><a href="?command=playlists" class="nav-link">Playlists</a></li>
            <li class="nav-item"><a href="?command=discover" class="nav-link active">Discover</a></li>
            <li class="nav-item"><a href="?command=friends" class="nav-link">Friends</a></li>
          </ul>

          <div class="col-md-3">
            <form action="?command=discover_tvshows" method="POST" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="searchTVshows">
              <input type="text" name="searchTVshows" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
          </div>
        </header>
      </div>
      <!-- Category Buttons -->
      <div class="padding"></div>
      <div class="container" style="padding: 20px; white-space: nowrap;" >
        <div class="row justify-content-center py-5"> 
          <div class="col-auto"> 
            <button class="btn btn-light rounded-pill px-3" type="button">Horror</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Action</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Science Fiction</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Drama</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Comedy</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Romance</button>
            <button class="btn btn-light rounded-pill px-3" type="button">Crime</button>
          </div>
        </div>
        <div class="row justify-content-end col-auto"> 
          <div class="col-auto">
            <ul class="nav flex-column"> 
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="?command=discover">Movies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="?command=discover_tvshows">TV Shows</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?command=discover_songs">Music</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Media Cards -->
      <?php
        if ($res !== false && !empty($res)) {
          // Loop through search results and display tv show cards
          $count = 0;
          foreach ($res as $tvshow) {
              echo "<div class=\"card mb-3 mx-auto bordered\" style=\"max-width: 540px;margin-top: 10px;\">
                        <div class=\"row g-0\">
                            <div class=\"card-body\">
                              <h5 class=\"card-title\">{$tvshow['title']} ({$tvshow['year']})</h5>
                              <p class=\"card-text\">{$tvshow['description']}</p>
                              <p class=\"card-rating\"><small>Rated: {$tvshow['rating']}</small></p>
                              <p class=\"card-time\"><small>{$tvshow['seasons']} seasons {$tvshow['episodes']} episodes</small></p>
                              <div class=\"container\">
                              <div class=\"justify-content-center py-4\" style=\"display: flex; flex-direction: row;\">
                                <div class=\"col-auto text-center\">
                                  <button onclick=\"displayText".$count."()\" class=\"btn btn-light active rounded-pill px-4\" type=\"button\">Add Comment</button>
                                  <div id=\"textField".$count."\" style=\"display: none;\">
                                  <form action=\"?command=add-comment-tvshow\" method=\"post\" role=\"searchTVshows\">
                                      <input type=\"hidden\" value=\"{$tvshow['title']}\" class=\"form-control form-control-dark\" name=\"title\" placeholder=\"Enter TV show title...\" aria-label=\"Search\" style=\"width: 300px; margin: 10px;\" readonly>
                                      <input type=\"hidden\" value=\"{$tvshow['year']}\" class=\"form-control form-control-dark\" name=\"year\" placeholder=\"Enter TV show year...\" aria-label=\"Search\" style=\"width: 300px; margin: 10px;\" readonly>
                                      <input type=\"search\" class=\"form-control form-control-dark\" name=\"commentTVshow\" placeholder=\"Enter comment here...\" aria-label=\"Search\" style=\"width: 300px; margin: 10px;\"> 
                                      <button type=\"submit\" class=\"btn btn-light active\">Submit</button>
                                  </form>
                                </div>
                                </div>
                            </div>
                            <script>
                            function displayText".$count."() {
                              var text = document.getElementById(\"textField".$count."\");
                              text.style.display = \"block\";
                            }
                          </script>
                            </div>
                          </div>
                        </div>
                      </div>";
                      $count++;
          }
      } else {
          echo "<div class=\"alert alert-warning\" role=\"alert\">No TV shows found!</div>";
      }
        ?>

      <!-- <div class="card mb-3 mx-auto bordered" style="max-width: 540px;margin-top: 10px;">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/36/Coraline_poster.jpg/220px-Coraline_poster.jpg" class="img-fluid rounded-start playlist-card" alt="The Muppet Show album cover featuring Kermit the Frog holding a microphone with the cast behind him.">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5><h5 class="card-year">(2024)</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <p class="card-rating"><small>PG</small></p><p class="card-hour"><small>1hr</small></p><p class="card-minute"><small>30min</small></p>
              <button class="btn btn-primary" type="submit"><i>Show Anyways</i></button>
            </div>
          </div>
        </div>
      </div>

      <br>

      <div class="card mb-3 mx-auto bordered" style="max-width: 540px;margin-top: 10px;">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center">
            <img src="https://resizing.flixster.com/18icyRbPRhjrgvKB_7-9Z8lNrI0=/ems.cHJkLWVtcy1hc3NldHMvbW92aWVzLzA0MzljODE3LTgzMDMtNGRiOS1iOTM0LTM1ODk1ODMwNDIyOC53ZWJw" class="img-fluid rounded-start playlist-card" alt="The Muppet Show album cover featuring Kermit the Frog holding a microphone with the cast behind him.">
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