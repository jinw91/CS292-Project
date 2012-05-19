<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
</head>
<body>
<!-- content -->
<section id="content">  
	<div style='position: relative;'>
    <div class="wrapper border_bottom">
        	<div class="grid_4">
                <form action="search.php" method="post">
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Candidates: </label>
                </div>
                <ul id="search">
                <li><label for="name" style="float: left;">Name: </label>
                <input name="name" size="25" /></li>
                <li><label for="major" style="float: left;">Major: </label>
                <select name="major" size="1">
                <option>Biomedical Engineering</option>
                <option>Civil Engineering</option>
                <option>Computer Science</option>
                <option>Computer Engineering</option>
                <option>Economics</option>
                <option>Human Organizational Development</option>
                <option>Mechanical Engineering</option>
                </select></li>
                <li><label for="college[]" style="float: left;">School: </label>
                <select name="college[]" multiple="multiple" size="1">
                <option value='Vanderbilt University'>Vanderbilt University</option>
                <option value='Duke University'>Duke University</option>
                <option value='Northwestern University'>Northwestern University</option>
                <option value='University of Chicago'>University of Chicago</option>
                <option value='University of Notre Dame'>University of Notre Dame</option>
                <option value='University of North Carolina'>University of North Carolina</option>
                <option value='University of Virginia'>University of Virginia</option>
                <option value='Washington University in St. Louis'>Washington University in St. Louis</option>
                </select>
                </li>
                <li><label for="gpa" style="float: left;">Minimum GPA: </label>
                <input name="gpa" size="25"  /></li>
                <li><label for="work_start" style="float: left;">Work Experience: </label>
                <input name="work_start" size="10" style="width: 150px;"/> Years</li>
                <li><label for="skills" style="float:left;">Skill(s): </label><input name="skills" size="25"></li>
                <!--<li><label for='either' style='float: left;'>Any/All Majors</label><input type="checkbox" name='either'></li>-->
                <input type="submit" name="search" value="Search"/>
                </ul>
                </form>
            </div>
        </div>        
	</div>
</section>
</body>
</html>