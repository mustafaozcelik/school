<html>
<head>
<meta charset="utf-8">
<title>Ögrenci Listeleme</title>
</head>
 
<body>

 
<left><p>Ögrenci Listesi</p></left>

<table width="259" border="1" align="left">
<thead>
<tr>
    <td>Id</td>
    <td>Ad</td>
    <td>Soyad</td>
    <td>TcNo</td>
    <td>Username</td>
    <td></td>
</tr> 
</thead>
<tbody>
    <?php
     
        include("../repository/studentRepository.php"); //öğrenci ile ilgili veritabanın sorgularını koyduğumuz dosya
     
          //Tüm ögrencilerin listesini çekiyoruz
          $result=getAllStudents();  
         
          if($result->num_rows >0)
          {
        
          $rows=$result->fetch_all(MYSQLI_ASSOC);
           //var_dump($rows);
           foreach($rows as $row){
               echo "<tr>";
               echo "<td>".$row["id"]."</td>";
               echo "<td>".$row["name"]."</td>";
               echo "<td>".$row["surname"]."</td>";
               echo "<td>".$row["tcno"]."</td>";
               echo "<td>".$row["username"]."</td>";
               

               echo "<td><a href='deletestudent.php?studentid=".$row["id"]."'> sil  </a>";
               echo "<td><a href='updatestudent.php?studentid=".$row["id"]."'> güncelle  </a>";

               echo "</tr>";
           }

         }else
         {
             echo "Kayıt Bulunamdı.";
         }
    ?>
</tbody>
</table>

<a href="student.php"> Yeni Öğrenci Ekle </a>


</body>
</html>