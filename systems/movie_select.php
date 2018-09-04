<?php
include ('../js/function_db.php');
       echo $_POST['params'];
            $sql_movie = " SELECT DISTINCT movie.movie_id,movie.movie_name_th,movie.img FROM `cinema_movie` LEFT JOIN movie ON movie.movie_id = cinema_movie.movie_id WHERE cinema_movie.cinema_id = '".$_POST['params']."'  ";
            $rs_movie = selectSql($sql_movie);
            foreach ($rs_movie as $row_movie) {  ?>

                <option value="<?php echo $row_movie['movie_id']; ?>"><?php echo $row_movie['movie_name_th'] ?></option>
                
            <?php }
             
      ?>