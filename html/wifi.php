<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Perez & Phillips</title>
    <script
      src="https://code.jquery.com/jquery-3.4.0.min.js"
      integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="resources/semantic.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php include 'scripts/scanWiFi.php';?>
  </head>
  <body>
    <div class="ui menu">
      <a class="item" href="/">Perez&Phillips</a>
      <a class="item" href="/cello.php">Speaker Setup</a>
      <a class="item active" href="/wifi.php">Wifi Setup</a>
      <a class="item" href="/controls.php">Controls</a>
    </div>
    <div class="ui container">
      <div class="ui segment">
        <h2 class="ui center aligned header teal">Wifi Setup</h2>

        <div class="ui form">
        <form id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

          <div class="two fields">
            <div class="field">
              <label>SSID</label>
              <select name="ssid"  class="ui fluid dropdown">
                <option value="">Pick a Wifi Network</option>
                <?php $wifi=scanWiFi();
                  for($i=0;$i<count($wifi);$i++){
                      echo ('<option value="'.$wifi[$i].'">'.$wifi[$i].'</option>');
                  }
              ?>
              </select>
            </div>
            <div class="field">
              <label>Password</label>
              <input name="password" placeholder="Wifi password" type="password" />
            </div>
          </div>
          
          <button onclick="confirm();return false;"  class="ui submit button">Submit</button>
        </div>
        </form>
      </div>
    </div>
    <script src="resources/semantic.js" charset="utf-8"></script>
    <script type="text/javascript">
function reboot() {
    console.log("ADFasdfasdf");
}

function confirm() {
    var dataToSent = $('#myform').serializeArray();
    $.ajax({
        url: "/scripts/settings.php",
        type: "POST",
        data: $.param(dataToSent),
        //processData: false,  // tell jQuery not to process the data
        //contentType: false   // tell jQuery not to set contentType
    }).done(function(data) {
        console.log(data);
    });
}
</script>  
</body>
</html>