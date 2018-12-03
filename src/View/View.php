<?php 
namespace View; 
/*
* CLass View
* 
*/
Class View{

    /*
    * output for one entered country
    */
	public function output1($language,$country,$countries)
	{
		echo "Country language code: ". $language."\n";
 	    echo  $country ." speaks same language with these countries: ".$countries;
	}
	
	/*
    * output for two entered countries
    */
	public function output2($languageOne,$countryOne,$languageTwo,$countryTwo)
	{
		if (($languageOne <=> $languageTwo) == 0){
			echo $countryOne ." and ". $countryTwo ." speak the same language";
		} else {
		    echo $countryOne ." and ". $countryTwo ." dont speak the same language";
		} 
	}

	/*
    * output in case of exception : if no input country or if more than 2 countries are entered
    */
	public function exception($nbArgs)
	{
		switch ($nbArgs){
			case 1:
			    echo "You must enter at least one country !!";
			    break;
			default :
			    echo "You must enter at most two countries !!";
			    break;
		}
    }
   
  	
	
	



}

?>