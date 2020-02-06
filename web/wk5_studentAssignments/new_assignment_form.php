<?php

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="author" content="Dixie Cravens">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
    <body>

      <div class="container">
         <h2>Create a new Assignment</h2>
         <p>Select a course from the menu. Note, the course must exist before any assignments are created.</p>
         <p>Click on the desired course and the fields will become available.</p>
         <div class="dropdown">
           <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Courses
           <span class="caret"></span></button>
           <ul class="dropdown-menu">
             <!--TODO code here to pull courses from database, not hard coded like it is now-->
             <li><a href="#">Pre-Calculus</a></li>
             <li><a href="#">CS 313</a></li>
             <li><a href="#">Epsilon</a></li>
             <li><a href="#">Spanish</a></li>
           </ul>
         </div>
         <div class="container">
            <div class="form-group">
               <label for="dueDate">Due Date:</label>
               <input type="date" class="form-control" id="dueDate">
            </div>
            <div class="form-group">
               <label for="assignment">Assignment Instructions:</label>
               <textarea class="form-control" rows="5" id="assignment"></textarea>
            </div>
         </div>
      </div>

    </body>
</html>
