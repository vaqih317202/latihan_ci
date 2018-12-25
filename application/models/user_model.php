<?php
 
class User_model extends CI_Model {
 
  function __construct()
  {
    parent::__construct();
  }
  function SaveForm($form_data)
  {
    $this->db->insert('user', $form_data);
 
    if ($this->db->affected_rows() == '1')
    {
      return TRUE;
    }
 
    return FALSE;
  }
  
     public function cek_login($email, $password){
           $this->db->select('*');
           $this->db->from('user');
           $this->db->where('email', $email);
           $this->db->where('password',$password);

           return $this->db->get()->num_rows(); 
      }
      
  function list_table()
  {
    return $this->db->get('v_userpinjam');
  }

  function list_table1()
  {
    return $this->db->get('anggota');
  }

  function list_table2()
  {
    return $this->db->get('buku');
  }

  function list_table3()
  {
    return $this->db->get('member');
  }

  function list_table4()
  {
    return $this->db->get('pinjam');
  }
  function list_table5()
  {
    return $this->db->get('user');
  }
##################################################################################################################
  public function get_anggota()
  {
    $query = $this->db->select("*")
         ->from('anggota')
         ->order_by('id_anggota', 'DESC')
         ->get();
    return $query->result();
  }

  public function simpan_anggota($data)
  {
    
    $query = $this->db->insert("anggota", $data);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function edit_anggota($id_anggota)
  {
    
    $query = $this->db->where("id_anggota", $id_anggota)
        ->get("anggota");

    if($query){
      return $query->row();
    }else{
      return false;
    }

  }

  public function update_anggota($data, $id)
  {
    
    $query = $this->db->update("anggota", $data, $id);

    if($query){
      return true;
    }else{
      return false;
    }

  }

    public function hapus_anggota($id)
    {
    
        $query = $this->db->delete("anggota", $id);

        if($query){
          return true;
        }else{
          return false;
        }
      }

#################################################################################################################
  #############################################       BUKU           ############################################
    public function get_buku()
  {
    $query = $this->db->select("*")
         ->from('buku')
         ->order_by('kd_buku', 'DESC')
         ->get();
    return $query->result();
  }


  public function simpan_buku($data)
  {
    
    $query = $this->db->insert("buku", $data);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function edit_buku($kd_buku)
  {
    
    $query = $this->db->where("kd_buku", $kd_buku)
        ->get("buku");

    if($query){
      return $query->row();
    }else{
      return false;
    }

  }

  public function update_buku($data, $id)
  {
    
    $query = $this->db->update("buku", $data, $id);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function hapus_buku($id)
  {
    
    $query = $this->db->delete("buku", $id);

    if($query){
      return true;
    }else{
      return false;
    }
  }
##################################################################################################################
##############################################    MODEL MEMBER  ##################################################
  function member()
  {
    return $this->db->get('member');
  }
  public function terima_member($id_member)
  {

      $this->db->select('id_member,nadep,nabel,namel,notel');
      $this->db->where('id_member',$id_member);
      $sql = $this->db->get('member')->result();
      foreach ($sql as $a){
        $query = $this->db->insert("anggota",$a);
      }
      if($query){
        $query = $this->db->where('id_member',$id_member)
                          ->delete('member');
      }else{
        return false;
      }
  }
  public function tolak_member($id)
  {
    $query = $this->db->delete('member',$id);
    if($query){
      return true;
    }else{
      return false;
    }
  }
##################################################################################################################
############################################   MODEL PINJAM    ###################################################
public function get_pinjam()
  {
    $query = $this->db->select("*")
         ->from('pinjam')
         ->order_by('kd_transaksi', 'DESC')
         ->get();
    return $query->result();
  }


  public function simpan_pinjam($data)
  {
    
    $query = $this->db->insert("pinjam", $data);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function edit_pinjam($kd_transaksi)
  {
    
    $query = $this->db->where("kd_transaksi", $kd_transaksi)
        ->get("pinjam");

    if($query){
      return $query->row();
    }else{
      return false;
    }

  }

  public function update_pinjam($data, $id)
  {
    
    $query = $this->db->update("pinjam", $data, $id);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function hapus_pinjam($id)
  {
    
    $query = $this->db->delete("pinjam", $id);

    if($query){
      return true;
    }else{
      return false;
    }
  }
##################################################################################################################
##############################################   MODEL USER   ####################################################
  public function get_user()
  {
    $query = $this->db->select("*")
         ->from('user')
         ->order_by('firstname', 'DESC')
         ->get();
    return $query->result();
  }


  public function simpan_user($data)
  {
    
    $query = $this->db->insert("user", $data);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function edit_user($firstname)
  {
    
    $query = $this->db->where("firstname", $firstname)
        ->get("user");

    if($query){
      return $query->row();
    }else{
      return false;
    }

  }

  public function update_user($data, $id)
  {
    
    $query = $this->db->update("user", $data, $id);

    if($query){
      return true;
    }else{
      return false;
    }

  }

  public function hapus_user($id)
  {
    
    $query = $this->db->delete("user", $id);

    if($query){
      return true;
    }else{
      return false;
    }
  }
##################################################################################################################
}
?>