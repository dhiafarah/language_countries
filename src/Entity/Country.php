<?php 
namespace Entity; 
/*
* CLass Country
* 
*/
Class Country{

	/*
	* language of the country
	*/
	private $language;
	/*
	* list of countries that speak the same language of the current country
	*/
	private $countries_with_same_language;

	public function __construct($name)
	{
		$this->setLanguage($name);
    	$this->setCountriesWithSameLanguage($this->language,$name);
	}
   
  	
	/*
	* Consume the API
    * @url : url form API
    * @name : name of country (on input)
    * @param : parameter for specific API
	*/
	public function render_api_result($url, $name,$param=null)
	{
     	$api_target=$url.$name;
		$contents= file_get_contents($api_target, false,
	    stream_context_create(array(
	        "http" => array(
	            "method" => "GET",
	            "header" => "Content-Type: application/JSON",
	        )
	    ))) . "\n";
	    $response= json_decode($contents, true);
	    if(!$response){
	 	   die($name .": Bad name of country");
	    }
	    return $response;
	}
    
    /*
	* Set Language
	* @return Country
	*/
	public function setLanguage($name)
	{
	   $response = $this->render_api_result(api_full_name, $name,'/?fullText=true');
 	   $data = $response[0];
       $this->language=$data["languages"][0][iso_code];
       return $this;

	}

    /*
	* Set countries_with_same_language
	* @return Country
	*/
	public function setCountriesWithSameLanguage($language,$name)
	{
        $response= $this->render_api_result(api_language, $language);
        $list="";
        for ($i=0; $i < count($response); $i++) { 
   	        if ($response[$i]["name"] != $name){
   		        $list=$list .$response[$i]["name"].", ";
   	        }
        }
        $this->countries_with_same_language=$list;
        return $this;
	}
    
    /*
	* Get Language
	* @return String
	*/
	public function getLanguage()
	{
		return $this->language;
	}

	/*
	* Get countries_with_same_language
	* @return String
	*/
	public function getCountriesWithSameLanguage()
	{
		return $this->countries_with_same_language;
	}



}

?>