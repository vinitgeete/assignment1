<div class="page-header"> 
  <h1>Edit user</h1>
</div>
<div class="row">
    <div class="col-md-6 ">
       
        <?php echo form_open('user/editUser/'.$this->uri->segment(3,0).'/'.$this->uri->segment(4,''), array('id' => 'userForm'));?>
        <div class="form-group">
             <label for="name">Name</label>
             <input minlength="2" maxlength="30" type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $userData['name'];?>">
             <?php echo form_error('name');?>
        </div>
        <div class="form-group">
             <label for="country">Country</label>
             <input minlength="2" maxlength="20" type="text" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $userData['country'];?>">
             <?php echo form_error('country');?>        
        </div>       
        <div class="form-group">
             <label for="email">Email</label>
             <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $userData['email'];?>">
             <?php echo form_error('email');?>        
        </div>
        <div class="form-group">
             <label for="mobile">Mobile</label>
             <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $userData['mobile'];?>">
             <?php echo form_error('mobile');?>        
        </div>
         <div class="form-group">
             <label for="about">About</label>
             <textarea class="form-control" id="about" name="about" placeholder="About you"><?php echo $userData['about'];?></textarea>
             <?php echo form_error('about');?>        
        </div>
        <div class="form-group">
             <label for="birthday">Birthday</label>
             <input type="text" class="form-control" id="birthday" name="birthday" placeholder="yyyy-mm-dd" value="<?php echo $userData['birthday'];?>">
             <?php echo form_error('birthday');?>        
        </div>
       
        <button type="submit" class="btn btn-primary">Edit User</button>
        <?php echo form_close();?>
   </div>
</div>
	
