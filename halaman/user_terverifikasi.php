<?php 
$title = 'Pengguna Terverifikasi';
?>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Pengguna Terverifikasi
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
				<tr>
					<th>No.</th>
					<th>Nama Pengguna</th>
					<th>Username</th>
					<th>Email</th>
					<th>Jenis Pengguna</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php
			include "connection.php";
			
			$sql="SELECT id_user, nama_user, username, email, jenis_user FROM `tb_user` JOIN tb_jenis_user ON tb_jenis_user.id_jenis_user = tb_user.id_jenis_user WHERE tb_user.status_user=2 ORDER BY tb_user.updated_at";
			$result=mysqli_query($connect,$sql);
			$no = 0;
			
			while($row=mysqli_fetch_assoc($result)){
			    $no++;
    			echo '
    			<tr>
    			<td>'.$no.'</td>
    			<td>'.$row['nama_user'].'</td>
    			<td>'.$row['username'].'</td>
    			<td>'.$row['email'].'</td>
    			<td>
    			'. ($row['jenis_user'] == 'Tenant' ? '
    			<span class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--pill">Tenant</span>' : 
    			    ($row['jenis_user'] == 'Penyelenggara Acara' ? '<span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--pill">Penyelenggara Acara</span>' : 
    			    '')).'
    			 </td>
    			 
    			 <td nowrap>
    			 '. ($row['jenis_user'] == 'Tenant' ? '
    			 <a href="?page=tenant&id='.$row['id_user'].'" class="btn btn-sm btn-clean btn-icon-md" title="Lihat">' : 
    			     ($row['jenis_user'] == 'Penyelenggara Acara' ? '<a href="?page=eo&id='.$row['id_user'].'" class="btn btn-sm btn-clean btn-icon-md" title="Lihat">' : 
    			     '')).'
    			 <i class="la la-info-circle"></i>
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

