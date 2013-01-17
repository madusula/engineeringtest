<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Engineering Test Task 1 of 1</title>
        <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
        <script type="text/javascript" src="plugins/jquery/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="plugins/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            /*** Form action execute ****/
            $postvalue = ""; 	// Input integer list.
            $output = "";	// Output integer list

            require_once dirname(__FILE__) ."\BaseIntConvert.php";

            $newobject = new BaseIntConvert();

            if(isset($_REQUEST['integervalue']) && $_REQUEST['integervalue'] != "") {

                $postvalue = $_REQUEST['integervalue'];	// Get the input integer list from the form.
                $array = explode(',', $postvalue);	// Soter the integer list to an array.

                for($i=0; $i<count($array); $i++) {
                        $arrayint[] = ( int )$array[$i];				
                }

                $output = $newobject->convertingIntString($arrayint);	
            }
        ?>
        
        <div class="container">
            <?php /*?> Form for get the positive integer list <?php */?>
            <legend>Task 1.1</legend>
            <form action="" method="post" name="testForm" class="form-horizontal">
                <fieldset>            
                    <div class="control-group">
                        <label class="control-label" for="integervalue" style="width:207px;">Enter the positive integer values:</label>
                        <div class="controls">
                            <input type="text" name="integervalue" id="integervalue" placeholder="1,2,3,4,5" />    
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div>
                            <span class="label label-important">Important</span>&nbsp;Please enter the values separated by a comma<br />
                            <span class="label label-info">Example</span>&nbsp;3,4,5,6,7,8 
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-large btn-success" />
                        </div>               
                    </div>
                </fieldset>
            </form>
            
            <?php /*?> Div to show the final output. <?php */?>
            <div class="alert alert-success" id="finaloutput" <?php if($output != "") {?> style="display:block;" <?php } else { ?> style="display:none;" <?php } ?>>
                <div><strong><h4>Final Result</h4></strong></div>
                <?php /*?> Users input as a string <?php */?>
                <div id="input"><strong>Input Integer Array:</strong><?php echo $postvalue; ?></div> 
                <?php /*?> Final output as a string <?php */?>
                <div id="output"><strong>Final Output Result :</strong><?php echo $output; ?></div>
            </div>
        </div>
    </body>
</html>