<!-- <?php $no = 1;
if($mhs) {
    foreach ($mhs->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++?></td>
            <td><?=$data->NIM ?></td>
            <td><?=$data->NAMA_M ?></td>
            <td class="text-right"><?=$data->NIM ?></td>
            <td class="text-center"><?=$data->NAMA_M ?></td>
            <td class="text-center" width="160px">
            <button id="update_pendaftaran" data-toggle="modal" data-target="#modal-item-edit"
                    data-nim="<?=$data->NIM ?>" 
                    data-nama ="<?=$data->NAMA_M ?>">
        <i class="fa fa-pencil"></i> Edit
    </button>
    <button id="del_cart" data-nim="<?=$data->NIM ?>" class="btn btn-xs btn-danger">
        <i class="fa fa-trash"></i> Hapus
    </button>
            </td>
        </tr>
        
    <?php
            }
        }else {
            echo '<tr>
                <td colspan="8" class="text-center">Tidak Ada data</td>
                </tr>';
        }?> -->