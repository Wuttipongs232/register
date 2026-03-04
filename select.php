<?php
    require "connect.php";

    $sql = "SELECT *
            FROM student 
            INNER JOIN register ON student.studentID = register.studentID
            INNER JOIN registerdetail ON register.RegisID = registerdetail.RegisID
            INNER JOIN course= ON registerdetail.courseID = course.courseID";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
?>

<table width="1000" border="1">
    <tr>
        <th width="90"><div align="center">รหัสนักศึกษา</div></th>
        <th width="90"><div align="center">ชื่อจริง</div></th>
        <th width="90"><div align="center">นามสกุล</div></th>
        <th width="50"><div align="center">รหัสวิชา</div></th>
        <th width="200"><div align="center">ชื่อวิชา</div></th>
        <th width="50"><div align="center">หน่วยกิต</div></th>
        <th width="50"><div align="center">เกรด</div></th>
    </tr>

    <?php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td>
            <div align="center">
                <a href="detail.php?StudentID=<?php echo $result['studentID']; ?>">
                    <?php echo $result['studentID']; ?>
                </a>
            </div>
        </td>
        <td><div align="center"><?php echo $result["stFirstName"]; ?></div></td>
        <td><div align="center"><?php echo $result["stLastName"]; ?></div></td>
        <td><div align="center"><?php echo $result["courseID"]; ?></div></td>
        <td><?php echo $result["courseName"]; ?></td>
        <td><div align="center"><?php echo $result["coursecredit"]; ?></div></td>
        <td><div align="center"><?php echo $result["grade"]; ?></div></td>
    </tr>
    <?php
    }
    ?>
</table>
