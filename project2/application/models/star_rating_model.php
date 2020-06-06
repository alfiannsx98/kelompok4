
<?php
class Star_rating_model extends CI_Model
{
 function get_business_data()
 {
  $dt_pr = $this->session->userdata('id_perusahaan');
  $this->db->order_by('ID_PR', 'DESC');
  return $this->db->get_where('perusahaan', ["ID_PR" => $dt_pr]);
 }

 function get_business_rating($id_perusahaan)
 {
  $this->db->select('AVG(rating) as rating');
  $this->db->from('rating1');
  $this->db->where('id_pr', $id_perusahaan);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["rating"];
  }
 }

 function html_output()
 {
  $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  $rslt_user = $user['id_user'];
  $data = $this->get_business_data();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_business_rating($row["ID_PR"]);
   $output .= '
   <h3 class="text-primary">'.$row["NAMA_PR"].'</h3>
   <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
   ';
   for($count = 1; $count <= 5; $count++)
   {
    if($count <= $rating)
    {
     $color = 'color:#ffcc00;';
    }
    else
    {
     $color = 'color:#ccc;';
    }

    $output .= '<li title="'.$count.'" id="'.$row['ID_PR'].'-'.$count.'" data-index="'.$count.'" data-id_pr="'.$row["ID_PR"].'" data-id_user="'.$rslt_user.'" data-rating_input="'.$rating.'" class="list-inline-item rating rating_input" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
   }
   $output .= '</ul>
   <p>'.$row["ALAMAT_PR"].'</p>
   <label style="text-danger">'.$row["EMAIL_PR"].'</label>
   <hr />
   ';
  }
  echo $output;
 }

 function output_bintang()
 {
  $data = $this->get_business_data();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_business_rating($row["ID_PR"]);
   for($count = 1; $count <= 5; $count++)
   {
    if($count <= $rating)
    {
     $color = 'color:#ffcc00;';
    }
    else
    {
     $color = 'color:#ccc;';
    }

    $output .= '<p title="'.$count.'" data-rating="'.$rating.'" class="float-right rating" style="'.$color.'">&#9733;</p>';
   }
  }
  echo $output;
 }
 function output_sudah_isi()
 {
  echo '<div class="alert-success small" role="alert">&nbsp;Data Rating Berhasil Disimpan</div>';
 }

 function insert_rating($data)
 {
  $this->db->insert('rating1', $data);
 }
}

?>
