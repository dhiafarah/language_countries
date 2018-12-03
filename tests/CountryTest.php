<?php
use PHPUnit\Framework\TestCase;
use Entity\Country;
define("api_full_name","https://restcountries.eu/rest/v2/name/");
define('api_language', 'https://restcountries.eu/rest/v2/lang/');
define("iso_code", "iso639_1");
class CountryTest extends TestCase
{
    /*
    * test if a given language is equal to the language of an entred country
    */
    public function testLanguageOfCountry()
    {
        $germany = new Country('Germany');
        $this->assertSame(
            'de',
            $germany->getLanguage()
        );
        $tunisia = new Country('Tunisia');
        $this->assertSame(
            'ar',
            $tunisia->getLanguage()
        );
    }

    /*
    * test if a given country speak the same language of an entered country
    * @allCountries : all coutries that speak the same language with entered country
    * $arrayCountries : convertion of @allcountries from string to array
    */
    public function testLanguageOfTwoCounties()
    {
        $tunisia = new Country('Tunisia');
        $allCountries =$tunisia->getCountriesWithSameLanguage();
        $arrayCountries=explode(', ', $allCountries);
        $this->assertContains(
            'Algeria',
            $arrayCountries
        );

        $germany = new Country('Germany');
        $allCountries =$germany->getCountriesWithSameLanguage();
        $arrayCountries=explode(', ', $allCountries);
        $this->assertContains(
            'Belgium',
            $arrayCountries
        );
        
    }
}