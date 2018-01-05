<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<??>
<div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php 
                   if($_SERVER['REQUEST_METHOD'] == 'POST')
                   {
                    $name=mysqli_escape_string($db->link,$_POST['name']);
                    if(empty($name))
                    {
                        echo "<span style='color:red;font-size:18px;'>Don't Leave as Empty</span>";
                    }else{
                        $query="insert into tbl_catagori(name) values ('$name')";
                        $catinsert=$db->insert($query);
                        if($catinsert)
                        {
                            echo "<span style='color:green;font-size:18px;'>Category Successfully inserted</span>";
                        }else
                        {
                             echo "<span style='color:red;font-size:18px;'>Category Not inserted</span>";

                        }
                    }
                   }
               ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
 </div>

<?php include 'inc/footer.php'; ?>
