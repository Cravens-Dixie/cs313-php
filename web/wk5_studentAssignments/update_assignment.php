<?php
require('dbConnect.php');
$db = get_db();

$assignmentId = htmlspecialchars($_GET['assign_id']);


$query = 'SELECT a.assignment, a.course_id, a.due_date, c.course_name 
FROM assignments a
INNER JOIN courses c ON c.course_id = a.course_id
WHERE a.assignment_id = :assignment_id';
$stmt = $db->prepare($query);
$stmt->bindValue(':assignment_id', $assignmentId, PDO::PARAM_INT);
$stmt->execute();
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'student_header.php';
?>
<body>

<div class="container pt-4">
    <h2 class="pt-5">UpdateAssignment</h2>

    <form action="insert_updatedAssign.php" method="post">
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" name="course" class="form-control" id="course" value="<?php echo $assignments['course_name'];?>">
        </div>
        <div class="form-group">
            <label for="dueDate">Due Date:</label>
            <input type="date" name="dueDate" class="form-control" id="dueDate" value="<?php echo $assignments['due_date'];?>">
        </div>
        <div class="form-group">
            <label for="assignment">Assignment Instructions:</label>
            <textarea class="form-control"  name="assignment" rows="5" id="assignment"><?php echo $assignments['assignment'];?></textarea>
        </div>
        <input type="hidden" name="course_id" value="<?php echo $assignments['course_id'];?>">
        <input type="hidden" name="assignment_id" value="<?php echo $assignmentId;?>">
        <button type="submit" class="btn btn-primary">Update Assignment</button>

    </form>
</div>
<?php include('footer_assignmentTracker.php');?>
</body>
</html>

