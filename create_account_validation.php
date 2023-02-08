<?php
$koneksi=mysqli_connect("mysql","user","root","dibyo") or die();
$fullname = addslashes(trim($_POST['fullname']));
$email = addslashes(trim($_POST['email']));
$password = addslashes(trim($_POST['password']));
if(!empty($fullname) || !empty($email) || !empty($password)){
   /*cek duplikat email*/
   $cek=mysqli_query($koneksi,"select * from  data_member where email='$email' ");
   $jml=mysqli_num_rows($cek);
   if($jml>0){
     echo "<script>alert('Email sudah digunakan, coba yang lain..'); window.location.href='create_account.php';</script>";
     die();
   }else{
     $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
     $input=mysqli_query($koneksi,"insert into data_member(fullname,email,password) values('$fullname','$email','$password_encrypted') ");
     if($input){
        echo "<script>alert('Akun berhasil dibuat..'); window.location.href='index.php';</script>";
     }else{
        echo "<script>alert('Akun gagal dibuat..'); window.location.href='create_account.php';</script>";
     }
   }   
}
?>