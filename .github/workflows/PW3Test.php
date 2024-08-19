<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;
use Facebook\WebDriver\WebDriverBy;

class PW3Test extends DuskTestCase
{

  //$PW3Url = ENV('PW3_URL');
 //$PW3Url='https://qa.pgcoza.biz/payweb3/index.html';
// public static string $PW3Url = 'https://qa.pgcoza.biz/payweb3/index.html';

      /**
     * @group PW3TestValidVisa
       * @group PW3ApprovedTransSimCardTests
     */
    public function testApprovedPW3Visa(): void
    {

        $this->browse(callback: function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;
           // Global $purchaseAmountCents ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

             $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
             $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
             $this->transSimCardProcessing($browser);
             $browser->pause(5000)
                     ->waitForText('Do another one')
                     ->assertSee('Your transaction was successful.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Approved', $approvedElement);

        });
    }
    /**
     * @group PW3TestValidMC
     * @group PW3ApprovedTransSimCardTests
     */

    public function testApprovedPW3MC(): void
    {

        $this->browse(callback: function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;
            // Global $purchaseAmountCents ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->pause(5000)
                ->waitForText('Do another one')
                ->assertSee('Your transaction was successful.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Approved', $approvedElement);

        });
    }
      /**
     * @group PW3TestValidAmex
       * @group PW3ApprovedTransSimCardTests
     */

    public function testApprovedPW3Amex(): void
    {

        $this->browse(callback: function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;
           // Global $purchaseAmountCents ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_AMEX') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

             $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
             $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
             $this->transSimCardProcessing($browser);
             $browser->pause(5000)
                     ->waitForText('Do another one')
                     ->assertSee('Your transaction was successful.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Approved', $approvedElement);

        });
    }

    /**
     * @group PW3TestValidDiners
     * @group PW3ApprovedTransSimCardTests
     */
    public function testApprovedPW3Diners(): void
    {

        $this->browse(callback: function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;
            // Global $purchaseAmountCents ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_DINERS') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->pause(5000)
                ->waitForText('Do another one')
                ->assertSee('Your transaction was successful.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Approved', $approvedElement);

        });
    }

    /**
     * @group PW3TestDeclineVisa
     * @group PW3DeclinedTransSimCardTests
     */
     public function testDeclinePW3Visa(): void
     {
         $this->browse(function (Browser $browser) {

             #region TestData

             $purchaseAmountCents = rand(30000,99000) ;

             $cardHolderName = 'Automation Testing' ;
             $cardNumber = ENV('TRANSSIM_DECLINED_VISA') ;

             $mapUrl = ENV('MAP_URL');
             $mapUser = ENV('MAP_USER');

             $mapPassword = ENV('MAP_PASSWORD');
             $mapCompany = ENV('MAP_COMPANY');
             $randAmount = $this->formatCents($purchaseAmountCents);

             #endregion

             $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
             $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
             $this->transSimCardProcessing($browser);
             $browser->waitForText('Do another one')
                     ->assertSee( 'There was a problem processing your transaction, please try again.');

             $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
             $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
             $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
             $this->assertEquals($randAmount, $transactionAmountElement);
             $this->assertEquals('Declined', $approvedElement);

         });
     }
    /**
     * @group PW3TestDeclineMC
     * @group PW3DeclinedTransSimCardTests
     */
    public function testDeclinePW3MC(): void
    {
        $this->browse(function (Browser $browser) {

            #region TestData

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_DECLINED_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->waitForText('Do another one')
                ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }
    /**
     * @group PW3TestDeclineDiners
     * @group PW3DeclinedTransSimCardTests
     */
    public function testDeclinePW3Diners(): void
    {
        $this->browse(function (Browser $browser) {

            #region TestData

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_DECLINED_DINERS') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->waitForText('Do another one')
                ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PW3TestInsufficientVisa
     * @group PW3InsufficientTransSimCardTests
     */
    public function testInsufficientPW3Visa(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_INSUFFICIENT_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->pause(5000)
                    ->waitForText('Do another one')
                    ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PW3TestInsufficientMC
     * @group PW3InsufficientTransSimCardTests
     */
    public function testInsufficientPW3MC(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_INSUFFICIENT_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->pause(5000)
                ->waitForText('Do another one')
                ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PW3TestInsufficientAMEX
     * @group PW3InsufficientTransSimCardTests
     */
    public function testInsufficientPW3AMEX(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_INSUFFICIENT_AMEX') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $this->transSimCardProcessing($browser);
            $browser->pause(5000)
                ->waitForText('Do another one')
                ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PW3TestUnprocessedVisa
     * @group PW3VisaTransSimCardTests
     */
    public function testUnprocessedPW3Visa(): void
    {
        $this->browse(function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_UNPROCESSED_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $browser->waitForText('Do another one')
                    ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Auth & Reversal', $approvedElement);

        });
    }
    /**
     * @group PW3TestUnprocessedMC
     * @group PW3UnprocessedTransSimCardTests
     */
    public function testUnprocessedPW3MC(): void
    {
        $this->browse(function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_UNPROCESSED_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->pw3Initiate($browser, ENV('PW3_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $browser->waitForText('Do another one')
                ->assertSee( 'There was a problem processing your transaction, please try again.');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Auth & Reversal', $approvedElement);

        });
    }

    #region helper methods

    private function pw3Initiate($browser, $pw3Url, $pgId, $password, $purchaseAmountCents)
    {
        $browser->visit($pw3Url)
                ->maximize()
                ->waitForText('PayWeb v3 payment initiate')
                ->waitForText('PayGate ID')
                ->type('#paygateId', $pgId)
                ->type('#encryptionKey', $password)
                ->type('#amount', $purchaseAmountCents)
                ->press('Do Payment')
                ->pause(5000)
                ->waitForText('Card Holder');
    }

    private function formatCents($randomCents)
    {
        return substr_replace($randomCents, ".", -2, 0);
    }

    private function submitCreditCardDetails($browser, $name, $number): void
    {
        $browser->clear('ccName')
        ->type('ccName',$name)
        ->type('ccNumber',$number);
        $this->selectingMonth($browser);
        $this->selectingYear($browser);
        $this->isAmexTransaction($browser);
      //  $this->randomCvv($browser);
        $browser->press('#nextBtn')
                ->pause(2000);
    }
     private function transSimCardProcessing($browser): void
     {
         $elementText = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div/span/table/tr/td/table/tr/td/table/tr[7]/td[1]"))->getText();
         if($elementText == 'Password:')
         {
             $browser->press('Submit');
         }
//        else
//        {
//            $browser->pause(5000)
//                ->assertSee(' There was a problem processing your transaction, please try again. ');
//        }

     }

    private function selectingMonth ($browser)
    {
        $nextMonth = Carbon::today()->addMonth(1)->format('m');
        $browser->select('ccOpMonth', $nextMonth);
    }

    private function selectingYear ($browser)
    {
        $nextYear = Carbon::today()->addYear(1)->format('Y');
        $browser->select('ccOpYear', $nextYear);
    }

    private function isAmexTransaction($browser): void
    {
        //if($isAmexTransaction->$browser->driver->findElement(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/span/div[3]/img"))->assertPresent())
      //  $amexIcon->$browser->driver->findElement(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/span/div[3]/img"))->assertPresent();
       // $amexIcon = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/span/div[1]/img")->is_displayed());
     //   $amexIcon = $browser->driver->assertPresent(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/span/div[1]/img"));
      $amexCard = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/input"))->getText();

       // if($this->assertEquals('37', $amexCard))
        if (str_contains("37", $amexCard))

        {
        $this->randomCvvAmex($browser);
        }

        else {
        $this->randomCvv($browser);
        }
    }
    private function randomCvvAmex ($browser)
    {
        $cvvAmex = rand(1000,9999);
        $browser->type('ccCvv', $cvvAmex);
    }

    private function randomCvv ($browser)
    {
        $cvv = rand(100,999);
        $browser->type('ccCvv', $cvv);
    }

    private function mapLogin($browser, $mapUrl, $userName, $password, $company)
    {
        $browser->visit($mapUrl)
        ->maximize()
        ->waitForText('MERCHANT LOGIN')
        ->type('#username',$userName)
        ->type('#password',$password)
        ->type('#domain', $company)
        ->press('Login')
        ->waitForText('Dashboard')
        ->waitForText('Date')
        ->pause(1000);

    }


    #endRegion
    }
