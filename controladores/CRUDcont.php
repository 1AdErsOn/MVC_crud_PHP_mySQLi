<?php
class ControladorCRUD{
    static public function ctrShow(){
        $tblName = 'users';
        $datos = new ModeloCRUD();
        $respuesta = $datos->getRows($tblName,array('order_by'=>'id DESC'));
        return $respuesta;
    }
    static public function ctrSee($id){
        $tblName = 'users';
        $conditons = array( 
            'where' => array( 
                'id' => $id 
            ), 
            'return_type' => 'single' 
        ); 
        $dato = new ModeloCRUD();
        $respuesta = $dato->getRows($tblName,$conditons);
        return $respuesta;
    }
    public function ctrAddEdit(){
        // Database table name
        $tblName = 'users';

        // Set default redirect url
        $redirectURL = 'index.php';
        if(isset($_POST['userSubmit'])){
            // Get form fields value
            $name     = trim(strip_tags($_POST['name']));
            $email    = trim(strip_tags($_POST['email']));
            $phone    = trim(strip_tags($_POST['phone']));
            
            // Fields validation
            $errorMsg = '';
            if(empty($name)){
                $errorMsg .= '<p>Please enter your name.</p>';
            }
            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errorMsg .= '<p>Please enter a valid email.</p>';
            }
            if(empty($phone) || !preg_match("/^[-+0-9]{6,20}$/", $phone)){
                $errorMsg .= '<p>Please enter a valid phone number.</p>';
            }
            
            // Submitted form data
            $userData = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            );
            
            // Store the submitted field value in the session
            $sessData['userData'] = $userData;
            
            // Submit the form data
            if(empty($errorMsg)){
                if(!empty($_POST['id'])){
                    // Update user data
                    $condition = array('id' => $_POST['id']);
                    $dato = new ModeloCRUD();
                    $update = $dato->update($tblName, $userData, $condition);
                    
                    if($update){
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = 'User data has been updated successfully.';
                        
                        // Remote submitted fields value from session
                        unset($sessData['userData']);
                    }else{
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                        
                        // Set redirect url
                        $redirectURL = 'index.php?pagina=addedit';
                    }
                }else{
                    // Insert user data
                    $dato = new ModeloCRUD();
                    $insert = $dato->insert($tblName, $userData);
                    
                    if($insert){
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = 'User data has been added successfully.';
                        
                        // Remote submitted fields value from session
                        unset($sessData['userData']);
                    }else{
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                        
                        // Set redirect url
                        $redirectURL = 'index.php?pagina=addedit';
                    }
                }
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = '<p>Please fill all the mandatory fields.</p>'.$errorMsg;
                
                // Set redirect url
                $redirectURL = 'index.php?pagina=addedit';
            }
            
            // Store status into the session
            $_SESSION['sessData'] = $sessData;

        }
        // Redirect to the respective page
        header("Location:".$redirectURL);
    }
    public function ctrDelete($id){
        // Database table name
        $tblName = 'users';

        // Set default redirect url
        $redirectURL = 'index.php';
        if(($_REQUEST['action_type'] == 'delete') && !empty($id)){
            // Delete data
            $condition = array('id' => $id);
            $dato = new ModeloCRUD();
            $delete = $dato->delete($tblName, $condition);
            
            if($delete){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'User data has been deleted successfully.';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again.';
            }
            
            // Store status into the session
            $_SESSION['sessData'] = $sessData;
        }
        // Redirect to the respective page
        header("Location:".$redirectURL);
    }
}
//exit();
?>