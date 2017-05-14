<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170418160832 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("
            UPDATE `country` SET `name` = 'Cote d\'Ivoire' WHERE id = 55;
            UPDATE `country` SET `name` = 'Curacao' WHERE id = 58;
            UPDATE `country` SET `name` = 'Reunion' WHERE id = 181;
            UPDATE `country` SET `name` = 'Saint Barthelemy' WHERE id = 185;
        ");
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql("
            UPDATE `country` SET `name` = 'Côte d\'Ivoire' WHERE id = 55;
            UPDATE `country` SET `name` = 'Curaçao' WHERE id = 58;
            UPDATE `country` SET `name` = 'Réunion' WHERE id = 181;
            UPDATE `country` SET `name` = 'Saint Barthélemy' WHERE id = 185;
        ");
    }
}
