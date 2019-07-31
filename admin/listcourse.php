<html>
<head>
<meta charset="utf-8">
<title>Kurs Listeleme</title>
</head>
 
<body>

 
<left><p>Kurs Listesi</p></left>

<table width="259" border="1" align="left">
<thead>
<tr>
    <td>Id</td>
    <td>kredi</td>
    <td>name</td>
    <td>code</td>
    </td>
</tr> 
</thead>
<tbody>
    <?php
     
     include("../repository/courseRepository.php"); //veritabanını ekliyoruz
     
     //Tüm ögrencilerin listesini çekiyoruz
         $result=getAllCourses();
         
         if($result->num_rows >0)
         {
        
          $rows=$result->fetch_all(MYSQLI_ASSOC);
           //var_dump($rows);
           foreach($rows as $row){
               echo "<tr>";
               echo "<td>".$row["id"]."</td>";

               echo "<td>".$row["kredi"]."</td>";
               echo "<td>".$row["name"]."</td>";
               echo "<td>".$row["code"]."</td>";
               
               echo "<td><a href='deletecourse.php?courseid=".$row["id"]."'>Sil </a>";
               echo "<td><a href='updatecourse.php?courseid=".$row["id"]."'>Güncelle </a>";
               echo "</tr>";
           }

         }else
         {
             echo "Kayıt Bulunamadı.";
         }
    ?>
</tbody>
</table>


<a href="course.php"> Yeni Kurs Ekle </a>

</body>
</html>