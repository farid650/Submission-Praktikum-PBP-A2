<?php include('header.html') ?>
<br>
<div class="card">
    <div class="card-header">Show Customers Data</div>
    <div class="card-body">
        <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
            <option value="">--Select a Customer--</option>
            <?php
                include "db_login.php";
                $query = " SELECT * FROM customers ORDER BY customerid ";
                $result = $db->query( $query );
                if (!$result){
                    die ("Could not query the database: <br />". $db->error);
                }
                while ($row = $result->fetch_object()){
                    echo '<option value="'.$row->customerid.'">'.$row->name.'</option>';
                }
                $result->free();
                $db->close();
            ?>
        </select>
        <br>
        <div id="detail_customer"></div>
    </div>
</div>
<?php include('footer.html') ?>
<script src="ajax.js"></script>

