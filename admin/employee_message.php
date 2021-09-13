<?php
session_start(); 
if(isset($_SESSION["user_type"]) && ((($_SESSION["user_type"])=="Admin")||($_SESSION["user_type"])=="GM")) {
    
  }
  else {
    header("location:login.php");
  }
  ?>  
<!doctype html>
<html lang="en">
  <head>

  <?php
  include_once '../connection.php';
  include 'head.php';
  ?>

<!-- main begin -->
<!-- Fetch messsage received from customers begin -->
<?php
$sql = "SELECT userId, messageId, date_time, subject, message,Description FROM messages";
$resultset = mysqli_query($conn, $sql);

?>

<!-- messageContent form begin -->
<div id="messageContent" class="container">
  <h1 class="h1">Compose New Message</h1>
<form method="post" action="employee_message_code.php">
  <div class="form-group">
    <label for="recepientId">Recepients user ID :</label>
    <input type="number" name="recepientId" class="form-control" id="subject" placeholder="Enter Recepients ID">
  </div>
  <div class="form-group">
    <label for="subject">Subject</label>
    <input type="subject" name="subject" class="form-control" id="subject" placeholder="Enter subject here">
  </div>
  <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message here"></textarea>
  </div>
  
  <button type="submit" class="btn btn-dark bg-dark">Send Message</button>
</form>
<?php 
  if (isset($_GET['messageSent'])) {
        echo "<span>Message Sent</span>";
   }
    ?>
</div>
</br>
<!-- message form end -->

<!-- Message received from customers -->
<div id="sentContent" class="container">
    <h1 class="h1">Message Received From Customers</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Date</th>
      <th scope="col" class="">User Id</th>
      <th scope="col" class="">Description</th>
      <th scope="col" class="">Subject</th>
      <th scope="col" class="">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $date = $record['date_time'];
    $userId = $record['userId'];
    $Description = $record['Description'];
    $subject = $record['subject'];
    $message = $record['message'];
     ?>
      <th scope="row"><?php echo "$date";?></th>
      <th scope="row"><?php echo "$userId";?></th>
      <td><?php echo "$Description"; ?></td>
      <td><?php echo "$subject"; ?></td>
      <td><?php echo "$message"; ?></td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>
  
<!-- Message received from customers->





<!-- Fetch sent begin -->
<?php
$sql = "SELECT userId, messageId, date_time, subject, message FROM messages";
$resultset = mysqli_query($conn, $sql);

?>


<!-- sent content begin -->
<div id="sentContent" class="container">
    <h1 class="h1">Message Sent to Customers</h1>

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col" class="">Date</th>
      <th scope="col" class="">User Id</th>
      <th scope="col" class="">Subject</th>
      <th scope="col" class="">Message</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($record = mysqli_fetch_assoc($resultset))
{   
    $date = $record['date_time'];
    $userId = $record['userId'];
    $subject = $record['subject'];
    $message = $record['message'];
     ?>
      <th scope="row"><?php echo "$date";?></th>
      <th scope="row"><?php echo "$userId";?></th>
      <td><?php echo "$subject"; ?></td>
      <td><?php echo "$message"; ?></td>
    </tr>
    <?php 
    } ?>
  </tbody>
</table>
</div>
  
<!-- sent content end -->
<!-- main end -->

<?php include 'footer.php'; ?>

