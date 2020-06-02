
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

    $output .= '<li title="'.$count.'" id="'.$row['ID_PR'].'-'.$count.'" data-index="'.$count.'" data-id_pr="'.$row["ID_PR"].'" data-rating="'.$rating.'" class="list-inline-item rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
   }
   $output .= '</ul>
   <p>'.$row["ALAMAT_PR"].'</p>
   <label style="text-danger">'.$row["EMAIL_PR"].'</label>
   <hr />
   ';
  }
  echo $output;
 }

 function insert_rating($data)
 {
  $this->db->insert('rating1', $data);
 }
}

?>
