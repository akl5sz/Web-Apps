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
          <div class="col-md-3 mb-2 mb-md-0"></div>
    
          <ul class="nav nav-pills mr-auto">
            <li class="nav-item"><a href="?command=feed" class="nav-link" aria-current="page">Feed</a></li>
            <li class="nav-item"><a href="?command=playlists" class="nav-link active">Playlists</a></li>
            <li class="nav-item"><a href="?command=discover" class="nav-link">Discover</a></li>
            <li class="nav-item"><a href="?command=friends" class="nav-link">Friends</a></li>
          </ul>
          
          <div class="col-md-3">
            <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 col-xl-6" role="search">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
          </form> -->
          </div>
        </header>
      </div>

      <div class="padding"></div>
      <div class="p-3"></div>
      
      <!-- Modification/Sorting Buttons -->
      <div class="container">
        <div class="row justify-content-center py-4" style="display: flex; flex-direction: row;">
          <div class="col-auto">
            <button class="btn btn-light rounded-pill px-4" id="createPlaylistButton" type="button">Create Playlist</button>
          </div>
          <div class="col-auto ms-auto">
            <button class="btn btn-light rounded-pill px-4" type="button">Mine</button>
            <button class="btn btn-light rounded-pill px-4" type="button">Liked</button>
          </div>
        </div>
      </div>  
    <!--need this for later
          <div class="col-auto ms-auto" id="pills-tab" role="tablist">
            <button class="btn btn-light rounded-pill px-4 active" id="pills-mine-tab" data-bs-toggle="pill" data-bs-target="#pills-mine" type="button" role="tab" aria-selected="true">Mine</button>
            <button class="btn btn-light rounded-pill px-4" id="pills-liked-tab" data-bs-toggle="pill" data-bs-target="#pills-liked" type="button" role="tab" aria-selected="false" tabindex="8">Liked</button>
          </div>
        </div>
      </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-mine" role="tabpanel" aria-labelledby="pills-mine-tab" tabindex="0"></div>
        <div class="tab-pane fade" id="pills-liked" role="tabpanel" aria-labelledby="pills-liked-tab" tabindex="0"></div>
    </div>
    -->

      <!-- Playlist Cards -->
      <div class="card mb-3 mx-auto bordered-playlist">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center" style ="padding: 30px;">
            <img style="width: 230px; height: 230px; object-fit: cover;" src="https://media.gq.com/photos/645956c367d4264086a5d77f/16:9/w_2352,h_1323,c_limit/Screen%20Shot%202023-05-08%20at%204.07.48%20PM.png" class="img-fluid playlist-card" alt="Front shot of Oppenheimer from the movie Oppenheimer.">
          </div>
          <div class="col-md-8" style="padding: 30px;">
            <div class="card-body">
              <h4 class="card-title" style="display: flex; justify-content: center;">movies that make me wanna take a cold shower</h4>
              <p class="card-text"><small style="display: flex; justify-content: center;">3 Likes</small></p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-evenly;">
                <p >Movies: 34</p>
                <p>TV Shows: 0</p>
                <p>Music: 0</p>
              </div>
              <p class="card-text" style="display: flex; justify-content: center;">no im fine just give me a sec ill be on my lilypad ig</p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-between;">
                <p><small>Edit</small></p>
                <p><small style="color: red;">Delete</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br>

      <div class="card mb-3 mx-auto bordered-playlist">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center" style ="padding: 30px;">
            <img style="width: 230px; height: 230px; object-fit: cover;" src="https://i.guim.co.uk/img/media/f489e4745cfb0912f7af105dc2d8079c38fae601/0_0_2560_1536/master/2560.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=f0b093a21533a9fe9366d33e9ae5b94d" class="img-fluid playlist-card" alt="The Muppet Show album cover featuring Kermit the Frog holding a microphone with the cast behind him.">
          </div>
          <div class="col-md-8" style="padding: 30px;">
            <div class="card-body">
              <h4 class="card-title" style="display: flex; justify-content: center;">fozzie n i</h4>
              <p class="card-text"><small style="display: flex; justify-content: center;">1 Like</small></p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-evenly;">
                <p >Movies: 13</p>
                <p>TV Shows: 3</p>
                <p>Music: 54</p>
              </div>
              <p class="card-text" style="display: flex; justify-content: center;">stuff for when we hang out</p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-between;">
                <p><small>Edit</small></p>
                <p><small style="color: red;">Delete</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br>

      <div class="card mb-3 mx-auto bordered-playlist">
        <div class="row g-0">
          <div class="col-md-4 d-flex align-items-center" style ="padding: 30px;">
            <img style="width: 230px; height: 230px; object-fit: cover;" src="https://wwd.com/wp-content/uploads/2015/09/miss-piggy-style-001.jpg?w=1024" class="img-fluid playlist-card" alt="The Muppet Show album cover featuring Kermit the Frog holding a microphone with the cast behind him.">
          </div>
          <div class="col-md-8" style="padding: 30px;">
            <div class="card-body">
              <h4 class="card-title" style="display: flex; justify-content: center;">reminds me of miss piggy</h4>
              <p class="card-text"><small style="display: flex; justify-content: center;">2 Likes</small></p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-evenly;">
                <p >Movies: 5</p>
                <p>TV Shows: 7</p>
                <p>Music: 85</p>
              </div>
              <p class="card-text" style="display: flex; justify-content: center;">my gorgeous wife</p>
              <div class="box" style="display: flex; justify-content: center; justify-content: space-between;">
                <p><small>Edit</small></p>
                <p><small style="color: red;">Delete</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Media Filtering Buttons -->
      <!-- <div class="position-fixed p-5 bottom-0 end-0 mb-3 me-3" style="width: 170px; height: 170px;">
        <button type="button" class="position-absolute top-0 end-0 p-3 m-5 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://static.vecteezy.com/system/resources/thumbnails/009/346/118/small/musical-note-flat-icon-png.png" width="25" height="25" alt="Music"></button>
        <button type="button" class="position-absolute bottom-0 start-0 p-3 m-2 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://uxwing.com/wp-content/themes/uxwing/download/video-photography-multimedia/movie-icon.png" width="25" height="25" alt="Movies"></button>
        <button type="button" class="position-absolute bottom-0 end-0 p-3 m-1 bg-secondary bg-opacity-10 rounded-pill" aria-label="Close"><img src="https://static.vecteezy.com/system/resources/thumbnails/009/351/700/small/tv-show-icon-sign-design-free-png.png" width="26" height="26" alt="TV Shows"></button> 
      </div> -->
      <!-- Modal for creating a new playlist -->
      <div id="createPlaylistModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Create New Playlist</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="playlistForm">
                          <div class="mb-3">
                              <label for="playlistName" class="form-label">Playlist Name</label>
                              <input type="text" class="form-control" id="playlistName" required>
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control" id="description" required>
                          </div>
                          <button type="submit" class="btn btn-primary">Create</button>
                      </form>
                  </div>
              </div>
          </div>
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
      <script>
        //https://developer.mozilla.org/en-US/docs/Web/API/Document/DOMContentLoaded_event
        //https://stackoverflow.com/questions/39993676/code-inside-domcontentloaded-event-not-working
        document.addEventListener('DOMContentLoaded', function() {
            const createPlaylistButton = document.querySelector('#createPlaylistButton');
            const createPlaylistModal = new bootstrap.Modal(document.getElementById('createPlaylistModal'));

            createPlaylistButton.addEventListener('click', function () {
                createPlaylistModal.show();
            });

            const closeButtons = document.querySelectorAll('[data-dismiss="modal"]');
            closeButtons.forEach(function(button) {
                button.addEventListener('click', function () {
                    createPlaylistModal.hide();
                });
            });

            const playlistForm = document.querySelector('#playlistForm');
            playlistForm.addEventListener('submit', function(event) {
                event.preventDefault();
                createPlaylistModal.hide();
            });
        });
    </script>
    </body>
</html>