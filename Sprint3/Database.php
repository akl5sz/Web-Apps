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

        $res = $this->query("insert into users (username, name, email, password) values ($1, $2, $3, $4);",
                'akl5sz','Angie', 'akl5sz@virginia.edu',
                password_hash('j03m4m4', PASSWORD_DEFAULT));
        
        $res = $this->query("insert into users (username, name, email, password) values ($1, $2, $3, $4);",
                'nyt8te','Jackie', 'nyt8te@virginia.edu',
                password_hash('urmuth4', PASSWORD_DEFAULT));
        
        $res  = pg_query($this->dbHandle, "create table if not exists movies (
                title text,
                year int,
                rating text,
                director text,
                hours int,
                minutes int,
                description text,
                primary key (title, year));");
        
        $res = $this->query("insert into movies (title, year, rating, director, hours, minutes, description) values ($1, $2, $3, $4, $5, $6, $7)",
                'The Muppet Movie', 1979, 'G', 'James Frawley', 1, 37, 'After Kermit the Frog decides to pursue a movie career, he starts his cross-country trip from Florida to California. Along the way, he meets and befriends Fozzie Bear, Miss Piggy, Gonzo and rock musicians Dr. Teeth and the Electric Mayhem. When Kermit is offered a job by Doc Hopper (Charles Durning) to advertise the fried frog legs at his restaurant chain, Kermit turns Hopper down. However, Hopper refuses to relent and pursues Kermit and his companions to a final showdown.');         
                
        $res  = pg_query($this->dbHandle, "create table if not exists genres (
                genre text,
                title text,
                year int,
                foreign key (title, year) references movies (title, year))
                primary key (title, year));");

        $res = $this->query("insert into genres (movie_title, movie_year, genre) values ($1, $2, $3);",
                'The Muppet Movie', 1979, 'Musical');

        $res = $this->query("insert into genres (movie_title, movie_year, genre) values ($1, $2, $3);",
                'The Muppet Movie', 1979, 'Adventure');      


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