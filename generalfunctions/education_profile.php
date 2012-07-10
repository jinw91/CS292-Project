<?php
session_start();

function about($eid)
{
	return("Hello, Testing");/**"<h2>Enrollment (Fall 2011)</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='65%'>Undergraduate</td>
                          <td width='35%'>6,817</td>
                        </tr>
                        <tr>
                          <td width='65%'>Graduate &amp; professional</td>
                          <td width='35%'>6,042</td>
                        </tr>
                        <tr>
                          <td width='65%'>Total</td>
                          <td width='35%'>12,859</td>
                        </tr>
                      </tbody>
                    </table>
                    <h2>Undergraduate Admission Fall 2011</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='65%'>First-year applicants</td>
                          <td width='35%'>24,837</td>
                        </tr>
                        <tr>
                          <td width='65%'>Admits</td>
                          <td width='35%'>4,078</td>
                        </tr>
                        <tr>
                          <td width='65%'>Admit rate</td>
                          <td width='35%'>16.4%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Enrolled First-Year Students</td>
                          <td width='35%'>1,601</td>
                        </tr>
                      </tbody>
                    </table>
                    <a id='first' name='first'></a>
                    <h2>First-Year Students Entering Fall 2011</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='65%'>Female</td>
                          <td width='35%'>51%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Male</td>
                          <td width='35%'>49%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Hispanics of any race</td>
                          <td width='35%'>7.8%</td>
                        </tr>
                        <tr>
                          <td width='65%'>American Indian or Alaska Native</td>
                          <td width='35%'>0.1%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Asian or Hawaiian/Pacific Islander</td>
                          <td width='35%'>7.8%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Black/African American</td>
                          <td width='35%'>8.0%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Two or more races</td>
                          <td width='35%'>5.6%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Total Minority</td>
                          <td width='35%'>29.2%</td>
                        </tr>
                        <tr>
                          <td width='65%'>International</td>
                          <td width='35%'>5.8%</td>
                        </tr>
                        <tr>
                          <td width='65%'>SAT (CR + M) Middle 50%</td>
                          <td width='35%'>1380 - 1550</td>
                        </tr>
                        <tr>
                          <td width='65%'>SAT Critical Reading Middle 50%</td>
                          <td width='35%'>680 - 770</td>
                        </tr>
                        <tr>
                          <td width='65%'>SAT Math Middle 50%</td>
                          <td width='35%'>700 - 780</td>
                        </tr>
                        <tr>
                          <td width='65%'>SAT Writing Middle 50%</td>
                          <td width='35%'>670 - 760</td>
                        </tr>
                        <tr>
                          <td width='65%'>ACT Middle 50%</td>
                          <td width='35%'>31 - 34</td>
                        </tr>
                        <tr>
                          <td width='65%'>Students ranked in the top 10% of their class</td>
                          <td width='35%'>89%</td>
                        </tr>
                        <tr>
                          <td width='65%'>National Merit Scholars</td>
                          <td width='35%'>243</td>
                        </tr>
                        <tr>
                          <td width='65%'>National Achievement Scholars</td>
                          <td width='35%'>12</td>
                        </tr>
                      </tbody>
                    </table>
                    <h2>High Schools Attended (Fall 2011 Enrolled First-Year Students)</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='65%'>Public</td>
                          <td width='35%'>58%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Private</td>
                          <td width='35%'>35%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Other</td>
                          <td width='35%'>7%</td>
                        </tr>
                      </tbody>
                    </table>
                    <h2>2011/12 Undergraduate Student Population</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='65%'>Female</td>
                          <td width='35%'>50%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Male</td>
                          <td width='35%'>50%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Hispanics of any race</td>
                          <td width='35%'>7.7%</td>
                        </tr>
                        <tr>
                          <td width='65%'>American Indian or Alaska Native</td>
                          <td width='35%'>0.3%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Asian or Hawaiian/Pacific Islander</td>
                          <td width='35%'>7.5%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Black/African American</td>
                          <td width='35%'>7.5%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Two or more races</td>
                          <td width='35%'>4.1%</td>
                        </tr>
                        <tr>
                          <td width='65%'>Total minority</td>
                          <td width='35%'>27.1%</td>
                        </tr>
                        <tr>
                          <td width='65%'>International</td>
                          <td width='35%'>5.4%</td>
                        </tr>
                      </tbody>
                    </table>
                    <h2>2011/12 Enrollment by Region</h2>
                    <table cellspacing='2' cellpadding='2'>
                      <tbody>
                        <tr>
                          <td width='40%'><strong>Region</strong></td>
                          <td width='30%'><strong>All Undergraduates</strong></td>
                          <td width='30%'><strong>Fall 2011 First-year students</strong></td>
                        </tr>
                        <tr>
                          <td width='40%'>South</td>
                          <td width='30%'>37%</td>
                          <td width='30%'>33%</td>
                        </tr>
                        <tr>
                          <td width='40%'>Midwest</td>
                          <td width='30%'>18%</td>
                          <td width='30%'>19%</td>
                        </tr>
                        <tr>
                          <td width='40%'>Middle States</td>
                          <td width='30%'>18%</td>
                          <td width='30%'>18%</td>
                        </tr>
                        <tr>
                          <td width='40%'>Southwest</td>
                          <td width='30%'>9%</td>
                          <td width='30%'>9%</td>
                        </tr>
                        <tr>
                          <td width='40%'>West</td>
                          <td width='30%'>7%</td>
                          <td width='30%'>8%</td>
                        </tr>
                        <tr>
                          <td width='40%'>New England</td>
                          <td width='30%'>5%</td>
                          <td width='30%'>7%</td>
                        </tr>
                        <tr>
                          <td width='40%'>International</td>
                          <td width='30%'>5%</td>
                          <td width='30%'>6%</td>
                        </tr>
                      </tbody>
                    </table>
                    <br>");**/
}

function students($eid)
{
	//connectToDatabase();
	$query = sprintf("SELECT * FROM users u, education_data ed, work_data w, education_general eg WHERE w.idnum=ed.idnum AND u.idnum=ed.idnum AND eg.college=ed.college AND eg.eid='$eid' GROUP BY u.idnum LIMIT 15");
	$result = mysql_query($query);
	if (!$result)
	{
		return(mysql_error()." ".$query);
	}
	$message = "<ul id='studlist'>";
	while ($mes =  mysql_fetch_assoc($result))
	{
		if (is_null($mes['picture']))
		{
			$mes['picture'] = "images/default.png";
		}
		$message = $message."<li><div style='height:40px;width:40px;float:left'><img style='margin-bottom: 0px; padding-bottom: 0px;' src='".$mes['picture']."' width='38' height='38'/><br>";
		$from_name = $mes['first_name']." ".$mes['last_name'];
		$message = $message."<a class='mes_name' href='profile.php?b_id=".$mes['from_bid']."'></a></div>";
		$message = $message."<a href='cprofile.php?idnum=".$mes['idnum']."' style='font-weight: bold; color: black;'>".substr($from_name,0,20)." ('".substr($mes['college_end'], 2, 2);
		$message = $message.")</a><br>Currently at ".$mes['company_name']."</li>";
	}
	$message .= "</ul>";
	return($message);
}

?>