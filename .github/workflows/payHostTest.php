<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Carbon\Carbon;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\webDriver;

class payHostTest extends DuskTestCase
{
     /**
     * @group PHTestValidVisa
     * @group PHApprovedTransSimCardTests
     */
    public function testApprovedPayhostVisa(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestValidMC
     * @group PHApprovedTransSimCardTests
     */
    public function testApprovedPayhostMC(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestValidAmex
     * @group PHApprovedTransSimCardTests
     */
    public function testApprovedPayhostAmex(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_AMEX') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestValidDiners
     * @group PHApprovedTransSimCardTests
     */
    public function testApprovedPayhostDiners(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_APPROVED_DINERS') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestDeclinedVisa
     * @group payHostDeclinedTests
     */

    public function testDeclinePayhostVisa(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_DECLINED_VISA') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $browser->pause(5000)
                    ->assertSee(' There was a problem processing your transaction, please try again. ');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PHTestDeclinedMC
     * @group payHostDeclinedTests
     */

    public function testDeclinePayhostMC(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_DECLINED_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $browser->pause(5000)
                ->assertSee(' There was a problem processing your transaction, please try again. ');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }

    /**
     * @group PHTestDeclinedDiners
     * @group payHostDeclinedTests
     */

    public function testDeclinePayhostDiners(): void
    {
        $this->browse(function (Browser $browser) {

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_DECLINED_DINERS') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
            $this->submitCreditCardDetails($browser, $cardHolderName, $cardNumber);
            $browser->pause(5000)
                ->assertSee(' There was a problem processing your transaction, please try again. ');

            $this->mapLogin($browser, $mapUrl, $mapUser,$mapPassword,$mapCompany);
            $transactionAmountElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[3]"))->getText();
            $approvedElement = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[1]/div[4]/div/div/div[3]/div[2]/div/div[2]/div/table/tbody/tr[1]/td[4]/span"))->getText();
            $this->assertEquals($randAmount, $transactionAmountElement);
            $this->assertEquals('Declined', $approvedElement);

        });
    }


    /**
     * @group PHTestInsufficientVisa
     * @group PHInsufficientTransSimCardTests
     */
    public function testInsufficientPayhostVisa(): void
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

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestInsufficientMC
     * @group PHInsufficientTransSimCardTests
     */
    public function testInsufficientPayhostMC(): void
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

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestInsufficientAMEX
     * @group PHInsufficientTransSimCardTests
     */
    public function testInsufficientPayhostAMEX(): void
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

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestUnprocessedVISA
     * @group PHUnprocessedTransSimCardTests
     */
    public function testUnprocessedPayhostVISA(): void
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

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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
     * @group PHTestUnprocessedMC
     * @group PHUnprocessedTransSimCardTests
     */
    public function testUnprocessedPayhostMC(): void
    {
        $this->browse(function (Browser $browser) {

            #region Test Data

            $purchaseAmountCents = rand(30000,99000) ;

            $cardHolderName = 'Automation Testing' ;
            $cardNumber = ENV('TRANSSIM_UNPROCESSED_MC') ;

            $mapUrl = ENV('MAP_URL');
            $mapUser = ENV('MAP_USER');

            $mapPassword = ENV('MAP_PASSWORD');
            $mapCompany = ENV('MAP_COMPANY');
            $randAmount = $this->formatCents($purchaseAmountCents);

            #endregion

            $this->payhostWebInitiate($browser, ENV('PAYHOST_URL'), ENV('PAYGATE_ID'), ENV('PAYGATE_PASSWORD'), $purchaseAmountCents);
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

    private function payhostWebInitiate($browser, $phUrl, $pgId, $password, $purchaseAmountCents)
    {
        $browser->visit($phUrl)
                ->maximize()
                ->waitForText('PayHost payment initiate')
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
    private function isAmexTransaction($browser): void
    {
        $amexCard = $browser->driver->findElement(WebDriverBy::xpath("/html/body/div[4]/div[2]/div[2]/div/form/div[2]/div[2]/div/div[1]/input"))->getText();

        if (str_contains("37", $amexCard))
        {
            $this->randomCvvAmex($browser);
        }
        else {
            $this->randomCvv($browser);
        }
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

        private function randomCvv ($browser)
    {
        $cvv = rand(100,999);
        $browser->type('ccCvv', $cvv);
    }

    private function randomCvvAmex ($browser)
    {
        $cvvAmex = rand(1000,9999);
        $browser->type('ccCvv', $cvvAmex);
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
