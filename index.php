<?php
// session_start();
// session_destroy();
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Amatuer Football League</title>
    <link rel="stylesheet" href="assets/css/foundation.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/helper.css">
    <link rel="stylesheet" href="assets/css/icons.css">

  </head>
  <body>
          <div class="title-bar">
            <div class="title-bar-left">
              <span class="title-bar-title">Amatuer Football League</span>
            </div>

              <div class="title-bar-right">
              <a class="login footWhitefont" href="#" >How it works ?</a> -
              <a class="login footWhitefont" href="#" data-open="RegBox">Register</a> -
              <a class="login footWhitefont" href="#" data-open="loginBox">Login</a>
              </div>
          </div>
          <!-- content -->
          <div class="content">
            <div class="row" style="margin-top:30px">
              <div class="small-6 column">
                <!-- carousel -->
                <div class="orbit "   role="region" aria-label="Favorite Space Pictures" data-orbit>
                  <ul class="orbit-container">
                    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
                    <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                    <li class="is-active orbit-slide">
                      <img class="orbit-image" src="assets/img/carousel.jpg" alt="Space">
                      <figcaption class="orbit-caption">Space, the final frontier.</figcaption>
                    </li>
                    <li class="orbit-slide">
                      <img class="orbit-image" src="assets/img/carousel.jpg" alt="Space">
                      <figcaption class="orbit-caption">Lets Rocket!</figcaption>
                    </li>
                    <li class="orbit-slide">
                      <img class="orbit-image" src="assets/img/carousel.jpg" alt="Space">
                      <figcaption class="orbit-caption">Encapsulating</figcaption>
                    </li>
                    <li class="orbit-slide">
                      <img class="orbit-image" src="assets/img/carousel.jpg" alt="Space">
                      <figcaption class="orbit-caption">Outta This World</figcaption>
                    </li>
                  </ul>
                </div>
                <!-- carousel -->
              </div>

            </div>

            <div class="row cardsList">
              <div class="listHeader" style="">
                  <div>Current Matchs</div>
              </div>
              <!-- cards -->
              <div class="medium-3 column">
                <div class="card">
                  <div class="image">
                    <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
                    <span class="title">Thursday Night Football</span>
                  </div>
                  <div class="content">
                    <p>Thursday night football Match @ SportsCity. kick off: 8.20</p>
                  </div>
                  <div class="action">
                    <a href='#'>Join</a>
                  </div>
                </div>
              </div>
              <!-- card end -->
              <!-- cards -->
              <div class="medium-3 column">
                <div class="card">
                  <div class="image">
                    <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
                    <span class="title">Thursday Night Football</span>
                  </div>
                  <div class="content">
                    <p>Thursday night football Match @ SportsCity. kick off: 8.20</p>
                  </div>
                  <div class="action">
                    <a href='#'>Join</a>
                  </div>
                </div>
              </div>
              <!-- card end -->
              <!-- cards -->
              <div class="medium-3 column">
                <div class="card">
                  <div class="image">
                    <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
                    <span class="title">Thursday Night Football</span>
                  </div>
                  <div class="content">
                    <p>Thursday night football Match @ SportsCity. kick off: 8.20</p>
                  </div>
                  <div class="action">
                    <a href='#'>Join</a>
                  </div>
                </div>
              </div>
              <!-- card end -->
              <!-- cards -->
              <div class="medium-3 column">
                <div class="card">
                  <div class="image">
                    <img src="http://static.pexels.com/wp-content/uploads/2014/07/alone-clouds-hills-1909-527x350.jpg">
                    <span class="title">Thursday Night Football</span>
                  </div>
                  <div class="content">
                    <p>Thursday night football Match @ SportsCity. kick off: 8.20</p>
                  </div>
                  <div class="action">
                    <a href='#'>Join</a>
                  </div>
                </div>
              </div>
              <!-- card end -->
            </div>

          </div>
        </div>

<!-- content end -->
<?php include 'partials/modal.php'; ?>
<!-- footer -->
<footer class="footer">
  <div class="row">
    <div class="small-12 medium-6 medium-push-6 columns">
      <p class="logo show-for-small-only"><i class="fi-target"></i> FIGHT CLUB</p>
      <form class="footer-form">
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <label for="email" class="contact">Contact Us</label>
              <input type="email" id="email" placeholder="Email Address" />
            </label>
          </div>
        </div>
        <div class="row">
          <div class="medium-9 medium-push-3 columns">
            <label>
              <textarea rows="5" id="message" placeholder="Message"></textarea>
            </label>
          </div>
          <div class="row">
            <div class="medium-9 medium-push-3 columns">
              <button class="submit" type="submit" value="Submit">Send</button>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="small-12 medium-6 medium-pull-6 columns">
      <p class="logo hide-for-small-only"><i class="fi-target"></i>Amatuer Football League</p>
      <p class="footer-links">
        <a href="#">Home</a>
        <a href="#">How it works</a>
        <a href="#">Faq</a>
      </p>
      <ul class="inline-list social">
        <a href="#"><i class="fi-social-facebook"></i></a>
        <a href="#"><i class="fi-social-twitter"></i></a>
        <a href="#"><i class="fi-social-linkedin"></i></a>
        <a href="#"><i class="fi-social-github"></i></a>
      </ul>
      <p class="copywrite">Copywrite © 2015</p>
    </div>
  </div>
</footer>
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/foundation.min.js"></script>
    <script src="assets/js/vendor/datepicker.js"></script>
    <script src="assets/js/vendor/multiselect.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
