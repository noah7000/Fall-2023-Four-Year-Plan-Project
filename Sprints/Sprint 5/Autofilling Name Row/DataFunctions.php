<!--**********************************************
  * @author      Noah Jackson
  * @course      Software Engineering
  * @assignment  Four Year Plan Project
  * @related     index.php
**********************************************-->
<?php
    function deptCodes() {
      //departments are hard coded for now, but will be taken from the database
      $depts = ["","CSC","MATH","PHIL"];           //"BIBL","ENGL","PSYC","SOC","THEO","KINE","BADM","WRIT","AART","ACCT","ADC","APOL","ASL","BSS","BIOL","CAPP","CHEM","CHI"
      return $depts;
    }

    function courseCodes($dept) {
      //course codes are hard coded for now, but later the provided dept Code will be used in a DB query
      $codes = [""];
      if ($dept=="CSC") $codes = ["","100","101","102"];
      if ($dept=="MATH") $codes = ["","200","201","202"];
      if ($dept=="PHIL") $codes = ["","300","301","302"];

      return $codes;
    }
?>
