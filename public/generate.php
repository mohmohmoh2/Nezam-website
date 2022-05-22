<?php 
include 'config.php';
session_start();
$courseId = $_GET['id'];
// Get all lecture ids from database to the array
$lectures = [];
$query = "SELECT * FROM `lectures` WHERE `courseId` = '".$courseId."'";
$courseResult = mysqli_query($connection, $query);
while ($instrow = mysqli_fetch_assoc($courseResult)) {
    array_push($lectures, $instrow['id']);
}
print_r($lectures);
echo  sizeof($lectures) .'<br>';
$list = [];
for ($i=0; $i < sizeof($lectures); $i++) { 
    $query = "SELECT * FROM `completedquiz` WHERE `lecId` = '".$lectures[$i]."'";
    $courseResult = mysqli_query($connection, $query);
    while ($instrow = mysqli_fetch_assoc($courseResult)) {
        echo $instrow['userId'] . '<br>';
        if ($instrow['userId'] == $_SESSION['id']) {
            array_push($list,"true");
        }
    }
}
echo '<br>';

print_r($list);
if (sizeof($lectures) != sizeof($list)) {
    $_SESSION['re'] = "exist";
    header("location: lectures/index.php?id=1&n=1");
}else {
    // Generate random credintial id for the certificate
    $creditId = "";
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";  
    $size = strlen( $chars );  
    for( $i = 0; $i < 20; $i++ ) {  
        $str= $chars[ rand( 0, $size - 1 ) ];
        $creditId = $creditId.$str;
    }
    echo $creditId;

    $query = "SELECT * FROM `certiticates` WHERE `userId` = '".$_SESSION['id']."'";
    $courseResult = mysqli_query($connection, $query);
    if ($row = mysqli_fetch_assoc($courseResult)) {
        if ($row['courseId'] == $courseId) {
            $creditId = $row['credintialId'];
            // the user has already finished this course and get his certificate
            header("location: certificate/$creditId.jpg");
            echo"any";
        }else {
                    // write code to generate new certificate
        $query = "INSERT INTO `certiticates`(`credintialId`, `userId`, `courseId`) VALUES ('".$creditId."','".$_SESSION['id']."','".$courseId."')";
        $courseResult = mysqli_query($connection, $query);
        if ($courseResult) {
            $queryy = "SELECT * FROM `courses` WHERE `id` = '$courseId' LIMIT 1";
            $result = mysqli_query($connection, $queryy);
            if ($row = mysqli_fetch_assoc($result)) {
                header('Content-type: image/jpeg');
                $font=realpath('arial.ttf');
                $image=imagecreatefromjpeg("formaat.jpg");
                $color=imagecolorallocate($image, 51, 51, 102);
                $date=date('d F, Y');
                imagettftext($image, 18, 0, 130, 1080, $color,$font, $date);
                $name=$_SESSION['firstName']." ".$_SESSION['lastName'];
                $course= "has successfully completed \n"." ".$row['courseName']."an online non-credit course offered through Coursera";
                imagettftext($image, 68, 0, 115, 520, $color,$font, $name);
                imagettftext($image, 30, 0, 115, 820, $color,$font, $course);
                $creditIda = "Credential ID : ".$creditId;
                imagettftext($image, 20, 0, 130, 1200, $color,$font, $creditIda);
                imagejpeg($image,"certificate/$creditId.jpg");
                header("location: certificate/$creditId.jpg");
                imagedestroy($image);
            }
        }
        }
    }else{
        // write code to generate new certificate
        $query = "INSERT INTO `certiticates`(`credintialId`, `userId`, `courseId`) VALUES ('".$creditId."','".$_SESSION['id']."','".$courseId."')";
        $courseResult = mysqli_query($connection, $query);
        if ($courseResult) {
            $queryy = "SELECT * FROM `courses` WHERE `id` = '$courseId' LIMIT 1";
            $result = mysqli_query($connection, $queryy);
            if ($row = mysqli_fetch_assoc($result)) {
                header('Content-type: image/jpeg');
                $font=realpath('arial.ttf');
                $image=imagecreatefromjpeg("formaat.jpg");
                $color=imagecolorallocate($image, 51, 51, 102);
                $date=date('d F, Y');
                imagettftext($image, 18, 0, 130, 1080, $color,$font, $date);
                $name=$_SESSION['firstName']." ".$_SESSION['lastName'];
                $course= "has successfully completed \n"." ".$row['courseName']."an online non-credit course offered through Coursera";
                imagettftext($image, 68, 0, 115, 520, $color,$font, $name);
                imagettftext($image, 30, 0, 115, 820, $color,$font, $course);
                $creditIda = "Credential ID : ".$creditId;
                imagettftext($image, 20, 0, 130, 1200, $color,$font, $creditIda);
                imagejpeg($image,"certificate/$creditId.jpg");
                header("location: certificate/$creditId.jpg");
                imagedestroy($image);
            }
        }
    }

    // if (true) {
    //     $selects = "SELECT * FROM `courses` WHERE `id` = '".$courseId."' LIMIT 1";
    //     $result = mysqli_query($connection, $selects);
    //     if ($row = mysqli_fetch_assoc($result)) {
    //         if ($row['completeid'] == "") {
    //             // update the user complete course
    //             $select = "UPDATE `courses` SET `completeid` = '".$_SESSION['id']."' WHERE `id` = '".$courseId."' LIMIT 1";
    //             $result = mysqli_query($connection, $select);
    //             $selectss = "SELECT * FROM `user` WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //             $result = mysqli_query($connection, $selectss);
    //             if ($row = mysqli_fetch_assoc($result)) {
    //                 // if there is no data in user certificate
    //                 if ($row['certificates'] == "") {
    //                     $upcredits = $_SESSION['cid']."#".$creditId;
    //                     $seleect = "UPDATE `user` SET `certificates` = '".$upcredits."' WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //                     $result = mysqli_query($connection, $seleect);
    //                     $idd = $_SESSION['course'];
    //                     $queryy = "SELECT * FROM `courses` WHERE `id` = '$idd' LIMIT 1";
    //                     $result = mysqli_query($connection, $queryy);
    //                     if ($row = mysqli_fetch_assoc($result)) {
    //                         $upcredits = $_SESSION['cid']."#".$creditId;
    //                         $seleect = "UPDATE `user` SET `certificates` = '".$upcredits."' WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //                         $result = mysqli_query($connection, $seleect);
    //                         header('Content-type: image/jpeg');
    //                         $font=realpath('arial.ttf');
    //                         $image=imagecreatefromjpeg("formaat.jpg");
    //                         $color=imagecolorallocate($image, 51, 51, 102);
    //                         $date=date('d F, Y');
    //                         imagettftext($image, 18, 0, 130, 1080, $color,$font, $date);
    //                         $name=$_SESSION['firstName']." ".$_SESSION['lastName'];
    //                         $course= "has successfully completed \n"." ".$row['courseName']."an online non-credit course offered through Coursera";
    //                         imagettftext($image, 68, 0, 115, 520, $color,$font, $name);
    //                         imagettftext($image, 30, 0, 115, 820, $color,$font, $course);
    //                         $creditIda = "Credential ID : ".$creditId;
    //                         imagettftext($image, 20, 0, 130, 1200, $color,$font, $creditIda);
    //                         imagejpeg($image,"certificate/$creditId.jpg");
    //                         header("location: certificate/$creditId.jpg");
    //                         imagedestroy($image);
    //                     }
    //                 }else{
    //                     // Explode All data
    //                     $coursesArr = explode("#",$row['certificates']);
    //                     if (in_array($_SESSION['cid'], $coursesArr)) {
    //                         // If Found The Person Complete the course
    //                         echo "done2";
    //                     }else {
    //                         $upcredits = $_SESSION['cid']."#".$creditId;
    //                         $sdff = $row['id'];
    //                         $concat = $row['certificates'] . "," . $upcredits;
    //                         $query = "UPDATE `user` SET `certificates`= '$concat' WHERE `user`.`id` = '$sdff' LIMIT 1";
    //                         $results = mysqli_query($connection, $query);
    //                         if (mysqli_query($connection, $query)) {
    //                             echo "done";
    //                         }
    //                     }
    //                 }
    //             }
    //         }else{
    //             // Explode All data
    //             $coursesArr = explode(",",$row['completeid']);
    //             if (in_array($_SESSION['id'], $coursesArr)) {
    //                 $quey = "SELECT * FROM `user` WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //                 $resulat = mysqli_query($connection, $quey);
    //                 if ($rowWw = mysqli_fetch_assoc($resulat)) {
    //                     $cerArr = explode("#",$rowWw['certificates']);
    //                     $pastIndex = array_search($_SESSION['cid'],$cerArr);
    //                     $certId1 = explode(",",$cerArr[$pastIndex+1]);
    //                     $certId = $certId1[0].".jpg";
    //                     echo $certId;
    //                     header("location: certificate/".$certId);
    //                 }
    //             }else {
    //                 $concat = $row['completeid'] . "," . $_SESSION['id'];
    //                 $sdff = $_GET['id'];
    //                 $query = "UPDATE `courses` SET `completeid`= '$concat' WHERE `courses`.`id` = '$sdff' LIMIT 1";
    //                 $results = mysqli_query($connection, $query);
    //                 if (mysqli_query($connection, $query)) {
    //                     $idd = $_SESSION['course'];
    //                     $queryy = "SELECT * FROM `courses` WHERE `id` = '$idd' LIMIT 1";
    //                     $result = mysqli_query($connection, $queryy);
    //                     if ($row = mysqli_fetch_assoc($result)) {
    //                         $c = "";
    //                         // select the all exist certificates
    //                         $quey = "SELECT * FROM `user` WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //                         $resulat = mysqli_query($connection, $quey);
    //                         if ($rowWw = mysqli_fetch_assoc($resulat)) {
    //                             $c = $rowWw['certificates'];
    //                         }
    //                         $upcredits = $c."#". $_SESSION['cid']."#".$creditId;
    //                         $seleect = "UPDATE `user` SET `certificates` = '".$upcredits."' WHERE `id` = '".$_SESSION['id']."' LIMIT 1";
    //                         $result = mysqli_query($connection, $seleect);
    //                         header('Content-type: image/jpeg');
    //                         $font=realpath('arial.ttf');
    //                         $image=imagecreatefromjpeg("formaat.jpg");
    //                         $color=imagecolorallocate($image, 51, 51, 102);
    //                         $date=date('d F, Y');
    //                         imagettftext($image, 18, 0, 130, 1080, $color,$font, $date);
    //                         $name=$_SESSION['firstName']." ".$_SESSION['lastName'];
    //                         $course= "has successfully completed \n"." ".$row['courseName']."an online non-credit course offered through Coursera";
    //                         imagettftext($image, 68, 0, 115, 520, $color,$font, $name);
    //                         imagettftext($image, 30, 0, 115, 820, $color,$font, $course);
    //                         $creditIda = "Credential ID : ".$creditId;
    //                         imagettftext($image, 20, 0, 130, 1200, $color,$font, $creditIda);
    //                         imagejpeg($image,"certificate/$creditId.jpg");
    //                         header("location: certificate/$creditId.jpg");
    //                         imagedestroy($image);
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }
}
