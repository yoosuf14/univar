<?php 
// check if already logged in. Else redirect to login page
session_start();
if(isset($_SESSION['customer_session_id']))
{

// decrlaring a variable to sessionId
$session = $_SESSION['customer_session_id'];

?>

<!doctype html>
<html lang="en">
  <head>
<?php
include_once 'connection.php';

?>
<?php
include_once 'link.php';
?>

<title>Univar - Home</title>
</head>
<body onload="ShowOnlyThisSection('inboxContent', 'sentContent', 'messageContent')">
	<?php
// fetch customer details here
  ?>
	<!-- jumbotron begin -->
<div class="jumbotron jumbotron-fluid mb-0">
  <div class="container">
    <h1 class="display-4">Univar Appaprels</h1>
    <p class="lead">For all your wholesale apparel needs</p>
  </div>
</div>

	<!-- jubotron end -->

<!-- Navbar begin -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="#">Univar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls=" 

  navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Messages <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Orders</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="cart.php">My cart</a>
      </li>      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Options</a>
          <a class="dropdown-item" href="editcustomerprofile.php">Edit profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout_code.php">Logout</a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    
    </ul>

  </div>
</nav>
<!-- Navbar end -->

<!-- get success message  -->
<?php 
$sent = '';
    if(isset($_GET['messageSent']))
    {
      $sent = "Message sent successfully!";
    }
 ?>
<!-- get success message end -->

<!-- sidenav navbar -->
<div class="row">
<div class="bg-dark border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush bg-dark">
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="compose" onclick="ShowOnlyThisSection('inboxContent', 'sentContent', 'messageContent')">Compose</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="inbox" onclick="ShowOnlyThisSection('messageContent', 'sentContent', 'inboxContent')">Inbox</a>
        <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="sent" onclick="ShowOnlyThisSection('inboxContent', 'messageContent', 'sentContent')">Sent</a>

      </div>
    </div>
<!-- sidenav end -->

<!-- Fetch sent begin -->
<?php
$sql = "SELECT messageId, date_time, subject, message FROM messages WHERE userId = '$session'";
$resultset = mysqli_query($conn, $sql);

?>

<!-- messageContent form begin -->
<div id="messageContent" class="container">
  <h1 class="h1">Compose New Message</h1>
<form method="post" action="message_code.php">
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="subject" name="subject" class="form-control" id="subject" placeholder="Enter subject here">
  </div>
  <div class="form-group">
    <label for="Description">Description</label>
    <input type="Description" name="Description" class="form-control" id="Description" placeholder="Enter Description here">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message here"></textarea>
  </div>
  <button type="submit" class="btn btn-dark bg-dark">Send Message</button>
</form>
<div class="">
  <span><strong><?php echo "$sent"; ?></strong></span>
</div>
</div>
<!-- message form end -->

<!-- sent content begin -->
<div id="sentContent" class="container">
    <h1 class="h1">Sent</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Date</th>
      <th scope="col" class="">Subject</th>
      <th scope="col" class="">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $date = $record['date_time'];
    $subject = $record['subject'];
    $message = $record['message'];
     ?>
      <th scope="row"><?php echo "$date";?></th>
      <td><?php echo "$subject"; ?></td>
      <td><?php echo "$message"; ?></td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>
<!-- sent content end -->

<!-- Fetch sent begin -->
<?php
$sql = "SELECT messageId, date_time, subject, message FROM messages2 WHERE userId = '$session'";
$resultset = mysqli_query($conn, $sql);
?>

<!-- inbox content begin -->
<div id="inboxContent" class="container">
     <h1 class="h1">Inbox</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Date</th>
      <th scope="col" class="">Subject</th>
      <th scope="col" class="">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $date = $record['date_time'];
    $subject = $record['subject'];
    $message = $record['message'];
     ?>
      <th scope="row"><?php echo "$date";?></th>
      <td><?php echo "$subject"; ?></td>
      <td><?php echo "$message"; ?></td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>
<!-- inbox content end -->

</div>
</div>
<?php
include_once 'jslink.php';
?>

<script type="text/javascript">
  // hideThisSection("compose");
  function ShowOnlyThisSection(hide1, hide2, show1 ) {
    var x = hide1;
    var y = hide2;
    var z = show1;
    $("#"+x).hide();
    $("#"+y).hide();
    $("#"+z).show();
  }

</script>
</body>
</html>
<?php 
}
else
{
  header("Location:login.php");
}
 ?>
