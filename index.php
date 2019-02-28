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
            //echo $user->name."<br>";
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
      <h1 class="jumbotron-heading">CSMJU - Twitter API</h1>
      <p>
        <a href="https://twitter.com/DevAPI6?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @DevAPI6</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a href="https://twitter.com/intent/tweet?screen_name=DevAPI6&ref_src=twsrc%5Etfw" class="twitter-mention-button" data-show-count="false">API</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a href="https://twitter.com/intent/tweet?button_hashtag=DevAPI6&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #DevAPI6</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </p>
    </div>
    <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">Get start</strong>
          <h3 class="mb-0">เริ่มต้นการใช้ API</h3>
          <div class="mb-1 text-muted">jan 10</div>
          <p class="card-text mb-auto">ขั้นตอนแรกในการขอใช้งาน twitter api และ การเป็น twitter-Deverloper</p>
          <a href="getstart.php" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src="https://media.giphy.com/media/b2CD0Qrq2ulwY/giphy.gif" style="width:250px;height:250px;">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">API</strong>
          <h3 class="mb-0">All product</h3>
          <div class="mb-1 text-muted">jan 11</div>
          <p class="mb-auto">ทั้งหมดที่มีและเป้าหมายของเรา</p>
          <a href="allapi.php" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
        <img src="https://media.giphy.com/media/SMKiEh9WDO6ze/giphy.gif" style="width:250px;height:250px;">
        </div>
      </div>
    </div>
    </div>
  </section>
  <main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
      Twitter ?
      </h3>

      <div class="blog-post">
        <h2 class="blog-post-title">คืออะไร</h2>
        <p class="blog-post-meta">January 1, 2019 by <a href="#">Eakkaphop</a></p>
        <p>คือครื่องมือออนไลน์ที่ใช้ในการสื่อสารกับคนในกลุ่ม  โดยเครื่องมือนี้มีการจำกัดข้อความในการพิมพ์เพียง 140 ตัวอักษรเท่านั้น (เท่ากันทุกภาษา)</p>
        <hr>
        <h2>ระดับAPI</h2>
        <img class="halign-center" src="img/TwitterDataAPIs.jpg" style="width:400px;height:250px;">
        <p> ระดับของAPI จะมีความแตกต่างตรงที่การเข้าถึงข้อมูลและฟังก์ชั่นที่เราสามารถใช้งาน</p>
        <h3>Standard APIs</h3>
        <p>API มาตรฐานฟรีของเรายอดเยี่ยมสำหรับการเริ่มต้นทดสอบการรวมการตรวจสอบแนวคิดหรือการสร้างโซลูชันที่เสริมสิ่งที่คุณสามารถสร้างได้ด้วยผลิตภัณฑ์ระดับพรีเมี่ยมและองค์กร ตัวอย่างรวมถึงการโพสต์เนื้อหาไปที่ Twitter และการรับข้อมูลที่ไม่มีในปริมาณมาก</p>
        <h3>Premium APIs</h3>
        <p>API พรีเมี่ยมของเราให้การเข้าถึงข้อมูล Twitter ที่ปรับขนาดได้สำหรับผู้ที่ต้องการเติบโตทดลองและสร้างสรรค์สิ่งใหม่ ๆ เมื่อ API มาตรฐานไม่ให้ปริมาณข้อมูลที่จำเป็นการอัปเกรดเป็นพรีเมียมช่วยให้คุณสามารถสร้างและเติบโตได้อย่างต่อเนื่อง ทดสอบในแซนด์บ็อกซ์ฟรีแล้วอัพเกรดเป็นสิทธิ์การเข้าถึงแบบเดือนต่อเดือน</p>
        <h3>Enterprise APIs</h3>
        <p>API ระดับองค์กรของเราให้การเข้าถึงและความน่าเชื่อถือในระดับสูงสุดแก่ผู้ที่ใช้ข้อมูล Twitter สมบูรณ์แบบตามที่คุณขยายเกินกว่าระดับพรีเมี่ยมและต้องการการเข้าถึงที่เชื่อถือได้มากขึ้นแพ็คเกจที่ปรับแต่งเองหรือสัญญารายปี การเข้าถึง Enterprise API มาพร้อมกับผู้จัดการบัญชีและการสนับสนุนทางเทคนิคโดยเฉพาะ</p>
        <h3>Twitter มีข้อดีและข้อเสียอะไรบ้าง</h3>
        <img class="halign-center" src="img/TwitterDataAPIs.jpg" style="width:400px;height:250px;">
        <p>API ระดับองค์กรของเราให้การเข้าถึงและความน่าเชื่อถือในระดับสูงสุดแก่ผู้ที่ใช้ข้อมูล Twitter สมบูรณ์แบบตามที่คุณขยายเกินกว่าระดับพรีเมี่ยมและต้องการการเข้าถึงที่เชื่อถือได้มากขึ้นแพ็คเกจที่ปรับแต่งเองหรือสัญญารายปี การเข้าถึง Enterprise API มาพร้อมกับผู้จัดการบัญชีและการสนับสนุนทางเทคนิคโดยเฉพาะ</p>
        <!-- <pre><code>Example code block</code></pre> -->
      </div><!-- /.blog-post -->
      <nav class="blog-pagination">
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">back</a>
        <a class="btn btn-outline-primary" href="intro.php">Next</a>
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
      <a href="index.php">Back to top</a>
    </p>
    <p>Twitter API with CSMJU </p>
    <p>Deverloper : <a href="https://getbootstrap.com/">Eakkaphop pengtham</a>  WE Twitter<a href="https://getbootstrap.com/docs/4.2/getting-started/introduction/">CSMJU-API</a>.</p>
  </div>
</footer>
<script src="./Album example · Bootstrap_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="./Album example · Bootstrap_files/bootstrap.bundle.min.js.download" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
</body></html>