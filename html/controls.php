<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Perez & Phillips</title>
    <link rel="stylesheet" href="resources/semantic.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <?php include 'scripts/checkWifi.php';?>
    <?php include 'scripts/changeStereo.php';?>
  </head>
  <body>
    <div class="ui menu">
      <a class="item" href="/">Perez&Phillips</a>
      <a class="item" href="/cello.php">Speaker Setup</a>
      <a class="item" href="/wifi.php">Wifi Setup</a>
      <a class="item active" href="/controls.php">Controls</a>
    </div>
    <div class="ui container">
      <h2 class="ui left aligned icon header">
      <?php $wifi= checkWiFi();
        if ($wifi) {  ?>
          Wifi: <?php echo($wifi); ?>
          <?php } else { ?>
          <i class="settings icon"></i>
          <div class="content">
            Wifi Settings Missing
            <div class="sub header">Setup WIFI</div>
          </div>
        </h2>
        <?php } ?>
          </div>
        <?php $isMono = getStereoStatus(); ?>
        <div class="ui container">
            <h2 class="ui left aligned header">Stereo/Mono:
            <?php if ($isMono) {  ?>
              Mono
                <button  onclick="changetoStereo('true');return false;"  class="ui button green">Pasar a Stereo</button>
              </h2>
            <?php } else { ?>
              Stereo
                <button  onclick="changetoStereo('false');return false;"  class="ui button green">Pasar a Mono</button>
              </h2>
            <?php } ?>
        </div>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.4.0.min.js"
      integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
      crossorigin="anonymous"></script>
    <script src="resources/semantic.js" charset="utf-8"></script>
    <script type="text/javascript">
        function changetoStereo(toStereo) {
          $.ajax({
              url: "/scripts/changeStereo.php",
              type: "POST",
              data: {stereo: toStereo},
          }).done(function(data) {
            console.log(data);
            window.location.reload();  
          });
      }
    </script>
</body>

</html>