<?php
session_start();
require_once '../../server/PDO.php';

if (!isset($_SESSION["authtoken"])){
	header("Refresh: 0; url=../../");
} else{
?>

<?php require_once '../pages/TOP_2.php'; 


$errors = array();

try {
  $req = new CURLRequest('http://www.dns-lg.com/nodes.json');
  $nodes_raw = $req->get();
  $nodes = json_decode($nodes_raw);
  $nodes = $nodes->nodes;
  $nodes_json = json_encode($nodes);
} catch(CURLRequestException $e) {
  $errors[] = '<strong>Oh noes!</strong> ' . $e->getCode() . ': ' . $e->__toString();
}

?>


<!DOCTYPE html>
<html lang="en">

   <div class="overlay">
    </div>
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
			  
                                            
								    

<h4 class="fs-base lh-base fw-medium text-muted mb-0">
DeDCheck DNS Checker
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
DNS Checker, işlemi birçok aşama için önemlidir. Bizleri <b>Subdomain'ler, Ns Adresleri, İp adresleri</b> gibi bir çok bilgiye ulaştırabilir.
</h2>
</div>
</div>
</div>

  

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
								<div class="bg-body-light">

				
				                              <div class="card">
                                        <div class="card-body">
                                            





<div class="panel panel-default">
      
        <div class="panel-body">
          <iframe name="autocomplete_host" id="autocomplete-host" src=""></iframe>
          <form autocomplete="on" target="autocomplete_host">

            <div class="form-group">
              <label for="domain">Domain</label>
              <div class="input-group">
                <span class="input-group-addon">http://</span>
                <input type="text" class="form-control" id="domain" name="domain" required>
              </div>
            </div><!-- /form-group -->

            <div class="form-group">
              <label for="record-type">Kayıt tipi</label><br>
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-sm btn-default active">
                  <input type="radio" name="recordType" value="a" checked>A
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="cname">CNAME
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="mx">MX
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="ns">NS
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="spf">SPF
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="txt">TXT
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="domain">Beklenen değer</label> <small>İsteğe Bağlı</small>
              <input type="text" class="form-control" id="expected" name="expected">
            </div><!-- /form-group -->
			
			<br>

				                                <center>
							    				<button type="submit" id="go" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;" data-loading-text="Sorgulanıyor..."><i class="fas fa-search"></i> Sorgula</button></form>
							    				<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="dnschecker.php" class="text-white"> Sıfırla </a></button>
                                                <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
							    				</center>
<br>

 


        <div class="progress">
          <div class="progress-bar progress-bar-success" style="width: 0%">
            0%
          </div>
          <div class="progress-bar progress-bar-danger" style="width: 0%">
            0%
          </div>
          <div class="progress-bar progress-bar-warning" style="width: 0%">
            0%
          </div>
        </div>
		
		
		
            <div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
          <th scope="col">Server</th>
          <th scope="col">Result</th>
          <th scope="col">TTL</th>
        </thead>
                            <tr>
                  
<tbody>
        
      </table>

    </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  
  
  
</div>
</div>
</div>
</div>
</div>
</div>


</div>

</main>
		
		 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../assets/js/jquery.toast/jquery.toast.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
	<?php echo $fade[1]; ?>
</body>
</html>
<?php } ?>

          		          		