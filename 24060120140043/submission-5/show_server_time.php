<?php include('header.html'); ?><br>
    <div class="container">
    <div class="card">
        <div class="card-header">Ajax Server Time</div>
        <div class="card-body">
            <button class="btn btn-success" onclick="get_server_time()">Show Server Time</button>
            <br><br>
        <div id="showtime"></div>
        </div>
    </div>
    </div>
    <?php include('footer.html') ?>
<script src="ajax.js"></script>

