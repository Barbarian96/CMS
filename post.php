<?php 
    class Post{
        private $id;
        private $title;
        private $description;
        private $author;
        private $create_time;
        private $cover;
        protected $dbcon;

        function setId($id){$this->id=$id;}
        function getId(){return $this->id;}

        function setTitle($title){$this->title=$title;}
        function getTitle(){return $this->title;}

        function setDescription($description){$this->description=$description;}
        function getDescription(){return $this->description;}

        function setAuthor($author){$this->author=$author;}
        function getAuthor(){return $this->author;}

        function setCreate_time($create_time){$this->create_time=$create_time;}
        function getCreate_time(){return $this->create_time;}

        function setCover($cover){$this->cover=$cover;}
        function getCover(){return $this->cover;}
        
        public function __construct(){
            $host = "localhost";  
            $user = "root";  
            $password = '';  
            $db_name = "our-blog";  
            
            $this->dbcon = mysqli_connect($host, $user, $password, $db_name);  
            if(mysqli_connect_errno()) {  
                die("Failed to connect with MySQL: ". mysqli_connect_error());  
            }  
        }
        
        public function save(){
            $sql ="INSERT INTO tbl_post`(title,description,  
            create_time,author) VALUES ('$this->title', '$this->description','$this->create_time', '$this->author';";        
            $result = mysqli_query($this->dbcon, $sql);   
            if ($result){
                return true;
            }
            else{
                return false;
            }
        }        

    }
