<?php

include "config.php";


if(isset($_POST['name']))
{

    if(!mysqli_select_db($con, $dbname))
    {
        echo 'Database not selected';
    }

    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $year1 = $_POST['year1'];
    $year2 = $_POST['year2'];
    $semtype = $_POST['semtype'];
    
    $dept = $_POST['dept'];
    $sem = $_POST['sem'];
    $sec = $_POST['sec'];
    $proc_usrnm = $_POST['proc_usrnm'];
    
    $course1 = $_POST['course1'];
    $r_type1 = $_POST['r_type1'];
    $att_nm1 = $_POST['att_nm1'];
    
    $course2 = $_POST['course2'];
    $r_type2 = $_POST['r_type2'];
    $att_nm2 = $_POST['att_nm2'];
    
    $course3 = $_POST['course3'];
    $r_type3 = $_POST['r_type3'];
    $att_nm3 = $_POST['att_nm3'];
    
    $course4 = $_POST['course4'];
    $r_type4 = $_POST['r_type4'];
    $att_nm4 = $_POST['att_nm4'];
    
    $course5 = $_POST['course5'];
    $r_type5 = $_POST['r_type5'];
    $att_nm5 = $_POST['att_nm5'];
    
    $tot_course = $_POST['tot_course'];
    $tot_credit = $_POST['tot_credit'];
    
    
    $sql = "INSERT INTO registab (name,usn,year1,year2,semtype,dept,sem,sec,proc_usrnm,course1,r_type1,att_nm1,course2,r_type2,att_nm2,course3,r_type3,att_nm3,course4,r_type4,att_nm4,course5,r_type5,att_nm5,tot_course,tot_credit) VALUES ('$name','$usn','$year1','$year2','$semtype','$dept','$sem','$sec','$proc_usrnm','$course1','$r_type1','$att_nm1','$course2','$r_type2','$att_nm2','$course3','$r_type3','$att_nm3','$course4','$r_type4','$att_nm4','$course5','$r_type5','$att_nm5','$tot_course','$tot_credit')";
    
    if(!mysqli_query($con, $sql))
    {
        echo 'Not Registered';
    }
    else
    {
        echo 'Registered';
    }

}

?>


<html>
<head>
<title>Student Registration Form</title>
<script src="jquery-1.12.0.min.js" type="text/javascript"></script>
</head>
 
<body bgcolor="#E6E6FA">
<h1 align="center">BMS COLLEGE OF ENGINEERING, BANGALORE - 19</h1>
<h2 align="center">Autonomous Institute, affilated to VTU</h2>
<h1 align="center">COURSE REGISTRATION FOR THE ACADEMIC YEAR 2018 - 2019</h1>
<br \>
<br \>
<form action="regg.php" method="post">
 
<table align="center" cellpadding = "10">
 
<tr>
<td>Name</td>
<td><input type="text" name="name" required maxlength="30"/>
</td>
</tr>
 
<tr>
<td>USN</td>
<td><input type="text" name="usn" maxlength="30" required />
</td>
</tr>
 
<tr>
<td>Academic Year</td>
 
<td>
 
<select name="year1" id="acc_Year1" required>
 
<option value="-1">Year:</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>

</select>
 To 
<select name="year2" id="acc_Year2" required>
 
<option value="-1">Year:</option>
<option value="2020">2020</option>
<option value="2019">2019</option>
<option value="2018">2018</option>

</select>
</td>
</tr>

<!----- Course ---------------------------------------------------------->
<tr>
<td>Semester Type</td>
<td>
<select name="semtype" id="" required>
 
<option value="-1">Year:</option>
<option value="Odd">Odd</option>
<option value="Even">Even</option>
<option value="Fast Track">Fast Track</option>

</select>

</td>
</tr>
    
<tr>
<td>Department</td>
<td><input type="text" name="dept" maxlength="100" required /></td>
</tr>
 
<tr>
<td>Semester</td>
<td>
<select name="sem" id="acc_Year1">
 
<option value="-1">- Select -</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>

</select>
</td>
</tr>
 
<tr>
<td>Section</td>
<td>
<input type="text" name="sec" maxlength="10" />
</td>
</tr>
    
<tr>
<td>Proctor</td>
 
<td>
 
<select name="proc_usrnm" id="proc">
 
<option value="-1">- Select -</option>
<option value="mca_prc_vk">mca_prc_vk</option>
<option value="mca_prc_rmr">mca_prc_rmr</option>
<option value="mca_prc_uma">mca_prc_uma</option>
</select>
</td>
</tr>

</table>
<tr>
<td></td>
 <br \>
 <br \>    
