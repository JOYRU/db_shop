<?php 
    include_once '../lib/Database.php' ; 
    include_once '../helpers/Format.php' ; 
  
?>


<?php

class Brand{

	private $db ; 
	private $fm ; 

      public function __construct(){

          $this->db = new Database() ; 
           $this->fm = new Format() ; 

      }

      public function brandInsert($brandName){
        
         $brandName = $this->fm->validation($brandName) ;

          $brandName = mysqli_real_escape_string($this->db->link,$brandName);

          if(empty($brandName)){
             $msg = "BrandName field must not be empty!!" ; 
             return $msg ; 
          }else{
             $query = "INSERT INTO tbl_brand(brandName) Values('$brandName')" ; 
             $brandInsert = $this->db->insert($query) ; 

             if($brandInsert){
                  $msg = "Add Brand Sucessfully!!" ; 
                  return $msg ; 
             }else{

               $msg = "Eroor Ocured!!" ; 
               return $msg ; 

             }
          }



      }


      public function getAllBrand() {

        $query = "SELECT * FROM tbl_brand" ; 
        $result = $this->db->select($query);
        return $result ; 
      }

    public function  getBrandById($id){
          $query = "SELECT * FROM tbl_brand where brandId='$id'" ; 
          $result = $this->db->select($query);
          return $result ; 

      }

     public function brandUpdate($brandName , $id){

          $brandName = $this->fm->validation($brandName) ;

          $brandName = mysqli_real_escape_string($this->db->link,$brandName);
          $id = mysqli_real_escape_string($this->db->link,$id);

          if(empty($brandName)){
             $msg = "Category field must not be empty!!" ; 
             return $msg ; 
          }else{

            $query = "UPDATE tbl_brand SET brandName ='$brandName' where brandId='$id'" ;
            $update_row = $this->db->update($query);

            if($update_row){
                $msg = "Update Sucessfully!!" ; 
                return $msg ; 
            }else{
                 $msg = "Error!When Update Ocured!!" ; 
                 return $msg ;
            }
          }

     } 

     public function delBrandById($id){
            $query = "DELETE FROM tbl_brand where brandId='$id'" ; 
            $deldata =$this->db->delete($query);

            if($deldata){
               $msg = "Delete Sucessfully!!" ; 
               return $msg ;     
            }else{
               $msg = "Not Delete Data!!" ; 
               return $msg ;
            }
 

     }

     

   } 


?>