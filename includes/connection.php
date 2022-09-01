<?php
$conn = mysqli_connect("localhost","root","","php_1");

if(isset($_POST['action']) && $_POST['action'] == 'delete_student'){
    $image = $_POST['image'];
    $s_id = $_POST['id'];
    $delete = "DELETE FROM `students` WHERE `id`='$s_id'";
    $del_student = mysqli_query($conn,$delete);
    if($del_student){
        unlink("uploads/".$image);
        echo json_encode(["code"=>200,"message"=>"Student deleted successfully."]);
    }
}

if(isset($_GET['action']) && $_GET['action'] == "get_list_student"){
    $get_students = "SELECT * FROM `students`";
    $students = mysqli_query($conn,$get_students);
    $student_array = array();
    while($row = mysqli_fetch_assoc($students)){
        $id= $row['id'];
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $image = $row['image'];
        $dob = $row['dob'];
        
        $student_array[] = array(
            'id' => $id,
            'name' => $fname." ".$lname,
            'email' => $email,
            'phone' => $phone,
            'image' => $image,
            'dob' => $dob
        );
    }
    echo json_encode(['code'=>200,'message'=>'Student get successfully.','student_data'=>$student_array]);
}

if(isset($_POST['action']) && $_POST['action'] == 'add_student'){
    $error_f_name=$error_l_name=$error_email=$error_phone=$error_image=$error_dob=$error_password=$error_c_password="";
    $f_name = trim($_POST['f_name']);
    $l_name = trim($_POST['l_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $dob = trim($_POST['dob']);
    $password = trim($_POST['password']);
    $c_password = trim($_POST['c_password']);
    $image = $_FILES['image']['name'];
    if(empty($f_name)){
        $error_f_name = "First name field is required.";
    }
    if(empty($l_name)){
        $error_l_name = "Last name field is required.";
    }
    if(empty($email)){
        $error_email = "The email field is required.";
    }
    if(empty($phone)){
        $error_phone = "The phone number field is required.";
    }
    if(empty($dob)){
        $error_dob = "The D.O.B field is required.";
    }
    if(empty($image)){
        $error_image = "The image field is required.";
    }
    if(empty($password)){
        $error_password = "The password field is required.";
    }
    if(empty($c_password)){
        $error_c_password = "The confirm password field is required.";
    }
    if(!empty($f_name) && !empty($l_name) && !empty($email) && !empty($phone) && !empty($dob) && !empty($image)  && !empty($password) && !empty($c_password)){
        if($password == $c_password){
            $allowed_extension = array("jpg","png","jpeg");
            $fileExtension=pathinfo($image,PATHINFO_EXTENSION);
            if(!in_array($fileExtension,$allowed_extension))
            {
                $error_image="Only jpg ,png and jpeg format is allowed.";
                echo json_encode(['code'=>400,'error_image'=>$error_image]);
            }else{
                $filename=time().'.'.$fileExtension;
                $insert_query = "INSERT INTO `students`(`f_name`,`l_name`,`email`,`phone`,`image`,`dob`,`password`,`c_password`) VALUES('$f_name','$l_name','$email','$phone','$filename','$dob','$password','$c_password')";
                $insert = mysqli_query($conn,$insert_query);
                if($insert){
                    move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$filename);
                    $success="Student added successfull.";
                    echo json_encode(['code'=>200,'success'=>$success]);
                }
            }
        }else{
            $error_c_password = "The password and confirm password must match.";
            echo json_encode(['code'=>400,'error_c_password'=>$error_c_password]);
        }
    }else{
        echo json_encode(["code"=>400,"error_f_name"=>$error_f_name,"error_l_name"=>$error_l_name,"error_email"=>$error_email,"error_image"=>$error_image,"error_phone"=>$error_phone,"error_dob"=>$error_dob,"error_password"=>$error_password,"error_c_password"=>$error_c_password]);
    }
}
?>