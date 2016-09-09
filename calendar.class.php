<?php

         class Calendar{
         	private $year;
         	private $month;
         	private $start_weekday; //what's day is the first day of a month
         	private $days; //how many days in a month 

         	function __construct(){
         		$this->year=isset($_GET["year"]) ? $_GET["year"] : date("Y");
         		$this->month=isset($_GET["month"]) ? $_GET["month"] : date("m");
         		$this->start_weekday=date("w", mktime(0, 0, 0, $this->month, 1, $this->year));
         		$this->days=date("t", mktime(0, 0, 0, $this->month, 1, $this->year));

         	}

         	function out(){
         		echo '<table align="center">';
         		   $this->changeDate();
                   $this->weekslist();
                   $this->dayslist();
         		echo '</table>';
         	}

         	private function weekslist(){
         		$week=array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

         		echo '<tr>';
         		for($i=0; $i<count($week); $i++)
         			echo '<th class="fontb">'.$week[$i].'</th>';

         		echo '</tr>';
                  
         	}

         	private function dayslist(){
         		echo '<tr>';
         		//input space(befor the first day of a month)

         		for($j=0; $j<$this->start_weekday; $j++)
         			echo '<td>&nbsp</td>';

         		for($k=1; $k<=$this->days; $k++){
         			$j++;
                    if($k==date('d'))
                    	echo '<td class="fontb">'.$k.'</td>';
                    else
         			    echo '<td>'.$k.'</td>';

         			if($j%7==0)
         				echo '</tr><tr>';
         		}

         		while($j%7!=0){
         			echo '<td>&nbsp;</td>';
         			$j++;

         		}

         		echo '</tr>';

         	}

         	private function lastYear($year, $month){
         		$year=$year-1;
         		if($year < 1970)
         			$year=1970;

         		return "year=".$year." & month=".$month;

         	}

         	private function lastMonth($year, $month){
         		if($month == 1){
         			$year = $year -1;

         			if($year < 1970)
         			    $year=1970;

         		    $month=12;
         		}else{
         			$month--;
                }
         		return "year=".$year." & month=".$month;
         	}

         	private function nextYear($year, $month){
         		$year=$year+1;
         		if($year < 1970)
         			$year=1970;

         		return "year=".$year." & month=".$month;
         		
         	}

         	private function nextMonth($year, $month){
         		if($month == 12){
         			$year = $year +1;

         			if($year > 2038)
         			    $year=2038;

         		    $month=1;
         		}else{
         			$month++;
                }
         		return "year=".$year." & month=".$month;
         		
         	}

         	private function changeDate(){
         		echo '<tr>';
         		echo '<td><a href="?'.$this->lastYear($this->year, $this->month).'">'.'<<'.'</a></td>';
         		echo '<td><a href="?'.$this->lastMonth($this->year, $this->month).'">'.'<'.'</a></td>';
         		echo '<td colspan="3">'.$this->year.'&nbsp'.$this->month.'</td>';
         		echo '<td><a href="?'.$this->nextMonth($this->year, $this->month).'">'.'>'.'</a></td>';
         		echo '<td><a href="?'.$this->nextYear($this->year, $this->month).'">'.'>>'.'</a></td>';
         		echo '</tr>';
         	}
         }























