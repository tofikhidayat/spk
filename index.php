<?php
   require "./core.php";
   require "./tempData.php";
   
   $order = new CompareMajors($majorsData, $studentsData);
   
   $result = $order->exec();
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>SPK Master</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body>
      <div class='container mt-5'>
         <h3>Di terima:</h3>
         <?php foreach ($result->accepted as $key => $jurusan): ?>
         <div class='w-100'>
            <h4 class='text-primary mt-5'>Jurusan : <?= $key ?></h4>
            <div class='table-responsive'>
               <table class='table table-striped table-bordered'>
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Raport</th>
                        <th>Academic</th>
                        <th>Score</th>
                        <th>Pilihan 1</th>
                        <th>Pilihan 2</th>
                     </tr>
                  </thead>
                  <tbody>
                  <tbody>
                     <?php foreach ($jurusan as $index => $user): ?>
                     <tr>
                        <td><?= ++$index ?> </td>
                        <td><?= $user->id ?> </td>
                        <td><?= $user->name ?> </td>
                        <td><?= $user->raport ?> </td>
                        <td><?= $user->academic ?> </td>
                        <td><?= $user->score ?> </td>
                        <td><?= $user->option_1 ?> </td>
                        <td><?= $user->option_2 ?> </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  </tbody>
               </table>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
      <!-- di tolak -->
      <div class='container mt-5'>
         <h3>Di Tolak</h3>
         <div class='w-100'>
            <div class='table-responsive'>
               <table class='table table-striped table-bordered'>
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Raport</th>
                        <th>Academic</th>
                        <th>Score</th>
                        <th>Pilihan 1</th>
                        <th>Pilihan 2</th>
                     </tr>
                  </thead>
                  <tbody>
                  <tbody>
                     <?php foreach ($result->denied as $index => $user): ?>
                     <tr>
                        <td><?= ++$index ?> </td>
                        <td><?= $user->id ?> </td>
                        <td><?= $user->name ?> </td>
                        <td><?= $user->raport ?> </td>
                        <td><?= $user->academic ?> </td>
                        <td><?= $user->score ?> </td>
                        <td><?= $user->option_1 ?> </td>
                        <td><?= $user->option_2 ?> </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>