<!--
  Sources used: https://cs4640.cs.virginia.edu, https://lesscss.org/features/#features-overview-feature, https://getbootstrap.com/docs/5.3/getting-started/introduction/, https://fonts.google.com/selection#how-to-use
  -->
  <!DOCTYPE html>
    <html lang="en" data-bs-theme="light">
        <head>
        <meta charset="UTF-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Jacqueline Lainhart and Angie Loayza">
        <!--Contribution: Angie worked on the discover.html, friends.html, and helped with the feed.html. Jackie worked on the playlists.html, index.html, signup.html, and helped with the feed.-->
        <meta name="description" content="Social media website surrounding movies, tv shows, and music.">  
        <meta name="keywords" content="movies, tv shows, tv series, music, social media, forums">  
        
        <title>Mediac</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> 
        <link rel="stylesheet" href="styles/main.css"> 
        </head>

        <body>
            <div class="py-5"></div>
            <div class="py-4"></div>
            <div class="container mt-5 col-md-6">
                <header>
                    <h1 class="website-title">Mediac</h1>
                </header>

                <!-- Login Form -->
                <form action="?command=login-action" method="post">
                    <?=$message?>
                    <div class="login-container mx-auto">
                        <div class="input-line">
                            <input type="text" placeholder="Username" name="username">
                        </div>
                        <div class="input-line">
                            <input type="text" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="login-btn">Log In</button>
                        
                        <p style="color: #d9d9d9; margin-top: 15px;">or</p>
                        <a href="?command=signup" class="signup-link">Sign Up</a>
                    </div>   
                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>
        </body>
    </html>