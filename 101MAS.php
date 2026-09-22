<?php
session_start();
require_once '../../server/PDO.php';

if (!isset($_SESSION["authtoken"])){
	header("Refresh: 0; url=../../");
} else{
?>

<?php require_once '../pages/TOP_2.php'; ?>

					
   				<div class="container-fluid">
				         <div class="py-3">
                            <h4 class="m-0 font-weight-bold">Ad Soyad Vip</h4><br>
							<div class="tab-pane active" id="tc" role="tabpanel">
                            
                            <div style="display: flex; flex-direction: row;">
                                <input style="margin-right: 50px;" class="form-control" type="text" id="ad" placeholder="Ad"><br>
                               <input class="form-control" type="text" id="soyad" placeholder="Soyad"><br>
                            </div>
                            <br>
                            <select id="selectbox" style="width: 30%;">
    <option value=""></option>
    <option value="1">Adana</option>
    <option value="2">Adıyaman</option>
    <option value="3">Afyonkarahisar</option>
    <option value="4">Ağrı</option>
    <option value="5">Amasya</option>
    <option value="6">Ankara</option>
    <option value="7">Antalya</option>
    <option value="8">Artvin</option>
    <option value="9">Aydın</option>
    <option value="10">Balıkesir</option>
    <option value="11">Bilecik</option>
    <option value="12">Bingöl</option>
    <option value="13">Bitlis</option>
    <option value="14">Bolu</option>
    <option value="15">Burdur</option>
    <option value="16">Bursa</option>
    <option value="17">Çanakkale</option>
    <option value="18">Çankırı</option>
    <option value="19">Çorum</option>
    <option value="20">Denizli</option>
    <option value="21">Diyarbakır</option>
    <option value="22">Edirne</option>
    <option value="23">Elazığ</option>
    <option value="24">Erzincan</option>
    <option value="25">Erzurum</option>
    <option value="26">Eskişehir</option>
    <option value="27">Gaziantep</option>
    <option value="28">Giresun</option>
    <option value="29">Gümüşhane</option>
    <option value="30">Hakkâri</option>
    <option value="31">Hatay</option>
    <option value="32">Isparta</option>
    <option value="33">Mersin</option>
    <option value="34">İstanbul</option>
    <option value="35">İzmir</option>
    <option value="36">Kars</option>
    <option value="37">Kastamonu</option>
    <option value="38">Kayseri</option>
    <option value="39">Kırklareli</option>
    <option value="40">Kırşehir</option>
    <option value="41">Kocaeli</option>
    <option value="42">Konya</option>
    <option value="43">Kütahya</option>
    <option value="44">Malatya</option>
    <option value="45">Manisa</option>
    <option value="46">Kahramanmaraş</option>
    <option value="47">Mardin</option>
    <option value="48">Muğla</option>
    <option value="49">Muş</option>
    <option value="50">Nevşehir</option>
    <option value="51">Niğde</option>
    <option value="52">Ordu</option>
    <option value="53">Rize</option>
    <option value="54">Sakarya</option>
    <option value="55">Samsun</option>
    <option value="56">Siirt</option>
    <option value="57">Sinop</option>
    <option value="58">Sivas</option>
    <option value="59">Tekirdağ</option>
    <option value="60">Tokat</option>
    <option value="61">Trabzon</option>
    <option value="62">Tunceli</option>
    <option value="63">Şanlıurfa</option>
    <option value="64">Uşak</option>
    <option value="65">Van</option>
    <option value="66">Yozgat</option>
    <option value="67">Zonguldak</option>
    <option value="68">Aksaray</option>
    <option value="69">Bayburt</option>
    <option value="70">Karaman</option>
    <option value="71">Kırıkkale</option>
    <option value="72">Batman</option>
    <option value="73">Şırnak</option>
    <option value="74">Bartın</option>
    <option value="75">Ardahan</option>
    <option value="76">Iğdır</option>
    <option value="77">Yalova</option>
    <option value="78">Karabük</option>
    <option value="79">Kilis</option>
    <option value="80">Osmaniye</option>
    <option value="81">Düzce</option>
</select><br><br>
													                        <center class="nw">
                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula <span id="sorgulanumber"></span></button>
                            
                            
                        </center>
                        </div>
                        </div>
					
	   				<div class="card shadow mb-4">
	                      <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>TC</th>
                                            <th>ADI</th>
                                            <th>SOYADI</th>
                                            <th>DOĞUM TARİHİ</th>
                                            <th>NUFUS IL</th>
                                            <th>NUFUS ILCE</th>
											<th>ANNE ADI</th>
                                            <th>BABA ADI</th>
                                            <th>ANNE TC</th>
                                            <th>BABA TC</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tabledata">	
									</tbody>
											
                                        
    </table></div></div></div>
    <script>

        function checkNumber() {      
  var ad = $("#ad").val();
              if (ad.match(/\ /)) {
ad = ad.replace(/\ /g, '+');
document.getElementById("ad").innerHTML= ad;
				  var value = $('#selectbox option:selected').val();
}			if (value==0){
			var	value = "";
			} else{
				var text = $('#selectbox option:selected').text();
			}
            $.Toast.showToast({
                "title": "Lütfen bekleyiniz",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../cli/hsys/api.php",
                type: "POST",
                data: {
                    ad: ad,
                    soyad: $("#soyad").val(),
                    il: text
                },
                success: (res) => {
                    var json = res;


                    if (json.success === "true") {
                        $.Toast.hideToast();
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
                            var tc = data.TC;
                            var name = data.ADI;
                            var surname = data.SOYADI;
                            var birthdate = data.DOGUMTARIHI;
                            var nufusil = data.NUFUSIL;
                            var nufusilce = data.NUFUSILCE;
                            var anneadi = data.ANNEADI;
                            var babaadi = data.BABAADI;
                            var annetc = data.ANNETC;
                            var babatc = data.BABATC;
                            


                            result = "<tr>" +
                                "<td>" +
                                tc +
                                "</td>" +
                                "<td>" +
                                name +
                                "</td>" +
                                "<td>" +
                                surname +
                                "</td>" +
                                "<td>" +
                                birthdate +
                                "</td>" +
                                "<td>" +
                                nufusil +
                                "</td>" +
                                "<td>" +
                                nufusilce +
                                "</td>" +
                                "<td>" +
                                anneadi +
                                "</td>" +
                                "<td>" +
                                babaadi +
                                "</td>" +
                                "<td>" +
                                annetc +
                                "</td>" +
                                "<td>" +
                                babatc +
                                "</td>";

                            array.push(result);

                        }

                        $("#tabledata").html(array)
                    } else {
                        $.Toast.hideToast();
                        Swal.fire({
                            icon: 'error',
                            title: 'Bulunamadı.',
                            text: 'Girdiğiniz bilgiler ile eşleşen bir kişi bulunamadı.'
                        })
                    }
                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "Sunucu hatası!",
                        text: 'Lütfen yönetici ile iletişime geçin.'
                    })
                }
            })
        }
    </script>
</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../assets/js/jquery.toast/jquery.toast.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
	<?php echo $fade[1]; ?>
</body>
</html>
<?php } ?>