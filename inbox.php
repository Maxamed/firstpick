
<?php include_once 'partials/header.php';
?>
<header class="header">
    <h1 class="headline">Welcome <small><?php echo $user['username'];?></small></h1>
    <ul class="header-subnav">
      <?php if($_SESSION['isadmin']===0){ ?>
      <li>    <a href="LockerRoom.php" alt="Your Clubs">Locker Room</a> </li>
      <li>    <a href="createclub.php" >Create a Club</a> </li>
      <?php }else{ ?>
        <li>    <a href="Dashboard.php" alt="Dashboard" >Management</a> </li>
        <li>    <a href="PreviousMatchs.php" alt="HistoryMatchs">Match History</a> </li>
        <li>    <a href="MatchSetup.php" >Setup a Match</a></li>
        <li>    <a href="Pitch.php" alt="Pitch">Pitches</a></li>
   <?php } ?>
      <li>   <a href="Matchs.php" alt="upcoming" >Matches</a> </li>
      <li>   <a href="Stats.php" alt="Stats">Stats</a> </li>
      <li>   <a href="logout.php" alt="logout">logout</a> </li>
      <li>   <a href="profile.php" ><i class="fi-torso large"></i></a></li>
      <li>   <a href="Inbox.php"  class="is-active" ><i class="fi-mail large newEmail"></i><sup><?php echo $_SESSION['msgs'];?></sup></a></li>
    </ul>
