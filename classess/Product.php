
<?php 
     include_once '../lib/Database.php' ; 
     include_once '../helpers/Format.php' ; 
  
?>



<?php

	class Product{

		private $db ; 
		private $fm ; 

	    public function __construct(){

	        $this->db = new Database() ; 
	        $this->fm = new Format() ; 

	    }


	    public function productInsert($data,$file){

            $productName = $this->fm->validation($data['productName']) ;

             $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
             $catId = mysqli_real_escape_string($this->db->link,$data['catId']);
             $brandId = mysqli_real_escape_string($this->db->link,$data['brandId']);
             $body = mysqli_real_escape_string($this->db->link,$data['body']);
             $price = mysqli_real_escape_string($this->db->link,$data['price']);
             $type = mysqli_real_escape_string($this->db->link,$data['type']);
           

            $permited = array('jpg','jpeg','png','gif') ; 
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];

            

            $div=explode('.',$file_name) ; 
            $file_ext = strtolower(end($div)) ; 
            $unique_image = substr(md5(time()),0,10).'.'.$file_ext ; 
            $uploaded_image="uploads/".$unique_image ; 

            if($productName == "" || $catId =="" || $brandId == "" || $body =="" || $price=="" || $type=="" || $file_name ==""){
            	$msg = "Fields must not Be Empty" ; 
            	return $msg ; 
            }elseif(in_array($file_ext, $permited) === false){

                   $msg = "File extention is not Permitted" ; 
                   return $msg ; 

            



            }else{

                move_uploaded_file($file_temp, $uploaded_image) ;
                $query = "INSERT INTO tbl_product(productName,catId,brandId,body,price,image,type) VALUES('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')" ;

                $inserted_row = $this->db->insert($query) ; 
                if($inserted_row){
                	$msg = "Product Inserted Sucessfully";
                	return $msg ; 

                }else{
                     $msg = "Product Not Inserted!!" ;
                     return $msg ; 
                }



            }



	    }

	}


 ?>