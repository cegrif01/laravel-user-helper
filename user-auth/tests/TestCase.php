<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

    public function assertRequestOk()
    {
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function assertViewReceives($prop,$val=null)
    {
        $response=$this->client->getResponse();

        $prop=$response->getOriginalContent()->$prop;


        if( $val )
        {
            return $this->assertEquals($val,$prop);
        }
        $this->assertTrue(!! $prop);
    }

	/*migrate the database to the sqlite databse*/
	private function prepareForTests()
	{
		Artisan::call('migrate');
	}

}
