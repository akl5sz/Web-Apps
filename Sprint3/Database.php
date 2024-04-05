<?php
/**
 * Database Class
 *
 * Contains connection information to query PostgresSQL.
 */


class Database {
    private $dbHandle;

    /**
     * Constructor
     *
     * Connects to PostgresSQL
     */
    public function __construct() {
        $host = Config::$db["host"];
        $user = Config::$db["user"];
        $database = Config::$db["database"];
        $password = Config::$db["pass"];
        $port = Config::$db["port"];

        $this->dbHandle = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");
        
        if ($this->dbHandle) {
            echo "Success connecting to database";
        } else {
            echo "An error occurred connecting to the database";
        }
    
        // $res  = pg_query($this->dbHandle, "drop table if exists users;");

        $res  = pg_query($this->dbHandle, "create table if not exists users (
                username text primary key,
                name text,
                email text,
                password text);");

        //https://stackoverflow.com/questions/4069718/postgres-insert-if-does-not-exist-already
        $res = $this->query("
                INSERT INTO users (username, name, email, password)
                SELECT $1, $2, $3, $4
                WHERE NOT EXISTS (
                        SELECT 1 FROM users WHERE username = $1);", 
                        'akl5sz','Angie', 'akl5sz@virginia.edu', password_hash('j03m4m4', PASSWORD_DEFAULT));
            
        $res = $this->query("
                INSERT INTO users (username, name, email, password)
                SELECT $1, $2, $3, $4
                WHERE NOT EXISTS (
                        SELECT 1 FROM users WHERE username = $1);",
                        'nyt8te','Jackie', 'nyt8te@virginia.edu', password_hash('urmuth4', PASSWORD_DEFAULT));
        
            
        $res  = pg_query($this->dbHandle, "create table if not exists movies (
                title text,
                year int,
                rating text,
                director text,
                hours int,
                minutes int,
                description text,
                primary key (title, year));");
            
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'The Muppet Movie', 1979, 'G', 'James Frawley', 1, 37, 'After Kermit the Frog decides to pursue a movie career, he starts his cross-country trip from Florida to California. Along the way, he meets and befriends Fozzie Bear, Miss Piggy, Gonzo and rock musicians Dr. Teeth and the Electric Mayhem. When Kermit is offered a job by Doc Hopper (Charles Durning) to advertise the fried frog legs at his restaurant chain, Kermit turns Hopper down. However, Hopper refuses to relent and pursues Kermit and his companions to a final showdown.');
                    
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'The Hunger Games', 2012, 'PG-13', 'Gary Ross', 2, 26, 'In what was once North America, the Capitol of Panem maintains its hold on its 12 districts by forcing them each to select a boy and a girl, called Tributes, to compete in a nationally televised event called the Hunger Games. Every citizen must watch as the youths fight to the death until only one remains. District 12 Tribute Katniss Everdeen (Jennifer Lawrence) has little to rely on, other than her hunting skills and sharp instincts, in an arena where she must weigh survival against love.');
        
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'Coraline', 2009, 'PG', 'Henry Selick', 1, 40, 'Wandering her rambling old house in her boring new town, an 11-year-old Coraline discovers a hidden door to a strangely idealized version of her life. In order to stay in the fantasy, she must make a frighteningly real sacrifice.');
        
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'Bee Movie', 2007, 'PG', 'Simon J. Smith', 1, 31, 'Barry B. Benson, a bee just graduated from college, is disillusioned at his lone career choice: making honey. On a special trip outside the hive, Barry\'s life is saved by Vanessa, a florist in New York City. As their relationship blossoms, he discovers humans actually eat honey and subsequently decides to sue them.');
        
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'Chicken Run', 2000, 'G', 'Nick Park', 1, 24, 'When a cockerel apparently flies into a chicken farm, the chickens see him as an opportunity to escape their evil owners.');
        
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'Shrek', 2001, 'PG', 'Andrew Adamson', 1, 30, 'A mean lord exiles fairytale creatures to the swamp of a grumpy ogre, who must go on a quest and rescue a princess for the lord in order to get his land back.');
        
        $res = $this->query("
                INSERT INTO movies (title, year, rating, director, hours, minutes, description)
                SELECT $1, $2, $3, $4, $5, $6, $7
                WHERE NOT EXISTS (
                        SELECT 1 FROM movies
                        WHERE title = $1 AND year = $2 AND rating = $3 AND director = $4);", 
                        'Fifty Shades of Grey', 2015, 'R', 'Sam Taylor-Johnson', 2, 5, 'Literature student Anastasia Steele\'s life changes forever when she meets handsome, yet tormented, billionaire Christian Grey.');

                
        $res  = pg_query($this->dbHandle, "create table if not exists genres (
                genre text,
                title text,
                year int,
                primary key (genre, title, year),
                foreign key (title, year) references movies (title, year));");


        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'The Muppet Movie', 1979, 'Musical');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'The Muppet Movie', 1979, 'Adventure');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'The Hunger Games', 2012, 'Action');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'The Hunger Games', 2012, 'Sci-Fi');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Coraline', 2009, 'Animation');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Coraline', 2009, 'Drama');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Coraline', 2009, 'Family');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Bee Movie', 2007, 'Animation');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Bee Movie', 2007, 'Adventure');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Bee Movie', 2007, 'Comedy');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Chicken Run', 2000, 'Animation');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Chicken Run', 2000, 'Adventure');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Chicken Run', 2000, 'Comedy');

        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Shrek', 2001, 'Animation');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Shrek', 2001, 'Adventure');
            
        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Shrek', 2001, 'Comedy');

        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Fifty Shades of Grey', 2015, 'Drama');

        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Fifty Shades of Grey', 2015, 'Romance');

        $res = $this->query("
                INSERT INTO genres (title, year, genre)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                    SELECT 1 FROM genres
                    WHERE title = $1 AND year = $2 AND genre = $3);", 
                    'Fifty Shades of Grey', 2015, 'Thriller');

        $res  = pg_query($this->dbHandle, "create table if not exists favorite_movies (
                username text,
                title text,
                year int,
                primary key (username, title, year),
                foreign key (username) references users (username),
                foreign key (title, year) references movies (title, year));");

        $res = $this->query("
                INSERT INTO favorite_movies (username, title, year)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                        SELECT 1 FROM favorite_movies
                        WHERE username = $1 AND title = $2 AND year = $3);",
                        'nyt8te', 'The Hunger Games', 2012);
                    
        $res = $this->query("
                INSERT INTO favorite_movies (username, title, year)
                SELECT $1, $2, $3
                WHERE NOT EXISTS (
                        SELECT 1 FROM favorite_movies
                        WHERE username = $1 AND title = $2 AND year = $3);",
                        'nyt8te', 'The Muppet Movie', 1979);   
        //username title year primary/foreign, comment 
        $res = pg_query($this->dbHandle, "create table if not exists movie_comments ( 
                username text,
                title text,
                year int,
                comment text,
                primary key (username, title, year, comment),
                foreign key (username) references users (username),
                foreign key (title, year) references movies (title, year));");

        $res = $this->query("
                INSERT INTO movie_comments (username, title, year, comment)
                SELECT $1, $2, $3, $4
                WHERE NOT EXISTS (
                        SELECT 1 FROM movie_comments
                        WHERE username = $1 AND title = $2 AND year = $3 AND comment = $4);",
                        'nyt8te', 'The Muppet Movie', 1979, 'I loved kermit in this movie he is so silly!');
                        
        $res = $this->query("
                INSERT INTO movie_comments (username, title, year, comment)
                SELECT $1, $2, $3, $4
                WHERE NOT EXISTS (
                        SELECT 1 FROM movie_comments
                        WHERE username = $1 AND title = $2 AND year = $3 AND comment = $4);",
                        'nyt8te', 'The Hunger Games', 2012, 'i think i watched this movie like a billion times');                 
    }
    

    /**
     * Query
     *
     * Makes a query to posgres and returns an array of the results.
     * The query must include placeholders for each of the additional
     * parameters provided.
     */
    public function query($query, ...$params) {
        $res = pg_query_params($this->dbHandle, $query, $params);

        if ($res === false) {
            echo pg_last_error($this->dbHandle);
            return false;
        }

        return pg_fetch_all($res);
    }
}