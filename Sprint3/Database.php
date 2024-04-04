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
    
        // Drop tables and sequences (that are created later)
        // $res  = pg_query($this->dbHandle, "drop sequence if exists question_seq;");
        // $res  = pg_query($this->dbHandle, "drop sequence if exists user_seq;");
        // $res  = pg_query($this->dbHandle, "drop sequence if exists userquestion_seq;");
        // $res  = pg_query($this->dbHandle, "drop table if exists questions;");
        $res  = pg_query($this->dbHandle, "drop table if exists users;");
    
        // Create tables
        // $res  = pg_query($this->dbHandle, "create table Users (
        //         id  int primary key default nextval('question_seq'),
        //         question    text,
        //         answer      text
        // );");

        $res  = pg_query($this->dbHandle, "create table users (
                username int primary key,
                name text,
                email text,
                password text);");
    
        // Read json and insert the trivia questions into the database, assuming
        // the trivia-s24.json file is in the same directory as this script.
        // $questions = json_decode(
        //     file_get_contents("trivia-s24.json"), true);
    
        // $res = pg_prepare($this->dbHandle, "myinsert", "insert into questions (question, answer) values 
        // ($1, $2);");
        // foreach ($questions as $q) {
        //         $res = pg_execute($this->dbHandle, "myinsert", [$q["question"], $q["answer"]]);
        // }
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