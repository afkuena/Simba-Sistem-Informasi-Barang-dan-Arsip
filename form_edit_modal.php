<!-- Modal -->
<div class="modal fade" id="id<?php echo $id=$row['masuk'];  ?>" role="dialog">
          <?php 
            // $koneksi = mysqli_connect('localhost','root','','test'); 
              $q_modal   = "SELECT * FROM stock WHERE idbarang = $idb";
              $q_modal2  = mysqli_query($koneksi, $q_modal);
              $row2       = mysqli_fetch_array($q_modal2);
               
          ?>
 
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo $row2["firstname"]; ?></h4>
        </div>
        <div class="modal-body">
          <img src="<?php echo $row2['picture']; ?>" width='50%' height='50%'><br>
          id  = <?php echo $row2["idbarang"]; ?><br>
          nama depan = <?php echo $row2["firstname"]; ?><br>
          nama belakang = <?php echo $row2["lastname"]; ?><br>
          alamat = <?php echo $row2["address"]; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
       
    </div>
  </div>
   
</div>