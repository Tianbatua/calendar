<style>
	table {
		border:1px solid silver;
	}

	.fontb{
		color:white;
		background: blue;
	}

	th{
		width:30px;
	}

	td, th{
		height: 30px;
		text-align: center;
	}

</style>

<?php
         include "calendar.class.php";

         $calendar=new Calendar;

         $calendar->out();