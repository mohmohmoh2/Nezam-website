
<?php
$connection = mysqli_connect("localhost", "root", "", "nezam");
if(! $connection){echo "problem";}

$query = "SELECT * FROM `settings`";
$Result = mysqli_query($connection, $query);
if ($row = mysqli_fetch_assoc($Result)) {
    $_SESSION['facebook'] = $row['facebook'];
    $_SESSION['linkedin'] = $row['linkedin'];
    $_SESSION['youtube'] = $row['youtube'];
    $_SESSION['quote'] = $row['quote'];
    $_SESSION['aboutUs'] = $row['aboutUs'];
    $_SESSION['mainName'] = $row['mainName'];

}

?>




<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <img src="https://scontent.fcai19-7.fna.fbcdn.net/v/t1.6435-9/131507716_1403642463313668_403912697161230959_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=oynbFP91iZEAX9Utzcr&tn=4OOUg2ZSAGpE4eJ0&_nc_ht=scontent.fcai19-7.fna&oh=00_AT9CxCN4nLZVMlKq9w1pZeEnyav7i-tIwS_6FqW3y1VVmQ&oe=6284BA45" height="30" width="30" alt="">
            </a>
            <span class="text-muted">&copy; 2021 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-muted" target="_blanck" href=<?php echo $_SESSION['mainName'] ?>><img src="https://img.icons8.com/color/240/000000/youtube-play.png" height="40" width="40" alt="youtube"></a></li>
            <li class="ms-3"><a class="text-muted" target="_blanck" href="<?php echo $_SESSION['linkedin'] ?>"><img src="https://img.icons8.com/fluency/240/000000/linkedin.png" height="40" width="40" alt="linkedin"></a></li>
            <li class="ms-3"><a class="text-muted" target="_blanck" href="<?php echo $_SESSION['facebook'] ?>"><img src="https://img.icons8.com/color/240/000000/facebook-new.png" height="40" width="40" alt="facebook"></a></li>
        </ul>
    </footer>
</div>