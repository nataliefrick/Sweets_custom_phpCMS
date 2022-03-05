<?php

class Recipe {

    // variables
    private $db;
    private $timeStamp;
    private $title;
    private $author;
    private $category;
    private $yield;
    private $prepT;
    private $cookT;
    private $story;
    private $ingredients;
    private $directions;
    private $imgLink;
    private $imgAlt;
    
    // constructor - connect to database
    function __construct() {
        $this->db= new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        if($this->db->connect_errno > 0) {
            die("Error connection: " . $this->db->connect_error);
        }
    }

    // set methods
    public function setTitle(string $title) : bool {
        if($title!= "") {
            $this->title = $title;
            return true;
        } else {
            return false;
        }
    }

    public function setAuthor(string $author) : bool {
        if($author!= "") {
            $this->author = $author;
            return true;
        } else {
            return false;
        }
    }

    public function setCategory(string $category) : bool {
        if($category!= "") {
            $this->category = $category;
            return true;
        } else {
            return false;
        }
    }

    public function setYield(string $yield) : bool {
        if($yield!= "") {
            $this->yield = $yield;
            return true;
        } else {
            return false;
        }
    }

    public function setPrep(string $prepT) : bool {
        if($prepT!= "") {
            $this->prepT = $prepT;
            return true;
        } else {
            return false;
        }
    }

    public function setCook(string $cookT) : bool {
        if($cookT!= "") {
            $this->cookT = $cookT;
            return true;
        } else {
            return false;
        }
    }

    public function setStory(string $story) : bool {
        if($story!= "") {
            $this->story = $story;
            return true;
        } else {
            return false;
        }
    }

    public function setIngredients(string $ingredients) : bool {
        if($ingredients!= "") {
            $this->ingredients = $ingredients;
            return true;
        } else {
            return false;
        }
    }

    public function setDirections(string $directions) : bool {
        if($directions!= "") {
            $this->directions = $directions;
            return true;
        } else {
            return false;
        }
    }
      
    public function setImgLink(string $imgLink) : bool {
        if($imgLink!= "") {
            $this->imgLink = $imgLink;
            return true;
        } else {
            return false;
        }
    }
    
    public function setImgAlt(string $imgAlt) : bool {
        if($imgAlt!= "") {
            $this->imgAlt = $imgAlt;
            return true;
        } else {
            return false;
        }
    }
    
    public function addRecipe() : bool {
        $sql = "
        INSERT INTO recipes 
            (   title,
            author,
            category,
            yield,
            prepTime,
            cookTime,
            story,
            ingredients,
            directions,
            imgLink,
            imgAlt  )
        VALUES
            (
            '" . $this->title . "', 
            '" . $this->author . "', 
            '" . $this->category . "', 
            '" . $this->yield . "', 
            '" . $this->prepT . "', 
            '" . $this->cookT . "', 
            '" . $this->story . "', 
            '" . $this->ingredients . "', 
            '" . $this->directions . "', 
            '" . $this->imgLink . "', 
            '" . $this->imgAlt . "'
            );
        "; 

        return mysqli_query($this->db, $sql); //(send query: database connection, query)
    }





    
    
    
    // get methods
    // public function getPosts() : array {
    //     //SQL Query
    //     $sql = "SELECT
    //     id,
    //     title,
    //     author,
    //     articleText,
    //     imglink,
    //     DATE_FORMAT(created, '%a, %D %b %Y ') AS created       
    //     FROM blogpost ORDER BY created desc;";

    //     $result = mysqli_query($this->db, $sql); //(send query: database connection, query)
    //     return mysqli_fetch_all($result, MYSQLI_ASSOC);
    // }
    
    public function getRecipeListAdmin() : array {
        //SQL Query
        $sql = "SELECT
        id,
        title,
        author,
        category,
        imgLink,
        imgAlt,
        DATE_FORMAT(created, '%e-%c-%Y  %H:%i %p' ) AS published        
        FROM recipes ORDER BY created desc;";

        $result = mysqli_query($this->db, $sql); //(send query: database connection, query)
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // get specific blogpost from ID
    public function getRecipeById(int $id) : array {
        $id = intval($id);
        $sql = "SELECT
        id,
        title,
        author,
        category,
        yield,
        prepTime,
        cookTime,
        story,
        ingredients,
        directions,
        imgLink,
        imgAlt,
        DATE_FORMAT(created, '%b %D, %Y') AS published        
        FROM recipes WHERE id=$id;";
        $result = mysqli_query($this->db, $sql);
        return $result->fetch_assoc();
    }

   public function updateRecipe(int $id) : bool {
        $sql = "
        
        UPDATE recipes 
        SET 
            title='" . $this->title . "', 
            author='" . $this->author . "', 
            category='" . $this->category . "', 
            yield='" . $this->yield . "', 
            prepTime='" . $this->prepT . "', 
            cookTime='" . $this->cookT . "', 
            story='" . $this->story . "', 
            ingredients='" . $this->ingredients . "', 
            directions='" . $this->directions . "', 
            imgLink='" . $this->imgLink . "', 
            imgAlt='" . $this->imgAlt . "'
        WHERE id=" . $id . "; ";
        // echo "<pre>" . $sql . "</pre>";

        return mysqli_query($this->db, $sql); //(send query: database connection, query)
        
    }

    // delete post
    public function deleteRecipe(int $id) : bool {
        $id = intval($id);

        $sql = "DELETE FROM recipes WHERE id=$id;";
        return mysqli_query($this->db, $sql); //(send query: database connection, query)
    }
    
//     // truncate text
//     public function truncateText($text, $maxchar, $end='...') {
//         if (strlen($text) > $maxchar || $text == '') {
//             $words = preg_split('/\s/', $text);      
//             $output = '';
//             $i      = 0;
//             while (1) {
//                 $length = strlen($output)+strlen($words[$i]);
//                 if ($length > $maxchar) {
//                     break;
//                 } 
//                 else {
//                     $output .= " " . $words[$i];
//                     ++$i;
//                 }
//             }
//             $output .= $end;
//         } 
//         else {
//             $output = $text;
//         }
//         return $output;
//     }

//     public function friendlyDate($date) {
//         return date_format($date, 'g:ia \o\n l jS F Y');
//     }
}