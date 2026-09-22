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
                            <h4 class="m-0 font-weight-bold">Sülale Sorgu</h4><br>
							<div class="tab-pane active" id="tc" role="tabpanel">
                            
                            <div style="display: flex; flex-direction: row;">
                                <input style="margin-right: 50px;" class="form-control" type="text" id="TC" placeholder="TC"><br>
                                
                            </div>
                            <br>
                            
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
											<th>YAKINLIK</th>
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

            $.Toast.showToast({
                "title": "Lütfen bekleyiniz",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../cli/sulale/api.php",
                type: "POST",
                data: {
                    tc: $("#TC").val()
                },
                success: (res) => {
                    var json = res;


                    if (json.success === "true") {
                        $.Toast.hideToast();
                        document.getElementById("sorgulanumber").innerHTML = "(" + json.number + ")";

                        var array = [];

                        for (var i = 0; i < json.number; i++) {
                            var data = json.data[i];
							var yakin = data.YAKINLIK;
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
		                       "<th>" +
                                yakin +
                                "</th>" +
                                "<th>" +
                                tc +
                                "</th>" +
                                "<th>" +
                                name +
                                "</th>" +
                                "<th>" +
                                surname +
                                "</th>" +
                                "<th>" +
                                birthdate +
                                "</th>" +
                                "<th>" +
                                nufusil +
                                "</th>" +
                                "<th>" +
                                nufusilce +
                                "</th>" +
                                "<th>" +
                                anneadi +
                                "</th>" +
                                "<th>" +
                                babaadi +
                                "</th>" +
                                "<th>" +
                                annetc +
                                "</th>" +
                                "<th>" +
                                babatc +
                                "</th>";

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
	<?php echo $fade[1]; ?>
</body>
</html>
<?php } ?>