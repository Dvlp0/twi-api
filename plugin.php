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
      <h1 class="jumbotron-heading">Plugin</h1>
    </div>
  </section>
  <main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
      Plugin with twitter
      </h3>
      <div class="blog-post">
        <p class="blog-post-meta">January 26, 2019 by <a href="#">Eakkaphop</a></p>
        <p>ส่วนนี้ไม่ได้เป็นส่วนที่ใช้ API แต่ตจะเป็นฟังก์ชั่นเสริมที่ทาง Twitter ได้ทำมาให้ได้ใช่งานกัน เพียงแค่ Copy and pate ก็ใช้งานได้</p>
        <hr>
        <h3 class="blog-post-title">Publish</h3>
        <p>Publish twitter  อย่างแรกให้เข้าไปในเว็ป : <a href="https://publish.twitter.com/#">link</a></p>
        <img class="halign-center" src="img/9.PNG" style="width:700px;height:400px;">
        <hr>
        <h3 class="blog-post-title">Twitteer for Web</h3>
        <h5>1.ทวีตฝังตัว Embedded Tweets</h5> : เป็นการฝั่งโพสทวีตๆนั้นเพียงทวีตเดียว
        <br><h5>2.ทามไลน์แบบฝัง Embedded timelines</h5> : เป็นการดึงทวีตๆทามไลน์ของคุณออกมา Embedded
        <br><h5>3.ปุ่มทวีต Tweet Button</h5> : เป็นปุ่มฟังก์ชั่นต่างในทวีตเตอร์ เช่น follow , post เป็นต้น
        <hr>
        <h3 class="blog-post-title">วิธีใช้งาน</h3>
        <p>เพียงคุณไปเลือกโพส หรือ ทามไลน์ของคุณมาแล้ว copy URL มาว่าง เพียงเท่านี้ระบบก็จะทำการ สร้าง Embedded ให้เราไปวาง</p>
        <img class="halign-center" src="img/10.PNG" style="width:700px;height:400px;">
        <hr>
        <h3 class="blog-post-title">ตัวอย่าง</h3>
        <blockquote class="twitter-tweet"><p lang="no" dir="ltr">Hello Twitter! <a href="https://twitter.com/hashtag/myfirstTweet?src=hash&amp;ref_src=twsrc%5Etfw">#myfirstTweet</a></p>&mdash; CSMJU_API (@DevAPI6) <a href="https://twitter.com/DevAPI6/status/1095980042641858560?ref_src=twsrc%5Etfw">February 14, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <hr>
        <div style="width: 400px; height: 400px; overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">  
                            <p align="left">  
                              <a class="twitter-timeline" href="https://twitter.com/DevAPI6?ref_src=twsrc%5Etfw">Tweets by DevAPI6</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                                    <script>
                                    twttr.widgets.createTimeline(
                                            {
                                              sourceType: "profile",
                                              screenName: "TwitterDev"
                                            },
                                            document.getElementById("container")
                                          );</script>


                            </p>  
                              
                            </div> 
        <hr>
        <a href="https://twitter.com/DevAPI6?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @DevAPI6</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a href="https://twitter.com/intent/tweet?screen_name=DevAPI6&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">API</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a href="https://twitter.com/intent/tweet?button_hashtag=DevAPI6&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #DevAPI6</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <hr>
        <!-- <pre><code>Example code block</code></pre> -->
      </div><!-- /.blog-post -->
      <nav class="blog-pagination">
        <a class="btn btn-outline-secondary" href="media.php">back</a>
        <a class="btn btn-outline-primary" href="src.php">Next</a>
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
        <li><a href="https://github.com/Dvlp0/twi-api">GitHub</a></li>
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
      <a href="plugin.php">Back to top</a>
    </p>
    <p>Twitter API with CSMJU </p>
    <p>Deverloper : <a href="https://getbootstrap.com/">Eakkaphop pengtham</a>  WE Twitter<a href="https://getbootstrap.com/docs/4.2/getting-started/introduction/">CSMJU-API</a>.</p>
  </div>
</footer>
<script src="./Album example · Bootstrap_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Album example · Bootstrap_files/bootstrap.bundle.min.js.download" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
</body></html>