<div class="page-header"> 
 <h1 >User List</h1>
</div>
<div class="well well-lg tmarg10">
    <?php echo anchor('user/addUser', 'Add User', array('class' => 'btn btn-info', 'role' => 'button'));?>
</div>
 <?php echo $this->session->flashdata('userMsg');?>
 <?php echo $this->pagination->create_links();?>
 <div class="table-responsive">
     <table class="table table-hover table-condensed">
			<?php
         if(!empty($userData)) {
         ?>	         
         <thead>
             <tr>
                 <th>Name</th>
                 <th>Country</th>
                 <th>Email</th>
                 <th>Mobile</th>
                 <th>About</th>
                 <th>Birthday</th>
                 <th>Action</th>
             </tr>
         </thead>
         <?php
         }
         ?>   
         <tbody>
         <?php
         if(!empty($userData)) {
             foreach ($userData as $key => $value) {
			?>
                 <tr>
                     <td ><?php echo $value->name;?></td>
                     <td ><?php echo $value->country;?></td>
                     <td><?php echo $value->email;?></td>
                     <td ><?php echo $value->mobile;?></td>
                     <td><?php echo $value->about;?></td>
                     <td ><?php echo $value->birthday;?></td>
                     <td><?php echo anchor('user/editUser/'.$value->id.'/'.$this->uri->segment(3,''),'Edit',array('class' => 'btn btn-info'));?></td>
                     
                 </tr>
          <?php
             }
         }
         else {
			?>
             <tr>
                 <td colspan="3">No record found</td>
             </tr>
         <?php
         }
         ?>
         
         </tbody>
     </table>		
    
 </div>
