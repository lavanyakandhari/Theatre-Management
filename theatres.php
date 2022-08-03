<!-- 
CPSC 304 project_h8w1b_n7v2b_r5i2b

Citation: Tutorial 7 content for PHP
https://www.students.cs.ubc.ca/~cs-304/resources/php-oracle-resources/php-setup.html
-->
<!DOCTYPE html>
<html>
    <head>
        <title>CPSC 304 Project: Theatres</title>
    </head>

    <body>
		<h1>CPSC 304: THEATRES DATABASE PROJECT</h1>
		<hr/>
		
        <h3>RESET</h3>
        <p>Press to reset values of the tables to original state.</p>

        <form method="POST" action="theatres.php">
            <!--refresh back to theatres.php when clicked-->
            <input type="hidden" id="resetTablesRequest" name="resetTablesRequest">
            <p><input type="submit" value="Reset" name="reset"></p>
        </form>
        <hr/>
		<!--
        <h3>Insert Values into DemoTable</h3>
        <form method="POST" action="theatres.php"> 
            <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Number: <input type="text" name="insNo"> <br/><br/>
            Name: <input type="text" name="insName"> <br/><br/>
            <input type="submit" value="Insert" name="insertSubmit"></p>
        </form>
        <hr/>

        <h2>Update Name in DemoTable</h2>
        <p>The values are case sensitive and if you enter in the wrong case, the update statement will not do anything.</p>

        <form method="POST" action="theatres.php">
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Old Name: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

        <hr/>
		
        <h2>Count the Tuples in DemoTable</h2>
        <form method="GET" action="theatres.php"> 
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>
		
		<h2>Display the Tuples in DemoTable</h2>
        <form method="GET" action="theatres.php">
            <input type="hidden" id="displayTupleRequest" name="displayTupleRequest">
            <input type="submit" value="DISPLAY" name="displayTuples"></p>
        </form>
		-->
		<h2>If you are not a member, add your membership here:</h2>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="addMembership" name="addMembershipRequest">
            Email: <input type="text" name="add_customer_member_email"> <br /><br/>
            Full Name: <input type="text" name="add_customer_member_cname"> <br/><br/>
			Phone Number: <input type="text" name="add_customer_member_phone_num"> <br /><br/>
            Payment Method: <input type="text" name="add_customer_member_payment_method"> <br/><br/>
			Theatre Chain ID: <input type="int" name="add_customer_member_chain_id"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Add Membership" name="insertSubmit"></p>
        </form>
		
		<hr/>
		
		<h2>If you are a member and want to delete your membership, do so here:</h2>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="deleteMembership" name="deleteMembershipRequest">
            Email: <input type="text" name="delete_customer_member_email"> <br /><br/>
			Theatre Chain ID: <input type="int" name="delete_customer_member_chain_id"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Delete Membership" name="deleteSumbit"></p>
        </form>
		
		<hr/>
		
		<h2>If you are a member and want to update your membership, do so here:</h2>
		<p>Enter your email and the theatre chain_id, which cannot be changed. Enter the full name, phone number and payment method, which can be changed.</p>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="updateMembershipRequest" name="updateMembershipRequest">
			Email: <input type="text" name="update_customer_member_current_email"> <br/><br/>
			Chain ID: <input type="int" name="update_customer_member_current_chain_id"> <br /><br/>
            Full Name: <input type="text" name="update_customer_member_cname"> <br/><br/>
			Phone Number: <input type="text" name="update_customer_member_phone_num"> <br /><br/>
            Payment Method: <input type="text" name="update_customer_member_payment_method"> <br/><br/>
			 <!-- reward_points start at 0 -->
            <input type="submit" value="Update Membership" name="updateSubmit"></p>
        </form>
		
		<hr/>
		
		<h2>Theatres and Movies Playing</h2>
		
		<?php
		connectToDB();
		
		//SELECTION
		$theatrechain = executePlainSQL("SELECT * FROM theatrechain");
        printResultTheatreChain($theatrechain);
		$theatre = executePlainSQL("SELECT * FROM theatre");
        printResultTheatre($theatre);
		$auditorium = executePlainSQL("SELECT * FROM auditorium");
        printResultAuditorium($auditorium);
		$movieshowing = executePlainSQL("SELECT * FROM movieshowing");
		printResultMovieshowing($movieshowing);
		
		disconnectFromDB();
		?>
		
		<h3>Buy a normal ticket for a showing ($2.00 for member, $5.00 for non-member):</h3>
		<p>Choose existing dates and times according to the format displayed and select available seats. See tables display below.</p>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="buyNormalTicket" name="buyNormalTicket">
            Date and Time (YYYY-MM-DD HH:MI:SS): <input type="text" name="normalticket_showtime"> <br /><br/>
            Room Number: <input type="text" name="normalticket_roomnum"> <br/><br/>
			Location ID: <input type="text" name="normalticket_loc_id"> <br /><br/>
            Normal Seat Number: <input type="text" name="normalticket_seatnum"> <br/><br/>
			Email: <input type="text" name="normalticket_email"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Buy Normal Ticket" name="insertSubmit"></p>
        </form>
		
		<!--
		<form method="POST" action="theatres.php">
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Old Name: <input type="text" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>
		-->
		
		<h3>Buy a gold ticket for a showing ($5.00 for member, $10.00 for non-member):</h3>
		<p>Choose existing dates and times according to the format displayed and select available seats. See tables display below.</p>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="buyGoldTicket" name="buyGoldTicket">
            Date and Time (YYYY-MM-DD HH:MI:SS): <input type="text" name="goldticket_showtime"> <br /><br/>
            Room Number: <input type="text" name="goldticket_roomnum"> <br/><br/>
			Location ID: <input type="text" name="goldticket_loc_id"> <br /><br/>
            Recliner Seat Number: <input type="text" name="goldticket_seatnum"> <br/><br/>
			Email: <input type="text" name="goldticket_email"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Buy Gold Ticket" name="insertSubmit"></p>
        </form>
		
		<!--
		<form method="POST" action="theatres.php">
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Old Name: <input type="int" name="oldName"> <br /><br />
            New Name: <input type="text" name="newName"> <br /><br />
            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>
		-->
		
		<hr/>
		<h3>Enter movie name (or part of it) for title, showtime, room num and location id:</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="showMovieInfo" name="showMovieInfo">
            Movie: <input type="text" name="moviename"> <br /><br/>
            <!-- reward_points start at 0 -->
            <input type="submit" value="Show Movie info" name="insertSubmit"></p>
        </form>
		
		<hr/>
		<hr/>
		<h3>Enter movie name (or part of it) for showtime</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="showMovieTiming" name="showMovieTiming">
            Movie: <input type="text" name="moviename"> <br /><br/>
            <!-- reward_points start at 0 -->
            <input type="submit" value="Show Movie Timing" name="insertSubmit"></p>
        </form>
		
		<hr/>
		
		<h2>Food and Drinks</h2>
		
		<?php
		connectToDB();
		
		//SELECTION
		$fooditem = executePlainSQL("SELECT * FROM fooditem");
        printResultFooditem($fooditem);
		
		disconnectFromDB();
		?>
		
		<h3>Buy a food or drink item from the menu above ($1 for members, $2 for nonmembers):</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="buyFoodItem" name="buyFoodItem">
            Item Name: <input type="text" name="fooditem_name"> <br /><br/>
			Email: <input type="text" name="fooditem_email"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Buy Food Item" name="insertSubmit"></p>
        </form>
			
		
		<hr/>
		<h3>If you bought a gold ticket and want to know the items you have bought under your email:</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="showItemsBought" name="showItemsBought">
            Email: <input type="text" name="gold_ticket_email"> <br /><br/>
            <!-- reward_points start at 0 -->
            <input type="submit" value="Show Items Bought" name="insertSubmit"></p>
        </form>
		
		<hr/>
		<h3>If you bought a gold ticket, enter email to find out the number of food items purchased under your email:</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="showNumItems" name="showNumItems">
            Email: <input type="text" name="email"> <br /><br/>
            <!-- reward_points start at 0 -->
            <input type="submit" value="Show Num Items" name="insertSubmit"></p>
        </form>

		<hr/>
		<h2>Total Bill</h2>
		<h3>Total amount spent by person with given email:</h3>
		
		<form method="POST" action="theatres.php">
            <input type="hidden" id="getBill" name="getBill">
			Email: <input type="text" name="billed_email"> <br /><br/> <!-- reward_points start at 0 -->
            <input type="submit" value="Calculate Bill" name="insertSubmit"></p>
        </form>
		
		<hr/>
	
		<h2>Display All Tables</h2>
        <form method="GET" action="theatres.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayAllRequest" name="displayAllRequest">
            <input type="submit" value="DISPLAY" name="displayAll"></p>
        </form>
		
		<hr/>

        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>theatrechain</b>.<br>";
            echo "<table>";
            echo "<tr><th>chain_id</th><th>chain_name</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultTheatreChain($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>theatrechain</b>.<br>";
            echo "<table>";
            echo "<tr><th>chain_id</th><th>chain_name</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultTheatre($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>theatre</b>.<br>";
            echo "<table>";
            echo "<tr><th>loc_id</th><th>postal_code</th><th>city</th><th>province</th><th>chain_id</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultAuditorium($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>auditorium</b>.<br>";
            echo "<table>";
            echo "<tr><th>room_num</th><th>loc_id</th><th>num_rec_seats</th><th>num_nonrec_seats</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultMovieshowing($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>movieshowing</b>.<br>";
            echo "<table>";
            echo "<tr><th>movie_title</th><th>sdatetime</th><th>runtime</th><th>room_num</th><th>loc_id</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultNonrecseat($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>nonrec_seat</b>.<br>";
            echo "<table>";
            echo "<tr><th>nonrec_seatnum</th><th>room_num</th><th>loc_id</th><th>sdatetime</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultRecseat($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>rec_seat</b>.<br>";
            echo "<table>";
            echo "<tr><th>rec_seatnum</th><th>room_num</th><th>loc_id</th><th>sdatetime</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultCustomernonmember($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>customer_nonmember</b>.<br>";
            echo "<table>";
            echo "<tr><th>email</th><th>cname</th><th>phone_num</th><th>payment_method</th><th>chain_id</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultCustomermember($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>customer_member</b>.<br>";
            echo "<table>";
            echo "<tr><th>email</th><th>cname</th><th>phone_num</th><th>payment_method</th><th>chain_id</th><th>rewards_points</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultNormalticket($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>normalticket</b>.<br>";
            echo "<table>";
            echo "<tr><th>ticket_id</th><th>nprice</th><th>sdatetime</th><th>room_num</th><th>loc_id</th><th>nonrec_seatnum</th><th>email</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultGoldticket($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>goldticket</b>.<br>";
            echo "<table>";
            echo "<tr><th>ticket_id</th><th>nprice</th><th>sdatetime</th><th>room_num</th><th>loc_id</th><th>rec_seatnum</th><th>email</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		function printResultMovieInfo($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>movieshowing</b>.<br>";
            echo "<table>";
            echo "<tr><th>movie_title</th><th>sdatetime</th><th>room_num</th><th>loc_id</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultMovieTiming($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>movieshowing</b>.<br>";
            echo "<table>";
            echo "<tr><th>sdatetime</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }

		function printResultFooditem($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>fooditem</b>.<br>";
            echo "<table>";
            echo "<tr><th>itemname</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }
		
		function printResultFooditempurchase($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>fooditempurchase</b>.<br>";
            echo "<table>";
            echo "<tr><th>sale_id</th><th>email</th><th>itemname</th><th></th><th>itemprice</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
		}
		
		function printResultsItemsBought($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>join of fooditempurchase and gold ticket</b>.<br>";
            echo "<table>";
            echo "<tr><th>ticket_id</th><th>itemname</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }

		function printNumItems($result) { //prints results from a select statement
            echo "<br>Retrieved data from table <b>join and aggregation of fooditempurchase and gold ticket</b>.<br>";
            echo "<table>";
            echo "<tr><th>ticket_id</th><th>count(itemname)</th></tr>";
            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
        }

		
        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_gsebass1", "a45153228", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }
		
		
        function handleUpdateRequest() {
            global $db_conn;

            $old_name = $_POST['oldName'];
            $new_name = $_POST['newName'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Execute SQL script
			// https://w3programmings.com/how-to-execute-sql-file-in-php-web-applications/
			// https://forums.whirlpool.net.au/archive/1260310
			echo "<br>Reset the tables to default.<br>";
			executeTablesSQL();
			//("ora_gsebass1", "a45153228", "dbhost.students.cs.ubc.ca:1522/stu");
            OCICommit($db_conn);
        }

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insNo'],
                ":bind2" => $_POST['insName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM demoTable");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
            }
        }
		
		function handleDisplayRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT * FROM nonrec_seat");
            printResult($result);
        }
		
		// ASSIGNMENT INSERT IN ACTION
		function addMembershipRequest() {
			global $db_conn;
			
			$email = $_POST['add_customer_member_email'];
            $cname = $_POST['add_customer_member_cname'];
			$phone_num = $_POST['add_customer_member_phone_num'];
			$payment_method = $_POST['add_customer_member_payment_method'];
			$chain_id = $_POST['add_customer_member_chain_id'];
			
			//INSERT
            // you need the wrap the old name and new name values with single quotations
            //executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
			executePlainSQL("INSERT INTO customer_member VALUES ('" . $email . "', '" . $cname . "', '" . $phone_num . "', '" . $payment_method . "', " . $chain_id . ", 0 )"); 
			//0 reward_points initially
            OCICommit($db_conn);
		}
		
		// ASSIGNMENT DELETE IN ACTION
		function deleteMembershipRequest() {
			global $db_conn;
			
			$email = $_POST['delete_customer_member_email'];
			$chain_id = $_POST['delete_customer_member_chain_id'];

			//DELETE
            // you need the wrap the old name and new name values with single quotations
            //executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
			executePlainSQL("DELETE FROM customer_member WHERE email='" . $email . "' AND chain_id=" . $chain_id . ""); 
			//0 reward_points initially
            OCICommit($db_conn);
		}
		
		// ASSIGNMENT UPDATE IN ACTION
		function updateMembershipRequest() {
			global $db_conn;
			
			$old_email = $_POST['update_customer_member_current_email'];
			$old_chain_id = $_POST['update_customer_member_current_chain_id'];
            $cname = $_POST['update_customer_member_cname'];
			$phone_num = $_POST['update_customer_member_phone_num'];
			$payment_method = $_POST['update_customer_member_payment_method'];
			
			//DELETE
            // you need the wrap the old name and new name values with single quotations
            //executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
			executePlainSQL("UPDATE customer_member SET cname='" . $cname . "', phone_num='" . $phone_num . "', payment_method='" . $payment_method . "' WHERE email='" . $old_email . "' AND chain_id=" . $old_chain_id . ""); 
			//0 reward_points initially, reward_points unchanged
			OCICommit($db_conn);
		}
		
		function buyNormalTicketRequest() {
			global $db_conn;
			// SELECT USING MAX
			// MAX USED
			$max_normalticket = oci_fetch_row(executePlainSQL("SELECT MAX(ticket_id) FROM normalticket"));
			$email = $_POST['normalticket_email'];
			$inmembers = oci_fetch_row(executePlainSQL("SELECT count(*) FROM customer_member C WHERE C.email='" . $email . "'"));
			if (0 < $inmembers[0]) {
				$nprice = 2;
			} else {
				$nprice = 5;
			}
			
			$sdatetime = $_POST['normalticket_showtime'];
			$loc_id = $_POST['normalticket_loc_id'];
			$room_num = $_POST['normalticket_roomnum'];
			$nonrec_seat = $_POST['normalticket_seatnum'];
			
			$ticket_id = $max_normalticket[0] + 1;
			
			//INSERT
			executePlainSQL("INSERT INTO normalticket VALUES (" . $ticket_id . ", " . $nprice . ", '" . $sdatetime . "', " . $room_num . ", " . $loc_id . ", " . $nonrec_seat . ", '" . $email . "')");
			
			OCICommit($db_conn);
		}
		
		function buyGoldTicketRequest() {
			global $db_conn;
			// MAX USED
			$max_goldticket = oci_fetch_row(executePlainSQL("SELECT MAX(ticket_id) FROM goldticket"));
			$email = $_POST['goldticket_email'];
			// SELECTION
			$inmembers = oci_fetch_row(executePlainSQL("SELECT count(*) FROM customer_member C WHERE C.email='" . $email . "'"));
			if (0 < $inmembers[0]) {
				$nprice = 5;
			} else {
				$nprice = 10;
			}
			
			$sdatetime = $_POST['goldticket_showtime'];
			$loc_id = $_POST['goldticket_loc_id'];
			$room_num = $_POST['goldticket_roomnum'];
			$rec_seat = $_POST['goldticket_seatnum'];
			
			$ticket_id = $max_goldticket[0] + 1;
			
			executePlainSQL("INSERT INTO goldticket VALUES (" . $ticket_id . ", " . $nprice . ", '" . $sdatetime . "', " . $room_num . ", " . $loc_id . ", " . $rec_seat . ", '" . $email . "')");
			
			
			//UPDATE REWARDS POINTS FOR BUYING GOLD TICKET
			$rewards_points = oci_fetch_row(executePlainSQL("SELECT reward_points FROM customer_member WHERE email='" . $email . "'"));
			
			$new_rewards = $reward_points[0] + 1;
			
			executePlainSQL("UPDATE customer_member SET reward_points=" . $new_rewards . " WHERE email='" . $email . "'");
			
			OCICommit($db_conn);
		}

		//Projection
		function handleshowMovieInfo() {
			global $db_conn;
			
			$movie = $_POST['moviename'];
			//PROJECTION AND JOIN
			//PROJECTION
			$result = executePlainSQL("SELECT movie_title, sdatetime, room_num, loc_id
			from movieshowing where movie_title Like'%" . $movie . "%'"); 
			printResultMovieInfo($result);
			OCICommit($db_conn);
		}
		
		function handleshowMovieTime() {
			global $db_conn;
			
			$movie = $_POST['moviename'];
			//PROJECTION AND JOIN
			//PROJECTION
			$result = executePlainSQL("SELECT sdatetime
			from movieshowing where movie_title Like'%" . $movie . "%'"); 
			printResultMovieTiming($result);
			OCICommit($db_conn);
		}

		function buyFoodItemRequest() {
			global $db_conn;
			// MAX USED
			$max_fooditem = oci_fetch_row(executePlainSQL("SELECT MAX(sale_id) FROM fooditempurchase"));
			$email = $_POST['fooditem_email'];
			$inmembers = oci_fetch_row(executePlainSQL("SELECT count(*) FROM customer_member C WHERE C.email='" . $email . "'"));
			if (0 < $inmembers[0]) {
				$itemprice = 1;
			} else {
				$itemprice = 2;
			}
			
			$itemname = $_POST['fooditem_name'];
			
			$sale_id = $max_fooditem[0] + 1;
			
			executePlainSQL("INSERT INTO fooditempurchase VALUES (" . $sale_id . ", '" . $email . "', '" . $itemname . "', " . $itemprice . ")");
			
			OCICommit($db_conn);
		}
		function handleshowItemsNormalRequest() {
			global $db_conn;
			
			$email = $_POST['gold_ticket_email'];
			//PROJECTION AND JOIN
			//JOIN
			$result = executePlainSQL("SELECT N.ticket_id, fooditempurchase.itemname
			from goldticket N inner join fooditempurchase on fooditempurchase.email='" . $email . "' AND N.email='" . $email . "'"); 
			printResultsItemsBought($result);
			OCICommit($db_conn);
		}
		
		function handleshowNumItems() {
			global $db_conn;
			
			$email = $_POST['email'];
			//PROJECTION AND JOIN
			//AGGREGATION GROUP BY
			$result = executePlainSQL("SELECT G.ticket_id, count(F.sale_id) as counted from goldticket G, fooditempurchase F where F.email ='" . $email . "' AND G.email ='" . $email . "' GROUP BY G.ticket_id"); 
			printNumItems($result);
			OCICommit($db_conn);
		}


		function handleCalculateRequest() {
			global $db_conn;
			
			$email = $_POST['billed_email'];
			//PROJECTION AND JOIN
			
			$sumN = oci_fetch_row(executePlainSQL("SELECT SUM(N.nprice) FROM normalticket N WHERE N.email='" . $email . "'"));
			$sumG = oci_fetch_row(executePlainSQL("SELECT SUM(G.nprice) FROM goldticket G WHERE G.email='" . $email . "'"));
			$sumF = oci_fetch_row(executePlainSQL("SELECT SUM(F.itemprice) FROM fooditempurchase F WHERE F.email='" . $email . "'"));
			
			$total = $sumN[0] + $sumG[0] + $sumF[0]; 
			echo "<br> The total bill for " . $email . " is: " . $total . "<br>";
			
			OCICommit($db_conn);
		}

		function handleDisplayAllRequest() {
            global $db_conn;
			
			// ASSIGNMENT SELECTION IN ACTION
			$theatrechain = executePlainSQL("SELECT * FROM theatrechain");
            printResultTheatrechain($theatrechain);

            $theatre = executePlainSQL("SELECT * FROM theatre");
            printResultTheatre($theatre);
			
			$movieshowing = executePlainSQL("SELECT * FROM movieshowing");
            printResultMovieshowing($movieshowing);
			
			$nonrec_seat = executePlainSQL("SELECT * FROM nonrec_seat");
            printResultNonrecseat($nonrec_seat);
			
			$rec_seat = executePlainSQL("SELECT * FROM rec_seat");
            printResultRecseat($rec_seat);
			
			$customer_nonmember = executePlainSQL("SELECT * FROM customer_nonmember");
            printResultCustomernonmember($customer_nonmember);
			
			$customer_member = executePlainSQL("SELECT * FROM customer_member");
            printResultCustomermember($customer_member);
			
			$normalticket = executePlainSQL("SELECT * FROM normalticket");
            printResultNormalticket($normalticket);
			
			$goldticket = executePlainSQL("SELECT * FROM goldticket");
            printResultGoldticket($goldticket);
			
			$fooditem = executePlainSQL("SELECT * FROM fooditem");
            printResultFooditem($fooditem);
			
			$fooditempurchase = executePlainSQL("SELECT * FROM fooditempurchase");
            printResultFooditempurchase($fooditempurchase);
        }
    // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                } else if (array_key_exists('addMembershipRequest', $_POST)) {
                    addMembershipRequest();
                } else if (array_key_exists('deleteMembershipRequest', $_POST)) {
                    deleteMembershipRequest();
                } else if (array_key_exists('updateMembershipRequest', $_POST)) {
                    updateMembershipRequest();
                } else if (array_key_exists('buyNormalTicket', $_POST)) {
                    buyNormalTicketRequest();
                } else if (array_key_exists('buyGoldTicket', $_POST)) {
                    buyGoldTicketRequest();
                } else if (array_key_exists('showMovieInfo', $_POST)){
					handleshowMovieInfo();
				} else if (array_key_exists('showMovieTiming', $_POST)){
					handleshowMovieTime();
				} else if (array_key_exists('buyFoodItem', $_POST)) {
                    buyFoodItemRequest();
                } else if (array_key_exists('showItemsBought', $_POST)) {
					handleshowItemsNormalRequest();
				} else if (array_key_exists('showNumItems', $_POST)) {
					handleshowNumItems();
				} else if (array_key_exists('getBill', $_POST)) {
                    handleCalculateRequest();
                } 

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                } else if (array_key_exists('displayTuples', $_GET)) {
                    handleDisplayRequest();
				} else if (array_key_exists('displayAll', $_GET)) {
					handleDisplayAllRequest();
				}

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSumbit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest'])) {
            handleGETRequest();
        }  else if (isset($_GET['displayTupleRequest'])) {
            handleGETRequest();
        } else if (isset($_GET['displayAllRequest'])) {
			handleGETRequest();
		}
		
		function executeTablesSQL() {
			executePlainSQL("drop table fooditempurchase cascade constraints");
			executePlainSQL("drop table fooditem cascade constraints");
			executePlainSQL("drop table normalticket cascade constraints");
			executePlainSQL("drop table goldticket cascade constraints");
			executePlainSQL("drop table customer_nonmember cascade constraints");
			executePlainSQL("drop table customer_member cascade constraints");
			executePlainSQL("drop table rec_seat cascade constraints");
			executePlainSQL("drop table nonrec_seat cascade constraints");
			executePlainSQL("drop table movieshowing cascade constraints");
			executePlainSQL("drop table auditorium cascade constraints");
			executePlainSQL("drop table theatre cascade constraints");
			executePlainSQL("drop table theatrechain cascade constraints");
			
			executePlainSQL("create table theatrechain(
				chain_id integer not null,
				chain_name char(40),
				primary key (chain_id)
			)");
			
			executePlainSQL("grant select on theatrechain to public");

			executePlainSQL("create table theatre(
				loc_id integer not null,
				postal_code char(6) null,
				city char(20) null,
				province char(20) null,
				chain_id integer not null,
				primary key (loc_id),
				foreign key (chain_id) references theatrechain ON DELETE CASCADE
			)");

			executePlainSQL("grant select on theatre to public");

			executePlainSQL("create table auditorium(
				room_num integer not null,
				loc_id integer not null,
				num_rec_seats integer not null,
				num_nonrec_seats integer not null,
				primary key (room_num, loc_id),
				foreign key (loc_id) references theatre ON DELETE CASCADE
			)");

			executePlainSQL("grant select on auditorium to public");

			executePlainSQL("create table movieshowing(
				movie_title char(40) not null,
				sdatetime char(40) not null,
				runtime char(10) null,
				room_num integer not null,
				loc_id integer not null,
				primary key (sdatetime, room_num, loc_id),
				foreign key (room_num, loc_id) references auditorium ON DELETE CASCADE
			)");

			executePlainSQL("grant select on movieshowing to public");

			
			executePlainSQL("create table nonrec_seat(
				nonrec_seatnum integer not null,
				room_num integer not null,
				loc_id integer not null,
				sdatetime char(40) not null,
				primary key (nonrec_seatnum, room_num, loc_id, sdatetime),
				foreign key (sdatetime, room_num, loc_id) references movieshowing ON DELETE CASCADE 
			)");

			executePlainSQL("grant select on nonrec_seat to public");

			executePlainSQL("create table rec_seat(
				rec_seatnum integer not null,
				room_num integer not null,
				loc_id integer not null,
				sdatetime char(40) not null,
				
				primary key (rec_seatnum, room_num, loc_id, sdatetime),
				foreign key (sdatetime, room_num, loc_id) references movieshowing ON DELETE CASCADE 
			)");

			executePlainSQL("grant select on rec_seat to public");

			executePlainSQL("create table customer_nonmember(
				email char(40) not null,
				cname char(40) null,
				phone_num char(20) null,
				payment_method char(40) not null,
				chain_id integer not null,
				primary key (email),
				foreign key (chain_id) references theatrechain ON DELETE CASCADE
			)");

			executePlainSQL("grant select on customer_nonmember to public");

			executePlainSQL("create table customer_member(
				email char(40) not null,
				cname char(40) not null,
				phone_num char(20) unique not null,
				payment_method char(40) not null,
				chain_id integer not null,
				reward_points integer not null,
				primary key (email),
				foreign key (chain_id) references theatrechain ON DELETE CASCADE
			)");

			executePlainSQL("grant select on customer_member to public");

			executePlainSQL("create table normalticket(
				ticket_id integer not null,
				nprice integer not null,
				sdatetime char(40),
				room_num integer not null,
				loc_id integer not null,
				nonrec_seatnum integer not null,
				email char(40) not null,
				unique (nonrec_seatnum, room_num, loc_id),
				primary key (ticket_id),
				
				foreign key (nonrec_seatnum, room_num, loc_id, sdatetime) references nonrec_seat ON DELETE CASCADE
			)");

			executePlainSQL("grant select on normalticket to public");

			executePlainSQL("create table goldticket(
				ticket_id integer not null,
				nprice integer not null,
				sdatetime char(40),
				room_num integer not null,
				loc_id integer not null,
				rec_seatnum integer not null,
				email char(40) not null,
				unique (rec_seatnum, room_num, loc_id),
				primary key (ticket_id),
				foreign key (rec_seatnum, room_num, loc_id, sdatetime) references rec_seat ON DELETE CASCADE
			)");

			executePlainSQL("grant select on goldticket to public"); 

			executePlainSQL("create table fooditem(
				itemname char(20) not null,
				primary key (itemname)
			)");

			executePlainSQL("grant select on fooditem to public"); 

			executePlainSQL("create table fooditempurchase(
				sale_id integer not null, 
				email char(40) not null,
				itemname char(20) not null,
				itemprice integer,
				primary key (sale_id),
				foreign key (itemname) references fooditem ON DELETE CASCADE
			)");

			executePlainSQL("grant select on fooditempurchase to public"); 

			executePlainSQL("insert into theatrechain values(001, 'AMC')");

			executePlainSQL("insert into theatre values(001, 'AAA111', 'Vancouver', 'British Columbia', 001)");

			executePlainSQL("insert into auditorium values(1, 001, 10, 30)");

			executePlainSQL("insert into movieshowing values('Spider-Man: No Way Home', '2021-12-17 12:00:00', '120 min', 1, 001)");
			executePlainSQL("insert into movieshowing values('The King''s Man', '2021-12-17 15:00:00', '120 min', 1, 001)");

			executePlainSQL("insert into nonrec_seat values(1, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(2, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(3, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(4, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(5, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(6, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(7, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into nonrec_seat values(8, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(1, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(2, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(3, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(4, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(5, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(6, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(7, 1, 001, '2021-12-17 12:00:00')");
			executePlainSQL("insert into rec_seat values(8, 1, 001, '2021-12-17 12:00:00')");
			
			executePlainSQL("insert into nonrec_seat values(1, 1, 001, '2021-12-17 15:00:00')");
			executePlainSQL("insert into rec_seat values(1, 1, 001, '2021-12-17 15:00:00')");

			executePlainSQL("insert into customer_nonmember values('customer1@mail.com', 'Customer One', '6047773421', 'MasterCard', 001)");
			executePlainSQL("insert into customer_member values('customer2@mail.com', 'Customer Two', '6047773422', 'MasterCard', 001, 0)");

			executePlainSQL("insert into normalticket values(001, 5.00, '2021-12-17 12:00:00', 1, 001, 1, 'customer1@mail.com')");
			executePlainSQL("insert into goldticket values(001, 5.00, '2021-12-17 12:00:00', 1, 001, 1, 'customer2@mail.com')");

			executePlainSQL("insert into fooditem values('Popcorn')");
			executePlainSQL("insert into fooditem values('Hot Dog')");
			executePlainSQL("insert into fooditem values('Juice')");
			executePlainSQL("insert into fooditem values('Coke')");

			executePlainSQL("insert into fooditempurchase values(001, 'customer1@mail.com', 'Popcorn', 2.00)");

			executePlainSQL("insert into fooditempurchase values(002, 'customer2@mail.com', 'Popcorn', 1.00)");
		}
		
		?>
	</body>
</html>
