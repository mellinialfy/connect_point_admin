<?php 
$title = 'Instansi';
?>




<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-building"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Instansi
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="#form_tambah_data" id="btn_tambah_data" class="btn btn-brand btn-elevate btn-icon-sm" onclick="showInstansi(<?php $row['requested_instansi']?>)">
                        <i class="la la-plus"></i>
                        Tambah Data
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
                <tr>
                    <th width="200px">ID Instansi</th>
                    <th>Instansi</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                
                $sql="SELECT id_instansi, instansi FROM `tb_instansi` WHERE status_instansi=0";
                $result=mysqli_query($connect,$sql);
                
                while($row=mysqli_fetch_assoc($result)){
                    
                    echo '
                    <tr>
                    <td>'.$row['id_instansi'].'</td>
                    <td>'.$row['instansi'].'</td>
                    <td nowrap>
                        <a href="#form_edit_data" onclick="showEditInstansi(\''.$row['id_instansi'].'\',\''.$row['instansi'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Edit">
                            <i class="la la-edit"></i> 
                        </a> 
                        <a href="" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_instansi.php?id='.$row['id_instansi'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Hapus">
                            <i class="la la-trash"></i>
                        </a>
                    </td>
                    </tr>';
                    
                }
                mysqli_free_result($sql);
                mysqli_close($connect);
                ?>
                
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>

