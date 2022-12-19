<?php 

    session_start();
    if(!isset($_COOKIE['status']))
    {
        header('location: login.php?err=bad_request');
    }

	
	if (isset($_GET['cancel'])) 
    {
		$name = $_GET['cancel'];

        setcookie('row_name',$name,time()+60*60,'/');
		 
		  
	}

    $con = mysqli_connect('localhost', 'root', '', 'webtech');
    $sql = "select * from ticketbook where id='{$name}'";
    $result = mysqli_query($con, $sql);

    $data  = mysqli_fetch_assoc($result);

    if (!isset($data))
    { 
        header('location: cancelTicket.php?err=null_values');
    }
?>


<html>
<head>
    <title>Cancel Ticket</title>
</head>
    <body>
    <fieldset>
    <legend>Cancel Ticket</legend>
        <form method="post" action="../controllers/cancelVal.php" enctype=""> 
            <table>    
                
                <tr>
                    <td>
                        Ticket No:
                    </td>
                    <td>
                        <?php echo $data['id']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Train name:
                    </td>
                    <td>
                        <?php echo $data['trainName']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        From Station:
                    </td>
                    <td>
                        <?php echo $data['fromStation']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Start Time:
                    </td>
                    <td>
                        <?php echo $data['startTime']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        To Station:
                    </td>
                    <td>
                        <?php echo $data['toStation']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Arrival Time:
                    </td>
                    <td>
                        <?php echo $data['arrivalTime']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Date of Journey:
                    </td>
                    <td>
                        <?php echo $data['dateOfJourney']; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Cancel Ticket" name="cancel">
                    </td>
                </tr>

            </table>
        </form>
    </fieldset>
    </body>
</html>

        