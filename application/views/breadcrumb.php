<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <?php 
        foreach($breadcrumb as $val => $url){
            if($url != ''){            
    ?>	
                <li class="breadcrumb-item">
                    <?php echo anchor($url,$val);?>
               </li>
    <?php    
            } else {
    ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $val;?>
                </li> 
    <?php        
            } 
        }    
    ?>         
  </ol>
</nav>