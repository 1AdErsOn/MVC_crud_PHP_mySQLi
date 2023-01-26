<?php
//Delete user
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $registro = new ControladorCRUD();
    $registro->ctrDelete($id);                    
}

// Fetch the users data
$users = ControladorCRUD::ctrShow();
?>
<div class="container">
	
    <!-- Display status message -->
    <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
    <div class="col-xs-12">
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    </div>
    <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
    <div class="col-xs-12">
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="col-md-12 head">
            <h1>Users</h1>
            <!-- Add link -->
            <div class="float-right">
                <a href="index.php?pagina=addedit" class="btn btn-success"><i class="plus"></i> New User</a>
            </div>
        </div>
        
        <!-- List the users -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="userData">
                <?php if(!empty($users)){ $count = 0; foreach($users as $row){ $count++; ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href="index.php?pagina=addedit&id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                        <a href="index.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?');">delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="5">No user(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>