<div class="clearfix notify" >
  <ul class="notificationBar float-right">
    <li><a href="profile.php" alt="profile"><i class="fi-torso large"></i></a></li>
    <li><a href="inbox.php" alt="inbox"><i class="fi-mail small"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
    <li><a href="calendar.php" alt="calendar"><i class="fi-book-bookmark"></i></a> </li>
    <li><a href="logout.php" alt="logout"><i class="fi-eject"></i></a> </li>
      <li><img class="userImg"  src="https://graph.facebook.com/<?php echo $_SESSION['FBID'];?>/picture"></li>
  </ul>
</div>
