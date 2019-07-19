<?php
namespace Thiagoprz\CnpjValidator\Test;

use Thiagoprz\CnpjValidator\Cnpj;

class CnpjTest extends TestCase
{

    /**
     * @var Cnpj
     */
    protected $rule;

    /**
     * @var array Valid identifiers
     */
    protected $valid_identifiers = [
        '58.155.153/0001-98',
        '68.136.298/0001-03',
        '29553461000173',
    ];

    /**
     * Test setup
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->rule = new Cnpj();
    }

    /**
     * Passing tests
     *
     * @return void
     */
    public function testCNPJPass()
    {
        foreach ($this->valid_identifiers as $identifier) {
            $this->assertTrue($this->rule->passes('identifier', $identifier));
        }
    }

    /**
     * Non passing tests
     *
     * @return void
     */
    public function testCNPJFail()
    {
        $this->assertFalse($this->rule->passes('identifier', 'asdfdsaf'));
        $this->assertFalse($this->rule->passes('identifier', '123456789456'));
    }
}
