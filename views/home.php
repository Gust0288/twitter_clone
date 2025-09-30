<?php 
require_once __DIR__."/../x.php";
// _noCache();
session_start();

if(!isset($_SESSION["user"])){
    header("location: /");
    exit();
}

require_once __DIR__."/../db.php";
$q = "SELECT * FROM posts ORDER BY RAND() LIMIT 10";
$stmt = $_db->prepare( $q );
$stmt->execute();
$posts = $stmt->fetchAll();

// more advanced more secure
// $loggedInUser = $_SESSION["user"]["user_pk"];
// $stmt = $_db->prepare( $q2 );
// $q2 = "SELECT * FROM users WHERE user_pk != :loggedInUser ORDER BY RAND() LIMIT 10";
// $stmt2->execute([":loggedInUser" => $loggedInUser]);

//easier way
$q2 = "SELECT * FROM users WHERE user_pk != ? ORDER BY RAND() LIMIT 10";
$stmt = $_db->prepare( $q2 );
$stmt->execute([$_SESSION["user"]["user_pk"]]);
$users = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="/js/app.js" defer></script>
    <title>Welcome home <?php echo $_SESSION["user"]["user_first_name"]; ?></title>
</head>

<body>
    <div id="container">
        <button class="burger" aria-label="Menu">
            <i class="fa-solid fa-bars"></i>
            <i class="fa-solid fa-xmark"></i>
        </button>
        <nav>
                <ul>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i><span>Explore</span></a></li>
                    <li><a href="#"><i class="fa-regular fa-bell"></i><span>Notifications</span></a></li>
                    <li><a href="#"><i class="fa-regular fa-envelope"></i><span>Messages</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-atom"></i><span>Grok</span></a></li>
                    <li><a href="#"><i class="fa-regular fa-bookmark"></i><span>Bookmarks</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-briefcase"></i><span>Jobs</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-users"></i><span>Communities</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-star"></i><span>Premium</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-bolt"></i><span>Verified Orgs</span></a></li>
                    <li><a href="#"><i class="fa-regular fa-user"></i><span>Profile</span></a></li>
                    <li><a href="#"><i class="fa-solid fa-ellipsis"></i><span>More</span></a></li>
                    <li><a href="/logout"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>
                </ul>

                <button class="post-btn">Post</button>

                <div id="profile_tag">
                    <img src="https://avatar.iran.liara.run/public/73" alt="Profile">
                    <div>
                        <div class="name">
                            <?php echo $_SESSION["user"]["user_first_name"]; ?>
                        </div>
                        <div class="handle">
                            <?php echo "@".$_SESSION["user"]["user_email"]; ?> 
                        </div>
                    </div>
                    <i class="fa-solid fa-ellipsis option"></i>
                </div>
        </nav>

        <main>
            
                <?php
                // class="heart-btn"
                ?>
                <?php
                foreach($posts as $post): 
                    require __DIR__."/../components/_tweet.php";
                endforeach;
                ?>
            

        </main>
        <aside>
            <form action="">
                <input type="text" placeholder="Search Twitter">
                <button>Search</button>
            </form>
            <div class="happening-now">
                <h2>What's happening now</h2>
                <div class="trending">
                    <div class="trending-item">
                        <div class="trending-info">
                            <span class="item_title">Trending in Denmark</span>
                            <p>Grækenland</p>
                        </div>
                        <span class="option">⋮</span>
                    </div>
                    <div class="trending-item">
                        <div class="trending-info">
                            <span class="item_title">Politics . Trending</span>
                            <p>Syria</p>
                        </div>
                        <span class="option">⋮</span>
                    </div>
                    <div class="trending-item">
                        <div class="trending-info">
                            <span class="item_title">Bussiness . Trending</span>
                            <p>#AlgoTrading</p>
                        </div>
                        <span class="option">⋮</span>
                    </div>
                    <div class="trending-item">
                        <div class="trending-info">
                            <span class="item_title">Trending in Denmark</span>
                            <p>Italien</p>
                        </div>
                        <span class="option">⋮</span>
                    </div>
                    <button class="show-more-btn">Show more</button>
                </div>

            </div>
            <hr>
            <div class="who-to-follow">
                <h2>Who to follow</h2>
                <div class="follow-suggestion">
                    <?php 
                    foreach($users as $user): 
                    require __DIR__."/../components/_follows.php";
                    endforeach;
                    ?>
                    <button class="show-more-btn">Show more</button>
                </div>
        </aside>
    </div>
</body>

</html>