<div class="kt-portlet" id="tambah_instansi" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Tambah Instansi
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_tambah_data" name="form_tambah_data" action="halaman/insert_instansi.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
            
                <label for="example-text-input" class="col-2 col-form-label">Instansi</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="id_requested_instansi" name="id_requested_instansi">
                </div>
                <div class="col-10">
                    <input class="form-control" type="text" id="instansi" name="instansi" required="text">
                    
                </div>
            </div>
        </div>
        
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="button" id="submitBtn" name="submitBtn" data-toggle="modal" data-target="#modal_submit" class="btn btn-success">Simpan</button>
                        <button type="reset" onclick="hideInstansi(this)" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="kt-portlet" id="edit_instansi" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Edit Instansi
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_edit_data" name="form_edit_data" action="halaman/update_instansi.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form_edit">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
            
                <label for="example-text-input" class="col-2 col-form-label">Instansi</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="edit_id_instansi" name="id_instansi" required="text" readonly>
                </div>
                <div class="col-8">
                    <input class="form-control" type="text" id="edit_instansi_admin" name="instansi" required="text">
                </div>
            </div>
        </div>
        
        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="button" id="submitBtnEdit" name="submitBtnEdit" data-toggle="modal" data-target="#modal_submit_edit" class="btn btn-success">Simpan</button>
                        <button type="reset" onclick="hideEditInstansi(this)" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-building"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Permintaan Instansi
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Permintaan Instansi</th>
                    <th>Instansi Sekarang</th>
                    <th>Diminta oleh</th>
                    <th>Tanggal Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                
                $sql="SELECT tb_requested_instansi.id_requested_instansi, tb_requested_instansi.requested_instansi, tb_instansi.instansi, tb_requested_instansi.id_user, tb_user.username, DATE_FORMAT(tb_requested_instansi.created_at, '%d/%m/%Y') AS created_at, tb_requested_instansi.status_requested FROM `tb_requested_instansi`, tb_user, tb_instansi WHERE tb_requested_instansi.id_user = tb_user.id_user AND tb_user.id_instansi=tb_instansi.id_instansi ORDER BY tb_requested_instansi.status_requested";
                $result=mysqli_query($connect,$sql);
                $no = 1;
                while($row=mysqli_fetch_assoc($result)){
                    
                    echo '
                    <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['requested_instansi'].'</td>
                    <td>'.$row['instansi'].'</td>
                    <td><a href="" type="button" data-toggle="modal" data-target="#modal_change_instansi" onclick=setId(\''.$row['id_user'].'\')>'.$row['username'].'</a></td>
                    <td>'.$row['created_at'].'</td>
                    <td nowrap>
                        '. ($row['status_requested'] == '1' ? '
                        <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Sudah ditambahkan</span>' :
                            ($row['status_requested'] == '2' ? '
                            <span class="kt-badge  kt-badge--dark kt-badge--inline kt-badge--pill">Dihapus</span>' :
                            ($row['status_requested'] == '0' ? '
                            <a href="#form_tambah_data" onclick="showInstansi(\''.$row['id_requested_instansi'].'\',\''.$row['requested_instansi'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Tambah">
                            <i class="la la-plus-circle"></i> 
                            </a> 
                            <a href="" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_instansi_lainnya.php?id='.$row['id_requested_instansi'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Hapus">
                            <i class="la la-trash"></i>
                            </a>' : 
                            ''))).'
                    </td>
                    </tr>';
                    $no++;
                }
                mysqli_free_result($sql);
                mysqli_close($connect);
                ?>
                
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menyimpan data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit" onclick="confirmSubmitTambah(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_submit_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin mengubah data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit_edit" onclick="confirmSubmitEdit(this)">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_submit_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirm_submit_delete">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!--begin::Modal-->
<div class="modal fade" id="modal_change_instansi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Instansi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
			    
				<form id="form_reason" name="form_reason" action="halaman/update_instansi_lainnya.php" method="POST">
				    <div class="alert alert-outline-danger d-none" role="alert" id="alert_form_reason">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				        Data tidak boleh kosong
				    </div>
					<div class="form-group">
					    <div class="form-group">
					        <!--<label for="message-text" class="form-control-label">Ubah instansi menjadi:</label>-->
					        <!--<input type="text" name="kategori" id="kategori" value=""/>-->
							<label for="exampleSelect1">Instansi</label>
							<select class="custom-select form-control" id="exampleSelect1" name="exampleSelect1">
							    <option value="">Pilih Instansi</option>
							    <?php
							    include "connection.php";
                
                                $sql="SELECT id_instansi, instansi FROM `tb_instansi` WHERE status_instansi=0";
                                $result=mysqli_query($connect,$sql);
                                // $selected = mysqli_query($connect,"SELECT tb_user.id_instansi, tb_instansi.instansi FROM tb_user, tb_instansi WHERE tb_user.id_instansi=tb_instansi.id_instansi AND id_user = $id_user");
                                
                                while($row=mysqli_fetch_assoc($result)){
                                    
                                    echo '<option value="'.$row['id_instansi'].'">'.$row['instansi'].'</option>';
                                
                                }
                                mysqli_free_result($sql);
                                mysqli_close($connect);
                                
							    ?>
							</select>
						</div>
						<input type="hidden" name="id_user" id="id_user" />
						<input type="hidden" name="verified_by" value="<?php echo $_SESSION['id_admin']; ?>" />
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" onclick="confirmSubmitChange(this)">Simpan</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
function showInstansi(id_requested_instansi, requested_instansi){
	document.getElementById('tambah_instansi').style.display = "block";
	if(requested_instansi!=undefined && id_requested_instansi!=undefined) {
	    document.getElementById("instansi").value = requested_instansi;
	    document.getElementById("id_requested_instansi").value = id_requested_instansi;
	    
	}
	
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
}

function hideInstansi(select){
	document.getElementById('tambah_instansi').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}

function showEditInstansi(id_instansi, instansi){
	document.getElementById('edit_instansi').style.display = "block";
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
    $("#edit_instansi_admin").val(instansi);
    $("#edit_id_instansi").val(id_instansi);
    
    
}

function hideEditInstansi(select){
	document.getElementById('edit_instansi').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}

function confirmSubmitTambah(select){
    
    if($('#instansi').val() == "" || null) {
        
        $('#modal_submit').modal('hide');
        $('#alert_form').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form').addClass('d-none');
            
        }, 2000);
    } else{
        $('#form_tambah_data').submit();
    }    
}

function confirmSubmitEdit(select){
    
    if($('#edit_instansi_admin').val() == "" || null) {
        
        $('#modal_submit_edit').modal('hide');
        $('#alert_form_edit').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_edit').addClass('d-none');
            
        }, 2000);
    } else{
        $('#form_edit_data').submit();
    }    
}

function confirmSubmitDelete(delete_url){
    
    document.getElementById('modal_submit_delete').style.display = "block";

    document.getElementById('confirm_submit_delete').onclick = function() {
        window.open(delete_url,"_self")
        
    };
    
}

function setId(id_user){
    document.getElementById("id_user").value = id_user;
}

function confirmSubmitChange(select){
    
    if($('#exampleSelect1').val() == "" || null) {
        
        // $('#modal_reason').modal('hide');
        $('#alert_form_reason').removeClass('d-none');
        setTimeout(() => {
            $('#alert_form_reason').addClass('d-none');
            
        }, 2000);
    } else{
        $('#form_reason').submit();
    }    
}



</script>