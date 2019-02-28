<!DOCTYPE html>
<!-- saved from url=(0049)https://getbootstrap.com/docs/4.2/examples/album/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="tw.ico" type="image/x-icon"/>
    <title>Twitter_API</title>
    <!-- Bootstrap core CSS -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="css/blog.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">
  </head>
  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Twitter API</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
    <a href="index.php" class="navbar-brand d-flex align-items-center">
        <strong>Twitter API</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
	  <?php
          session_start();
          require 'autoload.php';
          use Abraham\TwitterOAuth\TwitterOAuth;
          define('CONSUMER_KEY','SNET3ZIGlHFG3ZKCuXdkz3rGE');
          define('CONSUMER_SECRET','nQihaFPfb0NcXc3pcWu3y1fhvR9zcW6ehI71eHNeLzZunAAeri');
          define('OAUTH_CALLBACK','http://localhost/callback.php');
          if (!isset($_SESSION['access_token'])) {
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
            $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            //echo $url;
            echo "<a href='$url'>Login</a>";
          } else {
            $access_token = $_SESSION['access_token'];
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $user = $connection->get("account/verify_credentials");
            echo $user->screen_name;
            $go = "logout.php";
            echo "<a href='$go'>Log Out</a>";
          }
    ?>
      </button>
    </div>
  </div>
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    <a class="p-2 text-muted" href="intro.php">introduction</a>
      <a class="p-2 text-muted" href="getstart.php">Get start</a>
      <a class="p-2 text-muted" href="allapi.php">ALL API</a>
      <a class="p-2 text-muted" href="login.php">Login</a>
      <a class="p-2 text-muted" href="post_page.php">Post</a>
      <a class="p-2 text-muted" href="media.php">Media</a>
      <!-- <a class="p-2 text-muted" href="#">Politics</a>
      <a class="p-2 text-muted" href="#">Opinion</a>
      <a class="p-2 text-muted" href="#">Science</a> -->
      <a class="p-2 text-muted" href="plugin.php">Plugin</a>
      <a class="p-2 text-muted" href="src.php">Soure code</a>
      <a class="p-2 text-muted" href="contact.php">Contact</a>
    </nav>
  </div>
  
</header>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Post</h1>
    </div>
  </section>
  <main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
      POST with Twitter API
      </h3>
      <div class="blog-post">
        <p class="blog-post-meta">January 10, 2019 by <a href="#">Eakkaphop</a></p>
        <p>เป็นเรื่องที่ต่อในการ login with twitter จะเป็นการที่เราได้ session ที่ล๊อค</p>
        <p>โค้ด <a href="https://drive.google.com/file/d/1lVCCdfHvjZdgxV4Q9_VA97CxQvTO7cSF/view?usp=sharing">download</a><p>
        <img class="halign-center" src="img/7.PNG" style="width:250px;height:250px;">
        <p>ให้โหลดไฟล์ post.php มาไว้ที่เดี๋ยวกับ page ที่เราสร้างไว้เผื่อโพสข้อมูลต่างๆ<br>*หมายเหุต : ข้อกำจัดของ twitter ไม่สามารถโพสข้อความที่มีความเยาวเกิน 140 อักษร(ทุกภาษา)</p>
        <hr>
        <h3 class="blog-post-title">ตัวอย่างโค้ดไว้รับค่า</h3>
        <xmp>
            <form action="/post.php">
            <input type="text" name="text">
            <button type="submit" type="text">post</button>
            </form>
            //html5
        </xmp>
        <p>เราจะเช็ต action จะทำงานเมื่อเรากดปุ่ม submit จะส่งค่า text ผ่านพารามิตเตอร์ชื่อว่า text ไปที่ไฟล์ post.php</p>
        <hr>
        <h2 class="blog-post-title">ทดสอบการโพส</h2 >
        <form action="/post.php">
  				<input type="text" name="text">
  				<button type="submit" type="text">post</button>
			</form>
        <p>ให้เรากรอกข้อความที่ต้องการจะโพสลงไปช่องที่เตรียมไว้ให้
        <br>- หาเราไม่ได้ login ระบบจะทำการแจ้งเตือน ให้login ก่อนจะโพส
        <br>- หากโพสแล้วกลับมาหน้าเดิม แสดงว่าทำการโพสแล้ว สามารภตรวจสอบได้ที่ <a href="https://twitter.com/">twitter</a>
        </p>
        <hr>
        <h3 class="blog-post-title">การแก้ไขแจ้งเตือน</h3>
        <p>ในไฟล์ logout.php</p>
        <xmp>
        session_start();