<td>
<table style="margin-left:200px;">
                    <tr>
                        <td><b>Sl.No.</b></td>
                        <td><b>Course Title</b></td>
                        <td><b>Course Code</b></td>
                        <td><b>Registration Type</b></td>
                        <td><b>Attempt number</b></td>
                        <td><b>Credits</b></td>
                    </tr>
 
                        
                        
                    <tr>
                        <td>1</td>
                        
                        <td><select id="sel_title" name ="course1" onchange="remove_dup(this)">
                                <option value="0">- Select Title -</option>
                                <?php 
                                // Fetch Course
                                $sql_course = "SELECT * FROM course";
                                $course_data = mysqli_query($con,$sql_course);
                                while($row = mysqli_fetch_assoc($course_data) ){
                                $courseid = $row['id'];
                                $c_title = $row['c_title'];
              
                                // Option
                                echo "<option value='".$courseid."' class='{$courseid}' >".$c_title."</option>";
                                }
                                ?>
                            </select>
                        </td>
 
                        
                        <td><select id="sel_code">
                            <option value="0">- Select Code -</option>
                        </select></td>
                        <td><select name="r_type1" id = "rrty1" />
                            <option value="-1">Select Registration Type</option>
                            <option value="1">Regular</option>
                            <option value="2">Re-register</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select name="att_nm1" id = "atmt1" />
                        <option value="-1">Select Attempt</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select id="sel_cred">
                                <option value="0">- Select Credits -</option>
                            </select></td>
                    </tr>
                        
                        
                        
                    <tr>
                        <td>2</td>
                        
                        <td><select id="sel_title2" name ="course2" onchange="remove_dup(this)">
                                <option value="0">- Select Title -</option>
                                <?php 
                                // Fetch Course
                                $sql_course = "SELECT * FROM course";
                                $course_data = mysqli_query($con,$sql_course);
                                while($row = mysqli_fetch_assoc($course_data) ){
                                $courseid = $row['id'];
                                $c_title = $row['c_title'];
              
                                // Option
                                echo "<option value='".$courseid."' class='{$courseid}' >".$c_title."</option>";
                                }
                                ?>
                            </select>
                        </td>
 
                        
                        <td><select id="sel_code2">
                            <option value="0">- Select Code -</option>
                        </select></td>
                        <td><select name="r_type2" id = "rrty1" />
                            <option value="-1">Select Registration Type</option>
                            <option value="1">Regular</option>
                            <option value="2">Re-register</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select name="att_nm2" id = "atmt1" />
                        <option value="-1">Select Attempt</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select id="sel_cred2">
                                <option value="0">- Select Credits -</option>
                            </select></td>
                        
                    </tr>
                        
                        <tr>
                        <td>3</td>
                        
                        <td><select id="sel_title3" name ="course3" onchange="remove_dup(this)">
                                <option value="0">- Select Title -</option>
                                <?php 
                                // Fetch Course
                                $sql_course = "SELECT * FROM course";
                                $course_data = mysqli_query($con,$sql_course);
                                while($row = mysqli_fetch_assoc($course_data) ){
                                $courseid = $row['id'];
                                $c_title = $row['c_title'];
              
                                // Option
                                echo "<option value='".$courseid."' class='{$courseid}' >".$c_title."</option>";
                                }
                                ?>
                            </select>
                        </td>
 
                        
                        <td><select id="sel_code3">
                            <option value="0">- Select Code -</option>
                        </select></td>
                        <td><select name="r_type3" id = "rrty1" />
                            <option value="-1">Select Registration Type</option>
                            <option value="1">Regular</option>
                            <option value="2">Re-register</option>
                            <option value="NA">NA</option>
                            </td>
                        <td><select name="att_nm3" id = "atmt1" />
                        <option value="-1">Select Attempt</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select id="sel_cred3">
                                <option value="0">- Select Credits -</option>
                            </select></td>
                        
                    </tr>
                        
                    <tr>
                        <td>4</td>
                        
                        <td><select id="sel_title4" name ="course4" onchange="remove_dup(this)">
                                <option value="0">- Select Title -</option>
                                <?php 
                                // Fetch Course
                                $sql_course = "SELECT * FROM course";
                                $course_data = mysqli_query($con,$sql_course);
                                while($row = mysqli_fetch_assoc($course_data) ){
                                $courseid = $row['id'];
                                $c_title = $row['c_title'];
              
                                // Option
                                echo "<option value='".$courseid."' class='{$courseid}' >".$c_title."</option>";
                                }
                                ?>
                            </select>
                        </td>
 
                        
                        <td><select id="sel_code4">
                            <option value="0">- Select Code -</option>
                        </select></td>
                        <td><select name="r_type4" id = "rrty1" />
                            <option value="-1">Select Registration Type</option>
                            <option value="1">Regular</option>
                            <option value="2">Re-register</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select name="att_nm4" id = "atmt1" />
                        <option value="-1">Select Attempt</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select id="sel_cred4">
                                <option value="0">- Select Credits -</option>
                            </select></td>
                        
                    </tr> 
                        
                     <tr>
                        <td>5</td>
                        
                        <td><select id="sel_title5" name ="course5" onchange="remove_dup(this)">
                                <option value="0">- Select Title -</option>
                                <?php 
                                // Fetch Course
                                $sql_course = "SELECT * FROM course";
                                $course_data = mysqli_query($con,$sql_course);
                                while($row = mysqli_fetch_assoc($course_data) ){
                                $courseid = $row['id'];
                                $c_title = $row['c_title'];
              
                                // Option
                                echo "<option value='".$courseid."' class='{$courseid}' >".$c_title."</option>";
                                }
                                ?>
                            </select>
                        </td>
 
                        
                        <td><select id="sel_code5">
                            <option value="0">- Select Code -</option>
                        </select></td>
                        <td><select name="r_type5" id = "rrty1" />
                            <option value="-1">Select Registration Type</option>
                            <option value="1">Regular</option>
                            <option value="2">Re-register</option>
                            <option value="NA">NA</option>
                         </td>
                        <td><select name="att_nm5" id = "atmt1" />
                        <option value="-1">Select Attempt</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="NA">NA</option>
                        </td>
                        <td><select id="sel_cred5">
                                <option value="0">- Select Credits -</option>
                            </select></td>
                        
                    </tr> 
    <tr>
                            <td colspan="2" align="center">TOTAL NUMBER OF COURSES</td>
                            <td><input type="text" name="tot_course" maxlength="10" /></td>
                            <td>     </td>
                            <td align="center">TOTAL NUMBER OF CREDITS</td>
                            <td><input type="text" name="tot_credit" max="30" /></td>
    </tr>
    
                    <tr>
                        <td colspan="2" align="center" style ="float-right;">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </td>
                    </tr>

