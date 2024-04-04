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
    
        $res  = pg_query($this->dbHandle, "drop table if exists users;");

        $res  = pg_query($this->dbHandle, "create table users (
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