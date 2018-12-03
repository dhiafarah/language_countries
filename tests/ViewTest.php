<?php
use PHPUnit\Framework\TestCase;
use View\View;

class ViewTest extends TestCase
{
    /*
    * test output messages in case of no input country
    */
    public function testExceptionNoInput()
    {
        $view = new View();  
        $this->expectOutputString(
            'You must enter at least one country !!',
             $view->exception(1)
        );        
    }

    /*
    * test output messages in case of more than 2 countries entered
    */
    public function testExceptionMoreThanTwoInputCountries()
    {
        $view = new View(); 
        $this->expectOutputString(
            'You must enter at most two countries !!',
             $view->exception(4)
        );         
    }

    /*
    * test output messages in case of 2 countries are entered
    */
    public function testOutput2()
    {
        $view = new View();  
        $this->expectOutputString(
            'Germany and Austria speak the same language',
             $view->output2('de','Germany','de','Austria')
        );   
    }

}