<?php

	include_once 'dbConnect.php';
	global $dbConnection;

    echo '<div class="col-md-10 col-md-offset-0">';

        $postQ = mysqli_query($dbConnection, "select * from `post`");
        while ($post = mysqli_fetch_assoc($postQ)) {
            $tags = explode(",",$post['Tags']);

            echo(
                '
                <div class="col-md-8 col-md-offset-0">
                    <div class="main-page">
                        <a href="images/related/'.$post['Photo'].'"><img src="images/related/'.$post['Photo'].'"></a>
                        <p>'.$post['Comment'].'</p>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-0">
                    <div>
                        <h2>'.$post['Place'].'</h2>
                        <ul class="panel">
                            <li>By: <a href="#">'.$post['Author'].'</a></li>
                            <li>Country: <a href="#">'.$post['Country'].'</a></li>
                            <li>City: <a href="#">'.$post['City'].'</a></li>
                            <li>Taken on: '.$post['Time'].'</li>
                        </ul>
                        
                        <div class="btn-group">
                            
                            <button onclick="StyleChangeHeart(this)" class="btn btn-default glyphicon glyphicon-heart-empty"></button>
                            <button class="btn btn-default glyphicon glyphicon-save"></button>
                            <button class="btn btn-default glyphicon glyphicon-print"></button>
                            <button class="btn btn-default glyphicon glyphicon-comment"></button>
                        </div>
                        
                        <h4>Tags</h4>
                        <div class="panel">
                            <div id="tags" class="label">');

                            foreach ($tags as $tag){
                                echo (
                                    '<button class="tags-gp">'.$tag.'</button>'
                                );
                            };

            echo ('
                            </div>
                        </div>
                    </div>
                </div>'
            );
                            
        }

    echo '</div>';

?>