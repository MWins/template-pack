<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title></title>

<script type="text/javascript">
var makes = new Array("BMW", "Ford");
var models = new Array();
models["BMW"] = new Array("318", "525", "650", "X5");
models["Ford"] = new Array("Bronco", "Explorer", "Focus");

function resetForm(theForm) {
  /* reset makes */
  theForm.makes.options[0] = new Option("Please select a make", "");
  for (var i=0; i<makes.length; i++) {
    theForm.makes.options[i+1] = new Option(makes[i], makes[i]);
  }
  theForm.makes.options[0].selected = true;
  /* reset models */
  theForm.models.options[0] = new Option("Please select a model", "");
  theForm.models.options[0].selected = true;
}

function updateModels(theForm) {
  var make = theForm.makes.options[theForm.makes.options.selectedIndex].value;
  var newModels = models[make];
  theForm.models.options.length = 0;
  theForm.models.options[0] = new Option("Please select a model", "");
  for (var i=0; i<newModels.length; i++) {
    theForm.models.options[i+1] = new Option(newModels[i], newModels[i]);
  }
  theForm.models.options[0].selected = true;
}

</script>

</head>
<body>

<form name="autoSelectForm" action="" method="post">
<select size="1" name="makes" onchange="updateModels(this.form)">
</select>
<select size="1" name="models">
</select>
<input type="submit">
</form>
<script type="text/javascript">
  resetForm(document.autoSelectForm);
</script>

<?php
if(isset($_POST['makes']) )
{
  $make = $_POST['makes'];
  $model = $_POST['models'];
  if ($make && $model) {
    echo "<p>".$make." - ".$model."</p>";
  }
 }
?>

</body>
</html>