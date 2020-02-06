<?php
?>
<!DOCTYPE html>
<html>
<?php
include 'student_header.php';
?>
<body>

<div class="container">
    <h2>Create a new student</h2>
    <p>Type in the new student's full name in the box below.</p>
    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" id="name">
    </div>
    <h2>Select Courses</h2>
    <p>The form below contains three checkboxes. The last option is disabled:</p>
    <form>
        <div class="checkbox">
            <label><input type="checkbox" value="">Option 1</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Option 2</label>
        </div>
        <div class="checkbox disabled">
            <label><input type="checkbox" value="" disabled>Option 3</label>
        </div>
    </form>
</div>


</body>
</html>