<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $email, $password)
    {
        $email = $this->prepareData($email);
        $password = $this->prepareData($password);

        $this->sql = "select * from " . $table . " where email = '" . $email . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) != 0) {
            $dbuserid = $row['user_id'];
            $dbname = $row['name'];
            $dbemail = $row['email'];
            $dbphonenumber = $row['phone_number'];
            $dbprofilepict = $row['profile_pict'];
            $dbpassword = $row['password'];

            if ($email == $dbemail && password_verify($password, $dbpassword)) {
                $data = [
                    'login' => true,
                    'loginMessage' => 'Login Success',
                    'user_id' => $dbuserid,
                    'name' => $dbname,
                    'email' => $dbemail,
                    'phone_number' => $dbphonenumber,
                    'profile_pict' => $dbprofilepict
                ];
            } else {
                $data = [
                    'login' => false,
                    'loginMessage' => 'Login Fail',
                    'user_id' => -1,
                    'name' => '',
                    'email' => '',
                    'phone_number' => '',
                    'profile_pict' => ''
                ];
            }
        } else {
            $data = [
                'login' => false,
                'loginMessage' => 'Login Fail',
                'user_id' => -1,
                'name' => '',
                'email' => '',
                'phone_number' => '',
                'profile_pict' => ''
            ];
        }

        return $data;
    }

    function signUp($table, $name, $email, $phone_number, $password)
    {
        $name = $this->prepareData($name);
        $email = $this->prepareData($email);
	    $phone_number = $this->prepareData($phone_number);
        $password = $this->prepareData($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $this->sql =
            "INSERT INTO " . $table . " (name, email, phone_number, password) VALUES ('" . $name . "','" . $email  . "','" . $phone_number . "','" . $password . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function readRecipeTable()
    {
        $this->sql = "select * from recipe";
        $result = mysqli_query($this->connect, $this->sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $dbrecipeid = $row['recipe_id'];
            $dbrecipename = $row['recipe_name'];
            $dbdescription = $row['description'];
            $dbuserid = $row['user_id'];
            $dbsteps = $row['steps'];
            $dbingredients = $row['ingredients'];
            $dbrecipepict = $row['recipe_pict'];
            
            $data[] = [
                'recipe_id' => $dbrecipeid,
                'recipe_name' => $dbrecipename,
                'description' => $dbdescription,
                'user_id' => $dbuserid,
                'steps' => $dbsteps,
                'ingredients' => $dbingredients,
                'recipe_pict' => $dbrecipepict
            ];
        }

        return $data;
    }

    function postRecipe($table, $recipe_name, $description, $user_id, $steps, $ingredients, $recipe_pict)
    {
        $recipe_name = $this->prepareData($recipe_name);
        $description = $this->prepareData($description);
        $user_id = $this->prepareData($user_id);
        $steps = $this->prepareData($steps);
        $ingredients = $this->prepareData($ingredients);
        $recipe_pict = $this->prepareData($recipe_pict);
        
        $this->sql =
            "INSERT INTO " . $table . " (recipe_name, description, user_id, steps, ingredients, recipe_pict) VALUES ('" . $recipe_name . "','" . $description  . "','" . $user_id . "','" . $steps . "','" . $ingredients . "','" . $recipe_pict . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function postComment($table, $user_id, $comments, $recipe_id){
        $user_id = $this->prepareData($user_id);
        $comments = $this->prepareData($comments);
        $recipe_id = $this->prepareData($recipe_id);
    
        $this->sql ="INSERT INTO " . $table . " (user_id, comments, recipe_id) VALUES ('" . $user_id . "','" . $comments  . "','" . $recipe_id . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function readCommentTable()
    {
        $this->sql = "select * from recipe_comments";
        $result = mysqli_query($this->connect, $this->sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $dbcommentid = $row['comment_id'];
            $dbuserid = $row['user_id'];
            $dbcomments = $row['comments'];
            $dbrecipeid = $row['recipe_id'];
            
            $data[] = [
                'comment_id' => $dbcommentid,
                'user_id' => $dbuserid,
                'comments' => $dbcomments,
                'recipe_id' => $dbrecipeid,
            ];
        }

        return $data;
    }

    function deleteRecipe($recipe_id)
    {
        $recipe_id = $this->prepareData($recipe_id);

        $this->sql = "DELETE FROM recipe WHERE recipe_id = " . $recipe_id;
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function getUserName($user_id)
    {
        $this->sql = "SELECT name FROM user WHERE user_id = " . $user_id;
        $result = mysqli_query($this->connect, $this->sql);

        $data = array();
        while($row = mysqli_fetch_assoc($result))
        {
            $dbusername = $row['name'];
            
            $data[] = [
                'name' => $dbusername
            ];
        }

        return $data;
    }

}

?>