</header>
<div class="container">
  <div class="row cardsList">
    <div class="listHeader" style="">
        <div>Notifications</div>
    </div>
    <div class="row collapse">
      <div class="medium-3 columns whiteBackground">
        <ul class="tabs vertical" id="example-vert-tabs" data-tabs>
          <?php  if($_SESSION['isadmin']!=0) {?>
          <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">Transfers In (Admin)</a></li>
          <li class="tabs-title"><a href="#panel2v">RSVP (Admin)</a></li>
          <?php }?>
          <li class="tabs-title"><a href="#panel3v">Your Club requests</a></li>
          <li class="tabs-title"><a href="#panel4v">your Games requests</a></li>
        </ul>
      </div>
      <div class="medium-9 columns whiteBackground">
        <div class="tabs-content vertical" data-tabs-content="example-vert-tabs" style="min-height:400px;">
        <div class="tabs-panel is-active" id="panel1v">
            <?php
                $transfers = getTransfers($id);
                foreach ($transfers as $key => $value) {
            ?>
            <!-- users -->
            <div class="medium-4 columns end singleCard">
              <div class="card">
                <div class="content">
                  <span class="title"><?php print_r($transfers[$key]['senderName']);?></span>
                  <p>Position: <?php print_r($transfers[$key]['SenderPos']);?></p>
                  <p>Request date: <?php print_r($transfers[$key]['sentDate']);?></p>
                </div>
                <div class="action clearfix">
                  <form class="float-left" action="process.php" method="post">
                    <input type="hidden" name="AddPlayer" value="AddPlayer">
                    <input type="hidden" name="transferID" value="<?php print_r($transfers[$key]['id']);?>">
                    <input type="hidden" name="senderID" value="<?php print_r($transfers[$key]['senderID']);?>">
                    <input type="hidden" name="clubID" value="<?php print_r($transfers[$key]['ClubID']);?>">
                    <div class="">
                      <input type="submit" data-open="AcceptPlayer" class=" success  hollow button" value="Accept">
                    </div>
                  </form>
                  <form class="float-right" action="process.php" method="post">
                    <input type="hidden" name="RefusePlayer" value="RefusePlayer">
                    <input type="hidden" name="transferID" value="<?php print_r($transfers[$key]['id']);?>">
                    <input type="hidden" name="senderID" value="<?php print_r($transfers[$key]['senderID']);?>">
                    <input type="hidden" name="clubID" value="<?php print_r($transfers[$key]['ClubID']);?>">
                    <div class="">
                      <input type="submit"  class="alert hollow button" value="Deny">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        <div class="tabs-panel" id="panel2v">
          <?php //var_dump($id);die();
          $transfers = getRSVP($id);
          //var_dump($transfers);
          foreach ($transfers as $key => $value) {
          ?>
          <!-- users -->
          <div class="medium-4 columns end singleCard">
            <div class="card">
              <div class="content">
                <span class="title"><?php print_r($transfers[$key]['senderName']);?></span>
                <p>Position: <?php print_r($transfers[$key]['SenderPos']);?></p>
                <p>Kick Off: <?php print_r($transfers[$key]['kickoff']);?></p>
                <p>Request date: <?php print_r($transfers[$key]['sentDate']);?></p>
              </div>
              <div class="action">
                <form class="" action="process.php" method="post">
                  <input type="hidden" name="MatchPlayer" value="MatchPlayer">
                  <input type="hidden" name="matchid" value="<?php print_r($transfers[$key]['matchid']);?>">
                  <input type="hidden" name="senderID" value="<?php print_r($transfers[$key]['senderID']);?>">
                  <input type="hidden" name="sentDate" value="<?php print_r($transfers[$key]['sentDate']);?>">
                  <input type="hidden" name="clubid" value="<?php print_r($transfers[$key]['clubid']);?>">
                  <div class="">
                    <input type="submit" class="nice success  radius button" value="Accept">
                    <span class="fi-check"></span>
                  </div>
                </form>
                <!-- <a data-open="AcceptPlayer" >Accept<span class="fi-check"></span></a>
                <a data-open="RejectPlayer"  >Reject<span class="fi-x"></span></a> -->
              </div>
            </div>
          </div>
          <!-- users -->
          <?php } ?>
          <!-- end tab rsvp -->
        </div>
        <div class="tabs-panel" id="panel3v">
          <?php
              $inboxClubJoin = getClubJoinTransfers($id);
              foreach ($inboxClubJoin as $key => $value) {
              $clubdetails = Clubpage($value['ClubID']);
          ?>
          <div class="success callout" data-closable="slide-out-right">
            <h5>You've been successfully added to <b><?php echo $clubdetails['name'];?></b></h5>
            <p>Any matches created by <?php echo $clubdetails['name'];?> will appear on your Matches tab.</p>
            <form id="myForm" method="post" action="process.php">
              <input type="hidden" name="cleaninbox" value="cleaninbox">
              <input type="hidden" name="tablename" value="inboxadded">
              <input type="hidden" name="notficationid" value="<?php echo $value['id'] ?>">
              <input type="hidden" name="userid" value="<?php echo $id ?>">
              <input type="submit"  class="alert hollow button" value="Delete">
            </form>
          </div>
          <?php } ?>
        </div>
        <div class="tabs-panel" id="panel4v">
          <?php
              $inboxRSVP = getRSVPnotifications($id);
              foreach ($inboxRSVP as $key => $value) {
              $matches = GetMatch($value['matchid']);
          ?>
          <div class="success callout" data-closable="slide-out-right">
            <h5>You've been added to the match</h5>
            <p>kick off on  <b><?php echo $matches['date'];?></b>, and it cost <b><?php echo $matches['cost'];?></b> </p>
            <p> Full details can be seen in your Matches Tab. </p>
            <form id="myForm" method="post" action="process.php">
              <input type="hidden" name="cleaninbox" value="cleaninbox">
              <input type="hidden" name="tablename" value="inboxplaying">
              <input type="hidden" name="notficationid" value="<?php echo $value['id'] ?>">
              <input type="hidden" name="userid" value="<?php echo $id ?>">
              <input type="submit"  class="alert hollow button" value="Delete">
            </form>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- content end -->
  <?php include 'partials/modal.php'; ?>
  <?php include 'partials/footer.php'; ?>
