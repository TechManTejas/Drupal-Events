<?php

declare(strict_types=1);

namespace Drupal\Tests\mysql\Functional;

use Drupal\Core\Database\Database;
use Drupal\FunctionalTests\Installer\InstallerExistingSettingsTest;

/**
 * Tests the isolation_level setting with existing database settings.
 *
 * @group Installer
 */
class InstallerIsolationLevelExistingSettingsTest extends InstallerExistingSettingsTest {

  /**
   * {@inheritdoc}
   */
  protected function prepareEnvironment(): void {
    parent::prepareEnvironment();

    $connection_info = Database::getConnectionInfo();
    // The isolation_level option is only available for MySQL.
    if ($connection_info['default']['driver'] !== 'mysql') {
      $this->markTestSkipped("This test does not support the {$connection_info['default']['driver']} database driver.");
    }
  }

  /**
   * Verifies that isolation_level is not set in the database settings.
   */
  public function testInstaller(): void {
    $contents = file_get_contents($this->container->getParameter('app.root') . '/' . $this->siteDirectory . '/settings.php');

    // Test that isolation_level was not set.
    $this->assertStringNotContainsString("'isolation_level' => 'READ COMMITTED'", $contents);
    $this->assertStringNotContainsString("'isolation_level' => 'REPEATABLE READ'", $contents);

    // Change the default database connection to use the isolation level from
    // the test.
    $connection_info = Database::getConnectionInfo();
    $driver_test_connection = $connection_info['default'];
    // We have asserted that the isolation level was not set.
    unset($driver_test_connection['isolation_level']);
    unset($driver_test_connection['init_commands']);

    Database::renameConnection('default', 'original_database_connection');
    Database::addConnectionInfo('default', 'default', $driver_test_connection);
    // Close and reopen the database connection, so the database init commands
    // get executed.
    Database::closeConnection('default', 'default');
    $connection = Database::getConnection('default', 'default');

    $query = $connection->isMariaDb() ? 'SELECT @@SESSION.tx_isolation' : 'SELECT @@SESSION.transaction_isolation';

    // Test that transaction level is REPEATABLE READ.
    $this->assertEquals('REPEATABLE-READ', $connection->query($query)->fetchField());

    // Restore the old database connection.
    Database::addConnectionInfo('default', 'default', $connection_info['default']);
    Database::closeConnection('default', 'default');
    Database::getConnection('default', 'default');
  }

}
