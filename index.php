<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calculate Shipping Cost</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Calculate Shipping Cost</h2>
  <form id="calculate_form" method="POST" action="calculateShipping.php">
    <div class="form-group">
      <label for="origin_zip_code">Origin Zip Code:</label>
      <input type="text" class="form-control" name="origin_zip_code" id="origin_zip_code" placeholder="Origin Zip Code"  data-validation-length="9-9" >
    </div>
    <div class="form-group">
      <label for="destination_zip_code">Destination Zip Code:</label>
      <input type="text" class="form-control" name="destination_zip_code" id="destination_zip_code" placeholder="Destination Zip Code" data-validation-length="9-9">
    </div>
    <div class="form-group">
      <label for="weight">Weight:</label>
      <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight">
    </div>
    <div class="form-group">
      <label for="width">Width:</label>
      <input type="text" class="form-control" name="width" id="width" placeholder="Width">
    </div>
    <div class="form-group">
      <label for="height">Height:</label>
      <input type="text" class="form-control" name="height" id="height" placeholder="height">
    </div>
    <div class="form-group">
      <label for="length">Email:</label>
      <input type="text" class="form-control" name="length" id="length" placeholder="Length">
    </div>
    <button type="submit" id="submit" class="btn btn-primary">Calculate</button>
  </form>
</div>

</body>
<script>
$.validate();
</script>
</html>
