<html> 
<head>
    <title>ระบบแสดงข้อมูลการลงทะเบียน</title>
</head>
<body>

<?php
    $result = null; 
    $strStudentID = "";

    if (isset($_GET["StudentID"])) {
        $strStudentID = trim($_GET["StudentID"]);
    }

    if (!empty($strStudentID)) {
        require "connect.php";
        $sql = "SELECT *
                FROM student 
                INNER JOIN register ON student.studentID = register.studentID
                INNER JOIN registerdetail ON register.RegisID = registerdetail.RegisID
                INNER JOIN course ON registerdetail.courseID = course.courseID 
                WHERE student.studentID = ?";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($strStudentID));

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<?php if ($result): ?>
    <h2>ข้อมูลการลงทะเบียนของ <?php echo $result["stFirstName"]; ?></h2>
    
    <table width="500" border="1" cellpadding="5" cellspacing="0">
      <tr>
        <th width="150" align="left">ชื่อ-นามสกุล</th>
        <td><?php echo $result["stFirstName"] . " " . $result["stLastName"]; ?></td>
      </tr>
      <tr>
        <th align="left">รหัสลงทะเบียน</th>
        <td><?php echo $result["RegisID"]; ?></td>
      </tr>
      <tr>
        <th align="left">รหัสวิชา</th>
        <td><?php echo $result["courseID"]; ?></td>
      </tr>
      <tr>
        <th align="left">ชื่อวิชา</th>
        <td><?php echo $result["courseName"]; ?></td>
      </tr>
      <tr>
        <th align="left">หน่วยกิต</th>
        <td><?php echo $result["coursecredit"]; ?></td>
      </tr>
      <tr>
        <th align="left">เทอม / ปีการศึกษา</th>
        <td><?php echo $result["term"]." / ".$result["years"]; ?></td>
      </tr>
    </table>

<?php elseif ($strStudentID != ""): ?>
    <p style="color:red;">ไม่พบรหัสนักศึกษา: <?php echo htmlspecialchars($strStudentID); ?></p>
<?php endif; ?>

</body>

</html>