</table>
</tr>

</form>
<script type="text/javascript">
        
        function remove_dup(id){
            //alert($(id).val());
            $("."+$(id).val()).hide();
            $($(id).attr("class")+" ."+$(id).val()).show();
        }
        
        $(document).ready(function(){
            

            $("#sel_title").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_code").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#sel_code").append("<option value='"+id+"'>"+code+"</option>");

                        }
                        
                        $("#sel_cred").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var cred = response[i]['credits'];

                            $("#sel_cred").append("<option value='"+id+"'>"+cred+"</option>");

                        }
                        
                    }
                });
            });

        });
        
        $(document).ready(function(){

            $("#sel_title2").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_code2").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#sel_code2").append("<option value='"+id+"'>"+code+"</option>");

                        }
                        
                        $("#sel_cred2").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var cred = response[i]['credits'];

                            $("#sel_cred2").append("<option value='"+id+"'>"+cred+"</option>");

                        }
                        
                    }
                });
            });

        });
        
        $(document).ready(function(){

            $("#sel_title3").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_code3").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#sel_code3").append("<option value='"+id+"'>"+code+"</option>");

                        }
                        
                        $("#sel_cred3").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var cred = response[i]['credits'];

                            $("#sel_cred3").append("<option value='"+id+"'>"+cred+"</option>");

                        }
                        
                    }
                });
            });

        });
        
        $(document).ready(function(){

            $("#sel_title4").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_code4").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#sel_code4").append("<option value='"+id+"'>"+code+"</option>");

                        }
                        
                        $("#sel_cred4").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var cred = response[i]['credits'];

                            $("#sel_cred4").append("<option value='"+id+"'>"+cred+"</option>");

                        }
                        
                    }
                });
            });

        });
        
        $(document).ready(function(){

            $("#sel_title5").change(function(){
                var deptid = $(this).val();

                $.ajax({
                    url: 'getUsers.php',
                    type: 'post',
                    data: {depart:deptid},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;

                        $("#sel_code5").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var code = response[i]['code'];

                            $("#sel_code5").append("<option value='"+id+"'>"+code+"</option>");

                        }
                        
                        $("#sel_cred5").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var cred = response[i]['credits'];

                            $("#sel_cred5").append("<option value='"+id+"'>"+cred+"</option>");

                        }
                        
                    }
                });
            });

        });
    </script>     
</body>
</html>