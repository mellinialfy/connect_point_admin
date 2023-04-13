
<?php
                include "connection.php";
                
                $sql="SELECT id_user, nama_user, username, email, kategori_tenant, status_user FROM `tb_user` JOIN tb_kategori_tenant ON tb_kategori_tenant.id_kategori_tenant = tb_user.id_kategori_tenant ORDER BY id_user";
                $result=mysqli_query($connect,$sql);
                
                echo '<thead>
				<tr>
					<th>ID Tenant</th>
					<th>Nama Tenant</th>
					<th>Username</th>
					<th>Email</th>
					<th>Kategori Tenant</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>';
			
			while($row=mysqli_fetch_assoc($result)){
                    echo '
                    <tr>
                    <td>'.$row['id_user'].'</td>
                    <td>'.$row['nama_user'].'</td>
                    <td>'.$row['username'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['kategori_tenant'].'</td>
                    <td>
                    '. ($row['status_user'] == '0' ? '
                    <span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Belum Terverifikasi</span>' : 
                        ($row['status_user'] == '1' ? '<span class="kt-badge kt-badge--dark kt-badge--inline kt-badge--pill">Nonaktif</span>' : 
                            ($row['status_user'] == '2' ? '<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Terverifikasi</span>' : 
                                ($row['status_user'] == '3' ? '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Menunggu Verifikasi</span?' : 
                                    '')))).'
                    
                    </td>
                    
                    <td nowrap>
                        <a href="#edit_status" onclick="showEditKategori(\''.$row['id_user'].'\',\''.$row['kategori_tenant'].'\')" class="btn btn-sm btn-clean btn-icon-md" title="Edit Status">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="#lihat" class="btn btn-sm btn-clean btn-icon-md" onclick="confirmSubmitDelete(\'halaman/delete_kategori_tenant.php?id='.$row['id_user'].'\')" data-toggle="modal" data-target="#modal_submit_delete" id="btn_delete" title="Lihat">
                            <i class="la la-info-circle"></i>
                        </a>
                    </td>
                    </tr>';
                    
                }
                mysqli_free_result($sql);
                mysqli_close($connect);
			    
				
			echo '</tbody>';
                
                
                ?>