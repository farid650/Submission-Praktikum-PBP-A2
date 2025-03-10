<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
                <div class="card mt-4">
                    <div class="card-header">Customers Data</div>
                    <div class="card-body">
                        <br>
                        <a class="btn btn-primary" href="#">+ Add Customer Data</a><br /><br />
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            // include our login information
                            session_start(); //inisialisasi session saat ini berdasarkan pengidentifikasi sesi yang diteruskan melalui permintaan GET atau POST
                            require_once('db_login.php'); // memanggil halaman
                            
                            // if(!isset($_SESSION['username'])){
                            //     header('Location: add_customer.php');
                            // }

                            // execute the query
                            $query = " SELECT * FROM customers ORDER BY customerid "; //Klausa ORDER BY digunakan untuk mengurutkan hasil-set dalam urutan menaik atau menurun
                            $result = $db->query($query);
                            if (!$result){
                                die ("Could not the query the database: <br />" . $db->error ."<br>Query: " . $query);
                            }

                            // fetch and display the results
                            $i = 1;
                            while ($row = $result->fetch_object()){ // fetch_object-> fungsi mengembalikan baris saat ini dari kumpulan hasil, sebagai objek atau keluaran.
                                echo '<tr>';
                                // Nama (.$row->name.), (.$row->address.), (.$row->city.) harus sesuai dengan nama di database
                                echo '<td>' .$i. '</td>';
                                echo '<td>' .$row->name. '</td>';
                                echo '<td>' .$row->address. '</td>';
                                echo '<td>' .$row->city. '</td>';
                                echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->customerid.'">Edit</a>&nbsp;&nbsp;
                                        <a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->customerid.'">Delete</a>
                                        </td>';
                                echo '</tr>';
                                $i++;
                            }
                            echo '</table>';
                            echo '<br />';
                            echo 'Total Rows = ' .$result->num_rows;
                            $result->free();
                            $db->close();
                            ?>
                            <br><br>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>