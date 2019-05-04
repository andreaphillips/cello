<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Perez & Phillips</title>
    <link rel="stylesheet" href="resources/semantic.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
    <?php include 'scripts/checkWifi.php';?>
    <?php include 'scripts/changeName.php';?>
  </head>
  <body>
    <div class="ui menu">
      <a class="item" href="/">Perez&Phillips</a>
      <a class="item active" href="/cello.php">Speaker Setup</a>
      <a class="item" href="/wifi.php">Wifi Setup</a>
      <a class="item" href="/controls.php">Controls</a>
    </div>
    <div class="ui container">

    <h2 class="ui center aligned header teal">Cello Setup</h2>

        <div class="ui form">
        <form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="two fields">
            <div class="field">
              <label>New Name</label>
              <input name="name" placeholder="New Speaker Name" type="text" />
            </div>
          </div>
          
          <button onclick="confirm();return false;"  class="ui submit button">Submit</button>
        </div>
        </form>
      </div>


    <!-- <script src="resources/semantic.js" charset="utf-8"></script> -->
<script type="text/javascript">
  function confirm() {
    var dataToSent = $('#myform').serializeArray();
    $.ajax({
        url: "/scripts/changeName.php",
        type: "POST",
        data: $.param(dataToSent),
    }).done(function(data) {
      console.log(data);
      var res = JSON.parse(data);
      if(res.success){
        window.location.href = "http://"+res.name+".local"
      }
    });
}
    </script>
</body>

</html>