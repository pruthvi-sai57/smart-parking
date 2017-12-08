<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="jquery-ui.css">

  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>

<script>
function test(){
var popupTemplate =
  '<div class="modal fade">' +
  '  <div class="modal-dialog">' +
  '    <div class="modal-content">' +
  '      <div class="modal-header">' +
  '        <button type="button" class="close" data-dismiss="modal">&times;</button>' +
  '        <h4 class="modal-title">Success</h4>' +
  '      </div>' +
  '      <div class="modal-body" >' + '<h4> Password Changed Succesfully </h4> <h4> Redirecting back to login page in few seconds</h4>' + '</div>' +
  '      <div class="modal-footer">' +
  '      </div>' +
  '    </div>' +
  '  </div>' +
  '</div>';

$(popupTemplate).modal();
}

window.onload=test;
</script>
</head>

<body>

</body>

</html>