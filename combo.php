<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cara Membuat Multiple Combo Box Dengan jQuery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <h1>Multiple Combo Box (Dumet School)</h1>
  <form>
    <div class="form-group">
      <label for="sel1">Pilih Kelas:</label>
      <select class="form-control" id="combo1">
        <option value="pilih">Pilih</option>
        <option value="kelas10">Kelas X</option>
        <option value="kelas11">Kelas XI</option>
        <option value="kelas12">Kelas XII</option>
      </select>
      <br>
      <label for="sel2">Pilih Kejuruan:</label>
      <select class="form-control" id="combo2">
        <option value="pilih">Pilih</option>
        <option value="ak">Accounting (AK)</option>
        <option value="ap">Administrasi Perkantoran (AP)</option>
        <option value="pj">Penjualan (PJ)</option>
      </select>
    </div>
  </form>
</div>

</body>
<script>
$(document).ready(function(){ 
  $("select[id=combo1]").on("change", function() { 
    if ($(this).val() === "pilih") {
       $('select[id=combo2]').prop('selectedIndex',0);
      $("select[id=combo2]").prop("disabled", true); 
    } else { 
      $("select[id=combo2]").prop("disabled", false);
    } 
  }); 
  $("select[id=combo1]").trigger("change"); });
</script>
</html>