<!DOCTYPE html>
<html>
<head>
	<title>Belajar JS</title>
	<style type="text/css">
		body {padding: 20px;}
input {margin-bottom: 5px; padding: 2px 3px; width: 209px;}
td {padding: 4px; border: 1px #CCC solid; width: 100px;}
	</style>
	
	
</head>
<body>

<h1>Dumetschool</h1>

<input type="text" id="search" placeholder="Type to search"><!-- id search berfungsi untuk inputan yang akan di proses oleh 
javascript-->

<table id="table"><!--table berfungsi sebagai penampung nilai yang akan kita cari -->
   <tr>
      <td>Apple</td>
      <td>Green</td>
   </tr>
   <tr>
      <td>Grapes</td>
      <td>Green</td>
   </tr>
   <tr>
      <td>Orange</td>
      <td>Orange</td>
   </tr>
</table>
<!-- <script src="./assets/plugins/jquery/jquery.min.js"></script> -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.js"></script>
<!-- link jquery -->
<script>
	var $rows = $('#table tr');
   // berfungsi untuk menampung nilai yang berda di dalam tabel

$('#search').keyup(function()
// proses pengolahan nilai inputan
 {
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
});
</script>
</body>
</html>