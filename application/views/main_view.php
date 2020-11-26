<html>
<head>
<title>insert data using codeigniter</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7
/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<?php
if($this->uri->segment(2) == "inserted")
{
  echo '<p class="text-success">Data Inserted </p>';
}

?>
</head>
  <body>
  <div class="containter">
  
    <br /><br /><br />
       <h3 allign="center">insert data using codeigniter</h3><br />
       <?php echo form_open('main/form_validation'); ?>
       <?php
       if(isset($user_data))
       {
        foreach($user_data as $row)
        {
          ?>
          <div class="form-group">
              <lable>enter first name</lable>
          <input type="text" name="first_name" value="<?php echo $row->first_name; ?>" class="form_control"/>
               <span class="text-danger"><?php echo form_error("first_name"); ?>
               </span>
               </div>

               <div class="form-group">
               <lable>enter last name</lable>
               <input type="text"name="last_name" value="<?php echo $row->last_name; ?>" class="form_control"/>
               </div>
               <span class="text-danger"><?php echo form_error("last_name");?>
               </span>

               <div class="form-group">
               <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>" />

               <input type="submit"name="update"value="update"class="btn btn-info"/>
               </div>

          <?php
        } 

       }
       else
       {
        ?> 
          
           <div class="form-group">
               <lable>enter first name</lable>
               <input type="text" name="first_name" class="form_control"/>
               <span class="text-danger"><?php echo form_error("first_name"); ?>
               </span>
               </div>

               <div class="form-group">
               <lable>enter last name</lable>
               <input type="text"name="last_name"class="form_control"/>
               </div>
               <span class="text-danger"><?php echo form_error("last_name");?>
               </span>

               <div class="form-group">
               <input type="submit"name="insert"value="insert"class="btn btn-info"/>
               </div>
               <?php
       }
       ?>
       


          </form>

           <br/><br/>
           <h3>fetch data from table using codeigniter</h3><br/>
           <div class="table_responsive">
           <table class="table table-bordered">
           <tr>
             <th>ID</th>
             <th>First Name</th>
             <th>Last name</th>
             <th>Delet</th>
             <th>update</th>

             </tr>
             <?php 
           if($fetch_data->num_rows() > 0 )
           {
               foreach($fetch_data->result() as $row)
               {
             ?>
             <tr>
                 <td><?php echo $row->id; ?></td>
                 <td><?php echo $row->first_name; ?></td>
                 <td><?php echo $row->last_name; ?></td>
                 <td><a href="#" class="delete_data" id="<?php echo $row->id ;?>">Delet</a></td>
                 <td><a href="<?php echo base_url(); ?>main/update_data/<?php echo $row->id; ?>">Edit</a></td>
  
                 </tr>
             <?php    
               }

           }
           else
           {
             ?>
               <tr>
              <td colspan="3">no data found</td>
               </tr>

             <?php

           } 

             ?>
             </table>

  </div>
  <script>
  $(document) . ready(function(){
    $('.delete_data').click(function(){
      var id = $(this).attr("id");
      if(confirm("are you sure you want delet this?"))
      {
       window.location="<?php echo base_url(); ?>main/delete_data/"+id;

      }
      else
      {
        return false;
      }


    });

  });

  </script>
  </div>
 

</body>
</html>


