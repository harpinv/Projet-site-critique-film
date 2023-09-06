<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../Model/Manager/UserManager.php';
require __DIR__ . '/../Model/DB.php';
require __DIR__ . '/../Model/Entity/User.php';

use PHPUnit\Framework\TestCase;
use App\Model\Manager\UserManager;



class UserManagerTest extends TestCase
{
    /*
     * Test getAll().
     * @return void
     */
    public function testGetAll(): void
    {
        $userManager = new UserManager();
        $userManager->getAll();
        $this->assertNotNull($userManager);
    }
}
