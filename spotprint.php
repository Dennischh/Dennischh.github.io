<?php
				
    include_once 'dbConnect.php';

    global $dbConnection;
    $spotQ = mysqli_query($dbConnection, "select * from `hotspot`");
    
    while($spot = mysqli_fetch_assoc($spotQ)){
        
        echo ('
            <div class="thumbnail">
            <img src="images/related/'.$spot['photo'].'">
            <h6>'.$spot['name'].'</h6>
            <div class="btns">');

        if ($_SESSION){
            $favoriteQ = mysqli_query($dbConnection, "
            SELECT b.`spotID`, `view`, `favourite` FROM `php_travel`.`favorite` AS a
            JOIN hotspot AS b
            ON a.spotID = b.spotID
            JOIN login AS c
            ON a.userID = c.id
            where b.`name` = '".$spot['name']."' and `email` = '".$_SESSION['email']."' ");
            $favorite = mysqli_fetch_assoc($favoriteQ);

            if ($favorite && $favorite['view'] == 1){
                echo('<button onclick="StyleChangeEye(this)" class="btn btn-primary glyphicon glyphicon-eye-open" id="view" name="'.$spot['spotID'].'">View</button>');
            }
            else{
                echo('<button onclick="StyleChangeEye(this)" class="btn btn-primary glyphicon glyphicon-eye-close" id="view" name="'.$spot['spotID'].'">View</button>');
            }
            if ($favorite && $favorite['favourite'] == 1){
                echo('<button onclick="StyleChangeHeart(this)" class="btn btn-primary glyphicon glyphicon-heart" name="'.$spot['spotID'].'">Favorite</button>');
            }
            else{
                echo('<button onclick="StyleChangeHeart(this)" class="btn btn-primary glyphicon glyphicon-heart-empty" name="'.$spot['spotID'].'">Favorite</button>');
            }
        }
        else{
            echo('<button onclick="StyleChangeEye(this)" class="btn btn-primary glyphicon glyphicon-eye-close" id="view">View</button>
                    <button onclick="StyleChangeHeart(this)" class="btn btn-primary glyphicon glyphicon-heart-empty">Favorite</button>');
        }

        echo('
            </div>
        </div>
        ');
    }

?>