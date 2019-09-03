<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script>
	// function render(id) {
  //   
  // }
	</script>
<!DOCTYPE html>
<style>
	::selection {
		background-color: #E13300;
		color: white;
	}

	::-moz-selection {
		background-color: #E13300;
		color: white;
	}

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}


	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td,
	th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}

	input[type="button"] {
		width: 69px;
		height: 35px;
		background: darkgray;
	}
	p.footer_pera {
    text-align: center;
    font-size: 20px;
    color: rebeccapurple;
}
</style>



	<div id="container">
		<h1>Form Records </h1>
    <a href="<?=site_url('Form'); ?>">Add New Record</a>
		<div id="body">
       <table>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Gender</th>
					<th>Country</th>
					<th>State</th>
					<th>City</th>
					<th>Address</th>
					<th>Subjects</th>
					<th>Skils</th>
					<th>Edit</th>
					<th>Delete</th>
				
				</tr>
				<?php
				foreach ($regis as $list) :
					?>
				<?php
					echo "<tr>
									<td>{$list['fname']}</td>
									<td>{$list['lname']}</td>
									<td>{$list['email']}</td>
									<td>{$list['contact']}</td>
									<td>{$list['gender']}</td>
									<td>{$list['country']}</td>
									<td>{$list['state']}</td>
									<td>{$list['city']}</td>
									<td>{$list['address']}</td>
									<td>{$list['subject']}</td>
									<td>{$list['skils']}</td>
									<td>
									<a class='btn btn-xs btn-info' href='".site_url('/UpdateRecord/edit/'.$list['id'])."'>
										 edit
									</a></td>
									<td>
									<a class='btn btn-xs btn-info' href='".site_url('/UpdateRecord/edit/'.$list['id'])."'>
										 Delete
									</a></td>
			 					 </tr>";

				 
endforeach; ?>
			</table>

		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>



