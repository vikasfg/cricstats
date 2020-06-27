<!DOCTYPE html>
<html lang="en">
<head>
  <title>धन दना दन</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://i10.dainikbhaskar.com/dainikbhaskar2010/img-web/bhaskar-new/game-account/bootstrap.min.css?v4">
  <script src="https://i10.dainikbhaskar.com/dainikbhaskar2010/img-web/bhaskar-new/game-account/jquery.min.js"></script>
  <script src="https://i10.dainikbhaskar.com/dainikbhaskar2010/img-web/bhaskar-new/game-account/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
  
  <div class="alert alert-danger" style="margin-top: 10px;">
    <p style="text-align: center; font-size: 6vw;"><strong>Alerts!</strong></p>
    <p style="font-size: 6vw; text-align: center; color: green;">Database Connectivity Error !</p>
    <p style="text-align: center;">धन दना दन शीघ्र ही उपलब्ध होगा। कृपया कुछ समय बाद पुनः प्रयत्न करें। </p>
  </div>
  <div class="" style="text-align: center;"><a href="<?php echo url(); ?>" class="alert alert-info" style="padding: 4px 10px 4px 10px">GO HOME</button></div>
</div>

<script type="text/javascript">
      function logEvent(linkType) {

      var name = 'closeWebView';
        var params = {
          'linkType': linkType,
          'opentype' : linkType,
          'scanQrCode' : "",
          'color' : "#f99d1c"
        };
      console.log(params);
      if (window.DBAnalyticsWebInterface) {
        // Call Android interface
        window.DBAnalyticsWebInterface.performAction(name, JSON.stringify(params));
      } else if (window.webkit
          && window.webkit.messageHandlers
          && window.webkit.messageHandlers.firebase) {
        // Call iOS interface
        var message = {
          command: 'performAction',
          name: name,
          parameters: params
        };
        window.webkit.messageHandlers.firebase.postMessage(message);
      } else {
        // No Android or iOS interface found
        //postScanResult("8077");
        console.log("No native APIs found.");
      }
      //CommonSentCTEvent('TambolaEvents', 'ScanQR');
    }
  </script>
</body>
</html>
