<?php 
namespace Controller;
use Entity\Country;
/*
* CLass Controller
* 
*/
Class Controller{	

    /*
    * Function Init
    * @view : output 
    * $argv : array of inputs
    */
	public function init($view, $argv)
	{ 
	    // number of inputs
		$nbrArgs=count($argv);
		switch ($nbrArgs)
		{   // one input country
		  case 2:
		        // create country
		      $country = new Country($argv[1]);
		      //search language of the country
		      $language = $country->getLanguage();
		      //search countries that speak the same langage
		      $countries= $country->getCountriesWithSameLanguage();
		      //output
		      $view->output1($language,$argv[1],$countries);
		      break;

		   // Two inputs countries
		  case 3:
		      //the first input country 
		      $countryOne = new Country($argv[1]);
		      $languageOne = $countryOne->getLanguage();
		      //the second input country
		      $countryTwo = new Country($argv[2]);
		        $languageTwo = $countryTwo->getLanguage();

		        //output
		        $view->output2($languageOne,$argv[1],$languageTwo,$argv[2]);
		    break;
		    //no input or more than two inputs countries
		  default:
		      $view->exception($nbrArgs);
		      break;
		    
		}
	}

   
  	
	
	



}

?>