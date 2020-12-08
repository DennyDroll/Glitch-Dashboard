



        <div id="navbar">
            <a href="/"> <img id="Logo" src="/img/Glitch-Logo.png" alt="Logo"></a>
            <!-- Dropdown Menu -->
            <?php 
                include "connect.php";
            ?>               
            <div  class="dropdown">
                <!-- <button id="com_sel_button" class="dropbtn" onclick="CommitteeSelection()" value="0">Choose a committee</button> -->
                <!-- <span class="dropdwn-wrapper"> -->
                    <select id="sel_committee" class="dropdown-content" onclick='changeName()'>
                        <span><a href="#" >
                            <?php 
                                // Fetch committees
                                $sql_committees = "SELECT * FROM committees";
                                $committees_data = mysqli_query($con,$sql_committees);
                                while($row = mysqli_fetch_assoc($committees_data) ){
                                    $comID = $row['COMID'];
                                    $com_name = $row['COM_NAME'];
                                    
                                    // Option
                                    echo "<option  id='comID-".$comID."' value='".$comID."' >".$com_name."</option>";
                                }
                            ?>
                        </a></span>
                    </select>
                <!-- </span> -->
            </div>
            <p id="date" class="timeDate">c-date</p>
            <p id="time" class="timeDate">c-time</p>
            <button id="userBtn">
            <a href="./logout.php">
                <img  src="/img/logout.svg" alt="User-Icon">
            </a>
            </button>
        </div>
        <div class="container">