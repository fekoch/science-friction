<?php 
    $conn = new mysqli('e93461-mysql.services.easyname.eu', 'u148201db1', '3JAqFhg', 'u148201db1');
    //first
    $sql2 = "SELECT max(id) FROM testimonials";
    $sql3 = "SELECT min(id) FROM testimonials";
    $maxid = array_values(mysqli_fetch_array($conn->query($sql2)))[0];
    $minid = array_values(mysqli_fetch_array($conn->query($sql3)))[0];
    //second
    $a = 0;
    $gesamt = 0;
    for ($id = $maxid; $id >= $minid; $id--){
        $sql = "SELECT * FROM testimonials WHERE testimonials.id = $id";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $stars = "";
            $gesamt += $row["stars"];
            for($i = $row["stars"];$i>0;$i--){
                $stars.= "★";
            }
            $a++;
            if($a==$maxid){
                $last="last";
            }else if($a==1){
                $last="first";
            }else{
                $last = "";
            }
            echo '
                <div class="testi '.$a.'" id="'.$last.'">
                    <span class="stars">'.$stars.'</span>
                    <blockquote>
                    '.$row["testimonial"].'
                    </blockquote>
                    <div class="bottom">
                        <h4>'.$row["user"]. '</h4>
                        <span class="timestamp">'.$row["time"]. '</span>
                    </div>
                </div>
            ';
        }
    }
    $average = $gesamt / $a;
    $limitDecimals = number_format((float)$average, 1, '.', '');
    echo "Average Rating: ".$limitDecimals;
    $conn->close();
    die();
?>