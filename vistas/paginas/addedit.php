<div class="container">
    <h2><?php echo $actionLabel; ?> User</h2>
    
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
         <div class="col-md-6">
             <form method="post" action="userAction.php">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo !empty($userData['name'])?$userData['name']:''; ?>" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>" >
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter contact number" value="<?php echo !empty($userData['phone'])?$userData['phone']:''; ?>" >
                </div>
                
                <a href="index.php" class="btn btn-secondary">Back</a>
                <input type="hidden" name="id" value="<?php echo !empty($userData['id'])?$userData['id']:''; ?>">
                <input type="submit" name="userSubmit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
</div>