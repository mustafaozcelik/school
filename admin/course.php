<html>
<head>
<meta charset="utf-8">
<title>Ders Kayıt</title>
</head>
 
<body>
<left><p>Ders Kaydet</p></left>
<form id="form1" name="form1" method="post">
<table width="259" border="0" align="left"
<tbody>
<tr>
<td width="96">name</td>
<td width="153"><input type="text" name="name" id="name"></td>
</tr>
<tr>
<td>code</td>
<td><input type="text" name="code" id="code" id="code"></td>
</tr>
<tr>
<td>kredi</td>
<td><input type="text" name="kredi" id="kredi" id="kredi"></td>
</tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" id="submit" value="KAYDET"></td>
</tr>
</tbody>
</table>
</form>

<a href="listcourse.php">Kayıtlı Dersleri Listele </a>

</body>
</html>
<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
//reguest type sadece post oldugunda çalışmasını saglıyoruz çünkü kaydet butonuna basıldıgında post istegi gonderilir
if($requestMethod=='POST'){
    session_start();
    include("../repository/courseRepository.php"); //veritabanını ekliyoruz
    
    // ögrenci kayıt formundan gelen degişkenleri okuyoruz

 
    $code=$_POST['code'];
    $name=$_POST['name'];
    $kredi=$_POST['kredi'];
    addCourse($name,$code,$kredi);
    header("location: listcourse.php");



}
?>