require 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
//use src\TwitterOAuth;
define('CONSUMER_KEY', 'SNET3ZIGlHFG3ZKCuXdkz3rGE'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'nQihaFPfb0NcXc3pcWu3y1fhvR9zcW6ehI71eHNeLzZunAAeri'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://localhost/callback.php'); // your app callback URL
if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	//echo $url
	echo "ท่านยังไม่ได้ login<br><a href='$url'>กรูณา login</a>"; **  แก้ตรงนี้
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	//echo $user->screen_name;
	// posting tweet on user profile
	$post = $connection->post('statuses/update', array('status' => $_GET['text']));
	// displaying response of $post object
	//print_r($post);
	header('Location: ./post_page.php');
}
</xmp>
        <hr>
        <h3 class="blog-post-title">การนำไปใช้</h3>
        <p>- เราสามารถนำไปใช้โดยที่ไม่ต้องรอกด summit ก็ได้ โดยสมุมิตว่าเรามีค่าที่ได้มาจากภาษา javascipt ให้ get ค่าตัวนั้นไปโพสเองโดยอัตโนมัติก็ได้เป็นต้น
        </p>
        <hr>
        <!-- <pre><code>Example code block</code></pre> -->
      </div><!-- /.blog-post -->
      <nav class="blog-pagination">
        <a class="btn btn-outline-secondary" href="login.php">back</a>
        <a class="btn btn-outline-primary" href="media.php">Next</a>
      </nav>

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Eakkaphop pengtham 5904101394</p>
        <p class="mb-0">Saksit Srikaew 5904101368</p>
        <p class="mb-0">Krittichai Prathum 5904101310</p>
      </div>

      <div class="p-4">
        <h4 class="font-italic">API</h4>
        <ol class="list-unstyled mb-0">
        <li><a href="https://developer.twitter.com/en/docs/basics/getting-started">Basic</a></li>
          <li><a href="https://developer.twitter.com/en/docs/accounts-and-users/subscribe-account-activity/overview">Accounts and users</a></li>
          <li><a href="https://developer.twitter.com/en/docs/tweets/post-and-engage/overview">Tweets</a></li>
          <li><a href="https://developer.twitter.com/en/docs/direct-messages/api-features">Direct Messages</a></li>
          <li><a href="https://developer.twitter.com/en/docs/media/upload-media/overview">Media</a></li>
          <li><a href="https://developer.twitter.com/en/docs/trends/trends-for-location/overview">Trends</a></li>
          <li><a href="https://developer.twitter.com/en/docs/geo/place-information/overview">Geo</a></li>
          <li><a href="https://developer.twitter.com/en/docs/ads/general/overview">Ads</a></li>
          <li><a href="https://developer.twitter.com/en/docs/twitter-for-websites/overview">Twitter for Websites</a></li>
        </ol>
      </div>

      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
        <li><a href="https://github.com/Dvlp0/Twitter_APIMJU">GitHub</a></li>
          <li><a href="https://twitter.com/DevAPI6">Twitter</a></li>
          <li><a href="https://www.facebook.com/saksit.srikeaw">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main>
</main>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="getstart.php">Back to top</a>
    </p>
    <p>Twitter API with CSMJU </p>
    <p>Deverloper : <a href="https://getbootstrap.com/">Eakkaphop pengtham</a>  WE Twitter<a href="https://getbootstrap.com/docs/4.2/getting-started/introduction/">CSMJU-API</a>.</p>
  </div>
</footer>
<script src="./Album example · Bootstrap_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Album example · Bootstrap_files/bootstrap.bundle.min.js.download" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
</body></html>