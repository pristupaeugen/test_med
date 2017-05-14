<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170227100717 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(file_get_contents(__DIR__ . '/OMH_DB_V2-2_Structure.sql'));
        $this->addSql('LOCK TABLES `migration_versions` WRITE;');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql(file_get_contents(__DIR__ . '/OMH_DB_V2-2_Structure.sql'));
        $this->addSql('LOCK TABLES `migration_versions` WRITE;');
    }
}
