
<?php 
     include_once '../lib/Database.php' ; 
     include_once '../helpers/Format.php' ; 
   

?>



<?php

class Category{

	private $db ; 
	private $fm ; 

      public function __construct(){

          $this->db = new Database() ; 
           $this->fm = new Format() ; 

      }

      public function catInsert($catName){
        
         $catName = $this->fm->validation($catName) ;

          $catName = mysqli_real_escape_string($this->db->link,$catName);

          if(empty($catName)){
             $msg = "Category field must not be empty!!" ; 
             return $msg ; 
          }else{
             $query = "INSERT INTO tbl_category(catName) Values('$catName')" ; 
             $catInsert = $this->db->insert($query) ; 

             if($catInsert){
                  $msg = "Add Product Sucessfully!!" ; 
                  return $msg ; 
             }else{

               $msg = "Eroor Ocured!!" ; 
               return $msg ; 

             }
          }



      }

      public function getAllCat() {

        $query = "SELECT * FROM tbl_category" ; 
        $result = $this->db->select($query);
        return $result ; 
      }

    public function  getCatById($id){
          $query = "SELECT * FROM tbl_category where catId='$id'" ; 
          $result = $this->db->select($query);
          return $result ; 

      }

     public function catUpdate($catName , $id){

          $catName = $this->fm->validation($catName) ;

          $catName = mysqli_real_escape_string($this->db->link,$catName);
          $id = mysqli_real_escape_string($this->db->link,$id);

          if(empty($catName)){
             $msg = "Category field must not be empty!!" ; 
             return $msg ; 
          }else{

            $query = "UPDATE tbl_category SET catName ='$catName' where catId='$id'" ;
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

     public function delCatById($id){
            $query = "DELETE FROM tbl_category where catId='$id'" ; 
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