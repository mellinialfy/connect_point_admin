<?php 
$title = 'Kategori Tenant';

?>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand fa fa-mortar-pestle"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Kategori Tenant
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    &nbsp;
                    <a href="#form_tambah_data" id="btn_tambah_data" class="btn btn-brand btn-elevate btn-icon-sm" onclick="showKategori(<?php $row['req_kat_tenant']?>)">
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
                    <th width="200px">ID Kategori Tenant</th>
                    <th>Kategori Tenant</th>
                    <th width="100px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                
                $sql="SELECT id_kategori_tenant, kategori_tenant FROM `tb_kategori_tenant` WHERE status_kat_tenant=0";
                $result=mysqli_query($connect,$sql);
                
                while($row=mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                    <td>'.$row['id_kategori_tenant'].'</td>
                    <td>'.$row['kategori_tenant'].'</td>
                    <td nowrap>
                        <a href="#form_edit_data" onclick="showEditKategori(\''.$row['id_kategori_tenant'].'\',\''.$row['kategori_tenant'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Edit">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_kategori_tenant.php?id='.$row['id_kategori_tenant'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Hapus">
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

<div class="kt-portlet" id="tambah_kategori" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Tambah Kategori
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_tambah_data" name="form_tambah_data" action="halaman/insert_kategori_tenant.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="id_req_kat_tenant" name="id_req_kat_tenant">
                </div>
                <div class="col-10">
                    <input class="form-control" type="text" id="kategori_tenant" name="kategori_tenant" required="text">
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
                        <button type="reset" onclick="hideKategori(this)" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="kt-portlet" id="edit_kategori" style="display: none">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Edit Kategori
            </h3>
        </div>
    </div>
    
    <!--begin::Form-->
    <form class="kt-form kt-form--label-right" id="form_edit_data" name="form_edit_data" action="halaman/update_kategori_tenant.php" method="POST">
        <div class="kt-portlet__body">
            <!--Alert-->
            <div class="alert alert-warning d-none" role="alert" id="alert_form_edit">
                <div class="alert-text">Kolom tidak boleh kosong</div>
            </div>
            <!--End Alert-->
            
            <div class="form-group row">
            
                <label for="example-text-input" class="col-2 col-form-label">Kategori</label>
                <div class="col-2" style = "display:none">
                    <input class="form-control" type="text" id="edit_id_kategori_tenant" name="id_kategori_tenant" required="text" readonly>
                </div>
                <div class="col-8">
                    <input class="form-control" type="text" id="edit_kategori_tenant" name="kategori_tenant" required="text">
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
                        <button type="reset" onclick="hideEditKategori(this)" class="btn btn-secondary">Batal</button>
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
                <i class="kt-font-brand fa fa-mortar-pestle"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Permintaan Kategori Tenant
            </h3>
        </div>
    </div>
    <div class="kt-portlet__body">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Permintaan Kategori Tenant</th>
                    <th>Kategori Tenant Sekarang</th>
                    <th>Diminta oleh</th>
                    <th>Tanggal Permintaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "connection.php";
                
                $sql="SELECT tb_req_kat_tenant.id_req_kat_tenant, tb_req_kat_tenant.req_kat_tenant, tb_kategori_tenant.kategori_tenant, tb_req_kat_tenant.id_user, tb_user.username, DATE_FORMAT(tb_req_kat_tenant.created_at, '%d/%m/%Y') AS created_at, tb_req_kat_tenant.status_req_kat_tenant FROM `tb_req_kat_tenant`, tb_user, tb_kategori_tenant WHERE tb_req_kat_tenant.id_user = tb_user.id_user AND tb_user.id_kategori_tenant=tb_kategori_tenant.id_kategori_tenant ORDER BY tb_req_kat_tenant.status_req_kat_tenant";
                $result=mysqli_query($connect,$sql);
                $no = 1;
                while($row=mysqli_fetch_assoc($result)){
                    
                    echo '
                    <tr>
                    <td>'.$no.'</td>
                    <td>'.$row['req_kat_tenant'].'</td>
                    <td>'.$row['kategori_tenant'].'</td>
                    <td><a href="" type="button" data-toggle="modal" data-target="#modal_change_kategori" onclick=setId(\''.$row['id_user'].'\')>'.$row['username'].'</a></td>
                    <td>'.$row['created_at'].'</td>
                    <td nowrap>
                        '. ($row['status_req_kat_tenant'] == '1' ? '
                        <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Sudah ditambahkan</span>' :
                            ($row['status_req_kat_tenant'] == '2' ? '
                            <span class="kt-badge  kt-badge--dark kt-badge--inline kt-badge--pill">Dihapus</span>' :
                            ($row['status_req_kat_tenant'] == '0' ? '
                            <a href="#form_tambah_data" onclick="showKategori(\''.$row['id_req_kat_tenant'].'\',\''.$row['req_kat_tenant'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Tambah">
                            <i class="la la-plus-circle"></i> 
                            </a> 
                            <a href="" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_kategori_tenant_lainnya.php?id='.$row['id_req_kat_tenant'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Hapus">
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
                <button type="button" class="btn btn-primary" id="confirm_submit_edit" onClick="confirmSubmitEdit(this)">Simpan</button>
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
<div class="modal fade" id="modal_change_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Kategori Tenant</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
			    
				<form id="form_reason" name="form_reason" action="halaman/update_kategori_tenant_lainnya.php" method="POST">
				    <div class="alert alert-outline-danger d-none" role="alert" id="alert_form_reason">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
				        Data tidak boleh kosong
				    </div>
					<div class="form-group">
					    <div class="form-group">
					        <!--<label for="message-text" class="form-control-label">Ubah instansi menjadi:</label>-->
					        <!--<input type="text" name="kategori" id="kategori" value=""/>-->
							<label for="exampleSelect1">Kategori Tenant</label>
							<select class="custom-select form-control" id="exampleSelect1" name="exampleSelect1">
							    <option value="">Pilih Kategori Tenant</option>
							    <?php
							    include "connection.php";
                
                                $sql="SELECT id_kategori_tenant, kategori_tenant FROM `tb_kategori_tenant` WHERE status_kat_tenant=0";
                                $result=mysqli_query($connect,$sql);
                                // $selected = mysqli_query($connect,"SELECT tb_user.id_instansi, tb_instansi.instansi FROM tb_user, tb_instansi WHERE tb_user.id_instansi=tb_instansi.id_instansi AND id_user = $id_user");
                                
                                while($row=mysqli_fetch_assoc($result)){
                                    
                                    echo '<option value="'.$row['id_kategori_tenant'].'">'.$row['kategori_tenant'].'</option>';
                                
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
function showKategori(id_req_kat_tenant, req_kat_tenant){
	document.getElementById('tambah_kategori').style.display = "block";
	if(req_kat_tenant!=undefined && id_req_kat_tenant!=undefined) {
	    document.getElementById("kategori_tenant").value = req_kat_tenant;
	    document.getElementById("id_req_kat_tenant").value = id_req_kat_tenant;
	    
	}
	
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
}

function hideKategori(select){
	document.getElementById('tambah_kategori').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}

function showEditKategori(id_kat, kat){
	document.getElementById('edit_kategori').style.display = "block";
    // document.getElementById("btn_tambah_data").disabled = false;
    $('#btn_tambah_data').addClass('disabled');
    $('#btn_tambah_data').removeAttr('data-toggle');
    $("#edit_kategori_tenant").val(kat);
    $("#edit_id_kategori_tenant").val(id_kat);
    
    
}

function hideEditKategori(kategori){
	document.getElementById('edit_kategori').style.display = "none";
	$('#btn_tambah_data').removeClass('disabled');
	$('#btn_tambah_data').attr("data-toggle", "modal");
    
}


function confirmSubmitTambah(select){
    
    if($('#kategori_tenant').val() == "" || null) {
        
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
    
    if($('#edit_kategori_tenant').val() == "" || null) {
        
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