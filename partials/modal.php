<!-- register -->
<div id="RegBox" class="reveal" data-reveal>
  <div class="large-12 columns auth-plain " style="border:4px solid white;padding:20px;background: url(../img/bg.svg) repeat;background-color: white!important;">
    <div class="signup-panel">
      <!-- create  match-->
          <div id="contactForm" class="">
            <form method="post" action="process.php">

                <h2>Register</h2>

                <input type="hidden" name="register" value="register"/>
                <label>User name</label>
                <input type="text"   name="uname" placeholder="Ronaldo7">

                <label>Email</label>
                <input type="text"   name="email" placeholder="Mohamed.Jama@gmail.com">

                <label>Password</label>
                <input type="password"  name="password">

                <label>Retype Password</label>
                <input type="password"   name="npassword">

                <input type="submit" class="button" value="Submit">

              </form>
          </div><!--end 8 columns-->
      <!-- create match-->
    </div>
  </div>

</div>
<!-- login-social -->
<div id="loginBox" class="reveal" data-reveal>
  <div class="row">

    <div class="large-12 columns auth-plain">
      <div class="signup-panel left-solid">
        <p class="welcome">Registered Users</p>
          <form method="post" action="process.php">
            <input type="hidden" name="login" value="login"/>
            <div class="row collapse">
              <div class="small-2  columns">
                <span class="prefix"><i class="fi-torso-female"></i></span>
              </div>
              <div class="small-10  columns">
                <input type="text" name="uname" placeholder="username">
              </div>
            </div>
            <div class="row collapse">
              <div class="small-2 columns ">
                <span class="prefix"><i class="fi-lock"></i></span>
              </div>
              <div class="small-10 columns ">
                <input type="password" name="password" placeholder="password">
              </div>
              <input type="submit" class="button" value="Submit">
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- login-social -->
<!-- modal create a match content -->
<div id="CreateMatch" class="reveal" data-reveal>
  <div class="row">
    <div class="large-12 columns auth-plain">
      <div class="signup-panel left-solid">
        <!-- create  match-->
            <div id="contactForm" class="">
              <form id="myForm" method="post" data-abide="">

                  <h2>Create a Match</h2>
                  <label>Match Date</label>
                  <input type="text" placeholder="22/12/2019"  id="dp1">

                  <label>Select Players</label>
                  <select name="basic[]" multiple="multiple" class="3col active">
                      <option value="AK">FIGO</option>
                      <option value="AZ">Samsung</option>
                      <option value="AR">Chelsea</option>
                      <option value="CA">Apple</option>
                      <option value="CO">Uptown</option>
                      <option value="CT">Dhuux</option>
                      <option value="DE">Saeed</option>
                      <option value="FL">Yassin</option>
                      <option value="GA">Jeff</option>
                      <option value="WI">Hamza</option>
                      <option value="WY">Guelle</option>
                  </select>

                  <label>Select Your Pitch</label>
                  <select name="pitch">
                      <option value="SC">Sports City</option>
                      <option value="JA">Jabal Ali</option>
                  </select>

                  <label>Cost per person</label>
                  <input type="text" placeholder="Cost">


                <input type="submit" class="nice blue radius button" value="Lets go">
                </form>
            </div><!--end 8 columns-->
        <!-- create match-->
      </div>
    </div>

   </div>
</div>

<!-- modal create a match content -->

<!-- modal create a club content -->
<div id="CreateClub" class="reveal" data-reveal>
  <div class="row">
    <div class="large-12 columns auth-plain">
      <div class="signup-panel left-solid">
        <!-- create  club-->
            <div id="contactForm" class="">
              <form id="myForm" method="post" data-abide="">

                  <h2>Create a club</h2>
                  <label>Club Name</label>
                  <input type="text" placeholder="Club Name" required>

                  <label>Club Rules</label>
                  <textarea placeholder="Lets have some order here" height="140px" required></textarea>

                  <label>Club Pitch (default)</label>
                  <input type="text" placeholder="Default club pitch" required>

                  <label>Club Pitch (optional)</label>
                  <input type="text" placeholder="optional club pitch">


                <input type="submit" class="nice blue radius button" value="Create your club">
                </form>
            </div><!--end 8 columns-->
        <!-- create club-->
      </div>
    </div>

   </div>
</div>

<!-- modal create a clubcontent -->
